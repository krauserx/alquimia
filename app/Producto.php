<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
     //necesario para la columna de eliminado logico
     use SoftDeletes;
     protected $dates = ['deleted_at'];
     //campos de la tabla empresa
     protected $fillable = [
         'p_codigo', 'p_codigo_barra', 'p_nombre', 'categoria_id', 'p_precio_costo',
         'p_precio_venta', 'p_catidad', 'p_tipo', 'p_descripcion', 'p_url_img'
     ];
}
