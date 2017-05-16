app.controller('visitasCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	$scope.setActive("mVisitas");

	$scope.inicio = 5;
	$scope.vista = {};
	$scope.visitas = {};
	$scope.codigo = $routeParams.codigo;



	$http.get('getVisitas').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/visitasEmpresa";
				return;
			}

			$scope.visitas = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});


}]);