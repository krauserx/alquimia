<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //campos de la tabla empresa
    protected $fillable = [
        'nombre_empresa', 'direccion_empresa', 'logo_empresa'
    ];
    public function empresa_contacto()
    {
        return $this->belongsToMany('App\Contacto')->withTimestamps();
    }
}
