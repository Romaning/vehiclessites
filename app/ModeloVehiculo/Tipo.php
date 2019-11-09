<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    protected $primaryKey = 'tipo_id';
    protected $fillable = [
        'tipo_descripcion',
    ];
    use SoftDeletes;
}
