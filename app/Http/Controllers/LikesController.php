<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

use App\likerutina;


class LikesController extends Controller
{
    //
    public function likesRutinas(){
    	$user = \Auth::user();
    	$rutinas = likerutina::where('user_id',$user->id)->paginate(5);
    	return view('rutina.indexlikes',array(
                    'rutinas'=> $rutinas,
                    'user' => $user


                    ));
    }
}
