<?php

namespace App\ModeloAsignacionDevolucion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Devolucion extends Model
{
    protected $primaryKey = 'devolucion_id';
    protected $fillable = [
        'coord_devo',
        'coord_asig',
        'identificador_acta_devolucion',
        'archivo_acta_devolucion',
        'fecha_devolucion', /**/
        'ci',
        'placa_id',
        'tipo_conductor_chofer',
        'motivo_devolucion',
    ];
    use SoftDeletes;
}




















