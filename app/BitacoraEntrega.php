<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraEntrega extends Model
{
    //
    protected $fillable = [
        'usario_id',
        'factura_id',
        'detalle'
    ];

}
