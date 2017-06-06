@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Series <a href="serie/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('configuracion.serie.search')
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Estado</th>
					<th>Tipo de documento</th>
                    <th>Serie</th>
                    <th>Resolucion</th>
                    <th>Doc. Inicial</th>
                    <th>Doc. Final</th>
                    <th>Doc. Siguiente</th>
					<th>Opciones</th>
				</thead>
               @foreach ($series as $serie)
				<tr>
					<td>{{ $serie->idserie}}</td>
					@if($serie->estado == 1)
					<td>Activo</td>
					@else
					<td>Anulado</td>
					@endif

					<td>{{ $serie->tipo_documento}}</td>
					<td>{{ $serie->serie}}</td>
                    <td>{{ $serie->resolucion}}</td>
                    <td>{{ $serie->numero_inicial}}</td>
                    <td>{{ $serie->numero_final}}</td>
                    <td>{{ $serie->documento_siguiente}}</td>
					<td>
						<a href="{{URL::action('SerieController@edit',$serie->idserie)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$serie->idserie}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>					</td>
				</tr>
				
				@endforeach
			</table> 	
		</div>
		{{$series->render()}}
	</div>
</div>

@endsection 
