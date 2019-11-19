<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('c_texto')->nullable();
            $table->text('c_descripcion')->nullable();
            $table->string('c_url_img')->nullable();
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
        Schema::dropIfExists('categorias');
    }
}
