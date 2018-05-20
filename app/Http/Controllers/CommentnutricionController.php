<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Commentnutricion;

class CommentnutricionController extends Controller
{
    //
    public function saveComment(Request $request){
    	$validate = $this->validate($request, ['body' =>'required']);

    	$comment = new Commentnutricion();
    	$user = \Auth:: user();
    	$comment->user_id = $user->id;
        $comment->leido = 'no';
        $comment->receptor_id = $request->input('receptor_id');
    	$comment->nutricion_id = $request->input('receta_id');
    	$comment->comentario = $request->input('body');

    	$comment->save();

    	return redirect()->route('receta', ['receta_id' => $comment->nutricion_id])->with(array(

    		'message' => 'Comentario añadido correctamente.'
    	));
    }


    public function delete($comment_id){
    	$user = \Auth::user();
    	$comment = Commentnutricion::find($comment_id);

    	if($user && ($comment->user_id == $user->id || $user->id == $comment->receta->user_id )){
			$comment->delete();
		}
		return redirect()->route('receta', ['receta_id' => $comment->nutricion_id])->with(array(

    		'message' => 'Comentario borrado correctamente.'
    	));
    }

     public function mensajes(){
        $user = \Auth::user();
        $count = Commentnutricion::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->get();
        $mensajes = Commentnutricion::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->paginate(5);

        $contsms= count($count);
         return view('Nutricion.mensajes',array(
                    'mensajes' => $mensajes,
                    'contnsms' => $contsms,
                    'user' => $user
                ));
    } 
     public function leido($comment_id){
       
          
        $comment = Commentnutricion::findOrFail($comment_id);
        $comment->leido="si";
        
        

         $comment->update();

          return redirect()->route('mensajesReceta');

    }
}
