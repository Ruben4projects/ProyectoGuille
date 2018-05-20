@extends('layouts.app')

@section('content')

    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">



<div class="container">
	<h1>Resultados de {{$tipo}}s con {{$search}}</h1>
<hr>
	<div class="row">
		<div class="container">
			@if(session('message'))
				<div class="alert alert-success">
					{{session('message')}}
				</div>
			@endif
			
			@if($tipo == 'receta')
				<div  id='recetas-list col-xs-12'>
					@foreach($resultados as $resultado)
						<div class="receta-item  col-sm-12 pull-left panel panel-default">
							<div class="panel-body col-xs-12">
								@if(Storage::disk('images')->has($resultado->image))
								<div class="receta-image-thumb col-xs-6 col-sm-3 pull-left">
									<div class="receta-image-mask col-xs-12">
										<img src="{{url('/miniatura/'.$resultado->image)}}" class="receta-image" />
									</div>		
								</div>
								@endif
								<div class="data col-xs-12 col-sm-9">
									<div class="col-xs-12">
										<h3 class="receta-title"><a href="{{ route('receta', ['receta_id' => $resultado->id])}}">{{$resultado->nombre}}</a></h3>
										<p>{{$resultado->user->nick}}</p>
									</div>
							
									<div class="col-xs-12">
								
										<a href="{{route('receta', ['receta_id' => $resultado->id])}}" class="btn btn-success">Ver</a>
										@if(Auth::check() && Auth::user()->id == $resultado->user->id)
											<a href="{{route('recetaEdit', ['receta_id' => $resultado->id])}}" class="btn btn-warning">Editar</a>
											<a href="#miModal{{$resultado->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>  
										<!-- Modal / Ventana / Overlay en HTML -->
											<div id="miModal{{$resultado->id}}" class="modal fade">
											    <div class="modal-dialog">
											        <div class="modal-content">
											            <div class="modal-header">
											                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											                <h4 class="modal-title">¿Estás seguro?</h4>
											            </div>
											            <div class="modal-body">
											                <p>¿Seguro que quieres borrar esta receta?</p>
											                <p class="text-warning"><small> {{$resultado->nombre}}</small></p>
											            </div>
											            <div class="modal-footer">
											                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
											                
											                <a href="{{ url('/delete-receta/'.$resultado->id)}}" type="button" class="btn btn-danger">Eliminar</a>
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
			@else
				<div  id='recetas-list col-xs-12'>
					@foreach($resultados as $resultado)

						<div class="receta-item  col-sm-12 pull-left panel panel-default">
							<div class="panel-body col-xs-12">		
								<div class="data col-xs-12 ">
									<div class="raw">
										<div class="col-md-12">
											<div class="pull-right">
												<a href="">{{$resultado->user->nick}}</a>
											</div>
											<h3 class="receta-title"><a href="{{ route($tipo, ['resultado_id' => $resultado->id])}}">{{$resultado->nombre}}</a></h3>
											<hr>								
										</div>
									</div>
									<div class="raw">	
										<div class="col-md-8">
											<p>{{$resultado->descripcion}}</p>
										</div>
										<div class="col-md-4 ">
											<div class="pull-right">
												<a href="{{route($tipo, [$tipo => $resultado->id])}}" class="btn btn-success">Ver</a>
												@if(Auth::check() && Auth::user()->id == $resultado->user->id)
													<a href="{{route($tipo.'Edit', ['resultado' => $resultado->id])}}" class="btn btn-warning">Editar</a>
													<a href="#miModal{{$resultado->id}}" role="button" class="btn btn-primary" data-toggle="modal">Eliminar</a>		  
													<!-- Modal / Ventana / Overlay en HTML -->
													<div id="miModal{{$resultado->id}}" class="modal fade">
													    <div class="modal-dialog">
													        <div class="modal-content">
													            <div class="modal-header">
													                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													                <h4 class="modal-title">¿Estás seguro?</h4>
													            </div>
													            <div class="modal-body">
													                <p>¿Seguro que quieres borrar esta {{$tipo}}?</p>
													                <p class="text-warning"><small> {{$resultado->nombre}}</small></p>
													            </div>
													            <div class="modal-footer">
													                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													                
													                <a href="{{ url('/delete-'.$tipo.'/'.$resultado->id)}}" type="button" class="btn btn-danger">Eliminar</a>
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
					@endforeach	
				</div>
			
				@endif
		</div>
			
	</div>

	@endsection