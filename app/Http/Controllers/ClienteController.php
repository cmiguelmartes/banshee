<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use Hash;

class ClienteController extends Controller
{
    public function save(Request $request){
    	$cliente = new Cliente();
    	$cliente->nit = Hash::make($request->input("nit"));
    	$cliente->nombre = $request->input("nombre");
    	$cliente->direccion = $request->input("direccion");
    	$cliente->telefono = $request->input("telefono");
    	$cliente->ciudad_id = $request->input("ciudad_id");
    	$cliente->departamento_id = $request->input("departamento_id");
    	$cliente->pais_id = $request->input("pais_id");
    	$cliente->cupo = $request->input("cupo");
    	$cliente->saldo_cupo = $request->input("saldo_cupo");
    	$cliente->porcentaje_visita = $request->input("porcentaje_visita");
    	$rtn = $cliente->save();
    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Registro Guardado.' ));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$rtn ));
    	}
    	
    }

    public function edit(Request $request){
    	$cliente = Cliente::where("cliente_id",$request->input("cliente_id"))->first();
    	$cliente->cliente_id = $request->input("nombre");
    	$cliente->nit = Hash::make($request->input("nit"));
    	$cliente->nombre = $request->input("nombre");
    	$cliente->direccion = $request->input("direccion");
    	$cliente->telefono = $request->input("telefono");
    	$cliente->ciudad_id = $request->input("ciudad_id");
    	$cliente->departamento_id = $request->input("departamento_id");
    	$cliente->pais_id = $request->input("pais_id");
    	$cliente->cupo = $request->input("cupo");
    	$cliente->saldo_cupo = $request->input("saldo_cupo");
    	$cliente->porcentaje_visita = $request->input("porcentaje_visita");
    	$rtn = $cliente->save();
    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Registro Guardado.' ));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$rtn ));
    	}
    	
    }

    public function getClientes(){
    	$clientes = Cliente::with("getPais")->with("getDepartamento")->with("getCiudad")->get();
    	if($clientes){
    		return json_encode($clientes->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$clientes ));
    	}
    }

    public function getCliente(Request $request){

    	$cliente = Cliente::with("getPais")->with("getDepartamento")->with("getCiudad")->where("cliente_id",$request->input("clienteId"))->first();
    	
    	if($cliente){
    		return json_encode($cliente->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$cliente ));
    	}
    }

    public function delete(Request $request){
    	$cliente = Cliente::where("cliente_id",$request->input("clienteId"))->first();
    	$rtn = $cliente->delete();

    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Cliente Borrado'));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$cliente ));
    	}
    }
}
