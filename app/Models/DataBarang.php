<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = 'data_barang'; // Nama tabel di basis data
    protected $primaryKey = 'kode_alat'; // Nama kolom yang merupakan primary key

    protected $fillable = [
        'kode_alat',
        'nama_alat',
        'jenis_alat',
    ];

    public $timestamps = false; // Atur timestamp created_at dan updated_at menjadi false jika tabel Anda tidak memiliki kolom timestamp.
}
