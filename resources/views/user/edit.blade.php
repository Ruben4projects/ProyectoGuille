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
            <h4 style="color:#00b1b1;">{{$user->name}} {{$user->surname}}</h4></span>
              <span><p>Usuario: {{$user->nick}}</p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
      <form action="{{ url('/actualizar-user') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
      
      {{ csrf_field() }}
                
             
<div class="form-group">
      <label class="col-md-3 control-label" for="name">Nombre </label>  
      <div class="col-md-8">
      <input id="name" name="name" type="text" value="{{$user->name}}" placeholder="" class="form-control input-md" required="">
        
      </div>
    </div><hr>
    <div class="form-group">
      <label class="col-md-3 control-label" for="surname">Apellidos </label>  
      <div class="col-md-8">
      <input id="surname" name="surname" type="text" value="{{$user->surname}}" placeholder="" class="form-control input-md" required="">
        
      </div>
    </div><hr>
    <div class="form-group">
      <label class="col-md-3 control-label" for="nick">Nombre de usuario </label>  
      <div class="col-md-8">
      <input id="nick" name="nick" type="text" value="{{$user->nick}}" placeholder="" class="form-control input-md" required="">
         @if ($errors->has('nick'))
            <span class="help-block">
                <strong>{{ $errors->first('nick') }}</strong>
            </span>
        @endif
      </div>
    </div><hr>
    <div class="form-group">
      <label class="col-md-3 control-label" for="email">email </label>  
      <div class="col-md-8">
      <input id="email" name="email" type="email" value="{{$user->email}}" placeholder="" class="form-control input-md" required="">
         @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div><hr>
    <div class="form-group">
      <label class="col-md-3 control-label" for="image">Imagen de perfil </label>  
      <div class="col-md-8">
      <input id="image" name="image" type="file" value="{{$user->image}}" placeholder="" class="form-control input-md" >
        
      </div>
    </div><hr>
    <div class="form-group">
    <label class="col-md-4 control-label" for="enviar"></label>
    <div class="col-md-4">
      <button type="submit" id="actualizar" name="Actualizar" class="btn btn-success">Actualizar</button>
    </div>
  </div>


 </form>
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
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank">KeenThemes</a></strong>
</center>
<br>
<br>
 
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