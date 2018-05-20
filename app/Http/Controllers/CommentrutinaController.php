<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Commentrutina;

class CommentrutinaController extends Controller
{
    //

     	public function saveComment(Request $request){
    	$validate = $this->validate($request, ['body' =>'required']);

    	$comment = new Commentrutina();
    	$user = \Auth:: user();
    	$comment->user_id = $user->id;
        $comment->leido = 'no';

        $comment->receptor_id = $request->input('receptor_id');
    	$comment->rutina_id = $request->input('rutina_id');
    	$comment->comentario = $request->input('body');

    	$comment->save();

    	return redirect()->route('rutina', ['rutina_id' => $comment->rutina_id])->with(array(

    		'message' => 'Comentario añadido correctamente.'
    	));
    }

    public function delete($comment_id){
    	$user = \Auth::user();
    	$comment = Commentrutina::find($comment_id);

    	if($user && ($comment->user_id == $user->id || $comment->rutina->user_id == $user->id)){
			$comment->delete();
		}
		return redirect()->route('rutina', ['rutina_id' => $comment->rutina_id])->with(array(

    		'message' => 'Comentario borrado correctamente.'
    	));
    }
    
    public function mensajes(){
        $user = \Auth::user();
        $count = Commentrutina::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->get();
        $mensajes = Commentrutina::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->paginate(5);

        $contsms= count($count);
         return view('rutina.mensajes',array(
                    'mensajes' => $mensajes,
                    'contrsms' => $contsms,
                    'user' => $user
                ));
    } 
     public function leido($comment_id){
       
          
        $comment = Commentrutina::findOrFail($comment_id);
        $comment->leido="si";
        
        

         $comment->update();

          return redirect()->route('mensajesRutina');

    }
}
