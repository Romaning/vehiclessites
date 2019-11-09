<?php

namespace App\ModeloIncidencia;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $primaryKey = "incidencia_id";
    protected $fillable = [
        'placa_id',
        'ci',
        'tipo_incidencia_descripcion',
        'fecha_incidencia',
        'vehiculo_en_movimiento',
        'lugar_incidencia',
        'descripcion'
    ];
}
