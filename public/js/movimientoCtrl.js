app.controller('movimientoCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	$scope.setActive("mClientes");

	$scope.cliente = {};
	$scope.codigo = $routeParams.codigo;
	$scope.visitas = {};

	$http.get('getCliente?clienteId='+$scope.codigo).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}

			$scope.cliente = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});

	$http.get('getVisitasByCliente?clienteId='+$scope.codigo).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/clientesEmpresas";
				return;
			}

			$scope.visitas = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});
	



}]);