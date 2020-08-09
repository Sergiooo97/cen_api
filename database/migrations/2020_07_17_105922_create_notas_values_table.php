<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_values', function (Blueprint $table) {
            $table->id();
            $table->integer('nota');
            $table->unsignedBigInteger('nota_structures_id')->nullable();
            $table->foreign('nota_structures_id')
                ->references('id')
                ->on('notas_structures')
                ->onDelete('cascade');
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->foreign('alumno_id')
                ->references('id')
                ->on('alumnos')
                ->onDelete('cascade');
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
        Schema::dropIfExists('notas_values');
    }
}
