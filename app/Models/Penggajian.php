<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['tanggal_bayar'];
    
   

}

//public function peggawai()
    // {
    //     return $this->hasMany(Pegawai::class, 'id', 'id_pegawai');
    // }
