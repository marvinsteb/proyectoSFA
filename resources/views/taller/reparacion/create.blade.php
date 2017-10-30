@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Reparación</h3>
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
{!!Form::open(array('url'=>'taller/reparacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
	<div class = "row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
							<label>Vehiculo</label>
							<select name="idvehiculo" class="form-control selectpicker" data-live-search = "true">
								@foreach($vehiculos as $vehi)
									<option value="{{$vehi->idvehiculo}}">{{$vehi->vehiculo}}</option>
								@endforeach            
							</select>
						</div>        
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
								<label for="unidad">Tipo de reparacion</label>
								<select name="idtiporapracion" id="idtiporapracion"  class="form-control selectpicker" data-live-search = "true">
									@foreach($tipodereparaciones as $tipo)
										<option value="{{$tipo->idtiporeparacion}}">{{$tipo->descripcion}}</option>
									@endforeach            
								</select>
							</div>  
					</div>
					
		
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<div class="form-group">
							<label for="fechainicio">Fecha Inicio</label>
							<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input name="fechainicio" type="text" required value="{{old('fecha')}}"  class="form-control pull-right" id="datepicker">
							</div>
							</div>        
					</div>
	</div>

<div class = "row">
	<div class = "panel panel-primary">
		<div class = "panel-body">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
					<label for="repuesto">repuesto</label>
					<select name="pidrepuesto"   class="form-control selectpicker" id="pidrepuesto" data-live-search = "true">
						<option value="art" selected="selected"></option>
						@foreach($repuestos as $repuesto)
							<option value="{{$repuesto->idrepuesto}}">{{$repuesto->descripcion}}</option>
						@endforeach            
					</select>
			    </div>
			</div>	
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
            	<label for="cantidad">Cantidad</label>
            	<input type="number" name="pcantidad" id="pcantidad"   class="form-control" placeholder="cantidad...">
            	</div>        
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
            	<label for="costo">costo</label>
            	<input type="number" step="any" name="pcosto" id="pcosto"   class="form-control" placeholder="costo...">
            	</div>        
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text"  name="pdescripcion" id="pdescripcion"   class="form-control" placeholder="Descripción...">
            	</div>        
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="form-group">
				<br>
				<button type="button" id="btn_add" class="btn btn-primary" >Agregar</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<table id="tb_detalles" class= "table table-striped table-bordered table-condensed tale-hover ">
			<thead style = "background-color:#A9D0F5">
				<th>Opciones</th>
				<th>repuesto</th>
				<th>Cantidad</th>
			    <th>Costo</th>
				<th>Descripción</th>
				<th>Sub. Total</th>
			</thead>
				<th>TOTAL</th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th><h4 id="total">Q 0.00</h4></th>
			<tfoot>
			</tfoot>
			<body>

			</body>
		<table>
	</div>
	<div id= "gtotal"></div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
		<div class="form-group">
			<input name"_token" value="{{csrf_token()}}" type="hidden"></input>
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
	</div>
</div>
{!!Form::close()!!}		

@push ('scripts')
<script>

$(document).ready(function(){
    $('#btn_add').click(function(){
		agregar();
	});
	$('#datepicker').datepicker({
      format: "dd/mm/yyyy",
      language: "es",
      autoclose: true
    })
});


var cont = 0;
total = 0;
subtotal=[];

$("#guardar").hide();

function agregar(){


idrepuesto = $('#pidrepuesto').val();
repuesto = $('#pidrepuesto option:selected').text();
cantidad = $("#pcantidad").val();
costo = $("#pcosto").val();
descripcion = $("#pdescripcion").val();


if(idrepuesto != "" && repuesto != "" && cantidad !="" && costo !="" )
{

subtotal[cont] = (cantidad * costo);
total = total + subtotal[cont];

var fila = '<tr class="selected" id = "fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont
+')">X</button></td><td><input type="hidden" name="idrepuesto[]" value="'+idrepuesto+'">'+repuesto
+'</input></td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'" >'+cantidad
+'</input></td><td><input type="hidden" name="costo[]" value="'+costo+'" >'+costo
+'</input></td><td><input type="hidden" name="descripcion[]" value="'+descripcion+'" >'+descripcion
+'</input></td><td>'+subtotal[cont]+'</td></tr>'; 

cont++;

limpiar();

$("#total").html("Q" + total);

evaluar();

$("#tb_detalles").append(fila);	
}
else
{
	alert("error al ingrear detalle de repuestos.");
}

}

function limpiar()
{
	$('#pidrepuesto > option[value="art"]').attr('selected', 'selected');
	$('#pimpuesto > option[value="impu"]').attr('selected', 'selected');
	
	$("#pcantidad").val("");
	$("#pcosto").val("");
	
}
 function evaluar()
 {
	 if(total > 0)
	 {
		 $("#guardar").show();
	 }
	 else 
	 {
		 $("#guardar").hide();
	 }
 }
 function eliminar(index)
 {
   total = total -subtotal[index];
   $("#total").html("Q" + total); 
   $("#fila"+index).remove();
   evaluar();
 }
</script>
@endpush
@endsection
