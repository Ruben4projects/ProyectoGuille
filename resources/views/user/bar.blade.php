

 <link href="{{ asset('css/user.css') }}" rel="stylesheet">

 <div class="container">
    <div class="row profile">
    <div class=" col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
                            
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="panel panel-primary">
        <div class="panel-heading">
       <h4>Mi perfil</h4>
               </div>
        <div class="panel-body" class="profile-usertitle">
         <div  align="center"> <img alt="User Pic" src="{{url('/foto/'.$user->image)}}"   id="profile-image1" class="img-circle img-responsive"> 
               
                     </div>
          

        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
          <h3 class="text-primary">{{$user->nick}}</h3>
          <h3 class="text-primary">{{$user->name}}{{$user->surname}}</h3>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        
        <div class="profile-usermenu">
          
          <ul class="nav">
            <li class="perfil">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                            </span>Perfil</a> 
            </li>
            <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="{{ route('userIndex')}}">Mi usuario</a>
                                    </td>
                                </tr>
                                 <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a href="{{ route('userEdit')}}">Editar usuario</a>
                                    </td>
                                </tr>

                               
                            </table>
                        </div>
                        
                               
                               
                            
                    </div>
            <li class="rutina">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Rutinas <span class="label label-info ">
                    {{$contrsms}}</span></a>
            </li>
            <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{ route('misRutinas')}}">Mis rutinas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{route('likeRutinas', ['user_id' => Auth::user()->id])}}">Rutinas favoritas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('mensajesRutina')}}">Comentarios <span class="label label-info ">
                    {{$contrsms}}</span></a>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>

            <li class="dieta">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Dietas<span class="label label-info ">
                    {{$contdsms}}</span></a>
            </li>
            <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="{{ route('misDietas')}}">Mis dietas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://www.jquery2dotnet.com">Dietas favoritas</a> <span class="label label-info">5</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('mensajesDieta')}}">Comentarios<span class="label label-info ">
                    {{$contdsms}}</span></a>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
            <li class="receta">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Nutrición<span class="label label-info ">
                    {{$contnsms}}</span></a>
            </li>
            <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-usd"></span><a href="{{ route('misRecetas')}}">Mis recetas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Recetas favoritas</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks"></span><a href="{{ route('mensajesReceta')}}">Comentarios<span class="label label-info ">
                    {{$contnsms}}</span></a>
                                    </td>
                                </tr>        
                            </table>
                        </div>
                    </div>

            @if(Auth::check() && Auth::user()->role == 'admin')                  
                <li class="receta">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-file">
                            </span>Administrador</a>
            </li>
            <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-usd"></span><a href="{{ route('usuarios')}}">Usuarios</a>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-tasks"></span><a href="{{ route('allRutinas')}}">Rutinas</a>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span><a href="{{ route('allRecetas')}}">Recetas</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="glyphicon glyphicon-user"></span><a href="{{ route('allDietas')}}">Dietas</a>
                                        </td>
                                    </tr>      
                                </table>
                            </div>
                        </div>

                  @endif  
          </ul>
        </div>
        
        <!-- END MENU -->
      </div>
    </div>
  </div>
   