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
        Schema::create('expense', function (Blueprint $table) {
            $table->id('expensetx_id');
            $table->unsignedBigInteger('expense_user_id');
            $table->foreign('expense_user_id')->references('user_id')->on('user');
            $table->unsignedBigInteger('expense_currency_id');
            $table->foreign('expense_currency_id')->references('currency_id')->on('currency');
            $table->unsignedBigInteger('expense_category_id');
            $table->foreign('expense_category_id')->references('category_id')->on('category');
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
        Schema::dropIfExists('expense');
    }
};
