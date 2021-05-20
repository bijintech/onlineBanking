<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateInvestmentsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_investments_models', function (Blueprint $table) {
            $table->id();

            $table->string('unique_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('location')->nullable();
            $table->string('invest_image')->nullable();
            $table->string('investment_roi')->nullable();
            $table->string('investment_duration')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('estate_investments_models');
    }
}
