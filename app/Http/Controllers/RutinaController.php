<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use App\Rutina;
use App\Ejercicio;
use App\Musculo;
use App\Nutricion;
use App\RutinaMusculo;
use App\Commentrutina;
use App\Dieta;
use App\likerutina;

class RutinaController extends Controller
{
    //
    public function crearRutina(){

    	return view('rutina.crearRutina');
    }

    public function search($search = null){

        
            $search = \Request::get('search');
        

        $resultR = Rutina::where('nombre','LIKE','%'.$search.'%')->get();
        $resultN = Nutricion::where('nombre','LIKE','%'.$search.'%')->get();
        $resultD = Dieta::where('nombre','LIKE','%'.$search.'%')->get(); 

        return view('rutina.search',array(
            'rutinas' => $resultR,
            'recetas' =>$resultN,
            'dietas' => $resultD,
            'search' => $search
        )); 
    }

    public function saveRutina(Request $request){
    	//Validar formulario

        
    	$validateData = $this->validate($request, [
    		'nombre' =>'required']);
    	
    	 $rutina = new Rutina();
    	 $user = \Auth::user();
    	 $rutina->user_id = $user->id;
    	 $rutina->nombre = $request->input('nombre');
    	 $rutina->tipo = $request->input('tipo');
    	 $rutina->sexo = $request->input('sexo');
    	 $rutina->descripcion = $request->input('descripcion');
    	 $rutina->nivel = $request->input('nivel');
    	 $rutina->dias = $request->input('dias');

    	
        $musculos = Musculo::get();
    	// $rutinas = Rutina::get();
       
		

    	return view('rutina.crearEjercicios',array(

            // 'rutinas' => $rutinas,
            'musculos' => $musculos,
            'rutina' => $rutina
         ));
    	 					
    	 					
    	 	


    }

    public function saveRutina2(Request $request){
    // $rutina = request()->input('rutina');
        $rutina = new Rutina();
        $rutina->user_id = $request->input('rutina.user_id');
         $rutina->nombre = $request->input('rutina.nombre');
         $rutina->tipo = $request->input('rutina.tipo');
         $rutina->sexo = $request->input('rutina.sexo');
         $rutina->descripcion = $request->input('rutina.descripcion');
         $rutina->nivel = $request->input('rutina.nivel');
         $rutina->dias = $request->input('rutina.dias');

     $rutina->save();
        $idRutina = $rutina->id;
        $dias = request()->input('jsonDias');
        $ejercicios = request()->input('jsonEjercicio');
        $musculos = request()->input('jsonMusculos');
        $cantidad = request()->input('jsonCantidad');

        $ejer = json_decode($ejercicios);   
        $musc = json_decode($musculos); 
        $cant = json_decode($cantidad); 
        $dia = json_decode($dias);

         $length= count($ejer);
       
         for ($i=0; $i <$length; $i++) { 

            $rutinaMusculo = new RutinaMusculo();
            $id = Musculo::where('nombre',$musc[$i])->first();
            
            $rutinaMusculo->dia = $dia[$i];
            $rutinaMusculo->musculo_id = $id->id;
            $rutinaMusculo->rutina_id = $idRutina;
            $rutinaMusculo->ejercicio =$ejer[$i];
            $rutinaMusculo->cantidad = $cant[$i];
            $rutinaMusculo->save();

            }       

    
    
        return response()->json('exito');

          }

          public function index(){
           
            $rutinas = Rutina::orderBy('id','desc')->paginate(5);
            $registros = 1;
                return view('rutina.index',array(
                    'rutinas'=> $rutinas,
                    'registros' => $registros
                ));
          }

         

          public function getRutina($rutina_id){
          $rutinas = RutinaMusculo::where('rutina_id',$rutina_id)->orderBy('dia','asc')->get();
          $rutina = Rutina::where('id',$rutina_id)->first();
        return view('rutina.rutina',array('rutinas'=>$rutinas, 'rutina' => $rutina));
    }


    public function editOne($rutina_id){

         $user = \Auth::user();
        $rutina = Rutina::findOrFail($rutina_id);
        if($user && $rutina->user_id == $user->id){

            
            return view('rutina.editar',array('rutina' => $rutina));

        }else{
            $message = 'No se ha podido acceder a edicion.';
            return redirect()->route('home')->with($message);
        }
    }

    public function editTwo($rutina_id, Request $request){
        $user = \Auth::user();
        $rutina = Rutina::findOrFail($rutina_id);
         $user = \Auth::user();
         $rutina->user_id = $user->id;
         $rutina->nombre = $request->input('nombre');
         $rutina->tipo = $request->input('tipo');
         $rutina->sexo = $request->input('sexo');
         $rutina->descripcion = $request->input('descripcion');
         $rutina->nivel = $request->input('nivel');
         $rutina->dias = $request->input('dias');

         $musculos = Musculo::get();
         $ejercicios = RutinaMusculo::where('rutina_id',$rutina_id)->get();
         $ejercicio = RutinaMusculo::where('rutina_id',$rutina_id)->first();
       return view('rutina.editar2',array(

            'ejercicios' => $ejercicios,
            'musculos' => $musculos,
            'rutina' => $rutina,
            'ejercicio' => $ejercicio
         ));
    }



    public function deleteEjer($rutina_id,  Request $request){

         $ejercicios = RutinaMusculo::where('rutina_id',$rutina_id)->get();
         foreach ($ejercicios as $ejercicio) {
              $ejercicio->delete();
         }

         $user = \Auth::user();
        $rutina = Rutina::findOrFail($rutina_id);
         
         $rutina->user_id = $user->id;
         $rutina->nombre = $request->input('nombre');
         $rutina->tipo = $request->input('tipo');
         $rutina->sexo = $request->input('sexo');
         $rutina->descripcion = $request->input('descripcion');
         $rutina->nivel = $request->input('nivel');
         $rutina->dias = $request->input('dias');

         $musculos = Musculo::get();
        

       return view('rutina.editar2',array(

          
            'musculos' => $musculos,
            'rutina' => $rutina
         ));
    }

    public function update(Request $request){
         $id= $request->input('rutina.id');
         $rutina = Rutina::findOrFail($id);
         $rutina->user_id = $request->input('rutina.user_id');
         $rutina->nombre = $request->input('rutina.nombre');
         $rutina->tipo = $request->input('rutina.tipo');
         $rutina->sexo = $request->input('rutina.sexo');
         $rutina->descripcion = $request->input('rutina.descripcion');
         $rutina->nivel = $request->input('rutina.nivel');
         $rutina->dias = $request->input('rutina.dias');
         $rutina->save();

        $idRutina = $rutina->id;
        $dias = request()->input('jsonDias');
        $ejercicios = request()->input('jsonEjercicio');
        $musculos = request()->input('jsonMusculos');
        $cantidad = request()->input('jsonCantidad');

        $ejer = json_decode($ejercicios);   
        $musc = json_decode($musculos); 
        $cant = json_decode($cantidad); 
        $dia = json_decode($dias);

        $length= count($ejer);
       
        for ($i=0; $i <$length; $i++) { 

            $rutinaMusculo = new RutinaMusculo();
            $id = Musculo::where('nombre',$musc[$i])->first();
            
            $rutinaMusculo->dia = $dia[$i];
            $rutinaMusculo->musculo_id = $id->id;
            $rutinaMusculo->rutina_id = $idRutina;
            $rutinaMusculo->ejercicio =$ejer[$i];
            $rutinaMusculo->cantidad = $cant[$i];
            $rutinaMusculo->save();

            }       

    
    
        return response()->json('exito');
    }

    public function delete($rutina_id)
    {
        $user = \Auth::user();
        $rutina = Rutina::find($rutina_id);
        
        $comments = Commentrutina::where('rutina_id',$rutina_id)->get();
        if($user && $rutina->user_id == $user->id){
            //Borrar comentarios
            if($comments && count($comments) > 0){
                foreach($comments as $comment){

                 $comment->delete();
                }
            }
        $ejercicios= RutinaMusculo::where('rutina_id',$rutina_id)->get();    
        if($user && $rutina->user_id == $user->id){
            if($ejercicios && count($ejercicios) > 0){
                foreach($ejercicios as $ejercicio){

                 $ejercicio->delete();
                }
            }
        }
        $likes= likerutina::where('rutina_id',$rutina_id)->get();    
        if($user && $rutina->user_id == $user->id){
            if($likes && count($likes) > 0){
                foreach($likes as $like){

                 $like->delete();
                }
            }
        }
        
            
           // Borrar rutina de nutricion
            $rutina->delete();

            $message = array( 'message' => 'Rutina eliminada correctamente');

        }else{
            $message = array( 'message' => 'Error al borrar la rutina');
        }

         return redirect()->route('misRutinas')->with($message);

           
        
    }


    public function filtrar(Request $request){
        $tipo = $request->input('tipo');
        $dias = $request->input('dias');
        $sexo = $request->input('sexo');
        $order = $request->input('order');
        $nivel = $request->input('nivel');
        $filtrado = 'filtrar';
         if($order == 'puntuacion'){
             if($dias == 'indiferente'){
                $rutinas = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('puntuacion','desc')->paginate(5);
                $rutina = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('puntuacion','desc')->first();
            }
            else{
                $rutinas = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('puntuacion','desc')->paginate(5);
                $rutina = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('puntuacion','desc')->first();
            }
             }elseif($order == 'asc'){
                 if($dias == 'indiferente'){
             $rutinas = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','asc')->paginate(5);
             $rutina = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','asc')->first();
         }else{
            $rutinas = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','asc')->paginate(5);
             $rutina = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','asc')->first();
         }
        }else{

             if($dias == 'indiferente'){

             $rutinas = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','desc')->paginate(5);
             $rutina = Rutina::where('tipo', $tipo)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','desc')->first();
         }else{
            $rutinas = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','desc')->paginate(5);
             $rutina = Rutina::where('tipo', $tipo)->where('dias', $dias)->where('sexo',$sexo)->where('nivel',$nivel)->orderBy('id','desc')->first();
          }
          }
       
        $registros = count($rutinas);
                return view('rutina.index',array(
                    'rutinas'=> $rutinas->appends(Input::except('page')),
                    'rutina' => $rutina,
                    'registros' => $registros,
                    'dias' => $dias,
                    'filtrado' => 'filtrado'

                ));
    }

    public function misRutinas(){
            $user = \Auth::user();
            $rutinas = Rutina::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);
            $registros = 1;
                return view('rutina.misRutinas',array(
                    'rutinas'=> $rutinas,
                    'registros' => $registros,
                    'user' => $user
                ));
          }

  public function searchMas($search,$tipo){
    if($tipo=='rutina'){
    $resultados = Rutina::where('nombre','LIKE','%'.$search.'%')->get();
    }elseif($tipo == 'receta'){
            $resultados = Nutricion::where('nombre','LIKE','%'.$search.'%')->get();

    }elseif($tipo == 'dieta'){ 
         $resultados = Dieta::where('nombre','LIKE','%'.$search.'%')->get();
    }
    return view('rutina.searchmore',array(
                    'resultados'=> $resultados,
                    'search' => $search,
                    'tipo' => $tipo
                    
                ));
  }

  public function like($rutina_id){
         $user = \Auth::user();
         $rutina = Rutina::findOrFail($rutina_id);
         $query = likerutina::where('user_id',$user->id)->where('rutina_id',$rutina_id)->first();
         $like = count($query);

        if($like>0){
            $likesms = array( 'likesms' => 'No puedes darle a me gusta mas de una vez');
            return redirect()->route('rutina',array('rutina'=>$rutina))->with($likesms);
        }else{

          
          $rutina->puntuacion = $rutina->puntuacion+1;
          $rutina->update();
          $likerutina = new likerutina();
          
          $likerutina->user_id=$user->id;
          $likerutina->rutina_id=$rutina_id;
          $likerutina->save();


          return redirect()->route('rutina',array('rutina'=>$rutina));
        }
        
    }

    public function allRutinas(){
            $user = \Auth::user();
            $rutinas = Rutina::orderBy('id','asc')->paginate(5);
            $registros = 1;
                return view('rutina.rutinas',array(
                    'rutinas'=> $rutinas,
                    'registros' => $registros,
                    'user' => $user
                ));
          }
    
}
