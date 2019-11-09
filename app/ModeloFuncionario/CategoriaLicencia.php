<?php

namespace App\ModeloFuncionario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaLicencia extends Model
{
    protected $primaryKey='categoria_licencia_id';
    protected $fillable=[
        'categoria_licencia_descripcion',
    ];
    use SoftDeletes;
}
