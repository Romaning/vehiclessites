<?php

namespace App\ModeloDepartamento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    protected $primaryKey ="departamento_id";
    protected $fillable =[
        "departamento_nombre",
        "depende_id",
        "jefe_id",
    ];
    use SoftDeletes;
}
