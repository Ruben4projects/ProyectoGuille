

@extends('layouts.app')
@section('content')

	<div class="container">
		<form action="{{ url('/editar2-rutina', ['rutina_id' => $rutina->id])  }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			<h1>Editar Rutina</h1>
			{{ csrf_field() }}
<fieldset>
<!-- Form Name -->
<legend></legend>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nombre">Nombre de la rutina</label>  
		  <div class="col-md-8">
		  <input id="nombre" name="nombre" type="text" placeholder="" value="{{$rutina->nombre}}" class="form-control input-md" required="">
		    
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="sexo">Sexo</label>
		  <div class="col-md-8">
		    <select id="sexo" name="sexo" class="form-control">
		    	@if($rutina->sexo == 'Hombre')
		      <option selected="selected" value="Hombre">Hombre</option>
		      <option value="Mujer">Mujer</option>
		      @else
		      <option  value="Hombre">Hombre</option>
		      <option selected="selected" value="Mujer">Mujer</option>
		      @endif
		    </select>
		  </div>
		</div>
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="slots">Tipo de rutina</label>
		  <div class="col-md-8">
		    <select id="tipo" name="tipo" class="form-control">
		    	@if($rutina->tipo == 'Definicion')
		      <option selected="selected" value="Definicion">Definicion</option>
		      <option value="Volumen">Volumen</option>
		      @else
		      <option  value="Definicion">Definicion</option>
		      <option selected="selected" value="Volumen">Volumen</option>
		      @endif
		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nivel">Nivel de la rutina</label>
		  <div class="col-md-8">
		    <select id="nivel" name="nivel" class="form-control">
			@if($rutina->nivel == 'Principiante')
		      <option selected="selected" value="Principiante">Principiante</option>
		      <option value="Medio">Medio</option>
		      <option value="Experto">Experto</option>
		     @endif
		     @if($rutina->nivel == 'Medio')
		      <option value="Principiante">Principiante</option>
		      <option selected="selected" value="Medio">Medio</option>
		      <option value="Experto">Experto</option>
		     @endif
		      @if($rutina->nivel == 'Experto')
		      <option value="Principiante">Principiante</option>
		      <option  value="Medio">Medio</option>
		      <option selected="selected" value="Experto">Experto</option>
		     @endif
		    </select>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="dias">Dias de la rutina a la semana</label>
		  <div class="col-md-8">
		    <select id="dias" name="dias" class="form-control">
			@if($rutina->dias == '1')
		      <option selected="selected" value="1">1 dia</option>
		      <option value="2">2 dias</option>
		      <option value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		     @if($rutina->dias == '2')
		      <option  value="1">1 dia</option>
		      <option selected="selected" value="2">2 dias</option>
		      <option value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		      @if($rutina->dias == '3')
		      <option  value="1">1 dia</option>
		      <option  value="2">2 dias</option>
		      <option selected="selected" value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		      @if($rutina->dias == '4')
		      <option  value="1">1 dia</option>
		      <option  value="2">2 dias</option>
		      <option value="3">3 dias</option>
		      <option selected="selected"  value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		      @if($rutina->dias == '5')
		      <option  value="1">1 dia</option>
		      <option  value="2">2 dias</option>
		      <option  value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option selected="selected" value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		      @if($rutina->dias == '6')
		      <option  value="1">1 dia</option>
		      <option  value="2">2 dias</option>
		      <option  value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option selected="selected" value="6">6 dias</option>
		      <option value="7">7 dias</option>
		     @endif
		      @if($rutina->dias == '7')
		      <option  value="1">1 dia</option>
		      <option  value="2">2 dias</option>
		      <option  value="3">3 dias</option>
		      <option value="4">4 dias</option>
		      <option value="5">5 dias</option>
		      <option value="6">6 dias</option>
		      <option selected="selected" value="7">7 dias</option>
		     @endif
		    </select>
		  </div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			  <label class="col-md-3 control-label" for="descripcion">Descripcion</label>  
			  	<div class="col-md-8">
				  <textarea rows="3" cols="90" id="descripcion" name="descripcion" placeholder="Explicacion de la rutina..." class="form-control input-md">{{$rutina->descripcion}}</textarea> 
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