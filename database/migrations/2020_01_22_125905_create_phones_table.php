<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('brand')->nullable()->default(null);
            $table->string('model')->nullable()->default(null);
            $table->string('serial_number')->nullable()->default(null);
            $table->string('phone_number_1')->nullable()->default(null);
            $table->string('phone_number_2')->nullable()->default(null);
            $table->string('fast_dial')->nullable()->default(null);
            $table->string('imei_1')->nullable()->default(null);
            $table->string('imei_2')->nullable()->default(null);
            $table->tinyInteger('status')->nullable()->default(1); // 1 => ativo; 2 => defeito; 3 => roubado;
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
        Schema::dropIfExists('phones');
    }
}
