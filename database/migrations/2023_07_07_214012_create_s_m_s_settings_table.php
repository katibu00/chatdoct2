<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMSSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_settings', function (Blueprint $table) {
            $table->id();
            $table->string('sms_api_url');
            $table->string('api_token');
            $table->string('sender_id');
            $table->integer('default_sms_type')->default(0);
            $table->string('default_routing');
            $table->integer('dlr_timeout');
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
        Schema::dropIfExists('s_m_s_settings');
    }
}
