<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_seq');
            $table->unsignedBigInteger('pro_seq');
            $table->string('url');
            $table->string('hashname');
            $table->string('originalname');        
            $table->timestamps();

            $table->foreign('user_seq')->references('id')->on('users');
            $table->foreign('pro_seq')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
