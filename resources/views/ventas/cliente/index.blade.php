@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('ventas.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Nit</th>
                    <th>Correo</th>
                    <th>Fecha de creacion</th>
                    <th>Saldo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cliente)
				<tr>
					<td>{{ $cliente->idcliente}}</td>
					<td>{{ $cliente->nombre}}</td>
					<td>{{ $cliente->direccion}}</td>
				    <td>{{ $cliente->telefono}}</td>
                    <td>{{ $cliente->nit}}</td>
                    <td>{{ $cliente->correo}}</td>
                    <td>{{ $cliente->fecha_creacion}}</td>
                    <td>{{ $cliente->saldo}}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$cliente->idcliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cliente->idcliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection