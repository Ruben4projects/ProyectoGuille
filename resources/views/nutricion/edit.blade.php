@extends('layouts.app')
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">

@section('content')
		<div class="container">
		<form action="{{ url('/update-receta', ['receta_id' => $receta->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			<h1>Editar {{$receta->nombre}}</h1>
			{{ csrf_field() }}
<fieldset>
<!-- Form Name -->
<legend></legend>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nombre">Nombre de la receta</label>  
		  <div class="col-md-8">
		  <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre aqui" class="form-control input-md" required="" value="{{$receta->nombre}}">
		    
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="slots">Tipo de receta</label>
		  <div class="col-md-8">
		    <select id="tipo" name="tipo" class="form-control">
		      @if($receta->tipo == 'Desayuno')
		      <option>Desayuno</option>
		      @else
		      <option>Desayuno</option>
		      @endif
		      @if($receta->tipo == 'Postre')
		      <option selected="selected">Postre</option>
		      @else
		      <option>Postre</option>
		      @endif
		      @if($receta->tipo == 'Aperitivo')
		      <option selected="selected">Aperitivo</option>
		      @else
		      <option>Aperitivo</option>
		      @endif
		      @if($receta->tipo == 'Curiosidad')
		      <option selected="selected">Curiosidad</option>
		      @else
		      <option>Curiosidad</option>
		      @endif
		      @if($receta->tipo == 'Especial')
		      <option selected="selected">Especial</option>
		      @else
		      <option>Especial</option>
		      @endif
		      
		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="imagen">Image</label>  
		  <div class="col-md-8">
		  	<div class="receta-image-mask ">
							<img src="{{url('/miniatura/'.$receta->image)}}" value="{{$receta->image}}" class="receta-image" />

			</div>
		  <input id="image" name="image" type="file"  class="form-control input-md">
		    
		  </div>
		</div>
		<div class="form-group">
			  <label class="col-md-3 control-label" for="ingredientes">Ingredientes</label>  
			  	<div class="col-md-8">
				  <textarea rows="8" cols="90" id="ingredientes" name="ingredientes" placeholder="Escribe tus ingredientes si es necesario..." class="form-control input-md">{{$receta->ingredientes}}</textarea> 
				</div>
		  </div>
		<!-- Text input-->
		<div class="form-group">
			  <label class="col-md-3 control-label" for="descripcion">Descripcion</label>  
			  	<div class="col-md-8">
				  <textarea rows="12" cols="90" id="descripcion" name="descripcion" placeholder="Explicacion de la rutina..." class="form-control input-md">{{$receta->descripcion}}</textarea> 
				</div>
		  </div>
		 
	
	<!-- Button -->
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="enviar"></label>
	  <div class="col-md-4">
	    <button type="submit" id="enviar" name="enviar" class="btn btn-success">Enviar</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>

	
@endsection