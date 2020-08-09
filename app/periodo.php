<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    protected $fillable = ['nombre','duracion','año','descripcion',];

    public function courses()
    {
        return $this->hasMany('App\curso');
    }

    public function periods_ranges()
    {
        return $this->hasMany('App\periodo_rango');
    }
}
