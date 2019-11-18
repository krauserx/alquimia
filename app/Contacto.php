<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    //necesario para la columna de eliminado logico
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //campos de la tabla empresa
    protected $fillable = [
        'tipo_dato_id', 'c_info'
    ];
    public function contacto_empresa()
    {
        return $this->belongsToMany('App\Empresa')->withTimestamps();
    }
    public function contacto_persona()
    {
        return $this->belongsToMany('App\Persona')->withTimestamps();
    }

}
