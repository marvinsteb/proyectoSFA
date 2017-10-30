@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Embarque</h3>
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
{!!Form::open(array('url'=>'import/embarque','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
			<div class = "row">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="barcoviaje">Barco del viaje</label>
							<input type="text" name="barcoviaje" required value="{{old('barcoviaje')}}"  class="form-control" placeholder="Barco del viaje...">
					</div>
				</div>

			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="lugarorigen">Lugar de origen</label>
							<input type="text" name="lugarorigen" required value="{{old('lugarorigen')}}"  class="form-control" placeholder="Lugar de origen...">
						</div>        
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Vehiculo</label>
						<select name="idvehiculo"  class="form-control selectpicker" data-live-search = "true">
						@foreach($vehiculos as $vehiculo)
							<option value="{{$vehiculo->idvehiculo}}">{{$vehiculo->vehiculo}}</option>
						@endforeach            
						</select>
					</div>        
				</div>


				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
						<label for="fechaarribo">Fecha Arribo</label>
						<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input name="fechaarribo" type="text" required value="{{old('fechaarribo')}}"  class="form-control pull-right" id="datepicker">
						</div>
						</div>        
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" required value="{{old('descripcion')}}"  class="form-control" placeholder="Descripcion...">
					</div>        
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
							<label for="numcontenedor">Numero de contenedor</label>
							<input type="text" name="numcontenedor" required value="{{old('numcontenedor')}}"  class="form-control" placeholder="Numero de contenedor...">
						</div>        
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label for="fletemaritimo">Flete Maritimo</label>
						<input type="number" step="0.01" name="fletemaritimo" required value="{{old('fletemaritimo')}}"  class="form-control" placeholder="0.00">
					</div>        
				</div>			
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label for="transporteinterno">Transporte Interno</label>
						<input type="number" step="0.01" name="transporteinterno" required value="{{old('transporteinterno')}}"  class="form-control" placeholder="0.00">
					</div>        
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label for="valordocumentacion">Valor de documentación</label>
						<input type="number" step="0.01" name="valordocumentacion" required value="{{old('valordocumentacion')}}"  class="form-control" placeholder="0.00">
					</div>        
				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label for="cargoservicio">Cargos del servicio</label>
						<input type="number" step="0.01" name="cargoservicio" required value="{{old('cargoservicio')}}"  class="form-control" placeholder="0.00">
					</div>        
				</div>	

			</div>
			<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
{!!Form::close()!!}		

@push ('scripts')
<script>

$(document).ready(function(){
    $('#btn_add').click(function(){
		agregar();
	});
	  //Date picker
	$('#datepicker').datepicker({
      format: "dd/mm/yyyy",
      language: "es",
      autoclose: true
    })
});
</script>
@endpush
@endsection