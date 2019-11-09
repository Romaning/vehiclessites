<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagenesPerfilVehiculo extends Model
{
    protected $fillable = [
        'archivo_subido',
        'nombre_imagen_perfil',
        'placa_id',
    ];
    use SoftDeletes;
}
