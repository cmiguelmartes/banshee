var app = angular.module('universidadApp',['ngRoute','ui.mask','ng-fusioncharts']);

app.controller('mainCtrl', ['$scope','$http', function($scope,$http){
  
	$scope.menuSuperior = 'include/menu';
	$scope.telefonoMask = "9999-9999";


	$scope.setActive = function(Opcion){

		$scope.mInicio     = "";
		$scope.mClientes   = "";
		$scope.mVendedor   = "";
		$scope.mVisitas     = "";
		$scope.mGraficas   = "";

		$scope[Opcion] = "active";

	}

}]);

app.filter('telefono',function(){
	return function(numero){
		return numero.substring(0,4) + " - " + numero.substring(4);
	}
});
