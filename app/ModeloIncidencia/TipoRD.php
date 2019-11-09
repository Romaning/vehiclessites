<?php

namespace App\ModeloIncidencia;

use Illuminate\Database\Eloquent\Model;

class TipoRD extends Model
{
    protected $primaryKey = 'tipo_r_d_id';
    protected $fillable = [
        'tipo_r_d_descripcion'
    ];
}
