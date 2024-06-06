<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntrada extends Model
{
    protected $table = 'tipo_entrada';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'activo',
    ];
}
