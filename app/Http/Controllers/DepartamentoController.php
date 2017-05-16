<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Departamento;

class DepartamentoController extends Controller
{
    public function getDepartamentosByPais(Request $request){
    	$departamentos = Departamento::where("pais_id",$request->input("paisId"))->get();
    	if($departamentos){
    		return json_encode($departamentos->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$departamentos));
    	}
    }
}
