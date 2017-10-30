@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de documentos aduaneros  <a href="aduanero/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('import.aduanero.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Fecha</th>
					<th>No. Documento</th>
					<th>Correlativo</th>
					<th>Proveedor</th>
					<th>Descripcion</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach ($aduaneros as $aduanero)
				<tr>
					<td>{{ $aduanero->idaduaneroe}}</td>
					<td>{{ $aduanero->fecha}}</td>
					<td>{{ $aduanero->numerodoc}}</td>
					<td>{{ $aduanero->correlativo}}</td>
				    <td>{{ $aduanero->proveedor}}</td>
					<td>{{ $aduanero->descripcion}}</td>
					<td>{{ $aduanero->total}}</td>
					<td>
						<a href="{{URL::action('AduaneroController@edit',$aduanero->idaduaneroe)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$aduanero->idaduaneroe}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('import.aduanero.modal')
				@endforeach
			</table>
		</div>
		{{$aduaneros->render()}}
	</div>
</div>

@endsection