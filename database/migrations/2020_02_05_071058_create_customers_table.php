<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Appartment')->nullable();
            $table->string('country');
            $table->string('emailaddress')->nullable();
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('phone');
            $table->string('postcodezip')->nullable();
            $table->string('streetaddress');
            $table->string('towncity');

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
        Schema::dropIfExists('customers');
    }
}
