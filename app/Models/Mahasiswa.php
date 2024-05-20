<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public $fillable = ['nama','nim','id_dosen'];

    public function wali() 
	{
		return $this->hasOne(Wali::class, 'id_mahasiswa');
	}

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }
    // relasi many to many
    public function hobi(){
    return $this->belongsToMany(Hobi::class,
        'mahasiswa_hobi',
        'id_mahasiswa',
        'id_hobi'
        );
    }
  
}
