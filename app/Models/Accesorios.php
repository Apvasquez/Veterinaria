<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorios extends Model
{
    use HasFactory;
    protected $table = 'accesorios';
    
    // Declaro los campos que usaré de la tabla 'bicicletas' 
    protected $fillable = ['nombre', 'precio', 'stock', 'imagenes', 'url'];
 
    // Relación One to Many (Uno a muchos), un registro puede tener muchas imágenes 
    public function imagenesaccesorios()
    {
        return $this->hasMany('App\Models\Imgaccesorios');
}
}
