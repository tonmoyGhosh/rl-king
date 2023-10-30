<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostAgencyLiveHostersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_agency_live_hosters', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('hoster_name')->nullable();
            $table->string('hoster_id')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('approval_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
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
        Schema::dropIfExists('host_agency_live_hosters');
    }
}
