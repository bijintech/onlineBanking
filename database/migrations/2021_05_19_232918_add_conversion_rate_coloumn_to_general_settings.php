<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConversionRateColoumnToGeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('general_settings', 'btc_exchage_rate')){
            Schema::table('general_settings', function (Blueprint $table) {
                //
                $table->string('btc_exchage_rate')->after('fixed_acct_roi_days')->default(200); 
                $table->string('eth_exchage_rate')->after('btc_exchage_rate')->default(150);
                $table->string('exchange_charge_fee')->after('eth_exchage_rate')->default(2);
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
