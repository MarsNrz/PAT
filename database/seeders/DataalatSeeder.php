<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Dataalat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_barang')->insert([
            'namaalat' =>'kabel',
            'jenisalat'=>'listrik',
            'kodealat'=>'alat',
        ]);
    }
}
