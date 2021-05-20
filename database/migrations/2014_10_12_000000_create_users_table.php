<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('first_name');
            $table->longText('last_name');
            $table->longText('avatar')->default('avatar.png');
            $table->longText('email')->unique();
            $table->longText('gender');
            $table->longText('dateofbirth');
            $table->longText('address');
            $table->longText('phone_number');
            $table->longText('country');
            $table->longText('state');
            $table->longText('username');
            $table->longText('password');
            $table->longText('email_verification_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
