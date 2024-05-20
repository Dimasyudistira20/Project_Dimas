<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    public $fillable = ['nama','id_mahasiswa'];


    public function mahasiswa()
    {
        // model dosen bisa memiliki banyak data (relasi one to many)
        // dari model mahasiswa melalui fk id_dosen
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
