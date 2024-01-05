<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_bengkel',
        'nama_user',
        'review',
        
    ];

    public function backpage()
{
    return $this->belongsTo(Backpage::class, 'id_bengkel', 'id');
}

}
