<?php

namespace App\Http\Controllers;

use Paystack;
use Exception;
use App\Models\Course;
use App\Models\Wallet;
use App\Models\Earning;
use App\Models\Enrolled;
use App\Models\Question;
use App\Models\Transaction;
use App\Models\QuizEnrolled;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
        /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
    {

        try{
            //store transactions
            $carts = getCart();
            for ($i=0; $i < count($carts); $i++) {
                $quizid = null;
                $courseid = null;

                if($carts[$i]['type'] == "quiz") {
                    $question = Question::find($carts[$i]["id"]);
                    $type = "quiz";
                    $total = $question->price;
                    $discount = "0.00";
                    $amount = $question->price;
                    $quizid = $question->id;
                }else{
                    $course = Course::find($carts[$i]["id"]);
                    $total = $course->amount - $course->discount;
                    $type = "course";
                    $discount = $course->discount;
                    $amount = $course->amount;
                    $courseid = $course->id;
                }
                if($carts[$i]['referral']){
                    $referral = 1;
                }else{
                    $referral = 0;
                }

                Transaction::create([
                    "userid" => auth()->user()->id,
                    "courseid" => $courseid,
                    "quizid" => $quizid,
                    "reference" => $request->reference,
                    "amount" => $amount,
                    "discount" => $discount,
                    "total" => $total,
                    "type" => $type,
                    "referral" => $referral,
                    "payment_method" => 'paystack'
                ]);
            }
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(Exception $e) {
            return redirect()->back()->with(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

        /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if($paymentDetails['status']){
            $data = $paymentDetails['data'];
            Transaction::where('reference', $paymentDetails['data']['reference'])->update(
                ['status' => 'success']
            );
            //enroll for course
            $transactions = Transaction::where(["reference" => $paymentDetails['data']['reference']])->get();

            foreach ($transactions as $row) {
                if($row['type'] == "quiz") {
                    $_type = "quiz";

                    QuizEnrolled::create([
                        "userid" => auth()->user()->id,
                        "questionid" => $row['quizid']
                    ]);

                    //store amount made in wallet
                    $question = Question::find($row['quizid']);
                    $wallet = Wallet::where("userid", $question->userid)->first();
                    $balance = $wallet->balance;
                    $price = $question->price;
                    if(!$row['referral']){
                        $total = 0.7 * floatval($price);
                    }else{
                        $total = 0.95 * floatval($price);
                    }

                    $grand = floatval($balance) + $total;
                    //update wallet
                    Wallet::where("id", $wallet->id)->update([
                        "balance" => $grand
                    ]);
                    Earning::create(
                        [
                            "userid" => $question->userid,
                            "type" => "quiz",
                            "questionid" => $row['quizid'],
                            "amount" => $grand,
                        ]
                    );
                    $earn = (floatval($price) - floatval($total));
                }else{
                    $_type = "course";
                    Enrolled::create([
                        "userid" => auth()->user()->id,
                        "courseid" => $row['courseid']
                    ]);

                    //store amount made in wallet
                    $course = Course::find($row['courseid']);
                    $wallet = Wallet::where("userid", $course->instructor)->first();
                    $balance = $wallet->balance;
                    $price = $course->amount;
                    if(!$row['referral']){
                        $total = 0.7 * floatval($price);
                    }else{
                        $total = 0.95 * floatval($price);
                    }

                    $grand = floatval($balance) + $total;
                    //update wallet
                    Wallet::where("id", $wallet->id)->update([
                        "balance" => $grand
                    ]);

                    Earning::create(
                        [
                            "userid" => $course->instructor,
                            "type" => "course",
                            "courseid" => $row['courseid'],
                            "amount" => $grand,
                        ]
                    );
                    $earn = (floatval($price) - floatval($total));
                }

                //update admin wallet
                $adminwallet = Wallet::find(1);
                $balance = $adminwallet->balance;
                $grand = floatval($balance) + $earn;
                Wallet::where("id", $adminwallet->id)->update([
                    "balance" => $grand
                ]);
                Earning::create(
                    [
                        "userid" => 1,
                        "type" => $_type,
                        "courseid" => $row['courseid'],
                        "questionid" => $row['quizid'] ,
                        "amount" => $earn,
                    ]
                );

            }

            //clear session
            session()->forget('cart');
            //redirect to thank you page
            return redirect()->route('purchased', 'success')->with(["success" => "Payment Successful"]);
        }else{
            //redirect to error page
            return redirect()->route('purchased', 'failed')->with(["error" => "Payment Failed! There must be an error, try again later"]);
        }

    }
}
