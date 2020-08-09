<?php

namespace App\Http\Controllers\api;

use App\alumno;
use App\curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class alumnos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = alumno::all();
        return response()->json($alumnos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = alumno::find($id)->first();
        $alumno = alumno::select(
            'alumnos.id',
            'alumnos.matricula as matricula',
            'alumnos.nombres as nombres',
            'alumnos.apellido_paterno as apellido_paterno',
            'alumnos.apellido_materno as apellido_materno',
            'alumnos.edad',
            'alumnos.fecha_de_nacimiento',
            'alumnos.curp',
            'alumnos.grado',
            'alumnos.grupo',
            'alumnos.municipio',
            'alumnos.cp',
            'alumnos.direccion',
            'tutores.nombres as nombres_tutor',
            'tutores.telefono as telefono_tutor',
            'tutores.direccion as direccion_tutor',
            'tutores.apellido_paterno as apellido_paterno_tutor',
            'tutores.apellido_materno as apellido_materno_tutor',
            'tutores.escolaridad as escolaridad_tutor',
            'tutores.curp as curp_tutor',
            'ndolar_listas.cantidad as ndolar_cantidad',
            'tutores.correo as correo_tutor')
            ->join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->where($alumnos->id, $id)
            ->first();

        return response()->json($alumno);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
