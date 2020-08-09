<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Calculos extends Model
{
    public function getNotaSubComponente($idPeriodo,$idGradeStructure,$idStudent)
    {
        $query = notas_values::select('nota')
            ->where('nota_structures_id',$idGradeStructure)
            ->where('alumno_id',$idStudent)
            ->where('periodos_rangos_id',$idPeriodo)
            ->first();
        return $query;
    }
    public function getPromedioPeriodoRango($idRango,$idCurso,$idAlumno)
    {
        $periodo = periodos_rangos::find($idRango);
        $promedioPeriodo = 0;
        $promedioComponente = 0;
        if(!is_null($periodo))
        {
            $componentes = notas::select('id')->where('curso_id',$idCurso)->get();
            $acumPromedios = 0;
            $canPromedios = 0;
            foreach ($componentes as $index1 => $componente) {
                $subComponentes = notas_structures::select('id')->where('nota_id','$componente->id')->get();
                $acumNotas = 0;
                $canNotas = 0;
                foreach($subComponentes as $index2 => $subcomponente){
                    $nota = $this->getNotaSubComponente($periodo->id,$subcomponente->id,
                        $idAlumno);
                    $nota = $nota == null ? 0 : $nota->nota;
                    $acumNotas += $nota;
                    $canNotas++;
                }
                if($canNotas != 0)
                    $promedioComponente = $acumNotas / $canNotas;

                $acumPromedios += $promedioComponente;
                $canPromedios++;
            }
            if($canPromedios != 0)
                $promedioPeriodo = $acumPromedios / $canPromedios;
        }
        return round($promedioPeriodo);
    }
    public function obtenerEstado($nota)
    {
        return $nota >= 10.5 ? "Aprobado":"Desaprobado";
    }

    public function getPromedioFinal($idCurso)
    {
        $resultados = null;
        $promedioComponente = 0;
        $promedioPeriodo = 0;
        $promedioFinal = 0;

        $alumnos = alumno::join('cursos_alumnos as cs','alumnos.id','=',
            'cs.alumno_id')->select('id',
            DB::raw("CONCAT(alumnos.apellido_paterno,' ', apellido_materno,' ',students.nombre) AS alumno"))
            ->orderBy('apellido_paterno','ASC')->where('cs.curso_id',$idCurso)
            ->get();

        $periodos = periodos_rangos::where('periodo_id',\Session::get('idPeriodo'))->get();

        $componentes = notas::select('id')->where('curso_id',$idCurso)->get();

        $cantidadPeriodos = periodos_rangos::where('periodo_id',\Session::get('idPeriodo'))
            ->count();

        foreach ($alumnos as $index3 => $alumno) {
            $acumPromedioPeriodo = 0;
            foreach ($periodos as $index => $periodo) {
                $acumPromedios = 0;
                $canPromedios = 0;
                foreach ($componentes as $index1 => $componente) {
                    $subComponentes = notas_structures::select('id')->where('nota_id',$componente->id)->get();
                    $acumNotas = 0;
                    $canNotas = 0;
                    foreach($subComponentes as $index2 => $subcomponente){
                        $nota = $this->getNotaSubComponente($periodo->id,$subcomponente->id,
                            $alumno->id);
                        $nota = $nota == null ? 0 : $nota->nota;
                        $acumNotas += $nota;
                        $canNotas++;
                    }
                    if($canNotas != 0)
                        $promedioComponente = $acumNotas / $canNotas;

                    $acumPromedios += $promedioComponente;
                    $canPromedios++;
                }
                if($canPromedios != 0)
                    $promedioPeriodo = $acumPromedios / $canPromedios;
                $acumPromedioPeriodo += $promedioPeriodo;
            }
            if($cantidadPeriodos != 0)
                $promedioFinal = $acumPromedioPeriodo / $cantidadPeriodos;

            $resultados[] = (object)array(
                "alumno" => $alumno->alumno,
                "final" => round($promedioFinal),
                "estado" => $this->obtenerEstado($promedioFinal)
            );
        }
        return $resultados;
    }
    public function getColorBarra($porcentaje)
    {
        if($porcentaje >= 60)
            return "progress-bar-success";
        else if($porcentaje <= 30)
            return "progress-bar-danger";
        else
            return "progress-bar-warning";
    }

    public function getColorNota($nota)
    {
        return $nota >= 10.5 ? "blue" : "red";
    }

    //Cursos con Mayor Cantidad de Alumnos. TOTAL=6
    public function getMayorCantidadAlumnos()
    {
        $resultados = null;
        $cursos = curso::select('id','nombre')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();

        foreach ($cursos as $value) {
            $resultados[] =  array(
                "id" => $value->id,
                "curso" => $value->nombre,
                "cantidad" => $value->alumnos->count()
            );
        }
        return $resultados;
    }

    //Alumnos mas destacados. TOTAL=5
    public function getAlumnosDestacados($curso)
    {
        $promedios = null;
        $prom = 0;
        $periodos = periodos_rangos::select('id','nombre')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('nombre','ASC')->get();

        $alumnos = alumno::join('cursos_alumnos as cs','alumnos.id','=',
            'cs.alumno_id')
            ->select('id')
            ->orderBy('apellido_paterno','ASC')->where('cs.curso_id',$curso)
            ->get();

        foreach ($alumnos as $item0){
            $can = 0;
            $acum = 0;
            foreach ($periodos as $item) {
                $promedio = $this->getPromedioPeriodoRango($item->id,$curso,$item0->id);

                $acum += $promedio;

                $can++;
            }

            if($can != 0) $prom = $acum / $can;

            $promedios[] = array(
                "idAlumno" => $item0->id,
                "promedio" => $prom
            );
        }
        return $promedios;
    }



}
