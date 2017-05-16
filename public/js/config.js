app.config( function($routeProvider){

	$routeProvider
		.when('/clientesEmpresas',{
			templateUrl: 'include/listClientes',
			controller: 'clientesCtrl'
		})
		.when('/vendedorEmpresa',{
			templateUrl: 'include/listVendedores',
			controller: 'vendedorCtrl'
		})
		.when('/inicio',{
			templateUrl: 'include/inicio',
			controller: 'inicioCtrl'
		})
		.when('/graficasEmpresa',{
			templateUrl: 'include/graficas',
			controller: 'graficasCtrl'
		})
		.when('/visitasEmpresa',{
			templateUrl: 'include/listVisitas',
			controller: 'visitasCtrl'
		})
		.when('/cliente/:codigo',{
			templateUrl: 'include/cliente',
			controller: 'clientesCtrl'
		})
		.when('/vendedor/:codigo',{
			templateUrl: 'include/vendedor',
			controller: 'vendedorCtrl'
		})
		.when('/visita/:codigo',{
			templateUrl: 'include/visita',
			controller: 'crearVisitaCtrl'
		})
		.when('/reporteCliente/:codigo',{
			templateUrl: 'include/reporte',
			controller: 'movimientoCtrl'
		})
		.otherwise({
			//redirectTo: '/clientes'
		});


});