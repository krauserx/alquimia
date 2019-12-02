<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('usario_id')->unsigned();
            $table->integer('persona_id')->unsigned();//id de la perosna
            $table->double('c_altura', 4, 2);
            $table->double('c_peso', 5, 2);
            $table->double('c_procentaje_grasa', 5, 2);
            $table->double('c_grasa_viceral', 5, 2);
            $table->double('c_cintura', 3, 2);
            $table->double('c_pecho', 3, 2);
            $table->double('c_cadera', 5, 2);
            $table->double('c_brazo', 3, 2);
            $table->double('c_imc', 5, 2);
            $table->integer('c_tipo')->default('1')->unsigned()->comment('1 ingreso, 2 control');
            $table->text('c_nota')->nullable();
            $table->timestamps();
            $table->softDeletes(); // <-- This will add a deleted_at field
            //llave forenea
            //llave forenea
            $table->foreign('persona_id')
            ->references('id')->on('personas')
            ->onDelete('cascade');
             //llave forenea
             $table->foreign('usario_id')
             ->references('id')->on('users')
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
        Schema::dropIfExists('controls');
    }
}
