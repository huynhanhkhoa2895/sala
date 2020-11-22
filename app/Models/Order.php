<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Request;
class Order extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = 'order';
    public function openGoogle($crud = false){
        return '<a class="btn btn-sm btn-link" target="_blank" href="'.url("admin/order/detail/$this->id").'" ><i class="la la-search"></i> Chi tiết</a>';
    }
}
