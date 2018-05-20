@extends('layouts.app')


@section('content')
<div class="container">
    <div class="panel panel-primary">
  <div class="panel-heading">  <h4 >Contactar</h4></div>
   <div class="panel-body">
    <form action="{{ url('/enviarmsn') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
           
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Escribe tu nombre" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Tu correo electronico</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Escribe tu email" required="required" /></div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Escribe aqui tu mensaje..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Enviar mensaje</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection