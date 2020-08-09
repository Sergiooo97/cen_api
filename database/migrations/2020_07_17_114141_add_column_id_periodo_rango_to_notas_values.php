<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdPeriodoRangoToNotasValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas_values', function (Blueprint $table) {
            $table->unsignedBigInteger('periodos_rangos_id')->unsigned()->after('alumno_id');
            $table->foreign('periodos_rangos_id')
                ->references('id')
                ->on('periodos_rangos')
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
        Schema::table('notas_values', function (Blueprint $table) {
            //
        });
    }
}
