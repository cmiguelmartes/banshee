<h1><i class="fa fa-user" aria-hidden="true"></i> Reporte de Usuario</h1>
<h1>{{ cliente.nombre }}</h1>
<hr>
<div class="row">
	<label class="form-control info">Cupo: {{ cliente.cupo }}, Saldo del Cupo: {{ cliente.saldo_cupo }}</label>
</div>
<div class="row">
	<table class="table table-striped">
		<tr>
			<th>Vendedor</th>
			<th>Valor Neto</th>
			<th>Valor Visita</th>
			<th>Observaciones</th>
		</tr>
		<tr ng-repeat="visita in visitas">
			<td>{{ visita.get_vendedor.nombres }} {{ visita.getVendedor.apellidos }}</td>
			<td>{{ visita.valor_neto }}</td>
			<td>{{ visita.valor_visita }}</td>
			<td>{{ visita.observaciones }}</td>
		</tr>
	</table>
</div>


