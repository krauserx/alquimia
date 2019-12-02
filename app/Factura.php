<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    //
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //campos de la tabla empresa
    protected $fillable = [
        'f_numero', 'usario_id', 'persona_id', 'textofactura_id', 'condicion_id', 'fd_dias_credito',
        'f_estado', 'f_tipo_factura', 'f_pedido_aprobado', 'f_estado_entrega', 'f_fecha_a_entregar',
        'f_fecha_entregado'
    ];
    public function detallesfactura_facturas()
    {
        return $this->hasMany('App\FacturaDetalle');
    }


}
