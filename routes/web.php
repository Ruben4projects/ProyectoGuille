<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@home')->name('home');


Auth::routes();

Route::get('/home', 'UserController@home')->name('home');

//Rutas del controlador dieta
Route::get('/crear-dieta',array(

	'as' => 'crearDieta',
	'middleware' => 'auth',
	'uses' => 'DietaController@crearDieta'
));

Route::post('/guardar-dieta',array(

	'as' => 'saveDieta',
	'middleware' => 'auth',
	'uses' => 'DietaController@saveDieta'
));

Route::get('/crear-rutina',array(

	'as' => 'crearRutina',
	'middleware' => 'auth',
	'uses' => 'RutinaController@crearRutina'
));

Route::post('/guardar-rutina',array(

	'as' => 'saveRutina',
	'middleware' => 'auth',
	'uses' => 'RutinaController@saveRutina'
));

Route::get('/crear-ejercicios',array(

	'as' => 'crearEjercicios',
	'middleware' => 'auth',
	'uses' => 'RutinaMusculoController@crearEjercicios'
));

Route::get('/crear-receta',array(

	'as' => 'crearReceta',
	'middleware' => 'auth',
	'uses' => 'NutricionController@crearReceta'
));

Route::post('/guardar-receta',array(

	'as' => 'saveReceta',
	'middleware' => 'auth',
	'uses' => 'NutricionController@saveReceta'
));

Route::get('/index-nutricion',array(

	'as' => 'indexNutricion',
	'uses' => 'NutricionController@index'
));

Route::get('/index-dietas',array(

	'as' => 'dietaIndex',
	'uses' => 'DietaController@index'
));


Route::get('/dieta/{dieta_id}',array(

	'as' => 'dieta',
	'uses' => 'DietaController@dieta'
));
Route::get('/miniatura/{filename}', array(
	'as' =>'imageReceta',
	'uses'=>'NutricionController@getImage'
));

Route::get('/receta/{receta_id}', array(
	'as' =>'receta',
	'uses'=>'NutricionController@getReceta'
));

Route::post('/comment-nutricion',array(

	'as' => 'saveCommentN',
	'middleware' => 'auth',
	'uses' => 'CommentnutricionController@saveComment'
));
Route::post('/comment-dieta',array(

	'as' => 'saveCommentD',
	'middleware' => 'auth',
	'uses' => 'CommentdietaController@saveComment'
));
Route::post('/comment-rutina',array(

	'as' => 'saveCommentR',
	'middleware' => 'auth',
	'uses' => 'CommentrutinaController@saveComment'
));
Route::get('/delete-commentn/{comment_id}', array(
	'as' =>'commentNDelete',
	'middleware' => 'auth',
	'uses'=>'CommentnutricionController@delete'
));

Route::get('/delete-commentd/{comment_id}', array(
	'as' =>'commentDDelete',
	'middleware' => 'auth',
	'uses'=>'CommentdietaController@delete'
));
Route::get('/delete-commentr/{comment_id}', array(
	'as' =>'commentRDelete',
	'middleware' => 'auth',
	'uses'=>'CommentrutinaController@delete'
));

Route::get('/delete-receta/{receta_id}', array(
	'as' =>'recetaDelete',
	'middleware' => 'auth',
	'uses'=>'NutricionController@delete'
));
Route::get('/delete-dieta/{dieta_id}', array(
	'as' =>'dietaDelete',
	'middleware' => 'auth',
	'uses'=>'DietaController@delete'
));

Route::get('/editar-receta/{receta_id}', array(
	'as' =>'recetaEdit',
	'middleware' => 'auth',
	'uses'=>'NutricionController@edit'
));

Route::get('/editar-dieta/{dieta_id}', array(
	'as' =>'dietaEdit',
	'middleware' => 'auth',
	'uses'=>'DietaController@editar'
));

Route::get('/editar-rutina/{rutina_id}', array(
	'as' =>'rutinaEdit',
	'middleware' => 'auth',
	'uses'=>'RutinaController@editOne'
));
Route::post('/editar2-rutina/{rutina_id}', array(
	'as' =>'rutina2Edit',
	'middleware' => 'auth',
	'uses'=>'RutinaController@editTwo'
));



Route::post('/update-receta/{receta_id}',array(

	'as' => 'updateReceta',
	'middleware' => 'auth',
	'uses' => 'NutricionController@update'
));


Route::post('/update-dieta/{dieta_id}',array(

	'as' => 'updateDieta',
	'middleware' => 'auth',
	'uses' => 'DietaController@update'
));

Route::get('/buscar/{search?}',[

	'as' =>'buscar',
	'uses' =>'RutinaController@search'
]);

Route::post('ajaxRequest', 'RutinaController@saveRutina2');

Route::get('/rutinas-index',[

	'as' =>'rutinaIndex',
	'uses' =>'RutinaController@index'
]);


Route::get('/rutina/{rutina_id}', array(
	'as' =>'rutina',
	'uses'=>'RutinaController@getRutina'
));

Route::post('/eliminar-ejer/{rutina_id}', array(
	'as' =>'deleteEjer',
	'middleware' => 'auth',
	'uses'=>'RutinaController@deleteEjer'
));

Route::post('editar2-rutina/{rutina_id}/ajaxRequestEdit', 
	 'RutinaController@update');

Route::post('eliminar-ejer/{rutina_id}/ajaxRequestEdit', 
	 'RutinaController@update');


Route::get('/delete-rutina/{rutina_id}', array(
	'as' =>'rutinaDelete',
	'middleware' => 'auth',
	'uses'=>'RutinaController@delete'
));

Route::get('/filtrar-rutinas', array(
	'as' =>'filtrarRutina',
	'uses'=>'RutinaController@filtrar'
));
Route::get('/filtrar-dietas', array(
	'as' =>'filtrarDieta',
	'uses'=>'DietaController@filtrar'
));
Route::get('/filtrar-recetas', array(
	'as' =>'filtrarReceta',
	'uses'=>'NutricionController@filtrar'
));

Route::get('/user-index', array(
	'as' =>'userIndex',
	'middleware' => 'auth',
	'uses'=>'UserController@index'
));

Route::get('/user-edit', array(
	'as' =>'userEdit',
	'middleware' => 'auth',
	'uses'=>'UserController@editUser'
));

Route::post('/actualizar-user', array(
	'as' =>'actualizarUser',
	'middleware' => 'auth',
	'uses'=>'UserController@update'
));

Route::get('/foto/{filename}', array(
	'as' =>'fotoUser',
	'uses'=>'UserController@getImage'
));

Route::get('/mis-rutinas',[

	'as' =>'misRutinas',
	'middleware' => 'auth',
	'uses' =>'RutinaController@misRutinas'
]);
Route::get('/mis-recetas',[

	'as' =>'misRecetas',
	'middleware' => 'auth',
	'uses' =>'NutricionController@misRecetas'
]);
Route::get('/mis-dietas',[

	'as' =>'misDietas',
	'middleware' => 'auth',
	'uses' =>'DietaController@misDietas'
]);

Route::get('entrada-mensajes-rutinas',[
	'as' =>'mensajesRutina',
	'middleware' => 'auth',
	'uses' =>'CommentrutinaController@mensajes'

]);

Route::get('leido-rutina/{leido}',[
	'as' =>'leidoRutina',
	'middleware' => 'auth',
	'uses' =>'CommentrutinaController@leido'

]);
Route::get('entrada-mensajes-dietas',[
	'as' =>'mensajesDieta',
	'middleware' => 'auth',
	'uses' =>'CommentdietaController@mensajes'

]);
Route::get('leido-dieta/{leido}',[
	'as' =>'leidoDieta',
	'middleware' => 'auth',
	'uses' =>'CommentDietaController@leido'

]);

Route::get('entrada-mensajes-recetas',[
	'as' =>'mensajesReceta',
	'middleware' => 'auth',
	'uses' =>'CommentnutricionController@mensajes'

]);
Route::get('leido-receta/{leido}',[
	'as' =>'leidoReceta',
	'middleware' => 'auth',
	'uses' =>'CommentnutricionController@leido'

]);

Route::get('/search-mas/{search}/{tipo}',[

	'as' =>'buscarMas',
	'middleware' => 'auth',
	'uses' =>'RutinaController@searchmas'
]);

Route::get('/dieta-like/{dieta_id}',array(

	'as' => 'likeDieta',
	'middleware' => 'auth',
	'uses' => 'DietaController@like'
));

Route::get('/receta-like/{receta_id}',array(

	'as' => 'likeReceta',
	'middleware' => 'auth',
	'uses' => 'NutricionController@like'
));

Route::get('/rutina-like/{rutina_id}',array(

	'as' => 'likeRutina',
	'middleware' => 'auth',
	'uses' => 'RutinaController@like'
));

Route::get('/index-likes/{user_id}',array(

	'as' => 'likeRutinas',
	'middleware' => 'auth',
	'uses' => 'LikesController@likesRutinas'
));


Route::get('/delete-like/{like}',array(

	'as' => 'delete',
	'middleware' => 'auth',
	'uses' => 'LikesController@likesRutinas'
));

Route::get('/admin/users',array(

	'as' => 'usuarios',
	'middleware' => 'auth',
	'uses' => 'UserController@usuarios'
));

Route::get('/admin/delete-user/{user}',array(

	'as' => 'deleteUser',
	'middleware' => 'auth',
	'uses' => 'UserController@delete'
));

Route::get('/admin/rutinas',[

	'as' =>'allRutinas',
	'middleware' => 'auth',
	'uses' =>'RutinaController@allRutinas'
]);

Route::get('/admin/recetas',[

	'as' =>'allRecetas',
	'middleware' => 'auth',
	'uses' =>'NutricionController@allRecetas'
]);

Route::get('/admin/dietas',[

	'as' =>'allDietas',
	'middleware' => 'auth',
	'uses' =>'DietaController@allDietas'
]);