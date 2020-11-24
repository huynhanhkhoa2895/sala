<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    use CrudTrait;
    use HasFactory;
}
