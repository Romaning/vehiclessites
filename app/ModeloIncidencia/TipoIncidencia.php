<?php

namespace App\ModeloIncidencia;

use Illuminate\Database\Eloquent\Model;

class TipoIncidencia extends Model
{
    protected $primaryKey = "tipo_incidencia_id";
    protected $fillable = [
        'tipo_incidencia_descripcion',
    ];
}
