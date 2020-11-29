<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["namespace"=>"App\Http\Controllers\Fontend","middleware"=>["ssl"]],function(){
    Route::get('/',"Home@index");
    Route::get('/compare/ajax',"Product@compareAjax");
    Route::get('/policy',"Home@policy");
    Route::group(["prefix"=>"thiep"],function(){
        Route::get('{slug}',"Product@detail");
        Route::get('so-sanh/{slug}',"Product@compare");
    });
    Route::group(["prefix"=>"search"],function(){
        Route::get('/',"Search@index");
    });
    Route::group(["prefix"=>"cart"],function(){
        Route::post('/add',"Cart@Add");
        Route::put('/update',"Cart@Update");
        Route::get('/clear',"Cart@Clear");
        Route::get('/checkout',"Cart@Checkout")->name("cart-checkout");
        Route::post('/checkout',"Cart@CheckoutPayment")->name("post-checkout");
        Route::get('/payment',"Cart@Payment")->name("cart-payment");
        Route::get('/remove/product/{id}',"Cart@RemoveProduct");
    });
    Route::group(["prefix"=>"loai-thiep"],function(){
        Route::get('{id}',"Category@index");
    });
});

