app.controller('crearVisitaCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	$scope.setActive("mVisitas");

	$scope.vista = {};
	$scope.visitas = {};
	$scope.codigo = $routeParams.codigo;

	$scope.clientes = {};
	$scope.vendedores = {};

	$http.get('getClientes').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/visitasEmpresa";
				return;
			}

			$scope.clientes = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});

	$http.get('getVendedores').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/visitasEmpresa";
				return;
			}

			$scope.vendedores = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});
	
	$scope.vista.valor_neto = 1500;
	
	$scope.valorVisita = function(){

		var log = [];
		angular.forEach($scope.clientes, function(value, key) {
			if(value.cliente_id == $scope.vista.cliente_id){
				$scope.vista.valor_visita = $scope.vista.valor_neto * (value.porcentaje_visita/100);		
			}
		  
		}, log);		
	}

	$scope.guardarVisita = function(){

			$http.post('saveVisita', $scope.vista).success(function(data){

				if (data.err === false) {
					$scope.vendedor = {};
					alert("Visita Guardado");
				}else{
					alert("Lo sentimos el vendedor no pudo ser guardado");
				}
				
			})
			.error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});

	}


}]);