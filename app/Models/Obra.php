<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $table = 'obra'; // Nombre de la tabla

    protected $fillable = [
        'foto',
        'nombre',
        'artista',
        'descripcion',
        'fecha_creacion'
    ];

}