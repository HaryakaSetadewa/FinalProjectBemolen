<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapsBackpage extends Model
{
    protected $table = 'maps';
    protected $fillable = ['id_bengkel', 'koordinatX', 'koordinatY'];

    public function backpage()
    {
        return $this->belongsTo(Backpage::class, 'id_bengkel' ,'id');
    }
}
