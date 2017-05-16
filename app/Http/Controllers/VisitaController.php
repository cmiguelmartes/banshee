<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visita;
use App\Cliente;
use DB;

class VisitaController extends Controller
{
    public function save(Request $request){

        $cliente = Cliente::where("cliente_id",$request->input("cliente_id"))->first();
        if($cliente->saldo_cupo > $request->input("valor_visita")){
            $cliente->saldo_cupo = $cliente->saldo_cupo - $request->input("valor_visita");    
            $cliente->save();
        }else{
            return json_encode( array('err' => true, 'mensaje'=>'Error: El cliente ya no tiene saldo para mas visitas'));
        }
        


    	$visita = new Visita();
    	$visita->vendedor_id = $request->input("vendedor_id");
    	$visita->cliente_id = $request->input("cliente_id");
    	$visita->valor_neto = $request->input("valor_neto");
    	$visita->valor_visita = $request->input("valor_visita");
    	$visita->observaciones = $request->input("observaciones");

    	$rtn = $visita->save();

        

    	if($rtn){
    		return json_encode( array('err' => false, 'mensaje'=>'Registro Guardado.' ));
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$rtn ));
    	}
    	
    }

    public function getVisitas(){
    	$visitas = Visita::with("getVendedor")->with("getCliente")->get();
    	if($visitas){
    		return json_encode($visitas->toArray());
    	}else{
    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$visitas ));
    	}
    }

    public function getVisitasByCliente(Request $request){
        $visitas = Visita::with("getVendedor")->where("cliente_id",$request->input("clienteId"))->get();
        if($visitas){
            return json_encode($visitas->toArray());
        }else{
            return json_encode( array('err' => true, 'mensaje'=>'Error: '.$visitas ));
        }
    }

    public function getVisitasByCiudad(){
        $countVisitas = DB::table('visita as v')
                        ->join('cliente as c', 'v.cliente_id', '=', 'c.cliente_id')
                        ->join('ciudad as m', 'c.ciudad_id', '=', 'm.ciudad_id')
                        ->select("m.nombre as label",DB::raw("count(banshee_v.visita_id) as value"))
                        ->groupBy('c.ciudad_id')
                        ->get();

        if($countVisitas){
            $infoG = array("chart"=>array("caption"=>"Gráfico cantidad de visitas a clientes por ciudad","subCaption"=>"","numberPrefix"=>"Visitas ","theme"=>"ocean"),"data"=>$countVisitas);
            return json_encode($infoG);
        }else{
            return json_encode( array('err' => true, 'mensaje'=>'Error: '.$countVisitas ));
        }
    }


}
