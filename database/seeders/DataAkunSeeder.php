<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('data_akuns')->insert([
        'username'=>'berlian',
        'nama_lengkap'=>'claudia',
        'prodi'=>'D3',
        'nim'=>'221511008',
        'email'=>'claudia@gmail.com',
        'password'=>'123456',
    
    ]);
    }
}
