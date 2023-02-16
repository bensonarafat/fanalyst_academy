<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolled;
use App\Models\Transaction;
use Paystack;
use Exception;
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
                $course = Course::find($carts[$i]);
                $total = $course->amount - $course->discount;
                Transaction::create([
                    "userid" => auth()->user()->id,
                    "courseid" => $carts[$i],
                    "reference" => $request->reference,
                    "amount" => $course->amount,
                    "discount" => $course->discount,
                    "total" => $total,
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
                $course = Course::find($carts[$i]);
                Enrolled::create([
                    "userid" => auth()->user()->id,
                    "courseid" => $carts[$i]
                ]);
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
