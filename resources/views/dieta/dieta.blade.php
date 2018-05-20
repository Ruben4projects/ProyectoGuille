@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

<div class="container">
	<h2>{{$dieta->nombre}}</h2>
	<hr/>
	
		
	
</div>
</div>
<div class="container">
	<div class="col-md-offset-1 col-md-10">
		<div class="panel panel-success receta-data">
			<div class="panel-heading">
				<div class="pull-right">
					<b style="font-size: 22px;">{{$dieta->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b> 
				</div>
				<div class="panel-title">

					Subida por <strong>{{$dieta->user->name}}</strong> {{\FormatTime::LongTimeFilter($dieta->created_at)}}
				</div>
			</div>
			<div class="panel-body">
				<h3>Desayuno</h3>

				@if($dieta->desayuno)
					{{$dieta->desayuno}}
					<hr>
				@else
					No hay desayuno.
					<hr>
				@endif	
				<h3>Almuerzo</h3>
				@if($dieta->almuerzo)
					
					{{$dieta->almuerzo}}
					<hr>
				@else
					No hay almuerzo.
					<hr>
				@endif	
				<h3>Comida</h3>
				@if($dieta->comida)
					
					{{$dieta->comida}}
					<hr>
				@else
					No hay comida.
					<hr>
				@endif	
				<h3>Merienda</h3>
				@if($dieta->merienda)
					{{$dieta->merienda}}
					<hr>
				@else
					No hay merienda
					<hr>
				@endif

				<h3>Cena</h3>
				@if($dieta->cena)
					{{$dieta->cena}}
					<hr>
				@else
					No hay cena.
					<hr>
				@endif	
				@if($dieta->extra)
					<h3>Extra</h3>
					{{$dieta->extra}}
					<hr>
				@endif		
			</div>
		</div>	
		@if(Auth::check())
		<a href="{{ route('likeDieta', ['dieta_id' => $dieta->id])}}" class="btn btn-primary">Me gusta  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
		@endif
		
		
		@include('dieta.comments')
		
	</div>

</div>


@endsection