<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdolarTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndolar_transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lista_id')->index();
            $table->string('matricula');
            $table->string('nombre');
            $table->enum('accion',['DEPOSITO', 'RETIRO'])->default('DEPOSITO');
            $table->integer('cantidad');
            $table->string('nuevo')->nullable();
            $table->string('comentario')->nullable();
            $table->timestamps();

            //Relaciones
            $table->foreign('lista_id')
                ->references('id')
                ->on('ndolar_listas')
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
        Schema::dropIfExists('ndolar_transacciones');
    }
}
