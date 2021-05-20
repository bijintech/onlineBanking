<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountRoiColoumnToAccountTypeModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('account_type_models', 'savings_roi')){
            Schema::table('account_type_models', function (Blueprint $table) {
                //
                $table->decimal('savings_roi_balance', 13,2)->after('savings_balance')->default(0);
                $table->decimal('current_roi_balance', 13,2)->after('current_balance')->default(0);
                $table->decimal('fixed_roi_balance', 13,2)->after('fixed_balance')->default(0);
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
        Schema::table('account_type_models', function (Blueprint $table) {
            //
        });
    }
}
