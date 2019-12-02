<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacturaDetalle extends Model
{
        //necesario para la columna de eliminado logico
        use SoftDeletes;
        protected $dates = ['deleted_at'];
        //campos de la tabla empresa
        protected $fillable = [
            'factura_id',
            'producto_id',
            'fd_cantidad',
            'fd_precio_costo',
            'fd_precio_venta',
            'fd_iva',
            'fd_descuento',
            'fd_nota'
        ];


}
