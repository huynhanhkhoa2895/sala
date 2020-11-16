<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class Cart extends Controller
{
    //
    function Add(Request $rq){
        $carts = $rq->session()->get("cart",[]);
        $check = true;
        $new_cart = [];
        foreach($carts as $cart){
            if($cart['id'] == $rq->id){
                $check = false;
                $cart['qty'] += 1;
            }
            array_push($new_cart,$cart);
        }
        if(!$check){
            $rq->session()->put('cart', $new_cart);
        }else{
            $cart = [
                "id" => $rq->id,
                "qty" => $rq->qty,
            ];
            $rq->session()->push('cart', $cart);
        }
        return response()->json($rq->session()->get('cart'));
    }
}
