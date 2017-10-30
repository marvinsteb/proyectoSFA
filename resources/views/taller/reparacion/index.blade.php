@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Reparaciones   <a href="reparacion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('taller.reparacion.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Numero</th>
                    <th>Fecha Inicio</th>
                	<th>Fecha de finalización</th>
                    <th>costo</th>
                    <th>Vehiculo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($reparaciones as $rep)
				<tr>
					<td>{{ $rep->idreparacion}}</td>
					<td>{{ $rep->fecha_inicio}}</td>
					<td>{{ $rep->fecha_fin}}</td>
				    <td>{{ $rep->costoreal}}</td>
					<td>{{ $rep->vehiculo}}</td>
					<td>
						<a href="{{URL::action('ReparacionController@show',$rep->idreparacion)}}"><button class="btn btn-primary">Detalles</button></a>
                        <a href="" data-target="#modal-delete-{{$rep->idreparacion}}" data-toggle="modal"><button class="btn btn-danger">Finalizar</button></a>
					</td>
				</tr>
				@include('taller.reparacion.modal')
				@endforeach
			</table>
		</div>
		{{$reparaciones->render()}}
	</div>
</div>

@endsection