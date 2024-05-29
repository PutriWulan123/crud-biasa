<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    use HasFactory;

    //  protected $guarded = [];
    // protected $tabel = "devisis";
    protected $primarykey = "id";
    // protected $fillable = ['id', 'nama_devisi'];

    // //menndefinisikan relasi one-to-one
    // public function pegawai()
    // {
    //     return $this->belongsTo(Pegawai::class, 'id_devisi');
    //     // return $this->hasMany(Pegawai::class, 'devisi_id');
    // }
    protected $table = 'devisis';

    // Relasi one-to-many dengan model Pegawai
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'devisi_id');
    }
}
