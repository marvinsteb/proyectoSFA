@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Almacenes <a href="almacen/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('inventario.almacen.search')
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Ubicación</th>
					<th>Opciones</th>
				</thead>
               @foreach ($almacenes as $almacen)
				<tr>
					<td>{{ $almacen->idalmacen}}</td>
					<td>{{ $almacen->nombre}}</td>
					<td>{{ $almacen->ubicacion}}</td>
					<td>
						<a href="{{URL::action('AlmacenController@edit',$almacen->idalmacen)}}"><button class="btn btn-info">Editar</button></a>
					</td>
				</tr>
				
				@endforeach
			</table> 	
		</div>
		{{$almacenes->render()}}
	</div>
</div>

@endsection 
