<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entrada'; // Nombre de la tabla


    protected $fillable = [
        'num_entrada', 'user_id', 'expo_id', 'tipo', 'fecha_hora_visita',
        'fecha_hora_fin', 'fecha_compra', 'metodo_pago', 'observaciones'
    ];
}
