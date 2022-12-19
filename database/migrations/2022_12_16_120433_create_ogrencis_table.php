<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOgrencisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ogrencis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('avatar')->nullable();
            $table->integer('brans_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('cepno')->nullable();
            $table->integer('veli_id')->nullable();
            $table->string('adres')->nullable();
            $table->string('eposta')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->date('dtarihi')->nullable()->comment('dogum_tarihi');
            $table->string('dyeri')->nullable()->comment('dogum_yeri');
            $table->string('kangrubu')->nullable();
            $table->string('acilkisi')->nullable();
            $table->string('acilkisitel')->nullable();
            $table->string('sonOkulderece')->nullable();
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
        Schema::dropIfExists('ogrencis');
    }
}
