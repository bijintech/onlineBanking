<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_transactions', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('investment_id')->nullable();
            $table->decimal('amount', 13,2)->default(0);
            $table->decimal('final_amount', 13,2)->default(0);
            $table->string('investment_roi')->nullable();
            $table->string('investment_duration')->nullable();
            $table->string('account_type')->nullable();
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
        Schema::dropIfExists('investment_transactions');
    }
}
