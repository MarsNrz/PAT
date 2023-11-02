<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataalat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_alat')->insert([
            'namaalat' =>'kabel',
            'jenisalat'=>'listrik',
            'kodealat'=>'alat',
        ]);
    }
}
