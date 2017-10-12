@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Vehiculo</h3>
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


			{!!Form::open(array('url'=>'inventario/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
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
            <label>Marca</label>
            <select name="idcategoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
                @endforeach            
            </select>
        </div>        
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            	<label for="unidad">unidad</label>
            	<input type="text" name="unidad" required value="{{old('unidad')}}"  class="form-control" placeholder="unidad...">
            </div>        
    </div>
</div>
<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
</div>

			{!!Form::close()!!}		
@endsection
