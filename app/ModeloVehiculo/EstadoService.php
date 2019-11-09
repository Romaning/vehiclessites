<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoService extends Model
{
    protected $primaryKey = 'est_id';
    protected $fillable=[
        'est_descripcion',
    ];
    use SoftDeletes;
}
