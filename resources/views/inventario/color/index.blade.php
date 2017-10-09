@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Colores <a href="color/create"><button class="btn btn-success">Nuevo Color</button></a></h3>
		@include('inventario.color.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Color</th>
					<th>Opciones</th>
				</thead>
               @foreach ($colores as $color)
				<tr>
					<td>{{ $color->idcolor}}</td>
					<td>{{ $color->color}}</td>
					<td>
						<a href="{{URL::action('ColorController@edit',$color->idcolor)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$color->idcolor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('inventario.color.modal')
				@endforeach
			</table>
		</div>
		{{$colores->render()}}
	</div>
</div>

@endsection