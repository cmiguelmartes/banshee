<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vendedor;

class VendedorController extends Controller
{
    public function save(Request $request){
    	$vendedor = new Vendedor();
    	$vendedor->documento = $request->input("documento");
    	$vendedor->nombres = $request->input("nombres");
    	$vendedor->apellidos = $request->input("apellidos");
    	$vendedor->sexo = $request->input("sexo");

    	$rtn = $vendedor->save();
    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Registro Guardado.' ));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$rtn ));
    	}
    	
    }

    public function edit(Request $request){
    	$vendedor = Vendedor::where("vendedor_id",$request->input("vendedor_id"))->first();
    	$vendedor->documento = $request->input("documento");
    	$vendedor->nombres = $request->input("nombres");
    	$vendedor->apellidos = $request->input("apellidos");
    	$vendedor->sexo = $request->input("sexo");

    	$rtn = $vendedor->save();
    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Registro Actualizado.' ));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$rtn ));
    	}
    	
    }

    public function getVendedores(){
    	$vendedores = Vendedor::where("status",1)->get();
    	if($vendedores){
    		return json_encode($vendedores->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$vendedores ));
    	}
    }

    public function getVendedor(Request $request){

    	$vendedor = Vendedor::where("vendedor_id",$request->input("vendedorId"))->first();
    	
    	if($vendedor){
    		return json_encode($vendedor->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$vendedor ));
    	}
    }

    public function delete(Request $request){
    	$vendedor = Vendedor::where("vendedor_id",$request->input("vendedorId"))->first();
    	$vendedor->status = 0;
    	$rtn = $vendedor->save();

    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Vendedor Borrado'));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$vendedor ));
    	}
    }
}
