<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
        //
            //necesario para la columna de eliminado logico
            use SoftDeletes;
            protected $dates = ['deleted_at'];
            //campos de la tabla empresa
            protected $fillable = [
                'usario_id',
                'persona_id',
                'c_altura',
                'c_peso',
                'c_procentaje_grasa',
                'c_grasa_viceral',
                'c_cintura',
                'c_pecho',
                'c_cadera',
                'c_brazo',
                'c_imc',
                'c_tipo',
                'c_nota'
            ];
}
