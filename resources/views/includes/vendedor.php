<h1><i class="fa fa-user" aria-hidden="true"></i> Cliente</h1>
<hr>

<div class="row">
	<form ng-submit="guardarVendedor()">
		<input type="hidden" ng-model="vendedor.vendedor_id">
		<div ng-hide="guardado">
			<label>Documento:</label>
			<input type="number" class="form-control" ng-model="vendedor.documento" required="required" readonly="readonly">
		</div>
		<div ng-hide="actualizado">
			<label>Documento:</label>
			<input type="number" class="form-control" ng-model="vendedor.documento" required="required">
		</div>
		<br>
		<label>Nombre:</label>
		<input type="text" class="form-control" ng-model="vendedor.nombres" required="required">
		<br>
		<label>Apellidos:</label>
		<input type="text" class="form-control" ng-model="vendedor.apellidos" required="required">
		<br>
		<label>Sexo:</label>
		<select class="form-control" ng-model="vendedor.sexo" required="required">
			<option value="1">Masculino</option>
			<option value="2">Femenino</option>
		</select>
		<br>
		<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
		<a href="#/vendedorEmpresa" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
	</form>
</div>
