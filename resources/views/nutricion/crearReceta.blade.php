

@extends('layouts.app')
@section('content')

	<div class="container">
		<form action="{{ url('/guardar-receta') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			<h1>Crear Receta</h1>
			{{ csrf_field() }}
<fieldset>
<!-- Form Name -->
<legend></legend>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nombre">Nombre de la receta</label>  
		  <div class="col-md-8">
		  <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre aqui" class="form-control input-md" required="">
		    
		  </div>
		</div>
		
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="slots">Tipo de receta</label>
		  <div class="col-md-8">
		    <select id="tipo" name="tipo" class="form-control">
		      <option value="Desayuno">Desayuno</option>
		      <option value="Postre">Postre</option>
		      <option value="Aperitivo">Aperitivo</option>
		      <option value="Curiosidad">Curiosidad</option>
		      <option value="Especial">Especial</option>
		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="imagen">Image</label>  
		  <div class="col-md-8">
		  <input id="image" name="image" type="file" placeholder="" class="form-control input-md">
		    
		  </div>
		</div>
		<div class="form-group">
			  <label class="col-md-3 control-label" for="ingredientes">Ingredientes</label>  
			  	<div class="col-md-8">
				  <textarea rows="8" cols="90" id="ingredientes" name="ingredientes" placeholder="Escribe tus ingredientes si es necesario..." class="form-control input-md"></textarea> 
				</div>
		  </div>
		<!-- Text input-->
		<div class="form-group">
			  <label class="col-md-3 control-label" for="descripcion">Descripcion</label>  
			  	<div class="col-md-8">
				  <textarea rows="12" cols="90" id="descripcion" name="descripcion" placeholder="Explicacion de la rutina..." class="form-control input-md"></textarea> 
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