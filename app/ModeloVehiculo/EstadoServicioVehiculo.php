<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoServicioVehiculo extends Model
{
    protected $primaryKey = 'est_serv_vehiculo_id';
    protected $fillable = [
      'fecha_inicio',
      'motivo',
      'est_id',
      'placa_id',
    ];
    use SoftDeletes;
}
