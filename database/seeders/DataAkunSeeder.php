<?php
// database/seeders/DataAkunSeeder.php
// database/seeders/DataAkunSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DataAkun;
use Database\Factories\DataAkunFactory;

class DataAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate 1000 data menggunakan factory
        DataAkun::factory(1000)->create();

        // Tambahkan satu data manual
        DB::table('data_akuns')->insert([
            'Fotoktm' => 'https://example.com/ktm-link', // Ganti dengan URL Google Drive KTM
            'nama_lengkap' => 'claudia',
            'nim' => '221511008',
            'email' => 'claudia@gmail.com',
            'password' => bcrypt('123456'), // Hash the password using bcrypt
            'Fotoprofil' => 'https://example.com/profil-link', // Ganti dengan URL Google Drive Profil
        ]);
    }
}
