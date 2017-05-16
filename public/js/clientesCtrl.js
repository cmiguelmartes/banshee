app.controller('clientesCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	$scope.setActive("mClientes");

	$scope.inicio = 5;
	$scope.filtrando = "";
	$scope.cliente = {};
	$scope.clientes = {};
	$scope.paises = {};
	$scope.departamentos = {};
	$scope.ciudades = {};
	$scope.guardado = false;
	$scope.actualizado = false;
	$scope.codigo = $routeParams.codigo;


	$scope.consultarClientes = function(){

		$http.get('getClientes').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}else{
				errorConsultando("los clientes ");
			}

			$scope.clientes = data;
		})
		.error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
	 		errorConsultando("los clientes ");
		});
		
	}

	if ($scope.codigo == "nuevo") {
		$scope.guardado = true;
	}else if($scope.codigo!=undefined && $scope.codigo!='nuevo'){
		$scope.actualizado = true;
		$http.get('getCliente?clienteId='+$scope.codigo).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}else{
				errorConsultando("el cliente");
			}

			$scope.cliente = data;
			$scope.consultarDepartamentos();
			$scope.consultarCiudades();
		})
		.error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
	 		errorConsultando("el cliente");
		});
	}else{

		$scope.consultarClientes();
	}

	$http.get('getPaises').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}else{
				errorConsultando("los paises");
			}

			$scope.paises = data;
	})
	.error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
	 		errorConsultando("los paises");
	});

	errorConsultando = function(mensaje){
		console.log("Error consultando "+mensaje);
	}



	$scope.consultarDepartamentos = function(){
		$http.get('getDepartamentos?paisId='+$scope.cliente.pais_id).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}

			$scope.departamentos = data;
		}).error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
	 		errorConsultando("los departamentos");
		});
	}

	$scope.consultarCiudades = function(){
		$http.get('getCiudades?departamentoId='+$scope.cliente.departamento_id).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}

			$scope.ciudades = data;
		}).error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
	 		errorConsultando("las ciudades");
		});
	}

	$scope.borrarCliente = function(clienteId){

		if (confirm("Seguro quiero este cliente!") == true) {
		    $http.get('deleteCliente?clienteId='+clienteId).success(function(data){
		    	var txt = "";
				if (data.err === false) {
					txt = "Cliente borrado";
				}else{
					txt = "Lo sentimos el cliente no pudo ser borrado";
				}

				alert(txt);
				$scope.consultarClientes();
				
			}).error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});
		}
	}

	$scope.guardarCliente = function(){

		if(!$scope.guardado){

			$http.post('editCliente', $scope.cliente).success(function(data){

				if (data.err === false) {
					alert("Cliente Actualizado");
				}else{
					alert("Lo sentimos el cliente no pudo ser actualizado");
				}
				
			}).error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});

		}else{
			$http.post('saveCliente', $scope.cliente).success(function(data){

				if (data.err === false) {
					$scope.cliente = {};
					alert("Cliente Guardado");
				}else{
					alert("Lo sentimos el cliente no pudo ser guardado");
				}
				
			}).error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});
		}
		


	}


}]);