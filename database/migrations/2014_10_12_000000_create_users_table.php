<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('number');
            $table->string('role')->default('patient');
            $table->string('picture')->default('default.png');
            $table->integer('balance')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('price')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
          
            $table->string('rank')->nullable();
            $table->string('speciality')->nullable();
            $table->integer('experience')->nullable();
            $table->string('languages')->nullable();
            $table->string('weekdays')->nullable();
            $table->string('saturdays')->nullable();
            $table->string('sundays')->nullable();
            $table->string('certificate')->nullable();
            $table->string('folio')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
