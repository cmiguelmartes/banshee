<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;

class PaisController extends Controller
{
    public function getPaises(){
    	try {
    		$paises = Pais::all();	
    		if($paises){
    			return json_encode($paises->toArray());
	    	}
    	} catch (Exception $e) {
    		
	    		return json_encode( array('err' => true, 'mensaje'=>'Error: '.$e));
	    		
    	}
    }
}
