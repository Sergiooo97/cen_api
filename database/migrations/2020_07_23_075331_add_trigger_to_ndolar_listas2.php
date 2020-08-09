<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTriggerToNdolarListas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ndolar_listas', function (Blueprint $table) {
            DB::unprepared('
            CREATE TRIGGER insertar_ndolar_listas2
            AFTER UPDATE ON alumnos 
            FOR EACH ROW 
            UPDATE ndolar_listas SET matricula=NEW.matricula, nombres=NEW.nombres, grado=NEW.grado, grupo=NEW.grupo
            WHERE matricula=OLD.matricula;            
        ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ndolar_listas2', function (Blueprint $table) {
            //
        });
    }
}
