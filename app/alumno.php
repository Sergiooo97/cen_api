<?php

namespace App;
use App\curso;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{

    public static function select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7, string $string8, string $string9, string $string10, string $string11, string $string12, string $string13, string $string14, string $string15, string $string16, string $string17, string $string18, string $string19, string $string20, string $string21)
    {
    }

    public function courses()
    {
        return $this->belongsToMany(\App\curso::class, cursos_alumnos::class)->withTimestamps();

    }

    public function grades_values()
    {
        return $this->hasMany('App\notas_values');
    }

    protected $fillable = [
        'matricula','nombres','apellido_paterno',
        'apellido_materno','edad','fecha_de_nacimiento',
        'curp','grado','municipio','cp','direccion','grupo',
        'quiero_ser','ndolares', 'nombres_tutor','apellido_paterno_tutor',
        'apellido_materno_tutor','direccion_tutor','escolaridad_tutor',
        'curp_tutor','telefono_tutor',
    ];
    //Query Scope
    /**
     * @var mixed|string
     */
    private $ndolares;

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
