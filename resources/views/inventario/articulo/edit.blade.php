@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Articulo: {{ $articulo->descripcion}}</h3>
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


			{!!Form::model($articulo,['method'=>'PATCH','route'=>['inventario.articulo.update',$articulo->id_inventario,'files'=>'true']])!!}
            {{Form::token()}}
<div class = "row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" required value="{{$articulo->descripcion}}"  class="form-control">
            </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label>Marca</label>
            <select name="idcategoria" class="form-control">
                @foreach($categorias as $categoria)
				     @if($categoria->idcategoria == $articulo->idcategoria)
                   		 <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
					 @else
					 	<option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
					 @endif
                @endforeach            
            </select>
        </div>        
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            	<label for="unidad">unidad</label>
            	<input type="text" name="unidad" required value="{{$articulo->unidad}}"  class="form-control">
            </div>        
    </div>
</div>
<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
</div>

			{!!Form::close()!!}		
            
@endsection 