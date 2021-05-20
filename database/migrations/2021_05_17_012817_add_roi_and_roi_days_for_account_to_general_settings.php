<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoiAndRoiDaysForAccountToGeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('general_settings', 'savings_roi')){
            Schema::table('general_settings', function (Blueprint $table) {
                //
                $table->string('savings_acct_roi')->after('savings_acct_max')->nullable();
                $table->string('savings_acct_roi_days')->after('savings_acct_roi')->nullable();
                $table->string('current_acct_roi')->after('current_acct_max')->nullable();
                $table->string('curren_acctt_roi_days')->after('current_acct_roi')->nullable();
                $table->string('fixed_acct_roi')->after('fixed_acct_max')->nullable();
                $table->string('fixed_acct_roi_days')->after('fixed_acct_roi')->nullable();
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
        Schema::table('general_settings', function (Blueprint $table) {
            //
        });
    }
}
