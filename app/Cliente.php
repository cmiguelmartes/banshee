<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = "cliente_id";

    public function getPais(){
    	return $this->hasOne('App\Pais','pais_id','pais_id');
    }

    public function getDepartamento(){
    	return $this->hasOne('App\Departamento','departamento_id','departamento_id');
    }

    public function getCiudad(){
    	return $this->hasOne('App\Ciudad','ciudad_id','ciudad_id');
    }
}
