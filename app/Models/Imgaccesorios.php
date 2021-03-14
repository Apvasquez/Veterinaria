<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgaccesorios extends Model
{
    use HasFactory;
    protected $table = 'img_accesorios';
    
    // Declaro los campos que usaré de la tabla 'img_bicicletas' 
    protected $fillable = ['nombre', 'formato', 'accesorios_id'];
 
    // Relación Inversa (Opcional)
    public function accesorio()
    {
    	return $this->belongsTo('App\Models\Accesorios');
    }
}
