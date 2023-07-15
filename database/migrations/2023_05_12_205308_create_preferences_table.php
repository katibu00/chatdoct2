<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->id();
            $table->integer('commission');
            $table->integer('welcome_bonus');
            $table->boolean('sms_doctor_booked')->default(false);
            $table->boolean('sms_patient_appointed')->default(false);
            $table->boolean('sms_patient_completed')->default(false);
            $table->boolean('sms_doctor_credited')->default(false);
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
        Schema::dropIfExists('preferences');
    }
}
