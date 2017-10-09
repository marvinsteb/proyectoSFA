@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Facturas de importaciónes <a href="factura/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('ventas.factura.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>Numero</th>
                    <th>Serie</th>
                    <th>Fecha Documento</th>
                    <th>Fecha Creacion</th>
                    <th>Cliente</th>
                    <th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach ($facturas as $factura)
				<tr>
					<td>{{ $factura->numero_fac}}</td>
					<td>{{ $factura->serie}}</td>
					<td>{{ $factura->fecha_documento}}</td>
				    <td>{{ $factura->fecha_creacion}}</td>
                    <td>{{ $factura->nombre}}</td>
                    <td>{{ $factura->total}}</td>
					<td>
						 	<a href="{{URL::action('FacturaController@show',$factura->idfactura)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$factura->idfactura}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('ventas.factura.modal')
				@endforeach
			</table>
		</div>
		{{$facturas->render()}}
	</div>
</div>

@endsection