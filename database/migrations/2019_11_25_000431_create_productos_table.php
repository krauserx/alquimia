<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.->default('2')
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('p_codigo')->unique();
            $table->string('p_codigo_barra')->nullable();
            $table->string('p_nombre')->index();
            $table->integer('categoria_id')->unsigned();//id del registro tabla contacto
            $table->double('p_precio_costo', 15, 2)->nullable();
            $table->double('p_precio_venta', 15, 2);
            $table->double('p_catidad', 15, 2)->nullable();
            $table->integer('p_tipo')->unsigned()->comment('1 servicio, 2 mercaderia');
            $table->text('p_descripcion')->nullable();
            $table->string('p_url_img')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')
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
        Schema::dropIfExists('productos');
    }
}
