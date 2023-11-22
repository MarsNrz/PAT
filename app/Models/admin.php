<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'id_admin',
        'username',
        'nama_lengkp',
        'nim',
        'email',
        'password',
    ];
    use HasFactory;
}
