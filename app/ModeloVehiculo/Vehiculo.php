<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
    protected $primaryKey = 'placa_id';
    protected $keyType = 'string';
    protected $fillable = [
        'numero_crpva',
        'numero_chasis',
        'numero_motor',
        'documento_importacion',
        'numero_documento_importacion',
        'plazas',
        'ruedas',
        'traccion',
        'color',
        'clase_id',
        'marca_id',
        'tipo_id',
        'tipo_combustible_id',
        'tipo_uso_id',
        'fecha_incorporacion_institucion',
    ];
    use SoftDeletes;
}
