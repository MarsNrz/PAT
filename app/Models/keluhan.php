<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluhan extends Model
{
    protected $table = 'keluhans';
    protected $primaryKey = 'id_keluhan';

    protected $fillable = [
        'id_keluhan',
        'deskripsi_keluhan',
        'id_akun',
    ];
    use HasFactory;
    public $timestamps = true;
}
