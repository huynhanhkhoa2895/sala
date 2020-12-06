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
        $data['products'] = Model::where("style",$detail->style)->where("status",1)->where("id","!=",$detail->id)->limit("9")->orderBy("id","desc")->get();
        $data['qty'] = 300;
        if(!empty($carts)){
            foreach($carts as $cart){
                if($cart['id'] == $detail->id){
                    $data['qty'] = $cart['qty'];
                }
            }
        }
        return view("fontend.detail",$data);
    }
    function compare(Request $rq){
        $detail = Model::join("style","wedding_invitation.style","=","style.id")->where("slug",$rq->slug)->select(DB::raw("wedding_invitation.*,style.content as style_name"))->first();
        $data['products'] = Model::where("id","!=",$detail->id)->get();
        $data['product'] = $detail;
        return view("fontend.compare",$data);
    }
    function compareAjax(Request $rq){
        $detail = Model::join("style","wedding_invitation.style","=","style.id")->where("wedding_invitation.id",$rq->id)->select(DB::raw("wedding_invitation.*,style.content as style_name"))->first();
        $data['product'] = $detail;
        return view("fontend.compare-ajax",$data);
    }
}
