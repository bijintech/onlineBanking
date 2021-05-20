<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinValueToCurrencyLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('currency_lists', 'coin_value')){
            Schema::table('currency_lists', function (Blueprint $table) {
                //
                $table->string('coin_value')->after('name')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currency_lists', function (Blueprint $table) {
            //
        });
    }
}
