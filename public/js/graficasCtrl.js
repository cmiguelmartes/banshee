app.controller('graficasCtrl', ['$scope','$http', function($scope,$http){
	
	$scope.setActive("mGraficas");

	$scope.myDataSource = {};

	$http.get('getVisitasByCiudad').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/vendedoresEmpresa";
				return;
			}

			$scope.myDataSource = data;
	})
	.error(function(data, status) {
 		console.log("Estado "+status);
 		console.log("Data "+data);
	});

}]);