<?php

namespace App\ModeloFuncionario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoFunc extends Model
{
    protected $primaryKey='estado_func_id';
    protected $fillable=[
        'estado_func_descripcion',
    ];
    use SoftDeletes;
}
