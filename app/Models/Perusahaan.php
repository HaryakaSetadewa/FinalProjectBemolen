<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';
    protected $primaryKey = 'id_perusahaan';
    protected $fillable = [
        'nama_perusahaan','nama_kontak','email_perusahaan', 'no_telp'
    ];

    public function backpage()
    {
        return $this->hasMany(Backpage::class,'id_perusahaan', 'id_perusahaan');
    }
}
