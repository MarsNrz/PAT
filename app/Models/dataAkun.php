<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAkun extends Model
{
    use HasFactory;

    protected $table = 'data_akuns'; // Nama tabel di database
    protected $primaryKey = 'id_akun'; // Nama kolom kunci utama

    protected $fillable = [
        'id_akun',
        'username',
        'nama_lengkap',
        'nim',
        'email',
        'password',
        'fotoprofil',
        'fotoktm'
    ]; // Kolom-kolom yang dapat diisi

    public $timestamps = true; // Aktifkan timestamps (created_at dan updated_at)

    // Jika Anda memiliki relasi dengan model lain, Anda dapat mendefinisikannya di sini
}
