<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ciudad;

class CiudadController extends Controller
{
    public function getCiudadesByDepartamento(Request $request){
    	$ciudades = Ciudad::where("departamento_id",$request->input("departamentoId"))->get();
    	if($ciudades){
    		return json_encode($ciudades->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$ciudades));
    	}
    }
}
