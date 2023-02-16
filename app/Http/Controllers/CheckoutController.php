<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function addToCart(Request $request){
        try {
            $cart = session()->get('cart');
            if($cart == null){

                $cart[] = $request->id;

            }else{
                if(!in_array($request->id, $cart)){
                    array_push($cart, $request->id);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Course added to Cart"]);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function removeFromCart(Request $request){
        try {
            $cart = session()->get('cart');
            if($cart != null){
                if (($key = array_search($request->id, $cart)) !== false) {
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Course removed from Cart"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }

    public function removeInlineCart($id){
        try {
            $cart = session()->get('cart');
            if($cart != null){
                if (($key = array_search($id, $cart)) !== false) {
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with(["success" => "Course removed from Cart"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
