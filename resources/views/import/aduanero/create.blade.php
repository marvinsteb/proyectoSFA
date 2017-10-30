@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Documento Aduanero</h3>
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


			{!!Form::open(array('url'=>'import/aduanero','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
                <div class = "row">
         
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select name="idproveedor"  class="form-control selectpicker" data-live-search = "true">
                                @foreach($proveedores as $proveedor)
                                    <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre}}</option>
                                @endforeach            
                            </select>
                        </div>        
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Vehiculo</label>
                            <select name="idvehiculo"  class="form-control selectpicker" data-live-search = "true">
                                @foreach($vehiculos as $vehi)
                                    <option value="{{$vehi->idvehiculo}}">{{$vehi->vehiculo}}</option>
                                @endforeach            
                            </select>
                        </div>        
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                                <label>No Documento</label>
                                <input type="text" name="numerodoc" required value="{{old('numerodoc')}}"  class="form-control" placeholder="No. Doc...">
                            </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                                <label>Correlativo</label>
                                <input type="text" name="correlativo" required value="{{old('correlativo')}}"  class="form-control" placeholder="Correlativo...">
                            </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group">
                            <label for="fechadoc">Fecha Documento</label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="fechadocumento" type="text" required value="{{old('fechadocumento')}}"  class="form-control pull-right" id="datepicker">
                            </div>
                            </div>        
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" step="0.01" name="total" required value="{{old('total')}}"  class="form-control" placeholder="0.00">
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
