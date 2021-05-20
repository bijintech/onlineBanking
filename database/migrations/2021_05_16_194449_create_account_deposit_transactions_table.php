<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDepositTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_deposit_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('currency_id')->nullable();
            $table->string('deposited_amount')->nullable();
            $table->string('coin_eq')->nullable();
            $table->string('account_type')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('status')->default('pending');
            $table->string('payment_proof')->nullable();

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
        Schema::dropIfExists('account_deposit_transactions');
    }
}
