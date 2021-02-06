<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_carts', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('user_seq');
            $table->unsignedBigInteger('pro_seq');       
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
        Schema::dropIfExists('product_carts');
    }
}
