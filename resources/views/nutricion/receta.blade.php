@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

<div class="container">
	<h2>{{$receta->nombre}}</h2>
	<hr/>
	<div class="col-md-10 col-md-offset-1">
		<div class="panel-body">
					@if(Storage::disk('images')->has($receta->image))
					<div class="detail-receta-image-thumb pull-left">
						<div class="detail-receta-image-mask">
							<img src="{{url('/miniatura/'.$receta->image)}}" class="detail-receta-image" />

						</div>
						
					</div>
					@endif
		</div>
		
	
</div>
</div>
<div class="container">
	<div class="col-md-offset-1 col-md-10">
		<div class="panel panel-success receta-data">
			<div class="panel-heading">
				<div class="pull-right">
					<b style="font-size: 22px;">{{$receta->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b> 
				</div>
				<div class="panel-title">
					Subido por <strong>{{$receta->user->name}}</strong> {{\FormatTime::LongTimeFilter($receta->created_at)}}
				</div>
			</div>
			<div class="panel-body">
				@if($receta->ingredientes)
					<h3>Ingredientes</h3>
					{{$receta->ingredientes}}
					<hr>
				@endif	
			
				<h3>Descripción</h3>
				{{$receta->descripcion}}
				}
			</div>
		</div>	
		@if(Auth::check())
		<a href="{{ route('likeReceta', ['receta_id' => $receta->id])}}" class="btn btn-primary">Me gusta  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
		@endif
		@include('nutricion.comments')
		
	</div>

</div>


@endsection