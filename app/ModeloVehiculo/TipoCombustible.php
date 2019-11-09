<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCombustible extends Model
{
    protected $primaryKey = 'tipo_combustible_id';
    protected $fillable = [
        'tipo_combustible_descripcion',
    ];
    use SoftDeletes;
}
