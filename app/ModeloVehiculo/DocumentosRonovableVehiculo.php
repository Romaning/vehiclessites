<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentosRonovableVehiculo extends Model
{
    protected $primaryKey = 'archivero_id';
    protected $fillable = [
        'gestion',
        'fecha_fin_cobertura_soat',
        'bsisa',
        'inspeccion_vehicular',
        'placa_id',
    ];
    use SoftDeletes;
}
