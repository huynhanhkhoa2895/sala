<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Wedding_invitation as Model;
use App\Models\Order as Order;
use App\Models\OrderDetail as OrderDetail;
use Illuminate\Support\Facades\Validator;
use Session;

class Cart extends Controller
{
    //
    function Add(Request $rq){
        if(!is_numeric($rq->qty)){
            Session::flash('msg', 'Số lượng phải là số ko phải chữ');
            return false;
        }
        $carts = $rq->session()->get("cart",[]);
        $check = true;
        $product = Model::find($rq->id);
        $cart[0] = [
            "id" => $rq->id,
            "name" => $product->name,
            "price" => $product->price,
            "img" => $product->image,
            "qty" => $rq->qty,
        ];
        $rq->session()->put('cart', $cart);
        Session::flash('msg', 'Cập nhập giỏ hàng thành công'); 
        return response()->json($rq->session()->get('cart'));
    }
    function Update(Request $rq){
        $carts = $rq->session()->get("cart",[]);
        $new_cart = [];
        foreach($carts as $cart){
            if($cart['id'] == $rq->id){
                $cart['qty'] = $rq->qty;
            }
            array_push($new_cart,$cart);
        }
        $rq->session()->put('cart', $new_cart);
        Session::flash('msg', 'Cập nhập giỏ hàng thành công'); 
        return response()->json($rq->session()->get('cart'));
    }
    function Clear(Request $request){
        return $request->session()->forget('cart');
    }
    function Checkout(Request $rq){
        $carts = $rq->session()->get("cart",[]);
        $id = [];
        $qtys = [];
        if(empty($carts)){
            return redirect(url("/"));
        }
        foreach($carts as $cart){
            array_push($id,$cart['id']);
            $qtys[$cart['id']] = $cart['qty'];
        }
        $data['product'] = Model::whereIn("id",$id)->get();
        $data['qtys'] = $qtys;
        return view("fontend.checkout",$data)->with("msg","Thêm giỏ hàng thành công");
    }
    function RemoveProduct(Request $request){
        return redirect()->route("cart-checkout");
    }
    function Payment(Request $request){
        $carts = $request->session()->get("cart",[]);
        if(empty($carts)){
            return redirect(url("/"));
        }
        return view("fontend.payment");
    }
    function CheckoutPayment(Request $request){
        $qtys=[];
        $id=[];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|min:9',
            'address' => 'required|min:9',
            'boy' => 'required',
            'dad_boy' => 'required',
            'mom_boy' => 'required',
            'address_boy' => 'required',
            'girl' => 'required',
            'dad_girl' => 'required',
            'mom_girl' => 'required',
            'address_girl' => 'required',
        ],[
            'required' => 'Bạn phải ghi đầy đủ thông tin tên',
        ])->validate();
        $carts = $request->session()->get("cart",[]);
        $total = 0;
        $totalQty = 0;
        foreach($carts as $cart){
            array_push($id,$cart['id']);
            $qtys[$cart['id']] = $cart['qty'];
            $totalQty += $cart['qty'];
        }
        if($totalQty < 300 && $totalQty >=200){
            $total = 50000;
        }else if($totalQty < 200){
            $total = 100000;
        }
        $data['product'] = Model::whereIn("id",$id)->get();
        foreach($data['product'] as $product){
            $total += $qtys[$product->id]*$product->price;
        }
        $order = new Order;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->boy = $request->boy;
        $order->dad_boy = $request->dad_boy;
        $order->mom_boy = $request->mom_boy;
        $order->address_boy = $request->address_boy;
        $order->girl = $request->girl;
        $order->dad_girl = $request->dad_girl;
        $order->mom_girl = $request->mom_girl;
        $order->address_girl = $request->address_girl;
        $order->total = $total;
        $order->save();
        foreach($data['product'] as $product){
            $orderDetail = new OrderDetail;
            $orderDetail->order = $order->id;
            $orderDetail->product = $product->id;
            $orderDetail->qty = $qtys[$product->id];
            $orderDetail->sub_price = $qtys[$product->id]*$product->price;
            $orderDetail->save();
        }
        $request->session()->forget('cart');
        return redirect(url("/"));
    }
}
