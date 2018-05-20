<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Commentdieta;

class CommentdietaController extends Controller
{
     public function saveComment(Request $request){
    	$validate = $this->validate($request, ['body' =>'required']);

    	$comment = new Commentdieta();
    	$user = \Auth:: user();
    	$comment->user_id = $user->id;
        $comment->leido = 'no';

        $comment->receptor_id = $request->input('receptor_id');
    	$comment->dieta_id = $request->input('dieta_id');
    	$comment->comentario = $request->input('body');

    	$comment->save();

    	return redirect()->route('dieta', ['dieta_id' => $comment->dieta_id])->with(array(

    		'message' => 'Comentario añadido correctamente.'
    	));
    }

    public function delete($comment_id){
    	$user = \Auth::user();
    	$comment = Commentdieta::find($comment_id);

    	if($user && ($comment->user_id == $user->id || $user->id == $comment->dieta->user_id )){
			$comment->delete();
		}
		return redirect()->route('dieta', ['dieta_id' => $comment->dieta_id])->with(array(

    		'message' => 'Comentario borrado correctamente.'
    	));
    }

    public function mensajes(){
        $user = \Auth::user();
         $count = Commentdieta::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->get();
        $mensajes = Commentdieta::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->orderBy('id', 'desc')->paginate(5);

        $contdsms= count($count);
         return view('dieta.mensajes',array(
                    'mensajes' => $mensajes,
                    'contdsms' => $contdsms,
                    'user' => $user
                ));
    } 

    public function leido($comment_id){
       
          
        $comment = Commentdieta::findOrFail($comment_id);
        $comment->leido="si";
        
        

         $comment->update();

          return redirect()->route('mensajesDieta');

    }

}