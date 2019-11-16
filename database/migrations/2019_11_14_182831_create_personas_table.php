<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('p_nombre');
            $table->string('p_apellido')->nullable();
            $table->integer('p_tipo_persona')->default('1')->comment('1 cliente 2 proveedor')->nullable();
            $table->integer('p_sexo')->default('3')->comment('1 hombre 2 mujer, 3 no indica')->nullable();
            $table->text('p_direccion')->nullable();
            $table->date('p_fecha_nacimeinto');
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
