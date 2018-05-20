@extends('layouts.app')

@section('content')
@include('user.bar')
    <!-- Styles -->
 <link href="{{ asset('css/nutricion.css') }}" rel="stylesheet">
   
    
</head>

<div class="col-md-9">

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
									    <a href="">{{$dieta->user->nick}}</a>
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
				@endforeach
			</div>
			<div class="col-md-offset-1 col-md-10" >
				{{$dietas->links()}}
			</div>

		</div>
			
	</div>
	
</div>

@endsection