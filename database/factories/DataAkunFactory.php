<?php
// database/seeders/DataAkunSeeder.php

namespace Database\Seeders;

// database/factories/DataAkunFactory.php

namespace Database\Factories;

use App\Models\DataAkun;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DataAkunFactory extends Factory
{
    protected $model = DataAkun::class;

    public function definition()
    {
        return [
            'Fotoktm' => $this->faker->imageUrl(), // Ganti dengan URL Google Drive KTM
            'nama_lengkap' => $this->faker->name,
            'nim' => $this->faker->unique()->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt($this->faker->password),
            'Fotoprofil' => $this->faker->imageUrl(), // Ganti dengan URL Google Drive Profil
        ];
    }
}

