<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notas_structures extends Model
{
    protected $table = "notas_structures";
    protected $fillable = ['nombre','nota_id',];

    public function grade()
    {
        return $this->belongsTo('App\notas');
    }

    public function grades_values()
    {
        return $this->hasMany('App\notas_values');
    }
}
