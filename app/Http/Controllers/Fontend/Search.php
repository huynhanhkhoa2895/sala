<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wedding_invitation as Model; 
use Str;
class Search extends Controller
{
    //
    function index(Request $rq){
        if(empty($rq->slug)){
            return redirect(url("/"));
        }
        $value = Str::slug($rq->slug, '-');
        $product = new Model;
        $db = $product->where('slug', 'like', '%' . $value . '%');

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
        $data['product'] = $db->paginate(15);
        return view("fontend.search",$data);
    }
}
