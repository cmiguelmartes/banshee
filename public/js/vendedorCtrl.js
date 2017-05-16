app.controller('vendedorCtrl', ['$scope','$routeParams','$http', function($scope,$routeParams,$http){
	
	$scope.setActive("mVendedor");

	$scope.inicio = 5;
	$scope.filtrando = "";
	$scope.vendedor = {};
	$scope.vendedores = {};
	$scope.guardado = false;
	$scope.actualizado = false;
	$scope.codigo = $routeParams.codigo;


	$scope.consultarVendedores = function(){
		$http.get('getVendedores').success(function(data){

			if (data.err !== undefined) {
				window.location = "#/vendedoresEmpresa";
				return;
			}

			$scope.vendedores = data;
		})
		.error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
		});
	}

	if ($scope.codigo == "nuevo") {
		$scope.guardado = true;
	}else if($scope.codigo!=undefined && $scope.codigo!='nuevo'){
		$scope.actualizado = true;
		$http.get('getVendedor?vendedorId='+$scope.codigo).success(function(data){

			if (data.err !== undefined) {
				window.location = "#/vendedoresEmpresa";
				return;
			}

			$scope.vendedor = data;
		})
		.error(function(data, status) {
	 		console.log("Estado "+status);
	 		console.log("Data "+data);
		});
	}else{

		$scope.consultarVendedores();
	}



	$scope.borrarVendedor = function(vendedorId){

		if (confirm("Seguro quiero este vendedor!") == true) {
		    $http.get('deleteVendedor?vendedorId='+vendedorId).success(function(data){
		    	var txt = "";
				if (data.err === false) {
					txt = "Vendedor borrado";
				}else{
					txt = "Lo sentimos el vendedor no pudo ser borrado";
				}

				alert(txt);
				$scope.consultarVendedores();
				
			})
			.error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});
		}
	}

	$scope.guardarVendedor = function(){

		if(!$scope.guardado){

			$http.post('editVendedor', $scope.vendedor).success(function(data){

				if (data.err === false) {
					alert("Vendedor Actualizado");
				}else{
					alert("Lo sentimos el vendedor no pudo ser actualizado");
				}
				
			})
			.error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});

		}else{
			$http.post('saveVendedor', $scope.vendedor).success(function(data){

				if (data.err === false) {
					$scope.vendedor = {};
					alert("Vendedor Guardado");
				}else{
					alert("Lo sentimos el vendedor no pudo ser guardado");
				}
				
			})
			.error(function(data, status) {
		 		console.log("Estado "+status);
		 		console.log("Data "+data);
			});
		}
		


	}


}]);