<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPinjam extends Model
{
    use HasFactory;

    protected $table = 'data_pinjams';
    protected $primaryKey = 'id_pinjam';
    public $timestamps = false; 

    protected $fillable = [
        'id_pinjam',
        'id_akun',
        'id_alat',
        'waktu_peminjaman',
        'waktu_pengembalian',
    ];

    // Define the relationship with data_akuns table
    public function akun()
    {
        return $this->belongsTo(DataAkun::class, 'id_akun');
    }

    // Define the relationship with data_alats table
    public function alat()
    {
        return $this->belongsTo(DataAlat::class, 'id_alat');
    }
}