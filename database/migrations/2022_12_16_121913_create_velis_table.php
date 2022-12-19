<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('velis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('avatar')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('cepno')->nullable();
            $table->string('acilkisi')->nullable();
            $table->string('acilkisitel')->nullable();
            $table->string('adres')->nullable();
            $table->string('eposta')->nullable();

            $table->integer('smsonay')->nullable()->comment('0:hayır,1:evet');
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
        Schema::dropIfExists('velis');
    }
}
