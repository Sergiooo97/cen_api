<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notas extends Model
{
    protected $fillable = ['nombre','descripcion','course_id','isConfigurable',];

    public function grades_structures()
    {
        return $this->hasMany('App\notas_structures');
    }

    public function course()
    {
        return $this->belongsTo('App\curso');
    }
}
