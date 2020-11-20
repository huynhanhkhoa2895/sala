<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wedding_invitation as Model;
use DB;
class Product extends Controller
{
    //
    function detail(Request $rq){
        $carts = $rq->session()->get("cart",[]);
        $detail = Model::join("style","wedding_invitation.style","=","style.id")->where("slug",$rq->slug)->select(DB::raw("wedding_invitation.*,style.content as style_name"))->first();
        $data['product'] = $detail;
        $data['products'] = Model::where("style",$detail->style)->limit("9")->orderBy("id","desc")->get();
        $data['qty'] = 1;
        if(!empty($carts)){
            foreach($carts as $cart){
                if($cart['id'] == $detail->id){
                    $data['qty'] = $cart['qty'];
                }
            }
        }
        return view("fontend.detail",$data);
    }
}
