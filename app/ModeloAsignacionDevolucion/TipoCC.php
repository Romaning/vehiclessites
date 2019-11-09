<?php

namespace App\ModeloAsignacionDevolucion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCC extends Model
{
    protected $primaryKey = 'tipo_c_c_id';
    protected $fillable = [
        'tipo_c_c_descripcion',
    ];
    use SoftDeletes;
}
