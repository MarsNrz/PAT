<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAlat extends Model
{
    protected $table = 'data_alats';
    protected $primaryKey = 'id_alat';

    protected $fillable = [
        'id_alat',
        'nama_alat',
        'jenis_alat',
    ];
    use HasFactory;
    public $timestamps = true;
}
