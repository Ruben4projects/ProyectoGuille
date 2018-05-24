<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

     <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

 
</head>
<body>
   
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="#" >GAINS4U</a>
                    

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          
                    <ul class="nav navbar-nav navbar-right">
                        <form class="navbar-form navbar-left" role="search" action="{{ route('buscar')}}">
                        <div class="form-group">
                            <input type="text " class="form-control ancho"  placeholder="Que quieres ver?" name="search"/>
                        </div>
                            <button type="submit" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-search"></span></button>
                      
                    </form>
                        <li><a href="{{ route('home')}} ">Home</a></li>
                        @if(Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Rutinas <b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <li>
                                    
                                     <a href="{{ route('crearRutina') }}"> Crear rutina </a>
                                </li>
                                <li><a href="{{ route('rutinaIndex')}}">Todas las rutinas</a></li>
                                
                                                      
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dietas <b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <li>
                                     <a href="{{ route('crearDieta') }}"> Crear dieta </a>
                                     
                                </li>
                                <li><a href="{{ route('dietaIndex')}}">Todas las dietas</a>
                                                        
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nutrición <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                 <li>
                                     <a href="{{ route('crearReceta') }}"> Crear receta </a>
                                </li>
                                <li><a href="{{ route('indexNutricion')}}">Todas las recetas</a></li>
                                                                        
                            </ul>
                        </li>
                        @else
                        <li><a href="{{ route('rutinaIndex')}} ">Rutinas</a></li>
                        <li><a href="{{ route('dietaIndex')}} ">Dietas</a></li>
                        <li><a href="{{ route('indexNutricion')}} ">Nutricion</a></li>

                        @endif

                         @if (Auth::guest())
                        }
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrar <b class="caret"></b></a> 

                           
                                 <ul class="dropdown-menu">
                                <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
                                <li><a href="{{ route('register') }}">Registrarse</a></li>
                                 </ul>
                            @else
                                <li class="dropdown">
                                   
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="label label-info ">
                                        {{$contsms}}</span> <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                         <li><a href="{{ route('userIndex') }}">Mi perfil <span class="label label-info ">
                                         {{$contsms}}</span></a></li>
                                         
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-collapse -->
        </nav>

        @yield('content')   

    <footer>
    <div class="espacio"></div>
    <div class="navbar navbar-default navbar-fixed-bottom footer">
        <div class="container">
            <h4 class="navbar-text pull-left">© 2018, Guillermo Viejo Hernandez, Todos los derechos reservados  </h4>
        </div>
    </div> 
    </footer> 
   
    


    <!-- Scripts -->
      
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->

   


</body>

</html>

