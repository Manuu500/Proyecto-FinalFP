<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposicion extends Model
{
    use HasFactory;
    protected $table = 'exposicion'; // Nombre de la tabla

    protected $fillable = [
        'organizador',
        'nombre',
        'descripcion',
        'aforo',
        'fecha_inicio'
    ];

}
