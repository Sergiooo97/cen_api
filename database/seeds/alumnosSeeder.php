<?php

use Illuminate\Database\Seeder;
use App\alumno;
class alumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumno = new alumno();
        $alumno->matricula = 'EXGS971124H1A';
        $alumno->nombres = 'Sergio';
        $alumno->apellido_paterno = 'Eb';
        $alumno->apellido_materno = 'Gallegos';
        $alumno->edad = '22';
        $alumno->fecha_de_nacimiento = '1997-11-24';
        $alumno->curp = 'EXGS971124HYNBLR01';
        $alumno->grado = '1';
        $alumno->grupo = 'A';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->save();

        $alumno = new alumno();
        $alumno->matricula = 'GXGS951254HKA';
        $alumno->nombres = 'Jose';
        $alumno->apellido_paterno = 'Ake';
        $alumno->apellido_materno = 'Ek';
        $alumno->edad = '24';
        $alumno->fecha_de_nacimiento = '1995-11-24';
        $alumno->curp = 'AKGS971124HYNBLR01';
        $alumno->grado = '1';
        $alumno->grupo = 'A';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->save();

        $alumno = new alumno();
        $alumno->matricula = 'AXGS971124H1A';
        $alumno->nombres = 'Ana';
        $alumno->apellido_paterno = 'Gallegos';
        $alumno->apellido_materno = 'Eb';
        $alumno->edad = '25';
        $alumno->fecha_de_nacimiento = '1994-12-21';
        $alumno->curp = 'EXGS971124HYNBLR01';
        $alumno->grado = '2';
        $alumno->grupo = 'A';
        $alumno->municipio = 'Cacalchén';
        $alumno->cp = '97460';
        $alumno->direccion = 'Calle 16#94x17y19';
        $alumno->save();
    }
}
