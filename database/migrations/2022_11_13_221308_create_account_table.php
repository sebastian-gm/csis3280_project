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
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->unsignedBigInteger('account_user_id');
            $table->foreign('account_user_id')->references('user_id')->on('app_user');
            $table->string('account_type');
            $table->string('bank');
            $table->float('have_amount');
            $table->float('owe_amount');
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
        Schema::dropIfExists('account');
    }
};
