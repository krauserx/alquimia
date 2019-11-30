<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('f_numero')->unsigned();
            $table->integer('usario_id')->unsigned();
            $table->integer('persona_id')->nullable();//id de la perosna
            $table->integer('textofactura_id')->unsigned();
            $table->integer('condicion_id')->default('1')->unsigned();//id de la condicon
            $table->integer('fd_dias_credito')->unsigned()->nullable();
            $table->integer('f_estado')->default('2')->unsigned()->comment('1 hecha, 2 temporal');
            $table->integer('f_tipo_factura')->default('1')->unsigned()->comment('1 venta, 2 pedido');
            $table->integer('f_pedido_aprobado')->default('1')->unsigned()->comment('1 si, 2 no, 3 pendiente');
            $table->integer('f_estado_entrega')->default('1')->unsigned()->comment('1 entregado, pendiente');
           $table->date('f_fecha_a_entregar')->nullable();
            $table->date('f_fecha_entregado')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            $table->foreign('usario_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            //llave forenea
            $table->foreign('textofactura_id')
            ->references('id')->on('textofacturas')
            ->onDelete('cascade');
            //llave forenea
            $table->foreign('condicion_id')
            ->references('id')->on('condicionventas')
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
        Schema::dropIfExists('facturas');
    }
}
