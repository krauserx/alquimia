<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //campos de la tabla empresa
    protected $fillable = [
        'c_texto', 'c_descripcion', 'c_url_img'
    ];
}
