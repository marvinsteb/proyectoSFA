@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Embarques <a href="embarque/create"><button class="btn btn-success">Nuevo Embarque</button></a></h3>
		@include('import.embarque.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Id</th>
                    <th>Vehiculo</th>
                    <th>Barco viaje</th>
                    <th>Fecha de arribo</th>
                    <th>lugar de origen</th>
                    <th>descripcion</th>
                    <th>No. contenedor</th>
					<th>Flete Maritimo</th>
					<th>T. interno</th>
					<th>Valor Doc.</th>
					<th>Total</th>
					<th>Cargos</th>
				</thead>
               @foreach ($embarques as $embarque)
				<tr>
					<td>{{ $embarque->idembarque}}</td>
					<td>{{ $embarque->vehiculo}}</td>
					<td>{{ $embarque->barcoviaje}}</td>
					<th>{{ $embarque->fechaarribo}}</th>
					<td>{{ $embarque->lugarorigen}}</td>
				    <td>{{ $embarque->descripcion}}</td>
                    <td>{{ $embarque->numcontenedor}}</td>
                    <td>{{ $embarque->fletemaritimo}}</td>
                    <td>{{ $embarque->transporteinterno}}</td>
					<td>{{ $embarque->valordocumentacion}}</td>
					<td>{{ $embarque->total}}</td>
					<td>{{ $embarque->cargoservicio}}</td>
					<td>
						<a href="#"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$embarque->idembarque}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('import.embarque.modal')
				@endforeach
			</table>
		</div>
		{{$embarques->render()}}
	</div>
</div>

@endsection