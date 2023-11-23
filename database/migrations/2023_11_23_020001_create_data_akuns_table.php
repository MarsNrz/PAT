<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_akuns', function (Blueprint $table) {
                $table->id('id_akun')->unique();
                $table->string('username');
                $table->string('nama_lengkap');
                $table->integer('nim');
                $table->string('email');
                $table->bigInteger('password');
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
        Schema::dropIfExists('data_akuns');
    }
};
