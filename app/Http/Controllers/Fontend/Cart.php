<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Wedding_invitation as Model;

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
            $product = Model::find($rq->id);
            $cart = [
                "id" => $rq->id,
                "name" => $product->name,
                "price" => $product->price,
                "img" => $product->image,
                "qty" => $rq->qty,
            ];
            $rq->session()->push('cart', $cart);
        }
        return response()->json($rq->session()->get('cart'));
    }
    function Clear(Request $request){
        return $request->session()->forget('cart');
    }
    function Checkout(Request $rq){
        $carts = $rq->session()->get("cart",[]);
        $id = [];
        if(empty($carts)){
            return redirect(url("/"));
        }
        foreach($carts as $cart){
            array_push($id,$cart['id']);            
        }
        $data['product'] = Model::whereIn("id",$id)->get();
        return view("fontend.checkout",$data);
    }
    function RemoveProduct(Request $request){
        return redirect()->route("cart-checkout");
    }
}
