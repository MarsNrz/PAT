<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataalatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_alats')->insert([
            'id_alat' =>'1',
            'nama_alat'=>'Terminal Roll',
            'jenis_alat'=>'Terminal Listrik',
        ]);
    }
}
