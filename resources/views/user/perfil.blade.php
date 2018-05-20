@extends('layouts.app')


@section('content')
@include('user.bar')

<div class=" col-md-9">
     <div class="col-md-offset-1">      
   <div class="panel panel-primary">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> <img alt="User Pic" src="{{url('/foto/'.$user->image)}}"   id="profile-image1" class="img-circle img-responsive"> 
               
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h4 style="color:#00b1b1;">{{$user->name}} {{$user->surname}} </h4></span>
              <span><p>{{$user->nick}}</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >Nombre</div><div class="col-sm-7 col-xs-6 ">{{$user->name}}</div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Apellidos</div><div class="col-sm-7">{{$user->surname}}</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nombre de usuario:</div><div class="col-sm-7"> {{$user->nick}}</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
<div class="col-sm-5 col-xs-6 tital " >Creado</div><div class="col-sm-7"> {{$user->created_at}}</div>
  <div class="clearfix"></div>
<div class="bot-border"></div>
@if(Auth::check() && Auth::user()->id == $user->id)
<div class="col-sm-5 col-xs-6 tital " >Correo electronico</div><div class="col-sm-7">{{$user->email}}</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Rol</div><div class="col-sm-7">{{$user->role}}</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>
@endif

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
    </div>
    </div> 
  </div>
</div>

@endsection

<script type="text/javascript">
       $(function() {
  
  // elementos de la lista
  var menues = $(".nav li"); 

  // manejador de click sobre todos los elementos
  menues.click(function() {
     // eliminamos active de todos los elementos
     menues.removeClass("active");
     // activamos el elemento clicado.
     $('perfil').addClass("active");
  });

});
   </script>