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
        $detail = Model::join("style","wedding_invitation.style","=","style.id")->where("slug",$rq->slug)->select(DB::raw("wedding_invitation.*,style.content as style_name"))->first();
        $data['product'] = $detail;
        $data['products'] = Model::where("style",$detail->style)->limit("9")->orderBy("id","desc")->get();
        return view("fontend.detail",$data);
    }
}
