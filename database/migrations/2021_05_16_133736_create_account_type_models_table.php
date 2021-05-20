<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTypeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type_models', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->uniqid();
            $table->unsignedBigInteger('user_id');
            $table->string('savings_acct')->nullable();
            $table->decimal('savings_balance', 13,2)->default(0);
            $table->string('current_acct')->nullable();
            $table->decimal('current_balance', 13,2)->default(0);
            $table->string('fixed_acct')->nullable();
            $table->decimal('fixed_balance', 13,2)->default(0);

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
        Schema::dropIfExists('account_type_models');
    }
}
