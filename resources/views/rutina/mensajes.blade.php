@extends('layouts.app')


@section('content')
@include('user.bar')

<div class=" col-md-9">

<div class="container">
    <div class="col-md-9">
        <div class="panel panel-default widget">
            <div class="panel-heading">
            	 <span class="label label-info pull-right">
                    {{$contrsms}}</span>
                     <h3 class="panel-title">
                <span class="glyphicon glyphicon-comment "></span>
               
                    Comentarios recientes</h3>
               
            </div>
            <div class="panel-body">
                <ul class="list-group">
                	@foreach($mensajes as $mensaje)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-10 col-md-11">
                                <div>
                                	
                                    <a href="{{ route('rutina', ['rutina_id' => $mensaje->rutina_id])}}">
                                    
                                     Rutina: {{$mensaje->rutina->nombre}}  </a>
                                    <div class="mic-info">
                                        Por: <a href="#">{{$mensaje->user->nick}}</a> {{\FormatTime::LongTimeFilter($mensaje->created_at)}}
                                    </div>
                                </div>
                                <div class="comment-text">
                                   Mensaje: {{$mensaje->comentario}}
                                </div>
                                <div class="action">
                                    
                                    <a href="{{ route('leidoRutina', ['comment_id' => $mensaje->id])}}" type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </a>
                                   
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                   @endforeach
                </ul>
               	{{$mensajes->links()}}
            </div>
        </div>
    </div>
</div>

</div>

@endsection
