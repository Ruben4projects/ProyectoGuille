<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;
use Redirect;
use App\Rutina;
use App\Ejercicio;
use App\Musculo;
use App\Nutricion;
use App\RutinaMusculo;
use App\Commentrutina;
use App\Dieta;
use App\User;

class UserController extends Controller
{
    //
    public function home()
    {
        $rutinas = Rutina::orderBy('puntuacion','desc')->limit(3)->get();
        $recetas = Nutricion::orderBy('puntuacion','desc')->limit(3)->get();
        return view('home', array(
            'rutinas'=> $rutinas,
            'recetas'=> $recetas

        ));

    }

    public function index(){
    	 $user = \Auth::user();
    	return view('user.perfil', array(
    		'user'=> $user

    	));
    }

    public function editUser(){
    	 $user = \Auth::user();
    	return view('user.edit', array(
    		'user'=> $user

    	));
    }
    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }


    public function update(Request $request){
         $user = \Auth::user();
        $validateData = $this->validate($request, [
           
            'name' => 'string|max:255',
            'surname' => 'string|max:255',
            'nick' => 'string|max:255|unique:users,nick,'.$user->id,
            'email' => 'string|email|max:255|unique:users,email,'.$user->id,
            ]);
        
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->nick = $request->input('nick');
        $user->email = $request->input('email');
       
        $image = $request->file('image');
         if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
         $user->image = $image_path;
         }
        $user->save();
        return redirect()->route('userIndex');

    }

    public function contactar(){
        return view('user.contacto');
    }

    public function enviarmsn(Request $request){
         Mail::send('user.contacto',$request->all(),function($msj){
            $msj->subject('Correo de contacto');
            $msj->to('mygymroutine@gmail.com');
        });
        Session::flash('message','Mensaje enviado correctamente');
        return Redirect::to('/contacto');
    }

    public function usuarios(){
                 $user = \Auth::user();

          $users = User::orderBy('id','asc')->paginate(3);
            
                return view('user.users',array(
                    'users'=> $users,
                    'user' => $user
                ));
          

    }
     public function delete($idUser){
         $user = \Auth::user();

          $user = User::where('id',$idUser)->first();
          $user->delete();

         $users = User::orderBy('id','asc')->paginate(3);

                return  redirect()->route('usuarios');
                
          

    }
}
