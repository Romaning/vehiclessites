<?php

namespace App\ModeloIncidencia;

use Illuminate\Database\Eloquent\Model;

class ReclamoDenuncia extends Model
{
    protected $primaryKey = 'reclamo_denuncia_id';
    protected $fillable = [
        'ante_quien',
        'tipo_r_d_descripcion',
        'num_resolucion_inicio_proceso',
        'fecha_r_d_inicio',
        'archivo_inicio_proceso',
        'num_resolucion_fin_proceso',
        'fecha_r_d_fin',
        'archivo_fin_proceso',
    ];
}
