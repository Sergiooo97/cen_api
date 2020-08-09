<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ndolarTransacciones extends Model
{
    protected $fillable = [
        'id','id_alumno','matricula','nombre','accion', 'cantidad','antes','nuevo','comentario',
    ];
    //Query Scope
    public function scopeNombres($query, $nombres){
        if($nombres)
            return $query->where('nombres', 'LIKE', "%$nombres%" );
    }
    public function scopeGrado($query, $grado){
        if($grado)
            return $query->where('grado', 'LIKE', "%$grado%" );
    }
    public function scopeGrupo($query, $grupo){
        if($grupo)
            return $query->where('grupo', 'LIKE', "%$grupo%" );
    }
}
