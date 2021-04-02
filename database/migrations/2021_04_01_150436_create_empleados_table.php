<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->date('fechaNacimiento');
            $table->integer('codigoPostal');
            $table->string('direccion',100);
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('cara_id');
            $table->unsignedBigInteger('situacion_id');
            $table->timestamps();

            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
            $table->foreign('cara_id')->references('id')->on('caras')->onDelete('cascade');
            $table->foreign('situacion_id')->references('id')->on('situaciones')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
