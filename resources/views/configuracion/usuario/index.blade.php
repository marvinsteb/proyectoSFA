@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="#"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('configuracion.usuario.search')
	</div>
</div>



<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>usuario</th>
				</thead>
               @foreach ($usuarios as $usuario)
				<tr>
					<td>{{ $usuario->id}}</td>
					<td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
					<td>
				</tr>
				
				@endforeach
			</table> 	
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection 
