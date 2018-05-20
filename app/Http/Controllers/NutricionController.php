<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Nutricion;
use App\Commentnutricion; 
use App\likenutricion;

class NutricionController extends Controller
{
    //
	public function index(){
		$recetas = Nutricion::orderBy('id','desc')->paginate(5);
    $registros = 1;

		return view('nutricion.index',array(
			'recetas'=> $recetas,
      'registros' => $registros
		));
	}
    

    public function crearReceta(){
    	return view('nutricion.crearReceta');
    }

    public function saveReceta(request $request){
    	$validateData = $this->validate($request, [
            'nombre' =>'required']);
    	
    	 $receta = new Nutricion();
    	 $user = \Auth::user();
    	 $receta->user_id = $user->id;
    	 $receta->nombre = $request->input('nombre');
    	 $receta->tipo = $request->input('tipo');
    	 $image = $request->file('image');
    	 if($image){
    	 	$image_path = time().$image->getClientOriginalName();
    	 	\Storage::disk('images')->put($image_path, \File::get($image));
    	 $receta->image = $image_path;
    	 }
         $receta->ingredientes = $request->input('ingredientes');
    	 $receta->descripcion = $request->input('descripcion');
    	 $receta->save();

    	 return redirect()->route('home')->with(array(

    	 	'message' => 'Tu recetas se ha subido correctamente'
    	 ));
    	 
    }

    public function getImage($filename){
    	$file = Storage::disk('images')->get($filename);
    	return new Response($file, 200);
    }

    public function getReceta($receta_id){
        $receta = Nutricion::find($receta_id);
        return view('nutricion.receta',array('receta'=>$receta));
    }


    public function delete($receta_id)
    {
        $user = \Auth::user();
        $receta = Nutricion::find($receta_id);
        $comments = Commentnutricion::where('nutricion_id',$receta_id)->get();
        $likes= likenutricion::where('nutricion_id',$receta_id)->get();    
        if($user && $receta->user_id == $user->id){
            if($likes && count($likes) > 0){
                foreach($likes as $like){

                 $like->delete();
                }
            }
        }
        if($user && $receta->user_id == $user->id){
            //Borrar comentarios
            if($comments && count($comments) > 0){
                foreach($comments as $comment){

                 $comment->delete();
                }
            }

            //Borrar imagen del disco
            Storage::disk('images')->delete($receta->image);
           // Borrar receta de nutricion
            $receta->delete();

            $message = array( 'message' => 'Receta eliminada correctamente');

        }else{
             $message = array( 'message' => 'Error al borrar la receta');
        }

         return redirect()->route('misRecetas')->with($message);

           
        
    }

    public function edit($receta_id){
        $user = \Auth::user();
        $receta = Nutricion::findOrFail($receta_id);
       
        if($user && $receta->user_id == $user->id){

            
            return view('nutricion.edit',array('receta' => $receta));

        }else{
            $message = 'No se ha podido editar.';
           
            return redirect()->route('indexNutricion')->with($message);
        }
    }

    public function update($receta_id, Request $request){
        $validate = $this->validate($request, [
                    'nombre' =>'required']);

          $user = \Auth::user();
        $receta = Nutricion::findOrFail($receta_id);
        $receta->user_id = $user->id;
         $receta->nombre = $request->input('nombre');
         $receta->tipo = $request->input('tipo');
         $image = $request->file('image');
         if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
         $receta->image = $image_path;
         }
         $receta->ingredientes = $request->input('ingredientes');
         $receta->descripcion = $request->input('descripcion');

         $receta->update();
         
          return redirect()->route('indexNutricion')->with(array('message' => 'La receta se ha actualizado correctamente'));

    }

    public function filtrar(Request $request){
      $order= $request->input('order');
      if($order=='puntuacion'){
          $recetas = Nutricion::where('tipo',$request->input('tipo'))->orderBy('puntuacion','desc')->paginate(5);
          $receta = Nutricion::where('tipo',$request->input('tipo'))->orderBy('puntuacion','desc')->first();
      }
      elseif($order == 'asc'){
        $recetas = Nutricion::where('tipo',$request->input('tipo'))->orderBy('id','asc')->paginate(5);
        $receta = Nutricion::where('tipo',$request->input('tipo'))->orderBy('id','asc')->first();

      }
      else{ 
          $recetas = Nutricion::where('tipo',$request->input('tipo'))->orderBy('id','desc')->paginate(5);
          $receta = Nutricion::where('tipo',$request->input('tipo'))->orderBy('id','desc')->first();

      }
      $registros = count($recetas);
        return view('Nutricion.index',array(
            'recetas'=> $recetas->appends(Input::except('page')),
            'receta' => $receta,
            'registros' => $registros,
            'filtrado' => 'filtrado'
        )); 
    }

    public function misRecetas(){
                $user = \Auth::user();

    $recetas = Nutricion::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);

    return view('nutricion.misRecetas',array(
      'recetas'=> $recetas,
      'user' => $user
    ));
  }

  public function allRecetas(){
                $user = \Auth::user();

    $recetas = Nutricion::orderBy('id','desc')->paginate(3);

    return view('nutricion.recetas',array(
      'recetas'=> $recetas,
      'user' => $user
    ));
  }


  public function like($receta_id){
         $user = \Auth::user();
         $receta = Nutricion::findOrFail($receta_id);
         $query = likenutricion::where('user_id',$user->id)->where('nutricion_id',$receta_id)->first();
         $like = count($query);

        if($like>0){
            $likesms = array( 'likesms' => 'No puedes darle a me gusta mas de una vez');
            return redirect()->route('receta',array('receta'=>$receta))->with($likesms);
        }else{

          
          $receta->puntuacion = $receta->puntuacion+1;
          $receta->update();
          $likereceta = new likenutricion();
          
          $likereceta->user_id=$user->id;
          $likereceta->nutricion_id=$receta_id;
          $likereceta->save();


          return redirect()->route('receta',array('receta'=>$receta));
        }
        
    }
  
    
}
