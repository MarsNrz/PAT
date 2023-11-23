<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAkun extends Model
{
    protected $table = 'data_akuns';
    protected $primaryKey = 'id_akun';

    protected $fillable = ['id_akun', 'username','nama_lengkap','nim','email','password'];
    use HasFactory;
    public $timestamps = true;
}
