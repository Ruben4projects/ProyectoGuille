<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Ejercicio;
use App\Musculo;

class EjercicioController extends Controller
{
    public function crearEjercicio(){
    	return view('ejercicios.crearEjercicio');
    }
}
