<?php

namespace App\ModeloInfraccion;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infraccion extends Model
{

    protected $primaryKey = 'infraccion_id';
    protected $fillable = [
        'placa_id',/*select*/
        'gestion',/*numeros INT*/
        'fecha_infraccion',/*date*/
        'serie',/*string*/
        'boleta',/*string*/
        'condigo',/*string*/
        'descripcion',/*string*/
        'monto',/*double 123.12*/
    ];
    use SoftDeletes;
}
