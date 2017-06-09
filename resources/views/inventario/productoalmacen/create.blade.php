@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Agregar Producto por almacen</h3>
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


			{!!Form::open(array('url'=>'inventario/productoporalmacen','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
<div class = "row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Articulo</label>
            <select name="id_inve" class="form-control">
                @foreach($articulos as $articulo)
                    <option value="{{$articulo->id_inventario}}">{{$articulo->descripcion}}</option>
                @endforeach            
            </select>
        </div>        
    </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Almacen</label>
            <select name="id_almacen" class="form-control">
                @foreach($almacenes as $almacen)
                    <option value="{{$almacen->idalmacen}}">{{$almacen->nombre}}</option>
                @endforeach            
            </select>
        </div>        
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            	<label for="existencia">Existencias</label>
            	<input type="number" name="existencia" value="{{old('existencia')}}"  class="form-control" >
            </div>        
    </div>
</div>
<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
</div>

			{!!Form::close()!!}		
@endsection