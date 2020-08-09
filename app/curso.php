<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $fillable = ['nombre','clave', 'grado', 'grupo','user_id','periodo_id',];

    public function period()
    {
        return $this->belongsTo('App\periodo');
    }

    public function students()
    {
        return $this->belongsToMany(alumno::class, cursos_alumnos::class)->withTimestamps();

    }

    public function grades()
    {
        return $this->hasMany('App\notas');
    }
}
