<br><br>
@if(session('likesms'))
				<div class="alert alert-danger">
					{{session('likesms')}}
				</div>
			@endif
@if(session('message'))
	<div class="alert alert-success">
		{{session('message')}}
	</div>
@endif
<hr>
<h2>Comentarios</h2>
<hr/>
@if(Auth::check())
<form class="col-md-12" method="POST" action="{{ route('saveCommentN')}}" >
 {{ csrf_field() }}	
	<input type="hidden" name="receta_id" value="{{$receta->id}}" required />
	<input type="hidden" name="receptor_id" value="{{$receta->user_id}}" required />

	<p>
		<textarea class="form-control" name="body" required>
			
		</textarea>
	</p>	
	<input type="submit" name="enviar" value="Comentar" class="btn btn-success">
</form>

<div class="clearfix"></div>
<br>

<hr>
@endif

@if(isset($receta->comments))
	<div id=comment-list>
		@foreach($receta->comments as $comment)
			<div class="comment-item col-xs-12 pull-left">
				<div class="panel panel-success comment-data">
					<div class="panel-heading">
						<div class="panel-title">
							<a href="#contestar{{$comment->id}}" role="button" class="pull-right" data-toggle="modal">Contestar</a>
							<div id="contestar{{$comment->id}}" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								            	<h3>Contestar a {{$comment->user->nick}}</h3>
								            </div>
								                <div class="modal-footer">
								            <form class="col-md-12" method="POST" action="{{ route('saveCommentN')}}" >
											 {{ csrf_field() }}	
												<input type="hidden" name="receta_id" value="{{$receta->id}}" required />
												<input type="hidden" name="receptor_id" value="{{$receta->user_id}}" required />

												<p><br>
													<textarea class="form-control" name="body" required>
														
													</textarea>
												</p>
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>	
												<input type="submit" name="enviar" value="Contestar" class="btn btn-primary">
											</form> 

																			            
								            
								                
								                
								               
								            </div>
								        </div>
								    </div>
								</div>

							<strong>{{$comment->user->nick}}</strong>
							@if($comment->user_id != $comment->receptor_id)
							para <strong>{{$comment->receptor->nick}}</strong>
							@endif
							 {{\FormatTime::LongTimeFilter($comment->created_at)}}
						</div>
					</div>
					<div class="panel-body">
						{{$comment->comentario}}

						@if(Auth::check() && (Auth::user()->id == $comment->user_id || Auth::user()->id == $receta->user_id))
							<div class="pull-right">
								<!-- Botón en HTML (lanza el modal en Bootstrap) -->
								<a href="#miModal{{$comment->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
							  
							<!-- Modal / Ventana / Overlay en HTML -->
								<div id="miModal{{$comment->id}}" class="modal fade">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <div class="modal-header">
								                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								                <h4 class="modal-title">¿Estás seguro?</h4>
								            </div>
								            <div class="modal-body">
								                <p>¿Seguro que quieres borrar el comentario?</p>
								                <p class="text-warning"><small> {{$comment->comentario}}</small></p>
								            </div>
								            <div class="modal-footer">
								                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								                
								                <a href="{{ url('/delete-commentn/'.$comment->id)}}" type="button" class="btn btn-danger">Eliminar</a>
								            </div>
								        </div>
								    </div>
								</div>
							</div>
						@endif
					</div>
				</div>	
			</div>
		@endforeach
	</div>
@endif


