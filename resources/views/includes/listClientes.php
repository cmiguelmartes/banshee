<h1><i class="fa fa-users" aria-hidden="true"></i> Lista de Clientes</h1>
<hr>
<div class="row" align="right">
		<a href="#/cliente/nuevo" class="btn btn-info">
		<i class="fa fa-user-plus"></i>
		Crear Cliente
		</a>
	</div>
	<br>
<div class="row">
	<table class="table table-striped">
		<tr>
			<!--<th>Nit</th>-->
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Telefono</th>
			<th>Pais</th>
			<th>Departamento</th>
			<th>Ciudad</th>
			<th>Cupo</th>
			<th>Saldo Cupo</th>
			<th>Porcentaje Visita</th>
		</tr>
		<tr ng-repeat="cliente in clientes">
			<!--<td>{{ cliente.nit }}</td>-->
			<td>{{ cliente.nombre }}</td>
			<td>{{ cliente.direccion }}</td>
			<td>{{ cliente.telefono }}</td>
			<td>{{ cliente.get_pais.nombre }}</td>
			<td>{{ cliente.get_departamento.nombre }}</td>
			<td>{{ cliente.get_ciudad.nombre }}</td>
			<td>{{ cliente.cupo }}</td>
			<td>{{ cliente.saldo_cupo }}</td>
			<td>{{ cliente.porcentaje_visita }}</td>
			<td><a href="#/cliente/{{ cliente.cliente_id }}">Ver Cliente</a></td>
			<td><a href="" ng-click="borrarCliente(cliente.cliente_id)">Borrar Cliente</a></td>
			<td><a href="#/reporteCliente/{{ cliente.cliente_id }}">Reporte Cliente</a></td>
		</tr>
	</table>
</div>