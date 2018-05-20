@extends('layouts.app')

@section('content')
@include('user.bar')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

	
		<div class="col-md-9">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<div  id='recetas-list col-md-9'>
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
					
					<div class="data col-xs-12 col-sm-offset-2 col-sm-6">
						<div class="col-xs-12">
						<h3 class="receta-title"><a href="{{ route('receta', ['receta_id' => $receta->id])}}">{{$receta->nombre}}</a></h3>
						<p>{{$receta->user->name.' '.$receta->user->surname}}</p>
						</div>
					
					<div class="col-xs-12">
						
					<a href="{{route('receta', ['receta_id' => $receta->id])}}" class="btn btn-success">Ver</a>
					@if(Auth::check() && Auth::user()->id == $receta->user->id)
					<a href="{{route('recetaEdit', ['receta_id' => $receta->id])}}" class="btn btn-warning">Editar</a>
					
								<a href="#miModal{{$receta->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>
							  
							<!-- Modal / Ventana / Overlay en HTML -->
								<div id="miModal{{$receta->id}}" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">¿Estás seguro?</h4>
								            </div>
								            <div class="modal-body">
								                <p>¿Seguro que quieres borrar esta receta?</p>
								                <p class="text-warning"><small> {{$receta->nombre}}</small></p>
								            </div>
								            <div class="modal-footer">
								                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								                
								                <a href="{{ url('/delete-receta/'.$receta->id)}}" type="button" class="btn btn-danger">Eliminar</a>
								            </div>
								        </div>
								    </div>
								</div>

						@endif
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
	


@endsection