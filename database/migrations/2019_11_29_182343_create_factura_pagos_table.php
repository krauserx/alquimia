<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_pagos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('factura_id')->unsigned();//id de la factura
            $table->integer('metodo_pago_id')->unsigned();//id de la metodo pago
            $table->double('fp_monto', 15, 2)->nullable();
            $table->double('fp_vuelto', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            $table->foreign('factura_id')
            ->references('id')->on('facturas')
            ->onDelete('cascade');
            //llave forenea
            $table->foreign('metodo_pago_id')
            ->references('id')->on('metodo_pagos')
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
        Schema::dropIfExists('factura_pagos');
    }
}
