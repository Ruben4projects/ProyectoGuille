@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

<div class="container">
	<h2>{{$rutina->nombre}}</h2>
	<hr/>
	
		
	
</div>
</div>
<div class="container">
	<div class="col-md-offset-1 col-md-10">
		<div class="panel panel-success receta-data">
			<div class="panel-heading">
				<div class="pull-right">
					<b style="font-size: 22px;">{{$rutina->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b> 
				</div>

				<div class="panel-title">
					Subida por <strong>{{$rutina->user->name}}</strong> {{\FormatTime::LongTimeFilter($rutina->created_at)}}
				</div>
			</div>
			<div class="panel-body">
				<?php $valor=0; $valor2=0; ?>
				@foreach($rutinas as $rutine)

				@if($valor2==0 || $valor2 != $rutine->dia)
				<hr>
					<h2>Dia {{$rutine->dia}}</h2><hr>
					<?php $valor2 = $rutine->dia ?>
				@endif	

				@if($valor==0 || $valor != $rutine->musculo_id)
					<h3>{{$rutine->musculo->nombre}}</h3>
					
					<?php $valor = $rutine->musculo_id?>

				@endif

				<h4>{{$rutine->ejercicio}} : {{$rutine->cantidad}} repeticiones.</h4>
					
					
					
				@endforeach
			</div>
		</div>	
		@if(Auth::check())
		<a href="{{ route('likeRutina', ['rutina_id' => $rutina->id])}}" class="btn btn-primary">Me gusta  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
		@endif
		@include('rutina.comments');
		
	</div>

</div>


@endsection