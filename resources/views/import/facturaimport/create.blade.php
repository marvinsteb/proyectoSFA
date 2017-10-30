@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Factura de importación </h3>
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


			{!!Form::open(array('url'=>'import/importaciones','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="nofactura">No. Factura</label>
							<input type="text" name="nofactura" required value="{{old('nofactura')}}"  class="form-control" placeholder="No Factura...">
						</div>        
				</div>

				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="form-group">
						<label for="fechadoc">Fecha del Documento</label>
						<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input name="fechadoc" type="text" class="form-control pull-right" id="datepicker">
						</div>
						</div>        
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
							<label for="idproveedor">Proveedor</label>
							<select name="idproveedor" id="idproveedor"  class="form-control selectpicker" data-live-search = "true">
								@foreach($proveedores as $proveedor)
									<option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre}}</option>
								@endforeach            
							</select>
						</div>  
				</div>
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="banco">Banco</label>
							<input type="text" name="banco" required value="{{old('banco')}}"  class="form-control" placeholder="Banco...">
						</div>        
				</div>	
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="nocuenta">No. Cuenta</label>
							<input type="text" name="nocuenta" required value="{{old('nocuenta')}}"  class="form-control" placeholder="No. Cuenta...">
						</div>        
				</div>	
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="notransferencia">No. Transferencia</label>
							<input type="text" name="notransferencia" required value="{{old('notransferencia')}}"  class="form-control" placeholder="No. Transferencia...">
						</div>        
				</div>	

				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					<div class="form-group">
						<label for="montoransferencia">Monto transferencia</label>
						<input type="number" step="any" name="montoransferencia" id="montoransferencia"   class="form-control" placeholder="0.00">
					</div>        
				</div>

				<div class = "row">
					<div class = "panel panel-primary">
						<div class = "panel-body">

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<div class="form-group">
									<label for="idvehiculo">Vehiculo</label>
									<select name="pidvehiculo"  id="pidvehiculo" class="form-control selectpicker" data-live-search = "true">
										<option value="selecciona.." selected="selected"></option>
										@foreach($vehiculos as $vehiculo)
											<option value="{{$vehiculo->idvehiculo}}">{{$vehiculo->vehiculo}}</option>
										@endforeach            
									</select>
								</div>
							</div>

							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
								<div class="form-group">
								<label for="costo">Costo</label>
								<input type="number" step="any" name="pcosto" id="pcosto"   class="form-control" placeholder="0.00">
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
								<th>Vehiculo</th>
								<th>Costo</th>
								<th>Sub. Total</th>
							</thead>
								<th>TOTAL</th>
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
	  //Date picker
	$('#datepicker').datepicker({
      format: "dd/mm/yyyy",
      language: "es",
      autoclose: true
    })
});
var cont = 0;
total = 0.00;
subtotal=[];

$("#guardar").hide();

function agregar(){
				


idvehiculo = $('#pidvehiculo').val();
vehiculo = $('#pidvehiculo option:selected').text();
costo = $("#pcosto").val();


if(idvehiculo != "" && vehiculo != "" && costo !="" )
{


subtotal[cont] = costo;
total = total + subtotal[cont];


var fila = '<tr class="selected" id = "fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont
+')">X</button></td><td><input type="hidden" name="idvehiculo[]" value="'+idvehiculo+'">'+vehiculo
+'</input></td><td><input type="hidden" name="costo[]" value="'+costo+'" >'+costo
+'</input></td><td>'+subtotal[cont]+'</td></tr>'; 

cont++;
limpiar();
$("#total").html("Q"+total);
evaluar();
$("#tb_detalles").append(fila);	
}
else
{
	alert("error al ingrear detalle de vehiculos.");
}

}

function limpiar()
{
	$('#pidvehiculo > option[value="art"]').attr('selected', 'selected');
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
   total = total - subtotal[index];
   $("#total").html("Q" + total); 
   $("#fila"+index).remove();
   evaluar();
 }
</script>
@endpush
@endsection
