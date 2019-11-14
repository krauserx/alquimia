<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDatoContacto extends Model
{
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected  $table = "tipo_dato_contacto";
    //campos de la tabla empresa
    protected $fillable = [
        'tdc_texto', 'tdc_descripcion', 'tdc_requerido'
    ];
}
