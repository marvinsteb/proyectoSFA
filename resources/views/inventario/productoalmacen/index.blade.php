@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de productos por almacen <a href="productoporalmacen/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('inventario.productoalmacen.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Almacen</th>
                    <th>Existencia</th>
				</thead>
               @foreach ($productosalmacenes as $producto)
				<tr>
					<td>{{ $producto->id_inventario}}</td>
					<td>{{ $producto->descripcion}}</td>
					<td>{{ $producto->nombre}}</td>
				    <td>{{ $producto->existencia}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$productosalmacenes->render()}}
	</div>
</div>

@endsection