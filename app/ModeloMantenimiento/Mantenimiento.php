<?php

namespace App\ModeloMantenimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mantenimiento extends Model
{
    protected $primaryKey = 'mantenimiento_id';
    protected $fillable = [
        'mant_id_ini_asign',
        'fecha_inicio_mant',
        'placa_id_mant',
        'detalle_mant',
        'tipo_mant',
        'empresa_encargada_mant',
        'mant_id_fin_asign',
        'fecha_fin_mant',
    ];
    use SoftDeletes;
}
