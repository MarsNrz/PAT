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
        Schema::create('data_alats', function (Blueprint $table) {
            $table->timestamps();
            $table->id('id_alat', 11)->primary();
            $table->string('nama_alat', 50);
            $table->string('jenis_alat', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_alats');
    }
};
