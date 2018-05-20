@extends('layouts.app')

@section('content')

    <!-- Styles -->
   <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


    
</head>
<div>
            <div class="sizeimg">
           
 	  <h1 class="text-center titulo">RUTINAS</h1>
         <img class="img-fluid imgindex" src="{{asset('/images/gym.jpg')}}"  > 
       
        </div>
        </div>

<div class="container">
	<br><br><hr>
	<div class="col-md-12">
		
	<form  action="{{ url('/filtrar-rutinas') }}" method="GET" enctype="multipart/form-data" >
  <!-- {{ csrf_field() }} -->
  <div class="form-group col-md-2 col-md-offset-1">
    <label for="exampleFormControlSelect1">Numero de dias</label>
    <select class="form-control" name="dias" id="dias">
      <option>indiferente</option>
      <option>1 dia</option>
      <option>2 dias</option>
      <option>3 dias</option>
      <option>4 dias</option>
      <option>5 dias</option>
      <option>6 dias</option>
      <option>7 dias</option>
    </select>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleFormControlSelect1">Sexo</label>
    <select class="form-control" name="sexo" id="tipo">
      <option value="Hombre">Hombre</option>
      <option value="Mujer">Mujer</option>
    </select>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleFormControlSelect1">Tipo de rutina</label>
    <select class="form-control" name="tipo" id="tipo">
      <option value="Definicion">Definición</option>
      <option value="volumen">Volumen</option>
    </select>
  </div>
   <div class="form-group col-md-2">
    <label for="exampleFormControlSelect1">Dificultad</label>
    <select class="form-control" name="nivel" id="nivel">
      <option value="Principiante">Principiante</option>
      <option value="Medio">Medio</option>
      <option value="Experto">Experto</option>

    </select>
  </div>
  <div class="form-group col-md-2">
    <label for="exampleFormControlSelect1">ordenar por</label>
    <select class="form-control" name="order" id="order">
      <option value="puntuacion">Populares</option>
      <option value="asc">Mas antiguas primero</option>
      <option value="desc">Mas recientes primero</option>
    </select>
  </div>
  
  	<div class="col-md-10 col-md-offset-1">
	   <button type="submit"  class="btn btn-success colorB form-control">Filtrar</button>
  		
  	</div>
	  
	</div>
  
	<hr> 
</form>
	
	
	
</div>
</div>
<div class="container">
	<hr><br>
	
	@if(isset($filtrado) && $registros>0)
	
	<h2>Rutinas para {{$rutina->sexo}} para {{$rutina->tipo}}</h2><hr><br>

	@elseif(isset($filtrado))
	<h2>No hay resultados</h2>
	<hr><br>
	@endif
	
	@if($registros>0)
	<div class="row">
		<div class="container">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<div  id='recetas-list col-sm-12'>
				@foreach($rutinas as $rutina)
				<div style="background-color: rgb(250,250,250);" class="receta-item  col-sm-12 pull-left panel panel-default mipanel">
					<div class="panel-body col-md-12">
										
						<div class="data col-md-12 ">
							
								<div class="raw">
									<div class="col-md-12">
										<div class="pull-right">
										<a href="">{{$rutina->user->nick}}</a> &nbsp &nbsp &nbsp<b style="font-size: 20px;">{{$rutina->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b>
									</div>
										<h3 class="receta-title"><a href="">{{$rutina->nombre}}</a></h3>

										
<hr>								</div>
								</div>
							
							<div class="raw">
								
							
								<div class="col-md-8">
									
								<i class="far fa-calendar-alt"></i> {{$rutina->dias}} dias, <span class="fas fa-transgender"></span> {{$rutina->sexo}} <i class="fas fa-balance-scale"></i> {{$rutina->tipo}} <i class="fas fa-signal"></i> {{$rutina->nivel}}
									
								</div>
								<div class="col-md-4 ">
									<div class="pull-right">
										
										<a href="{{route('rutina', ['rutina' => $rutina->id])}}" class="btn btn-success colorB" >Ver</a>
										
									</div>
								</div>
							</div>	
							
								
							
								
							
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-md-offset-1 col-md-10" >
				{{$rutinas->links()}}
			</div>

		</div>
			
	</div>
	
	@endif
	
</div>

@endsection