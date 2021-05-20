<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTopUpTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_top_up_transactions', function (Blueprint $table) {
            $table->id();
            
            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 13,2)->default(0);
            $table->string('coin_equivalent')->nullable();
            $table->string('coin_type')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('proof_image')->nullable();
            $table->string('proof_status')->default('pending');
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
        Schema::dropIfExists('wallet_top_up_transactions');
    }
}
