<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_empresa', function (Blueprint $table) {
            $table->integer('empresa_id')->unsigned();//id de la empresa
            $table->integer('contacto_id')->unsigned();//id del registro tabla contacto
            $table->timestamps();
            //llave forenea
            $table->foreign('empresa_id')
            ->references('id')->on('empresas')
            ->onDelete('cascade');
            $table->foreign('contacto_id')
            ->references('id')->on('contactos')
            ->onDelete('cascade');
            //llave primaria compuesta, id de la tabla empresa y id de la tabla contactos
            $table->primary(array('empresa_id', 'contacto_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto_empresa');
    }
}
