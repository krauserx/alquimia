<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_entregas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('usario_id')->unsigned();
            $table->integer('factura_id')->unsigned();//id de la factura
            $table->string('detalle');
            $table->timestamps();
             //llave forenea
             $table->foreign('usario_id')
             ->references('id')->on('users')
             ->onDelete('cascade');
             //llave forenea
            $table->foreign('factura_id')
            ->references('id')->on('facturas')
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
        Schema::dropIfExists('bitacora_entregas');
    }
}
