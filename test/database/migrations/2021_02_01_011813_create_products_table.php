<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('pro_seq');
            $table->unsignedBigInteger('user_seq');
            $table->string('categories');
            $table->string('pro_title');
            $table->longText('pro_explan');
            $table->string('price');            
            $table->string('pro_state');
            $table->string('title_pic');
            $table->timestamps();

            $table->foreign('pro_seq')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
