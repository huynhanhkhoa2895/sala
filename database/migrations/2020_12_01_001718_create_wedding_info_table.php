<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order");
            $table->unsignedBigInteger("product");
            $table->string("girl");
            $table->string("dad_girl");
            $table->string("mom_girl");
            $table->string("address_girl");
            $table->string("vocative_girl");
            $table->string("boy");
            $table->string("dad_boy");
            $table->string("mom_boy");
            $table->string("address_boy");
            $table->string("vocative_boy");
            $table->string("organize_date");
            $table->string("organize_mdate");
            $table->string("place_date");
            $table->string("place_mdate");
            $table->enum("place",["Nhà Hàng","Tư Gia"])->default("Nhà Hàng");
            $table->string("place_address");
            $table->foreign('order')->references('id')->on('order')->onDelete("cascade");
            $table->foreign('product')->references('id')->on('wedding_invitation')->onDelete("cascade");
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wedding_info');
    }
}
