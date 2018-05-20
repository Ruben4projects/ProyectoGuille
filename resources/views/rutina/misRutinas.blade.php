@extends('layouts.app')


@section('content')
@include('user.bar')
    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>	

<div class="col-md-9">
		
	@if(isset($filtrado) && $registros>0)
	<h2>Rutinas para {{$rutina->sexo}} de {{$rutina->dias}} dias para {{$rutina->tipo}}</h2><hr><br>
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
			<div  id='recetas-list col-sm-9'>
				@foreach($rutinas as $rutina)
				<div class="receta-item  col-md-9 pull-left panel panel-default">
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
											                
											                <a href="{{route('rutinaDelete', ['rutina' => $rutina->id])}}" type="button" class="btn btn-danger">Eliminar</a>
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
			<div class="col-md-offset-1 col-md-10" >
				{{$rutinas->links()}}
			</div>

		</div>
			
	</div>
	
	@endif
	</div>
</div>
</div>
</div>
</div>
@endsection

