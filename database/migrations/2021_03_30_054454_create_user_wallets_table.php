<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallets', function (Blueprint $table) {
            $table->id();
            $table->string('bitcoin')->nullable();
            $table->string('ethereum')->nullable();
            $table->string('litecoin')->nullable();
            $table->string('tron')->nullable();
            $table->string('dogecoin')->nullable();
            $table->string('usdt')->nullable();
            $table->string('binance_usd')->nullable();
            $table->string('bitcoin_cash')->nullable();
            $table->string('ripple')->nullable();
            $table->string('perfect_money')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_wallets');
    }
}
