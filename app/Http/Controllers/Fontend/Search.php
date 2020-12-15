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
        $db = Model::where("status",1);
        if(!empty($rq->slug)){
            $value = Str::slug($rq->slug, '-');
            $db = $db->where('slug', 'like', '%' . $value . '%')
                    ->orWhere('slug',$value)
                    ->orWhere('slug','like', '%' . $rq->slug . '%')
                    ->orWhere('slug',$rq->slug)
                    ->orWhere('name','like', '%' . $rq->slug . '%')
                    ->orWhere('name',$rq->slug)
                    ->orWhere('name','like', '%' . $value . '%')
                    ->orWhere('name',$value);
            // foreach(explode("-",$rq->slug) as $char){
            //     $db = $db->orWhere('name','like', '%' . $char . '%');
            // }
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
