<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kind;
use App\Models\Color;
use App\Models\Style;
use App\Models\Wedding_invitation;

class Home extends Controller
{
    //
    public function index(){
        $data['kind'] = Kind::all();
        $data['color'] = Color::all();
        $data['style'] = Style::all();
        $data['product']=Wedding_invitation::all();
        return view("fontend/home",$data);
    }
}
