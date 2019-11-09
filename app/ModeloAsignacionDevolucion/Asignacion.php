<?php

namespace App\ModeloAsignacionDevolucion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignacion extends Model
{
    protected $primaryKey = 'asignacion_id';
    protected $fillable = [
        'coord_asig',
        'coord_devo',
        'identificador_memorandum',
        'archivo_memorandum',
        'fecha_asignacion',
        'ci',
        'placa_id',
        'tipo_conductor_chofer',
    ];
    use SoftDeletes;
}




















