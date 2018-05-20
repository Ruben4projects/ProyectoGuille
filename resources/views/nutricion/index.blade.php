@extends('layouts.app')
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">

@section('content')

    <!-- Styles -->
   
    
</head>
<div class="sizeimg">
           
 	  <h1 class="text-center titulo">NUTRICIÓN</h1>
         <img class="img-fluid imgindexN" src="{{asset('/images/receta1.jpeg')}}"  > 
      
        </div>
<div class="container">
<br><br>
	<div class="col-md-12">
		
	<form  action="{{ url('/filtrar-recetas') }}" method="GET" enctype="multipart/form-data" >
  <!-- {{ csrf_field() }} -->
  <div class="form-group col-md-4 ">
    <label for="exampleFormControlSelect1">tipo de receta</label>
    <select class="form-control" name="tipo" id="tipo">
      <option>Desayuno</option>
      <option>Postre</option>
      <option>Aperitivo</option>
      <option>Curiosidad</option>
      <option>Especial</option>
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
	<h2>{{$receta->tipo}}</h2><hr><br>
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
				@foreach($recetas as $receta)
				<div class="receta-item  col-sm-12 pull-left panel panel-default">
					<div class="panel-body col-xs-12">
					@if(Storage::disk('images')->has($receta->image))
					<div class="receta-image-thumb col-xs-6 col-sm-3 pull-left">
						<div class="receta-image-mask col-xs-12">
							<img src="{{url('/miniatura/'.$receta->image)}}" class="receta-image" />

						</div>
						
					</div>
					@endif
					
					<div class="data col-xs-12 col-sm-9">
						<div class="col-xs-12">
						<h3 class="receta-title"><a href="{{ route('receta', ['receta_id' => $receta->id])}}">{{$receta->nombre}}</a></h3>
						<p>{{$receta->user->name.' '.$receta->user->surname}}</p>
						</div>
					
					<div class="col-xs-12">
						
					<a href="{{route('receta', ['receta_id' => $receta->id])}}" class="btn btn-success">Ver</a>

					</div>
</div>
				</div>
				</div>
				@endforeach
			</div>
			<div class="col-md-offset-1 col-md-10" >
				{{$recetas->links()}}
			</div>

		</div>
			
	</div>
	@endif
</div>

@endsection