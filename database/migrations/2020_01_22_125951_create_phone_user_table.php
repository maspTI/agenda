<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_user', function (Blueprint $table) {
            $table->unsignedSmallInteger('user_id');
            $table->unsignedBigInteger('phone_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references("cod_usuario")
                ->on(DB::connection(env('DB_CONNECTION2'))->getDatabaseName() . ".usuarios");

            $table->foreign('phone_id')
                ->references('id')
                ->on(DB::connection(env('DB_CONNECTION'))->getDatabaseName() . '.phones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_user');
    }
}
