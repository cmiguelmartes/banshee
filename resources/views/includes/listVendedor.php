<h1><i class="fa fa-users" aria-hidden="true"></i> Lista de Vendedores</h1>
<hr>
<div class="row" align="right">
		<a href="#/vendedor/nuevo" class="btn btn-info">
		<i class="fa fa-user-plus"></i>
		Crear Vendedor
		</a>
	</div>
	<br>
<div class="row">
	<table class="table table-striped">
		<tr>
			<th>Documento</th>
			<th>Nombres</th>
			<th>Apellidos</th>
		</tr>
		<tr ng-repeat="vendedor in vendedores">
			<td>{{ vendedor.documento }}</td>
			<td>{{ vendedor.nombres }}</td>
			<td>{{ vendedor.apellidos }}</td>
			<td><a href="#/vendedor/{{ vendedor.vendedor_id }}">Ver Vendedor</a></td>
			<td><a href="" ng-click="borrarVendedor(vendedor.vendedor_id)">Borrar Vendedor</a></td>
		</tr>
	</table>
</div>