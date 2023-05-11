<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function addToCart(Request $request){

        try {
            $cart = session()->get('cart');

            if($cart == null){
                $cart[] = [
                    "id" => $request->id,
                    "type" => $request->type,
                    "referral" => $request->referral ?? false,
                ];


            }else{

                if (!array_element_exists($cart, $request->id,  $request->type)) {
                    array_push($cart,  [
                        "id" => $request->id,
                        "type" => $request->type,
                        "referral" => $request->referral ?? false,
                    ]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Item added to Cart"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function removeFromCart(Request $request){
        try {
            $cart = session()->get('cart');
            if($cart != null){
                foreach ($cart as $key => $item) {
                    if ($item['id'] == $request->id && $item['type'] == $request->type) {
                        unset($cart[$key]);
                        break;
                    }
                }

            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Item removed from Cart"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function removeInlineCart($id, $type){
        try {
            $cart = session()->get('cart');
            if($cart != null){
                foreach ($cart as $key => $item) {
                    if ($item['id'] == $id && $item['type'] == $type) {
                        unset($cart[$key]);
                        break;
                    }
                }

            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Course removed from Cart"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
