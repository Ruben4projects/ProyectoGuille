

@extends('layouts.app')
@section('content')

	<div class="container">
		<form action="{{ url('/guardar-rutina') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			<h1>Crear Rutina</h1>
			{{ csrf_field() }}
<fieldset>
<!-- Form Name -->
<legend></legend>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nombre">Nombre de la rutina</label>  
		  <div class="col-md-8">
		  <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre aqui" class="form-control input-md" required="">
		    
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="sexo">Sexo</label>
		  <div class="col-md-8">
		    <select id="sexo" name="sexo" class="form-control">
		      <option value="Hombre">Hombre</option>
		      <option value="Mujer">Mujer</option>
		    </select>
		  </div>
		</div>
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="slots">Tipo de rutina</label>
		  <div class="col-md-8">
		    <select id="tipo" name="tipo" class="form-control">
		      <option value="Definicion">Definición</option>
		      <option value="Volumen">Volumen</option>
		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nivel">Nivel de la rutina</label>
		  <div class="col-md-8">
		    <select id="nivel" name="nivel" class="form-control">
		      <option value="Principiante">Principiante</option>
		      <option value="Medio">Medio</option>
		      <option value="Experto">Experto</option>

		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="dias">Numero de dias a la semana</label>
		  <div class="col-md-8">
		    <select id="dias" name="dias" class="form-control">
		      <option value="1">1 dia</option>
		      <option value="2">2 dias</option>
		      <option value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>

		    </select>
		  </div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			  <label class="col-md-3 control-label" for="descripcion">Descripcion</label>  
			  	<div class="col-md-8">
				  <textarea rows="3" cols="90" id="descripcion" name="descripcion" placeholder="Explicacion de la rutina..." class="form-control input-md"></textarea> 
				</div>
		  </div>
		 
	
	<!-- Button -->
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="enviar"></label>
	  <div class="col-md-4">
	    <button type="submit" id="enviar" name="enviar" class="btn btn-success">Añadir ejercicios a la rutina</button>
	  </div>
	</div>

	</fieldset>
	</form>
</div>


@endsection