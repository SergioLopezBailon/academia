<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable=['nombre', 'horas'];

    //Metodos para la relacion n:m con Alumnos
    public function alumnos(){
       return $this->belongsToMany('App\Alumno')->withPivot('nota')->withTimestamps();
    }

    public function scopeAlumno($query, $v){
        if(!isset($v)){
           return $query->whereHas('alumnos', function($query)
                    {$query->where('alumno_id', 'like', '%'); });
        }
        if($v=='%'){
            return $query->whereHas('alumnos', function($query)
                    {$query->where('alumno_id', 'like', '%'); });
        }
            
        return $query->whereHas('alumnos', function($query) use($v) 
                {$query->where('alumno_id', 'like', $v); });

    }
}
