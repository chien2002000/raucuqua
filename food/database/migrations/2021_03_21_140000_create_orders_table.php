<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullName' ,255);
            $table->string('phone',255);
            $table->string('email' ,255);
            $table->string('address' ,255);
            $table->string('note' ,255);
            $table->unsignedBigInteger('status_order');
            $table->foreign('status_order')->references('id')->on('status_orders')->onDelete('cascade');
            $table->unsignedBigInteger('pay_id');
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->decimal('total' ,15,4);
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
        Schema::dropIfExists('orders');
    }
}
