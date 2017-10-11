@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Proveedores <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('import.proveedor.search')
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
					<th>Tipo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($proveedores as $proveedor)
				<tr>
					<td>{{ $proveedor->idproveedor}}</td>
					<td>{{ $proveedor->nombre}}</td>
					<td>{{ $proveedor->direccion}}</td>
				    <td>{{ $proveedor->telefono}}</td>
                    <td>{{ $proveedor->nit}}</td>
                    <td>{{ $proveedor->correo}}</td>
                    <td>{{ $proveedor->fecha_creacion}}</td>
					<td>{{ $proveedor->descripcion}}
					<td>
						<a href="#"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$proveedor->idproveedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('import.proveedor.modal')
				@endforeach
			</table>
		</div>
		{{$proveedores->render()}}
	</div>
</div>

@endsection