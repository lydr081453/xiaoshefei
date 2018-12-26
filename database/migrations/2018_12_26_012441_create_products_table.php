<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('categoryid');
            $table->string('code');
            $table->string('name');
            $table->string('title');
            $table->decimal('amount',8,2);
            $table->decimal('original',8,2);
            $table->string('unit');
            $table->integer('stock');
            $table->integer('brandid');
            $table->boolean('issell');
            $table->boolean('isTop');
            $table->string('picurl');
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
        Schema::dropIfExists('products');
    }
}
