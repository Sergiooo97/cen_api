<?php

use Illuminate\Database\Seeder;

class tutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutor = new \App\tutor();
        $tutor->alumno_id = '1';
        $tutor->nombres = 'Rafael';
        $tutor->apellido_paterno = 'Eb';
        $tutor->apellido_materno = 'Gallegos';
        $tutor->direccion = 'Calle 16#94x17y19';
        $tutor->escolaridad = 'Preparatoria';
        $tutor->curp = 'EXHZ981521HYNBLR01';
        $tutor->telefono = '9911074558';
        $tutor->correo = 'rafael@its.edu.mx';
        $tutor->save();

        $tutor = new \App\tutor();
        $tutor->alumno_id = '2';
        $tutor->nombres = 'Rafael';
        $tutor->apellido_paterno = 'Eb';
        $tutor->apellido_materno = 'Gallegos';
        $tutor->direccion = 'Calle 16#94x17y19';
        $tutor->escolaridad = 'Preparatoria';
        $tutor->curp = 'EXHZ981521HYNBLR01';
        $tutor->telefono = '9911074558';
        $tutor->correo = 'rafael@its.edu.mx';
        $tutor->save();

        $tutor = new \App\tutor();
        $tutor->alumno_id = '3';
        $tutor->nombres = 'Rafael';
        $tutor->apellido_paterno = 'Eb';
        $tutor->apellido_materno = 'Gallegos';
        $tutor->direccion = 'Calle 16#94x17y19';
        $tutor->escolaridad = 'Preparatoria';
        $tutor->curp = 'EXHZ981521HYNBLR01';
        $tutor->telefono = '9911074558';
        $tutor->correo = 'rafael@its.edu.mx';
        $tutor->save();

    }
}
