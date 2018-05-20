
 

@extends('layouts.app')
@section('content')

	<div class="container">
		<form action="{{ url('/update-dieta', ['dieta_id' => $dieta->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
			<h1>Crear dieta</h1>
			{{!! csrf_field()  !!}}
<fieldset>
<!-- Form Name -->
<legend></legend>
		<div class="form-group">
		  <label class="col-md-3 control-label" for="nombre">Nombre de la dieta</label>  
		  <div class="col-md-8">
		  <input id="nombre" name="nombre" type="text" placeholder="Escriba el nombre aqui" class="form-control input-md" required="" value="{{$dieta->nombre}}">
		    
		  </div>
		</div>
		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="slots">Tipo de dieta</label>
		  <div class="col-md-8">
		    <select id="tipo" name="tipo" class="form-control">
		      @if($dieta->tipo == 'Definición')
		      <option selected="selected">Definición</option>
		      @else
		      <option>Definición</option>
		      @endif
		      @if($dieta->tipo == 'Volumen')
		      <option selected="selected">Volumen</option>
		      @else
		      <option>Volumen</option>
		      @endif
		    </select>
		  </div>
		</div>
		<div class="form-group">
			  <label class="col-md-3 control-label" for="descripcion">Descripción de la dieta</label>  
			  	<div class="col-md-8">
				  <textarea rows="2" cols="90" id="descripcion" name="descripcion" placeholder="" class="form-control input-md" maxlength="300">{{$dieta->descripcion}}</textarea> 
				</div>
		  </div>
		<!-- Text input-->
		<div class="form-group">
			  <label class="col-md-3 control-label" for="desayuno">Desayuno</label>  
			  	<div class="col-md-8">
				  <textarea rows="3" cols="90" id="desayuno" name="desayuno" placeholder="" class="form-control input-md">{{$dieta->desayuno}}</textarea> 
				</div>
		  </div>
		  <div class="form-group">
			  <label class="col-md-3 control-label" for="Almuerzo">Almuerzo</label>  
			  <div class="col-md-8">
			  	 <textarea rows="3" cols="50" id="almuerzo" name="almuerzo" placeholder="" class="form-control input-md">{{$dieta->almuerzo}}</textarea>
			  	</div>	    
		  </div>
		  <div class="form-group">
			  <label class="col-md-3 control-label" for="Comida">Comida</label>  
			  <div class="col-md-8">
			   <textarea rows="3" cols="50" id="comida" name="comida" placeholder="" class="form-control input-md">{{$dieta->comida}}</textarea>	
			  </div>    
		  </div>
		  <div class="form-group">
			  <label class="col-md-3 control-label" for="Merienda">Merienda</label>  
			  <div class="col-md-8">
			   <textarea rows="3" cols="50" id="merienda" name="merienda" placeholder="" class="form-control input-md">{{$dieta->merienda}}</textarea>
			  </div>	    
		  </div>
		  <div class="form-group">
			  <label class="col-md-3 control-label" for="Cena">Cena</label>  
			  <div class="col-md-8">
			   <textarea rows="3" cols="50" id="cena" name="cena" placeholder="" class="form-control input-md">{{$dieta->cena}}</textarea>
			  </div>	    
		  </div>
		  <div class="form-group">
			  <label class="col-md-3 control-label" for="Extra">Extra</label>  
			  <div class="col-md-8">
			   <textarea rows="3" cols="50" id="extra" name="extra" placeholder="" class="form-control input-md">{{$dieta->extra}}</textarea>	
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