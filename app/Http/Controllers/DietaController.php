<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

use App\Dieta;
use App\Commentdieta;
use App\likedieta;

class DietaController extends Controller
{
    //
    public function crearDieta(){
    	return view('dieta.crearDieta');
    }

    public function saveDieta(Request $request){
    

    	//Validar formulario
    	$validateData = $this->validate($request, [
    		'nombre' =>'required']);
    	
    	 $dieta = new Dieta();
    	 $user = \Auth::user();
    	 $dieta->user_id = $user->id;
    	 $dieta->nombre = $request->input('nombre');
    	 $dieta->tipo = $request->input('tipo');
       $dieta->descripcion = $request->input('descripcion');
       $dieta->puntuacion = '0';
    	 $dieta->desayuno = $request->input('desayuno');
    	 $dieta->almuerzo = $request->input('almuerzo');
    	 $dieta->comida = $request->input('comida');
    	 $dieta->merienda = $request->input('merienda');
     	 $dieta->cena = $request->input('cena');
    	 $dieta->extra = $request->input('extra');

    	 $dieta->save();

    	 return redirect()->route('home')->with(array(

    	 	'message' => 'EL video se ha subido correctamente'
    	 ));

    }

    public function index(){
        $dietas = Dieta::orderBy('id','desc')->paginate(5);
        $registros = 1;
        return view('dieta.index',array(
            'dietas'=> $dietas,
            'registros' => $registros,
        ));
    }

    

    public function dieta($dieta_id){
          $dieta = Dieta::find($dieta_id);
        return view('dieta.dieta',array('dieta'=>$dieta));
    }

    public function editar($dieta_id){
        $user = \Auth::user();
        $dieta = Dieta::findOrFail($dieta_id);
        if($user && $dieta->user_id == $user->id){

            
            return view('dieta.editar',array('dieta' => $dieta));

        }else{
            $message = 'No se ha podido acceder a edicion.';
            return redirect()->route('dietaIndex')->with($message);
        }
    }

    public function update($dieta_id, Request $request){
        $validate = $this->validate($request, [
                    'nombre' =>'required']);

          $user = \Auth::user();
        $dieta = Dieta::findOrFail($dieta_id);
        $dieta->user_id = $user->id;
         $dieta->nombre = $request->input('nombre');
         $dieta->tipo = $request->input('tipo');
         $dieta->descripcion = $request->input('descripcion');
         $dieta->desayuno = $request->input('desayuno');
         $dieta->almuerzo = $request->input('almuerzo');
         $dieta->comida = $request->input('comida');
         $dieta->merienda = $request->input('merienda');
         $dieta->cena = $request->input('cena');
         $dieta->extra = $request->input('extra');
         $tipo="";
        
        

         $dieta->update();

          return redirect()->route('dietaIndex')->with(array('message' => 'La receta se ha actualizado correctamente'));

    }

    public function delete($dieta_id)
    {
        $user = \Auth::user();
        $dieta = Dieta::find($dieta_id);
        $tipo = $dieta->tipo;
        $comments = Commentdieta::where('dieta_id',$dieta_id)->get();
        $likes= likedieta::where('dieta_id',$dieta_id)->get();    
        if($user && $rutina->user_id == $user->id){
            if($likes && count($likes) > 0){
                foreach($likes as $like){

                 $like->delete();
                }
            }
        }
        if($user && $dieta->user_id == $user->id){
            //Borrar comentarios
            if($comments && count($comments) > 0){
                foreach($comments as $comment){

                 $comment->delete();
                }
            }

         
           // Borrar receta de nutricion
            $dieta->delete();

            $message = array( 'message' => 'Dieta eliminada correctamente');

        }else{
             $message = array( 'message' => 'Error al borrar la receta');
        }

         return redirect()->route('misDietas')->with($message);

           
        
    }

    public function filtrar(Request $request){
      $order= $request->input('order');
      if($order=='puntuacion'){
          $dietas = Dieta::where('tipo',$request->input('tipo'))->orderBy('puntuacion','desc')->paginate(5);
          $dieta = Dieta::where('tipo',$request->input('tipo'))->orderBy('puntuacion','desc')->first();
      }
      elseif($order == 'asc'){
        $dietas = Dieta::where('tipo',$request->input('tipo'))->orderBy('id','asc')->paginate(5);
        $dieta = Dieta::where('tipo',$request->input('tipo'))->orderBy('id','asc')->first();

      }
      else{ 
          $dietas = Dieta::where('tipo',$request->input('tipo'))->orderBy('id','desc')->paginate(5);
          $dieta = Dieta::where('tipo',$request->input('tipo'))->orderBy('id','desc')->first();

      }
      $registros = count($dietas);
        return view('dieta.index',array(
            'dietas'=> $dietas->appends(Input::except('page')),
            'dieta' => $dieta,
            'registros' => $registros,
            'filtrado' => 'filtrado'
        )); 
    }

     public function misDietas(){
      $user = \Auth::user();
        $dietas = Dieta::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);
        $registros = 1;
        return view('dieta.misDietas',array(
            'dietas'=> $dietas,
            
            'user' => $user
        ));
    }

    public function allDietas(){
      $user = \Auth::user();
        $dietas = Dieta::orderBy('id','asc')->paginate(5);
        return view('dieta.dietas',array(
            'dietas'=> $dietas,
            'user' => $user
        ));
    }


 public function like($dieta_id){
         $user = \Auth::user();
         $dieta = Dieta::findOrFail($dieta_id);
         $query = likedieta::where('user_id',$user->id)->where('dieta_id',$dieta_id)->first();
         $like = count($query);

        if($like>0){
            $likesms = array( 'likesms' => 'No puedes darle a me gusta mas de una vez');
            return redirect()->route('dieta',array('dieta'=>$dieta))->with($likesms);
        }else{

          
          $dieta->puntuacion = $dieta->puntuacion+1;
          $dieta->update();
          $likedieta = new likedieta();
          
          $likedieta->user_id=$user->id;
          $likedieta->dieta_id=$dieta_id;
          $likedieta->save();


          return redirect()->route('dieta',array('dieta'=>$dieta));
        }
        
    }

}
