<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDatoContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_dato_contacto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tdc_texto');
            $table->text('tdc_descripcion')->nullable();
            $table->integer('tdc_requerido')->default('1')->comment('1 requerido 2 no');
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
        Schema::dropIfExists('tipo_dato_contacto');
    }
}
