<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $table = 'visita';
    protected $primaryKey = "visita_id";

    public function getVendedor(){
    	return $this->hasOne('App\Vendedor','vendedor_id','vendedor_id');
    }

    public function getCliente(){
    	return $this->hasOne('App\Cliente','cliente_id','cliente_id');
    }
}
