<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingInvitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_invitation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("color")->nullable();
            $table->unsignedBigInteger("style")->nullable();
            $table->unsignedBigInteger("kind");
            $table->string("code");
            $table->string("image");
            $table->foreign('color')->references('id')->on('color');
            $table->foreign('style')->references('id')->on('style');
            $table->foreign('kind')->references('id')->on('kind');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wedding_invitation');
    }
}
