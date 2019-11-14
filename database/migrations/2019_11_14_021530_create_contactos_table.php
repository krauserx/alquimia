<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_dato_id')->unsigned();//id de la tipo_dato_contacto
            $table->string('c_info')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            $table->foreign('tipo_dato_id')
            ->references('id')->on('tipo_dato_contacto')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
