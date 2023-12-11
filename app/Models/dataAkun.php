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
        'nama_lengkap',
        'nim',
        'email',
        'password',
    ]; // Kolom-kolom yang dapat diisi

    public $timestamps = true; // Aktifkan timestamps (created_at dan updated_at)


}

    



