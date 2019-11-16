<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();//id de la empresa
            $table->integer('contacto_id')->unsigned();//id del registro tabla contacto
            $table->timestamps();
            //llave forenea
            $table->foreign('persona_id')
            ->references('id')->on('personas')
            ->onDelete('cascade');
            $table->foreign('contacto_id')
            ->references('id')->on('contactos')
            ->onDelete('cascade');
            //llave primaria compuesta, id de la tabla empresa y id de la tabla contactos
            $table->primary(array('persona_id', 'contacto_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto_persona');
    }
}
