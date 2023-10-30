<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostAgencyLiveHosterWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_agency_live_hoster_wallets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('transaction_date');
            $table->integer('total_coin');
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
        Schema::dropIfExists('host_agency_live_hoster_wallets');
    }
}
