<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clase extends Model
{
    protected $primaryKey = 'clase_id';
    protected $fillable = [
        'clase_descripcion',
    ];
    use SoftDeletes;
}
