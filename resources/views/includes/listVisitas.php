<h1><i class="fa fa-users" aria-hidden="true"></i> Lista de Visitas</h1>
<hr>
<div class="row" align="right">
		<a href="#/visita/nuevo" class="btn btn-info">
		<i class="fa fa-user-plus"></i>
		Crear Visita
		</a>
	</div>
	<br>
<div class="row">
	<table class="table table-striped">
		<tr>
			<th>Vendedor</th>
			<th>Cliente</th>
			<th>Valor Neto</th>
			<th>Valor Visita</th>
			<th>Observaciones</th>
		</tr>
		<tr ng-repeat="visita in visitas">
			<td>{{ visita.get_vendedor.nombres }} {{ visita.getVendedor.apellidos }}</td>
			<td>{{ visita.get_cliente.nombre }}</td>
			<td>{{ visita.valor_neto }}</td>
			<td>{{ visita.valor_visita }}</td>
			<td>{{ visita.observaciones }}</td>
			<!--<td><a href="#/vista/{{ vista.vendedor_id }}">Ver Vendedor</a></td>
			<td><a href="" ng-click="borrarVendedor(vista.vendedor_id)">Borrar Vendedor</a></td>-->
		</tr>
	</table>
</div>