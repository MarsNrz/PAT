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
            $table->foreignId('id_akun')->constrained('data_akuns');
            $table->foreignId('id_alat')->constrained('data_alats');
            $table->timestamp('waktu_peminjaman')->useCurrent();
            $table->timestamp('waktu_pengembalian')->nullable();
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
