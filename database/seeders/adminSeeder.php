<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('admins')->insert([
        'username'=>'berlian',
        'nama_lengkp'=>'claudia',
        'nim'=>'221511008',
        'email'=>'claudia@gmail.com',
        'password'=>'123456',
    ]);
    }
}
