<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //campos de la tabla personas
    protected $fillable = [
        'p_nombre', 'p_apellido', 'p_tipo_persona', 'p_sexo', 'p_direccion',
        'p_fecha_nacimeinto', 'created_at'
    ];
}
