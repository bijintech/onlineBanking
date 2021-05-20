<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountTypePercentToGeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('general_settings', 'savings_acct_min')){
            Schema::table('general_settings', function (Blueprint $table) {
                //
                $table->decimal('savings_acct_min', 13,2)->after('about_site')->default(0);
                $table->decimal('savings_acct_max', 13,2)->after('savings_acct_min')->default(0);
                $table->decimal('current_acct_min', 13,2)->after('savings_acct_max')->default(0);
                $table->decimal('current_acct_max', 13,2)->after('current_acct_min')->default(0);
                $table->decimal('fixed_acct_min', 13,2)->after('current_acct_max')->default(0);
                $table->decimal('fixed_acct_max', 13,2)->after('fixed_acct_min')->default(0);
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
