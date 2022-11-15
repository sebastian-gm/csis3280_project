<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->id('incometx_id');
            $table->unsignedBigInteger('income_user_id');
            $table->foreign('income_user_id')->references('user_id')->on('user');
            $table->unsignedBigInteger('income_currency_id');    
            $table->foreign('income_currency_id')->references('currency_id')->on('currency');
            $table->date('transaction_date');
            $table->float('amount');
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
        Schema::dropIfExists('income');
    }
};
