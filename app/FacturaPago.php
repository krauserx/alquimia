<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacturaPago extends Model
{
            //necesario para la columna de eliminado logico
            use SoftDeletes;
            protected $dates = ['deleted_at'];
            //campos de la tabla empresa
            protected $fillable = [
                'factura_id',
                'metodo_pago_id',
                'fp_monto',
                'fp_vuelto'
            ];
}
