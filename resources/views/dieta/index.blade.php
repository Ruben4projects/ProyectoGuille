@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

            <div class="sizeimg">
           
 	  <h1 class="text-center titulo">DIETAS</h1>
         <img class="img-fluid imgindexD" src="{{asset('/images/pollo1.jpg')}}"  > 
      
        </div>

<div class="container">
	<br><br>
	<div class="col-md-12">
		
	<form  action="{{ url('/filtrar-dietas') }}" method="GET" enctype="multipart/form-data" >
  <!-- {{ csrf_field() }} -->
  <div class="form-group col-md-4 ">
    <label for="exampleFormControlSelect1">tipo de dieta</label>
    <select class="form-control" name="tipo" id="tipo">
      <option value="Definicion">Definción</option>
      <option  value="Volumen">Volumen</option>
      >
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="exampleFormControlSelect1">ordenar por</label>
    <select class="form-control" name="order" id="order">
      <option value="puntuacion">Populares</option>
      <option value="asc">Mas antiguas primero</option>
      <option value="desc">Mas recientes primero</option>
    </select>
  </div>
  <div class="form-group col-md-4">
  	<br>
  	  <button type="submit" class="btn btn-primary form-control">Filtrar</button>
  </div>
</div>
  
	<hr> 
</form>
	
	
	
</div>
</div>

<div class="container">
	@if(isset($filtrado) && $registros>0)
	<h2>Dietas para {{$dieta->tipo}}</h2><hr><br>
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
			<div  id='recetas-list col-xs-12'>
				@foreach($dietas as $dieta)
				<div class="receta-item  col-sm-12 pull-left panel panel-default">
					<div class="panel-body col-xs-12">
										
						<div class="data col-xs-12 ">
							
								<div class="raw">
									<div class="col-md-12">
										<div class="pull-right">
										
										<b class="pull-right" style="font-size: 20px;"><i class="fas fa-balance-scale"></i> {{$dieta->tipo}}</b>
									</div>
										<a class="pull-left" href="">{{$dieta->user->nick}}</a><br>

										<h3 class="receta-title"><a href="{{ route('dieta', ['dieta_id' => $dieta->id])}}">{{$dieta->nombre}}</a></h3>

										
<hr>								</div>
								</div>
							
							<div class="raw">
								
							
								<div class="col-md-8">
									
								<p>{{$dieta->descripcion}}</p>
									
								</div>
								<div class="col-md-4 ">
									<div class="pull-right">
										
										<a href="{{route('dieta', ['dieta' => $dieta->id])}}" class="btn btn-success">Ver</a>
										
									</div>
								</div>

							</div>	
							
							
								
							
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-md-offset-1 col-md-10" >
				{{$dietas->links()}}
			</div>

		</div>
			
	</div>
		@endif
</div>

@endsection