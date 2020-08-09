<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periodos_rangos extends Model
{
    protected $table = 'periodos_rangos';
    protected $fillable = ['nombre','duracion','fecha_inicio','fecha_fin','periodo_id',];

    public function period()
    {
        return $this->belongsTo('App\periodo');
    }
}
