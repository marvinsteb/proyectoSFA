@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado De Compras De Repuestos.<a href="comprarepuesto/create"><button class="btn btn-success">Nueva Compra</button></a></h3>
	<!--	
	@include('ventas.factura.search')
    -->
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
                    <th>id</th>
                    <th>Estado</th>
                    <th>Fecha Compra</th>
                    <th>No. Doc</th>
                    <th>Proveedor</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach ($facturasRepuestos as $fac)
				<tr>
					<td>{{ $fac->id}}</td>
					<td>{{ $fac->estado}}</td>
					<td>{{ $fac->fecha}}</td>
				    <td>{{ $fac->nodoc}}</td>
                    <td>{{ $fac->nombre}}</td>
                    <td>{{ $fac->total}}</td>
					<td>
						 <a href="{{URL::action('CompraRepuestoController@show',$fac->id)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$fac->id}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('taller.comprarepuesto.modal')
				@endforeach
			</table>
		</div>
		{{$facturasRepuestos->render()}}
	</div>
</div>

@endsection