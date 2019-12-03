<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('tipo_identificacion')->unsigned()->comment('1 cedula, 2 DIMEX, 3 pasaporte');
            $table->string('identificacion', 20);//sting por que puede ser pasaporte
            $table->string('email')->unique();
            $table->integer('tipo_telefono')->unsigned();
            $table->integer('telefono')->unsigned()->comment('1 celular, 2 telefono oficina, 3 telefono casa');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
