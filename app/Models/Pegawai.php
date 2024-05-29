<?php

namespace App\Models;

use App\Models\Devisi;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $primary = 'id';
   protected $guarded = [];
//    protected $dates = ['created_at'];

   public function devisis(){
    return $this->belongsTo(Devisi::class, 'id_devisi','id');
   }
    
}