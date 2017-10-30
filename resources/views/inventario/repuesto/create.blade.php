@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Repuesto</h3>
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


			{!!Form::open(array('url'=>'inventario/repuesto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                <div class = "row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" required value="{{old('descripcion')}}"  class="form-control" placeholder="Descripción...">
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Tipo de repuesto</label>
                            <select name="tiposdereparacion" class="form-control">
                                @foreach($tiposdereparacion as $tipo)
                                    <option value="{{$tipo->idtiporeparacion}}">{{$tipo->descripcion}}</option>
                                @endforeach            
                            </select>
                        </div>        
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label>Marca</label>
										<select name="idmarca"  id="idmarca" class="form-control">
											@foreach($marcas as $marca)
												<option value="{{$marca->idmarca}}">{{$marca->nombreMarca}}</option>
											@endforeach            
										</select>
									</div>        
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="form-group">
										<label>Modelo</label>
										<select name="idmodelo" id="idmodelo" class="form-control">
										  
										</select>
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
			$("#idmarca").change(event => {	
			$.get(`/inventario/modelos/${event.target.value}`, function(res, sta){
				$("#idmodelo").empty();
				$("#idmodelo").append('<option value="" disabled selected>Selecciona</option>');
				res.forEach(element => {
					$("#idmodelo").append(`<option value=${element.idmodelo}> ${element.modelo} </option>`);
				});
			});
		});
		});
	</script>
@endpush    
@endsection
