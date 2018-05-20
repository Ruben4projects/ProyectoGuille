<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Commentrutina;
use App\Commentdieta;
use App\Commentnutricion;
use Illuminate\Support\Facades\View;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $site_settings;

    public function __construct() 
    {
        // Fetch the Site Settings object
       
       
        View::composer('layouts.app', function($view)
        {
           if(Auth::check()){
          $user = \Auth::user();
          $query = Commentrutina::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contrsms = count($query);
         
          $query = Commentdieta::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contdsms = count($query);

          $query = Commentnutricion::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contnsms = count($query);
          $contsms = $contdsms + $contrsms + $contnsms;


          $view->with('contsms', $contsms);
          }
        });
      

        View::composer('user.bar', function($view)
        {
            $user = \Auth::user();
          $query = Commentrutina::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contrsms = count($query);
          $query2 = Commentdieta::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contdsms = count($query2);
          $query3 = Commentnutricion::where('receptor_id',$user->id)->where('user_id','!=',$user->id)->where('leido','no')->get();
          $contnsms = count($query3);
          $view->with('contrsms', $contrsms)->with('contdsms',$contdsms)->with('contnsms',$contnsms);

        });

       
    }

}

