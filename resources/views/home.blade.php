
@extends('layouts.app')


 <link href="{{ asset('css/indice.css') }}" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
<div class"margin"></div>
<!-------- don't use this html this only for margin top remove this ---------------------->

<div class="row">
<div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>   
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 1</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a href="http://hkmbhutto.wix.com/abdulrasheed"
          class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 2</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a href="http://hkmbhutto.wix.com/abdulrasheed" 
          class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Project name 3</h2>
          <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
          <a href="http://hkmbhutto.wix.com/abdulrasheed"
          class="slide__text-link">Project link</a>
        </div>
      </div>
    </div>
    

</div>
   </div>
</div>

<!------ Include the above in your HEAD tag ---------->
<div class="rutinas">
<div class="container">
                <h1 class="text-center titulos">RUTINAS</h1>
                <p class="home-paragraph text-center">Escoge tu rutina preferida acorde a tus objetivos, experiencia y tiempo.</p>
              <hr>  
            </div>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-4">
            <div class="sizeimg">
         <img class="img-fluid imgindex" src="{{asset('/images/fitness.jpg')}}"  >
        </div>
        </div>
        <?php 
            function cortar_string ($string) { 
               $marca = "<!--corte-->"; 
               $largo = 150; 

             
               if (strlen($string) > $largo) { 
                    
                   $string = wordwrap($string, $largo, $marca); 
                   $string = explode($marca, $string); 
                   $string = $string[0]; 
                   $string .= "...";
               } 
               return $string; 
             
            } ?>
               @foreach($rutinas as $rutina)
        <div class="col-xs-12 col-md-3">
            <br>
           <div class="panel panel-default receta-data borde ">
            <div class="panel-heading ">
                <div class="pull-right">
                    <b style="font-size: 22px;">{{$rutina->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b> 
                </div>
                <div class="panel-title">
                   {{$rutina->nombre}}
                   


                </div>
            </div>
            <div class="panel-body bodysize">

 
             {{cortar_string ($rutina->descripcion)}}<br> 
               
                <br>
                    </div>
                <div class="panel-footer">
                  <div class="pull-left"><span class="fas fa-calendar-alt"></span>&nbsp{{$rutina->dias}} dias</div>
                  <div class="pull-right"><span class="fas fa-transgender"></span> {{$rutina->sexo}}</div><br>
                  <div class="pull-left"> <i class="fas fa-balance-scale"></i>{{$rutina->tipo}}  </div>
                   <div class="pull-right"><i class="fas fa-signal pull-left"></i> {{$rutina->nivel}}</div><br>
                </div>
                
            
                
        
        </div>
        </div>
        @endforeach
        
        
    </div>
    <div class="pull-right">
            <a style="font-size: 20px;" href="{{ route('rutinaIndex')}}">Ver mas</a>
        </div>
</div>
</div>
<div class="recetas">
    <div class="container">
        <h1 class="text-center titulos">RECETAS</h1>
        <p class="home-paragraph text-center">Escoge tu receta preferida acorde a tus objetivos, experiencia y tiempo.</p>
      <hr> 

      <div class="row">
    
        <div class="col-sm-3">    
        
             <div class="sizeimg">
         <img class="img-fluid imgindex" src="{{asset('/images/receta1.jpeg')}}"  >
        </div>
    
        </div>
         @foreach($recetas as $receta)

        <div class="col-sm-3">      
        
            <div class="panel panel-default panel-front borde ">       
            
                <div class="panel-heading">
                
                    <h4 class="panel-title"><a href=""><img src="{{url('/miniatura/'.$receta->image)}}"  /></a></h4>
                    
                </div>
                
                <div class="panel-body borde">
                
                    <h4>{{$receta->nombre}}</h4>
                
                    Subido por <strong>{{$receta->user->name}}</strong> {{\FormatTime::LongTimeFilter($receta->created_at)}}


                <div class="text-right">
                    <a href="#" class="btn btn-info btn-sm"  role="button">Ver</a>
                </div>
                    
                </div>
            </div>      
        
        </div>

        
        @endforeach
        
    </div> 
    <div class="pull-right">
            <a style="font-size: 20px;" href="{{ route('indexNutricion')}}">Ver mas</a>
        </div>
    </div>


</div>

<div class="dietas">
<div class="container">
                <h1 class="text-center titulos">DIETAS</h1>
                <p class="home-paragraph text-center">Escoge tu dieta preferida acorde a tus objetivos, experiencia y tiempo.</p>
              <hr>  
            </div>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-md-3">
            <div class="sizeimg">
         <img class="img-fluid imgindex" src="{{asset('/images/dieta.jpg')}}"  >
        </div>
        </div>
               @foreach($dietas as $dieta)
        <div class="col-xs-12 col-md-3">
            <br>
           <div class="panel panel-default receta-data borde">
            <div class="panel-heading">
                <div class="pull-right">
                    <b style="font-size: 22px;">{{$dieta->puntuacion}}<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">   </span></b> 
                </div>
                <div class="panel-title">
                   {{$dieta->nombre}}
                </div>
            </div>
            <div class="panel-body bodysize">
             {{cortar_string ($dieta->descripcion)}}<br> 
                <br>
            
                
            </div>
        </div>
        </div>
        @endforeach
        
        
    </div>
    <div class="pull-right">
            <a style="font-size: 20px;" href="{{ route('dietaIndex')}}">Ver mas</a>
        </div>
</div>
</div>

    

<script type="text/javascript">
    
$(document).ready(function() {
  
  var $slider = $(".slider"),
      $slideBGs = $(".slide__bg"),
      diff = 0,
      curSlide = 0,
      numOfSlides = 2,
      animating = false,
      animTime = 500,
      autoSlideTimeout,
      autoSlideDelay = 6000,
      $pagination = $(".slider-pagi");
  
  function createBullets() {
    for (var i = 0; i < numOfSlides+1; i++) {
      var $li = $("<li class='slider-pagi__elem'></li>");
      $li.addClass("slider-pagi__elem-"+i).data("page", i);
      if (!i) $li.addClass("active");
      $pagination.append($li);
    }
  };
  
  createBullets();
  
  function manageControls() {
    $(".slider-control").removeClass("inactive");
    if (!curSlide) $(".slider-control.left").addClass("inactive");
    if (curSlide === numOfSlides) $(".slider-control.right").addClass("inactive");
  };
  
  function autoSlide() {
    autoSlideTimeout = setTimeout(function() {
      curSlide++;
      if (curSlide > numOfSlides) curSlide = 0;
      changeSlides();
    }, autoSlideDelay);
  };
  
  autoSlide();
  
  function changeSlides(instant) {
    if (!instant) {
      animating = true;
      manageControls();
      $slider.addClass("animating");
      $slider.css("top");
      $(".slide").removeClass("active");
      $(".slide-"+curSlide).addClass("active");
      setTimeout(function() {
        $slider.removeClass("animating");
        animating = false;
      }, animTime);
    }
    window.clearTimeout(autoSlideTimeout);
    $(".slider-pagi__elem").removeClass("active");
    $(".slider-pagi__elem-"+curSlide).addClass("active");
    $slider.css("transform", "translate3d("+ -curSlide*100 +"%,0,0)");
    $slideBGs.css("transform", "translate3d("+ curSlide*50 +"%,0,0)");
    diff = 0;
    autoSlide();
  }

  function navigateLeft() {
    if (animating) return;
    if (curSlide > 0) curSlide--;
    changeSlides();
  }

  function navigateRight() {
    if (animating) return;
    if (curSlide < numOfSlides) curSlide++;
    changeSlides();
  }

  $(document).on("mousedown touchstart", ".slider", function(e) {
    if (animating) return;
    window.clearTimeout(autoSlideTimeout);
    var startX = e.pageX || e.originalEvent.touches[0].pageX,
        winW = $(window).width();
    diff = 0;
    
    $(document).on("mousemove touchmove", function(e) {
      var x = e.pageX || e.originalEvent.touches[0].pageX;
      diff = (startX - x) / winW * 70;
      if ((!curSlide && diff < 0) || (curSlide === numOfSlides && diff > 0)) diff /= 2;
      $slider.css("transform", "translate3d("+ (-curSlide*100 - diff) +"%,0,0)");
      $slideBGs.css("transform", "translate3d("+ (curSlide*50 + diff/2) +"%,0,0)");
    });
  });
  
  $(document).on("mouseup touchend", function(e) {
    $(document).off("mousemove touchmove");
    if (animating) return;
    if (!diff) {
      changeSlides(true);
      return;
    }
    if (diff > -8 && diff < 8) {
      changeSlides();
      return;
    }
    if (diff <= -8) {
      navigateLeft();
    }
    if (diff >= 8) {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-control", function() {
    if ($(this).hasClass("left")) {
      navigateLeft();
    } else {
      navigateRight();
    }
  });
  
  $(document).on("click", ".slider-pagi__elem", function() {
    curSlide = $(this).data("page");
    changeSlides();
  });
  
});
</script>

@endsection
