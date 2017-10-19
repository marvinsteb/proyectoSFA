@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Vehículo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'inventario/vehiculo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class = "row">
							
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<label>Marca</label>
										<select name="idmarca" class="form-control">
											@foreach($marcas as $marca)
												<option value="{{$marca->idmarca}}">{{$marca->nombreMarca}}</option>
											@endforeach            
										</select>
									</div>        
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<label>Modelo</label>
										<select name="idmodelo" class="form-control">
											@foreach($modelos as $modelo)
												<option value="{{$modelo->idmodelo}}">{{$modelo->modelo}}</option>
											@endforeach            
										</select>
									</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="costo">Costo de compra</label>
											<input type="number" step="0.01" name="costo" required value="{{old('costo')}}"  class="form-control" placeholder="costo...">
										</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="precio">Precio estimado de venta</label>
											<input type="number" step="0.01" name="precio" required value="{{old('precio')}}"  class="form-control" placeholder="Precio...">
										</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="anio">Año</label> 
											<input type="text"  name="anio"  id="datepikeranio" required value="{{old('anio')}}"  class="form-control" placeholder="Ingresa el año...">
										</div>        
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<label>Llaves</label>
										<select name="llave" class="form-control">
												<option value="1">Con llaves</option>
												<option value="0">Sin llaves</option>
										</select>
									</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="numpuertas">No. Puertas</label> 
											<input type="number"  min = "1" name="numpuertas"  required value="{{old('numpuertas')}}"  class="form-control" placeholder="No. Puertas...">
										</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="lote">No. Lote</label> 
											<input type="text"  name="lote"  required value="{{old('lote')}}"  class="form-control" placeholder="No. lote...">
										</div>        
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<label>Tipo de combustible</label>
										<select name="idcombustible" class="form-control">
											@foreach($combustibles as $combustible)
												<option value="{{$combustible->idcombustible}}">{{$combustible->combustible}}</option>
											@endforeach            
										</select>
									</div>        
								</div>

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
									<div class="form-group">
										<label>Color</label>
										<select name="idcolor" class="form-control">
											@foreach($colores as $color)
												<option value="{{$color->idcolor}}">{{$color->color}}</option>
											@endforeach            
										</select>
									</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="tipomotor">Tipo Motor</label> 
											<input type="text"  name="tipomotor"  required value="{{old('tipomotor')}}"  class="form-control" placeholder="Tipo Motor...">
										</div>        
								</div>
								<div class="col-lg-7 col-md-7 col-sm-4 col-xs-12">
									<div class="form-group">
											<label for="descripcion">Descripción</label> 
											<textarea name="descripcion" class="form-control" >{{old('descripcion')}} </textarea>
										</div>        
								</div>

			</div>



			<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@push ('scripts')
<script>

$(document).ready(function(){
   $(function() {
   $( "#datepikeranio" ).datepicker({dateFormat: 'yy',  changeYear: true,  changeMonth: false});
});
});


</script>
@endpush

@endsection