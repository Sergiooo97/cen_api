<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdolarListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndolar_listas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id')->index();
            $table->string('matricula');
            $table->string('nombres');
            $table->string('grado');
            $table->string('grupo');
            $table->integer('cantidad');


            //Relaciones
            $table->foreign('alumno_id')
            ->references('id')
            ->on('alumnos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ndolar_listas');
    }
}
