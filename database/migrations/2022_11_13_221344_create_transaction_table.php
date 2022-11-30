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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('transaction_account_id');    
            $table->foreign('transaction_account_id')->references('account_id')->on('account');
            $table->date('transaction_date');
            $table->float('transaction_amount');
            $table->string('merchant');
            $table->string('transaction_type');
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
        Schema::dropIfExists('transaction');
    }
};
