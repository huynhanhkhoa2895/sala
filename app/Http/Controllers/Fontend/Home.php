<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kind;
use App\Models\Color;
use App\Models\Style;
use App\Models\News;
use App\Models\Wedding_invitation;
use App\Models\Banner;

class Home extends Controller
{
    //
    public function index(){
        $data['color'] = Color::all();
        $data['banner'] = Banner::where("status",1)->get();
        $data['style'] = Style::all();
        $data['news'] = News::all();
        $data['product']=Wedding_invitation::limit(15)->orderBy("id","desc")->get();
        return view("fontend/home",$data);
    }
    public function getListStyle(){
        return Style::all();
    }
    public function policy(){
        return view("fontend.policy");
    }
}
