<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Backpage extends Model
{
    use HasFactory;
    protected $table = "bengkels";
    protected $fillable = ['id', 'id_perusahaan', 'foto', 'kategori', 'nama_bengkel', 'deskripsi' , 'lokasi',	'jam_buka',	'jam_tutup','created_at', 'updated_at'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class,'id_perusahaan', 'id_perusahaan');
    }

    public function review()
    {
        return $this->hasMany(Review::class,'id', 'id_bengkel');
    }

    public function mapsBackpage()
    {
        return $this->hasOne(MapsBackpage::class, 'id_bengkel', 'id');
    }
}
