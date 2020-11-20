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
        if(!empty($rq->price)){
            if(is_numeric($rq->price)){
                $db->where("price","<=",$rq->price);
                $db->orderBy("id","desc");
            }else{
                $db->orderBy("price",$rq->price);
            }
        }else{
            $db->orderBy("id","desc");
        }
        $data['product']= $db->paginate(15);
        return view("fontend.list",$data);
    }
}
