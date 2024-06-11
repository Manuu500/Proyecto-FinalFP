<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entrada'; // Nombre de la tabla


    protected $fillable = [
        'num_entrada', 'user_id', 'tipo_id', 'fecha_hora_visita', 'precio',
        'fecha_hora_fin', 'fecha_compra', 'metodo_pago', 'observaciones'
    ];

    public function tipoEntrada()
    {
        return $this->belongsTo(TipoEntrada::class, 'tipo_id');
    }
}
