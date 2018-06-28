<?php

namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nim','nama','fakultas','jurusan','peminatan','angkatan'
    ];

    protected $guarded = ['id_mahasiswa'];
}