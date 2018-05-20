@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">



<div class="container">
	<h1>Resultados de rutinas con {{$search}}</h1>
<hr>
	<div class="row">
		<div class="container">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<div  id='recetas-list col-xs-12'>
				<?php $i=0; ?>

				@foreach($rutinas as $rutina)
				@if($i<2)

				<div class="receta-item  col-sm-12 pull-left panel panel-default">
					<div class="panel-body col-xs-12">
										
						<div class="data col-xs-12 ">
							
								<div class="raw">
									<div class="col-md-12">
										<div class="pull-right">
										<a href="">{{$rutina->user->name.' '.$rutina->user->surname}}</a>
									</div>
										<h3 class="receta-title"><a href="{{ route('rutina', ['rutina_id' => $rutina->id])}}">{{$rutina->nombre}}</a></h3>

										
<hr>								</div>
								</div>
							
							<div class="raw">
								
							
								<div class="col-md-8">
									
								<p>{{$rutina->descripcion}}</p>
									
								</div>
								<div class="col-md-4 ">
									<div class="pull-right">
										
										<a href="{{route('rutina', ['rutina' => $rutina->id])}}" class="btn btn-success">Ver</a>
										@if(Auth::check() && Auth::user()->id == $rutina->user->id)
											<a href="{{route('rutinaEdit', ['rutina' => $rutina->id])}}" class="btn btn-warning">Editar</a>
											<a href="#miModal{{$rutina->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>		  
											<!-- Modal / Ventana / Overlay en HTML -->
											<div id="miModal{{$rutina->id}}" class="modal fade">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											                <h4 class="modal-title">¿Estás seguro?</h4>
											            </div>
											            <div class="modal-body">
											                <p>¿Seguro que quieres borrar esta rutina?</p>
											                <p class="text-warning"><small> {{$rutina->nombre}}</small></p>
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                
											                <a href="{{ url('/delete-rutina/'.$rutina->id)}}" type="button" class="btn btn-danger">Eliminar</a>
											            </div>
											        </div>
											    </div>
											</div>
										@endif
									</div>
								</div>
							</div>	
							
								
							
								
							
						</div>
					</div>
				</div>
				<?php $i++; ?>
				@else
				@break
				@endif
				@endforeach
			</div>
			<a style="font-size: 25px;" class="pull-right" href="{{ url('/search-mas/'.$search.'/rutina')}}"> ver mas</a>

		</div>
			
	</div>
	
</div>




<div class="container">
	<h1>Resultados de recetas con {{$search}}</h1>
<hr>
	<div class="row">
		<div class="container">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<div  id='recetas-list col-xs-12'>
				<?php $i=0; ?>

				@foreach($recetas as $receta)
				@if($i<2)
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
					<?php $i++; ?>
				@else
				@break
				@endif
				@endforeach
			</div>
			<a style="font-size: 25px;" class="pull-right" href="{{ url('/search-mas/'.$search.'/receta')}}"> ver mas</a>

		</div>
			
	</div>
	
</div>   


<div class="container">
	<h1>Resultados de dietas con {{$search}}</h1>
<hr>
	<div class="row">
		<div class="container">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			<div  id='recetas-list col-xs-12'>
				<?php $i=0; ?>

				@foreach($dietas as $dieta)
				@if($i<2)				<div class="receta-item  col-sm-12 pull-left panel panel-default">
					<div class="panel-body col-xs-12">
										
						<div class="data col-xs-12 ">
							
								<div class="raw">
									<div class="col-md-12">
										<div class="pull-right">
										<a href="">{{$dieta->user->name.' '.$dieta->user->surname}}</a>
									</div>
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
										@if(Auth::check() && Auth::user()->id == $dieta->user->id)
											<a href="{{route('dietaEdit', ['dieta' => $dieta->id])}}" class="btn btn-warning">Editar</a>
											<a href="#miModal{{$dieta->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>		  
											<!-- Modal / Ventana / Overlay en HTML -->
											<div id="miModal{{$dieta->id}}" class="modal fade">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											                <h4 class="modal-title">¿Estás seguro?</h4>
											            </div>
											            <div class="modal-body">
											                <p>¿Seguro que quieres borrar esta dieta?</p>
											                <p class="text-warning"><small> {{$dieta->nombre}}</small></p>
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                
											                <a href="{{ url('/delete-dieta/'.$dieta->id)}}" type="button" class="btn btn-danger">Eliminar</a>
											            </div>
											        </div>
											    </div>
											</div>
										@endif
									</div>
								</div>
							</div>	
							
								
							
								
							
						</div>
					</div>
				</div>
					<?php $i++; ?>
				@else
				@break
				@endif
				@endforeach
			</div>
			<a style="font-size: 25px;" class="pull-right" href="{{ url('/search-mas/'.$search.'/dieta')}}"> ver mas</a>

		</div>
			
	</div>
	
</div>



@endsection