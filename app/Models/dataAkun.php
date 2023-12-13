<?php
// app/Models/DataAkun.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkun extends Model
{
    use HasFactory;

    protected $table = 'data_akuns'; // Nama tabel di database
    protected $primaryKey = 'id_akun'; // Nama kolom kunci utama

    protected $fillable = [
        'Fotoktm',
        'nama_lengkap',
        'nim',
        'email',
        'password',
        'Fotoprofil',
    ]; // Kolom-kolom yang dapat diisi

    public $timestamps = true; // Aktifkan timestamps (created_at dan updated_at)
}


    



