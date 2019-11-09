<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguro extends Model
{
    protected $fillable = [
        'gestion',
        'texto',
        'empresa_aseguradora',
        'fecha_vigencia',
        'archivo_subido',
        'placa_id',
    ];
    use SoftDeletes;
}
