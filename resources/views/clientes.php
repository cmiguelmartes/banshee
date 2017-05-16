<!DOCTYPE html>
<html ng-app="universidadApp" ng-controller="mainCtrl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Banshee S.A.</title>
                
        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="css/animate.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="font-awesome/css/font-awesome.min.css"/>
        <script src="js/lib/angular.min.js"></script>
        <script src="js/lib/angular-route.min.js"></script>
        <script src="js/lib/ui-utils.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/config.js"></script>
        <script src="js/clientesCtrl.js"></script>
        <script src="js/inicioCtrl.js"></script>
        <script src="js/graficasCtrl.js"></script>
        <script src="js/vendedorCtrl.js"></script>
        <script src="js/visitasCtrl.js"></script>
        <script src="js/crearVisitaCtrl.js"></script>
        <script src="js/movimientoCtrl.js"></script>

        <script type="text/javascript" src="js/fusioncharts/fusioncharts.js"></script>
        <script type="text/javascript" src="js/fusioncharts/themes/fusioncharts.theme.ocean.js"></script>
        <script type="text/javascript" src="js/angular-fusioncharts.min.js"></script>



        
    </head>    
    <body>
        
        <div ng-include="menuSuperior"></div>

        <br>
        <br>
        <br>
        <div class="container">
        <!-- La pagina principal ira aquí -->
            
            <div ng-view></div>

        </div><!-- /.container -->


    </body>
</html>
