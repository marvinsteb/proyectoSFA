@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif 
        </div>
    </div>


{!!Form::open(array('url'=>'import/proveedor','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
			<div class = "row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" required value="{{old('nombre')}}"  class="form-control" placeholder="Nombre...">
						</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="direccion">Dirección</label>
							<input type="text" name="direccion" required value="{{old('direccion')}}"  class="form-control" placeholder="Dirección...">
						</div>        
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
							<label for="ciudad">Ciudad</label>
							<input type="text" name="ciudad" required value="{{old('ciudad')}}"  class="form-control" placeholder="Ciudad...">
						</div>        
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Tipo</label>
						<select name="idtipo" class="form-control">
						@foreach($tipoDeProveedores as $tipo)
							<option value="{{$tipo->idtipoprov}}">{{$tipo->descripcion}}</option>
						@endforeach            
						</select>
					</div>        
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
							<label for="direccion">Telefono</label>
							<input type="text" name="telefono" required value="{{old('telefono')}}"  class="form-control" placeholder="Telefono...">
						</div>        
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
							<label for="direccion">Nit</label>
							<input type="text" name="nit" required value="{{old('nit')}}"  class="form-control" placeholder="Nit...">
						</div>        
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="direccion">Correo</label>
							<input type="text" name="correo" required value="{{old('correo')}}"  class="form-control" placeholder="Correo...">
						</div>        
				</div>

			</div>
			<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
{!!Form::close()!!}		
@endsection