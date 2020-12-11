<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('cartRef');
            $table->string('paymentMode');
            // $table->string('readStatus')->default('Unread');
            $table->integer('customer_id');
            $table->string('amount');
            $table->string('confirmPayment');
            $table->string('transactionRef')->unique();//also the cart refrence name
            $table->string('status')->default('Order Recieved');//Order Sent, Order Processinf, On route, delivered
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
        Schema::dropIfExists('transactions');
    }
}
