<?php

namespace App\Http\Controllers;

use Paystack;
use Exception;
use App\Models\Course;
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
                    $total = $course->total;
                    $courseid = $course->id;
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
                    "payment_method" => 'paystack'
                ]);
            }
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(Exception $e) {

            return redirect()->back()->withMessage(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
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
            $carts = getCart();
            for ($i=0; $i < count($carts); $i++) {
                if($carts[$i]['type'] == "quiz") {
                    QuizEnrolled::create([
                        "userid" => auth()->user()->id,
                        "questionid" => $carts[$i]['id']
                    ]);
                }else{
                    Enrolled::create([
                        "userid" => auth()->user()->id,
                        "courseid" => $carts[$i]['id']
                    ]);
                }

            }

            //clear session
            session()->forget('cart');
            //redirect to thank you page
            return redirect()->route('purchased', 'success');
        }else{
            //redirect to error page
            return redirect()->route('purchased', 'failed');
        }

    }
}
