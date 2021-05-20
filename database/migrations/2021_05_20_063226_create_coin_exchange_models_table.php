<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinExchangeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_exchange_models', function (Blueprint $table) {
            $table->id();
           
            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 13,2)->default(0);
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->decimal('service_fee', 13,2)->default(0);
            $table->string('btc_exchange_rate')->nullable();
            $table->string('eth_exchange_rate')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('status')->default('pending');

            $table->softDeletes();  //add this line
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
        Schema::dropIfExists('coin_exchange_models');
    }
}
