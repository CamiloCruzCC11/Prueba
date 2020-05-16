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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fecha_nac');
            $table->string('sexo');
            $table->string('est_civil');
            $table->string('foto');
            $table->string('cargo');
            $table->tinyInteger('est_contra');
            $table->unsignedBigInteger('jefe')->nullable();
            $table->timestamps();
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
