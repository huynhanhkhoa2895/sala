<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Style;
use App\Models\Wedding_invitation;
class Category extends Controller
{
    //
    public function index(Request $rq){
        $id = Style::where("id",$rq->id)->first()->id;
        $db = Wedding_invitation::where("style",$id);
        if(!empty($rq->color)){
            $db->where("color",$rq->color);
        }
        // if(!empty($rq->price)){
        //     $db->where("color",$rq->price);
        // }
        $data['product']= $db->orderBy("id","desc")->paginate(15);
        return view("fontend.list",$data);
    }
}
