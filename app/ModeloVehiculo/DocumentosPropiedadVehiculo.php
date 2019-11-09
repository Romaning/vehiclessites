<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentosPropiedadVehiculo extends Model
{
    protected $fillable = [
        'archivo_subido',
        'nombre_documento_propiedad',
        'placa_id',
    ];
    use SoftDeletes;
}
