<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notas_values extends Model
{
    protected $table = "notas_values";
    protected $fillable = ['nota','nota_structure_id','alumno_id'];

    public function student()
    {
        return $this->belongsTo('App\alumno');
    }

    public function grade_structure()
    {
        return $this->belongsTo('App\notas_structures');
    }
}
