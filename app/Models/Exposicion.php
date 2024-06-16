<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exposicion extends Model
{
    use HasFactory;
    protected $table = 'exposicion'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'descripcion',
        'aforo',
        'fecha_inicio'
    ];

    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'exposicion_obra', 'id_expo', 'id_obra');
    }

}
