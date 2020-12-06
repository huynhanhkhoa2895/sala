<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News as Model;
class News extends Controller
{
    //
    function index(Request $rq){
        $data['news']=Model::where("slug",$rq->slug)->where("status",1)->first();
        return view("fontend.news",$data);
    }
}
