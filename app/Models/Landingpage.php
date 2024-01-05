<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landingpage extends Model
{
    use HasFactory;
    public $primaryKey = 'id_landingpage';
    protected $fillable = [
        'nama_bengkel','jenis','lokasi','foto','id_perusahaan','jambuka'
    ];

    static function getLandingpage(){
        $return=DB::table('landingpages')
        ->join('perusahaans','landingpages.id_perusahaan','=','perusahaans.id_perusahaan');
        return $return;
    }
    
}
