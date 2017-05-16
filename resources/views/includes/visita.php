<h1><i class="fa fa-user" aria-hidden="true"></i> Visita</h1>
<hr>

<div class="row">
	<form ng-submit="guardarVisita()">
		<input type="hidden" ng-model="vista.visita_id">
		<label>Cliente:</label>
		<select ng-model="vista.cliente_id" class="form-control" ng-options = "cliente.cliente_id as cliente.nombre for cliente in clientes" ng-change="valorVisita()">
			<option value="">Seleccione</option>
		</select>
		<br>
		<label>Vendedor:</label>
		<select ng-model="vista.vendedor_id" class="form-control" ng-options = "vendedor.vendedor_id as vendedor.nombres for vendedor in vendedores">
			<option value="">Seleccione</option>
		</select>
		<br>
		<label>Valor Neto:</label>
		<input type="number" value="1500" class="form-control" ng-model="vista.valor_neto" required="required" ng-change="valorVisita()">
		<br>
		<label>Valor Visita:</label>
		<input type="number" class="form-control" ng-model="vista.valor_visita" required="required" readonly="readonly">
		<br>
		<label>Observaciones:</label>
		<textarea ng-model="vista.observaciones" class="form-control"></textarea>
		<br>
		
		<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
		<a href="#/visitasEmpresa" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
	</form>
</div>
