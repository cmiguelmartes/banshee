<h1><i class="fa fa-user" aria-hidden="true"></i> Cliente</h1>
<hr>

<div class="row">
	<form ng-submit="guardarCliente()">
		<input type="hidden" ng-model="cliente.cliente_id">
		<div ng-hide="guardado">
			<label>Nit:</label>
			<input type="text" class="form-control" ng-model="cliente.nit" required="required" readonly="readonly">
		</div>
		<div ng-hide="actualizado">
			<label>Nit:</label>
			<input type="text" class="form-control" ng-model="cliente.nit" required="required">
		</div>
		<br>
		<label>Nombre:</label>
		<input type="text" class="form-control" ng-model="cliente.nombre" required="required">
		<br>
		<label>Direccion:</label>
		<input type="text" class="form-control" ng-model="cliente.direccion" required="required">
		<br>
		<label>Telefono:</label>
		<input type="number" class="form-control" ng-model="cliente.telefono" required="required">
		<br>
		<label>Pais:</label>
		<select class="form-control" ng-model="cliente.pais_id" required="required" ng-options = "pais.pais_id as pais.nombre for pais in paises" ng-change="consultarDepartamentos()">
			<option value="">Selecciona</option>
		</select>
		<br>
		<label>Departamento:</label>
		<select class="form-control" ng-model="cliente.departamento_id" required="required" ng-options = "departamento.departamento_id as departamento.nombre for departamento in departamentos" ng-change="consultarCiudades()">
			<option value="">Selecciona</option>
		</select>
		<br>
		<label>Ciudad:</label>
		<select class="form-control" ng-model="cliente.ciudad_id" required="required" ng-options = "ciudad.ciudad_id as ciudad.nombre for ciudad in ciudades">
			<option value="">Selecciona</option>
		</select>
		<br>
		<label>Cupo:</label>
		<input type="number" class="form-control" ng-model="cliente.cupo" required="required">
		<br>
		<label>Saldo del Cupo:</label>
		<input type="number" class="form-control" ng-model="cliente.saldo_cupo" required="required">
		<br>
		<label>Porcentaje Visita:</label>
		<input type="number" class="form-control" ng-model="cliente.porcentaje_visita" required="required">
		<br>
		<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
		<a href="#/clientesEmpresas" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
	</form>
</div>
