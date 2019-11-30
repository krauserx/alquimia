<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('factura_id')->unsigned();//id de la factura
            $table->integer('producto_id')->unsigned();//id de la factura
            $table->double('fd_cantidad', 15, 2);
            $table->double('fd_precio_costo', 15, 2)->default('0.00');
            $table->double('fd_precio_venta', 15, 2);
            $table->double('fd_iva', 15, 2)->nullable();
            $table->double('fd_descuento', 15, 2)->nullable();
            $table->text('fd_nota')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            $table->foreign('factura_id')
            ->references('id')->on('facturas')
            ->onDelete('cascade');
            //llave forenea
            $table->foreign('producto_id')
            ->references('id')->on('productos')
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
        Schema::dropIfExists('factura_detalles');
    }
}
