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
        Schema::create('trans_category', function (Blueprint $table) {
            $table->unsignedBigInteger('cat_transaction_id');
            $table->foreign('cat_transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->unsignedBigInteger('trans_category_id');
            $table->foreign('trans_category_id')->references('category_id')->on('category');
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
        Schema::dropIfExists('trans_category');
    }
};
