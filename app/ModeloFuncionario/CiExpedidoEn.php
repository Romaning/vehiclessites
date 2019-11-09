<?php

namespace App\ModeloFuncionario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CiExpedidoEn extends Model
{
    protected $primaryKey='ci_exped_en_id';
    protected $fillable=[
        'ci_exped_en_descripcion',
    ];
    use SoftDeletes;
}
