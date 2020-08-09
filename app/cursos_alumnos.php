<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cursos_alumnos extends Model
{
    protected $table = 'cursos_alumnos';
    protected $fillable = ['curso_id','alumno_id',];

    public function students()
    {
        return $this->belongsToMany(alumno::class)->withTimestamps();

    }
}
