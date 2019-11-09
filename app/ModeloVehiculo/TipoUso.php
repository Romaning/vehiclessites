<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoUso extends Model
{
    protected $primaryKey = 'tipo_uso_id';
    protected $fillable = [
        'tipos_uso_descripcion',
    ];
    use SoftDeletes;
}
