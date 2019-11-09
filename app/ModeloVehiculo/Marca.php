<?php

namespace App\ModeloVehiculo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    protected $primaryKey='marca_id';
    protected $fillable=[
        'marca_descripcion',
    ];
    use SoftDeletes;
}
