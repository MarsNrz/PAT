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
        Schema::create('data_pinjams', function (Blueprint $table) {
            $table->id('id_pinjam')->unique();
            $table->unsignedBigInteger('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('data_akuns');
            $table->unsignedBigInteger('id_alat');
            $table->foreign('id_alat')->references('id_alat')->on('data_alats');
            $table->time('waktu_peminjaman');
            $table->time('waktu_pengembalian');
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
        Schema::dropIfExists('data_pinjams');
    }
};
