<?php

namespace App\ModeloValesDeCombustible;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValesDeCombustible extends Model
{
    protected $fillable = [
        'fecha_entrega',
        'placa_id',
    ];
    use SoftDeletes;
}
