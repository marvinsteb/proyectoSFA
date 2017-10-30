@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Vehiculos <a href="vehiculo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('inventario.vehiculo.search') 
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Id</th>
					<th>Status</th>
                    <th>Marca</th>
					<th>Modelo</th>
					<th>Lote</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>No. Puertas</th>
                    <th>Tipo de Combustible</th>
                    <th>Descripción</th>
                    <th>color</th>
					<th>modelo</th>
				</thead>
               @foreach ($vehiculos as $vehiculo)
				<tr>
					<td>{{ $vehiculo->idvehiculo}}</td>
					<td>{{ $vehiculo->estado}}</td>
					<td>{{ $vehiculo->nombreMarca}}</td>
					<td>{{ $vehiculo->modelo}}</td>
					<td>{{ $vehiculo->lote}}</td>					
					<td>{{ $vehiculo->costo}}</td>
				    <td>{{ $vehiculo->precio}}</td>
                    <td>{{ $vehiculo->numpuertas}}</td>
                    <td>{{ $vehiculo->combustible}}</td>
                    <td>{{ $vehiculo->descripcion}}</td>
                    <td>{{ $vehiculo->color}}</td>
                    <td>{{ $vehiculo->modelo}}</td>
					<td>
						<a href="#"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$vehiculo->idvehiculo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('inventario.vehiculo.modal')
				@endforeach
			</table>
		</div>
		{{$vehiculos->render()}}
	</div>
</div>

@endsection