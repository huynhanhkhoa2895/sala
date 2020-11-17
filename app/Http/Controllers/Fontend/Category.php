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
        $data['product']= Wedding_invitation::where("style",$id)->orderBy("id","desc")->paginate(15);
        return view("fontend.list",$data);
    }
}
