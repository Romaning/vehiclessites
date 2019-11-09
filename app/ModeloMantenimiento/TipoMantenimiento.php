<?php

namespace App\ModeloMantenimiento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMantenimiento extends Model
{
    protected $primaryKey = 'tipo_mantenimiento_id';
    protected $fillable = [
        'tipo_mantenimiento_descripcion'
    ];
    use SoftDeletes;
}
