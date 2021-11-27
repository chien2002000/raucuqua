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
            $table->id();
            $table->string('product_title' , 255);
            $table->string('product_thumb' , 255);
            $table->string('code' , 255);
            $table->string('price' , 255);
            $table->string('price_new' , 255)->nullable();
            $table->text('excerpts');
            $table->text('content');
            $table->unsignedBigInteger('categary_id');
            $table->foreign('categary_id')->references('id')->on('categary_products')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->unsignedBigInteger('status_product_id')->nullable();
            $table->foreign('status_product_id')->references('id')->on('status_products')->onDelete('cascade');
            $table->unsignedBigInteger('status2_product_id');
            $table->foreign('status2_product_id')->references('id')->on('status2_products')->onDelete('cascade');
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
