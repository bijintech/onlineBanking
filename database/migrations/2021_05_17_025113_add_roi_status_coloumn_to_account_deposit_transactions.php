<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoiStatusColoumnToAccountDepositTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('account_deposit_transactions', 'roi_status')){
            Schema::table('account_deposit_transactions', function (Blueprint $table) {
                //
                $table->string('roi_status')->after('payment_proof')->default('no');
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
        Schema::table('account_deposit_transactions', function (Blueprint $table) {
            //
        });
    }
}
