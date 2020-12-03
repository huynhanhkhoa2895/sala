<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Wedding_invitation as Model;
use App\Models\Order as Order;
use App\Models\WeddingInfo as WeddingInfo;
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
            'phone' => 'required',
            'address' => 'required',
            'boy' => 'required',
            'dad_boy' => 'required',
            'mom_boy' => 'required',
            'address_boy' => 'required',
            'girl' => 'required',
            'dad_girl' => 'required',
            'mom_girl' => 'required',
            'address_girl' => 'required',
        ],[
            'required' => 'Bạn phải ghi đầy đủ thông tin dưới đây',
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
        $order->total = $total;
        $order->save();

        $wedding =  new WeddingInfo;
        $wedding->order = $order->id;
        $wedding->title = $request->title;
        $wedding->boy = $request->boy;
        $wedding->dad_boy = $request->dad_boy;
        $wedding->mom_boy = $request->mom_boy;
        $wedding->address_boy = $request->address_boy;
        $wedding->vocative_boy = $request->vocative_boy;
        $wedding->girl = $request->girl;
        $wedding->dad_girl = $request->dad_girl;
        $wedding->mom_girl = $request->mom_girl;
        $wedding->address_girl = $request->address_girl;
        $wedding->vocative_girl = $request->vocative_girl;
        $wedding->place = $request->place;
        $wedding->place_address = $request->place_address;
        $wedding->place_date = $request->place_h."giờ ".$request->place_m."phút ".date("d/m/Y",strtotime($request->place_d));
        $wedding->place_mdate = date("d/m/Y",strtotime($request->place_md));
        $wedding->organize_date = $request->organize_h."giờ ".$request->organize_m."phút ".date("d/m/Y",strtotime($request->organize_d));
        $wedding->organize_mdate = date("d/m/Y",strtotime($request->organize_md));
        // $wedding->place = $request->place;
        foreach($data['product'] as $product){
            $wedding->product = $product->id;
        }
        $wedding->save();
        $request->session()->forget('cart');
        return redirect(url("/"))->with("msg","Bạn đã đặt thiệp thành công, chúng tôi sẽ sớm liên hệ với bạn");
    }
}
