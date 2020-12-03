<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wedding_invitation as Model; 
use Str;
use DB;
class Search extends Controller
{
    //
    function index(Request $rq){
        $db = new Model;
        if(!empty($rq->slug)){
            $value = Str::slug($rq->slug, '-');
            $db = $db->where('slug', 'like', '%' . $value . '%');
        }
        if(!empty($rq->color)){
            $db = $db->where("color",$rq->color);
        }
        if(!empty($rq->price)){
            if(is_numeric($rq->price)){
                $db = $db->where("price","<=",$rq->price);
                $db = $db->orderBy("id","desc");
            }else{
                $db = $db->orderBy("price",$rq->price);
            }
        }else{
            $db = $db->orderBy("id","desc");
        }
        
        $data['product'] = $db->paginate(15);
        return view("fontend.search",$data);
    }
}
