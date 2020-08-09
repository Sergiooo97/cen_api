<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    protected $fillable = [
        'id','matricula','nombres','RFC','apellido_paterno', 
        'apellido_materno','edad','fecha_de_nacimiento',
        'curp','municipio','cp','direccion','telefono',
    
    ];
}
