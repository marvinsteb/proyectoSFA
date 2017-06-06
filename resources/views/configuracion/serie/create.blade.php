@extends ('layouts.admin')
@section ('contenido')
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Serie</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'configuracion/serie','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            <label>Tipo de documento</label>
            <select name="tipodocumento" class="form-control">
                    <option value="Fac">Factura</option>
                     <option value="NC">Nota de Crédito </option>
                     <option value="PD">Pedido</option>
            </select>
          </div>        

            <div class="form-group">
            	<label for="serie">Serie</label>
            	<input type="text" name="serie" class="form-control" placeholder="Serie...">
            </div>
            <div class="form-group">
            	<label for="res">Resolución</label>
            	<input type="text" name="resolucion" class="form-control" placeholder="Resolucion...">
            </div>

            <div class="form-group">
            	<label for="inicial">Documento Inicial</label>
            	<input type="text" name="inicial" class="form-control" placeholder="Documento Inicial...">
            </div>
            <div class="form-group">
            	<label for="final">Documento Final</label>
            	<input type="text" name="final" class="form-control" placeholder="Documento Final...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>

@endsection 