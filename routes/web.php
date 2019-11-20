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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('login', 'LoginController@create');

// Route::view('login','Login');

// Route::get('login/{nombre}','LoginController@index');//paramateros obligado
// //'login/{nombre?   } opcional

//Route::get('admin/sistem/login','LoginController@index') ->name('login') ;

// Rutas de cliente
Auth::routes();

Route::get('/', 'LoginController@index');
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/index/cursos', 'CursosController@index')->name('cursos');
Route::get('/index/recursos', 'RecursosController@index')->name('recursos');

Route::get('/login2','LoginController@index');

// Rutas administrador

Route::get('/administrador','Admin\LoginController@index');
Route::get('/administrador/home','Admin\HomeController@index');

//Areas
Route::get('/administrador/areas','Admin\AreaController@index');
Route::get('/administrador/areas/create','Admin\AreaController@create');
Route::post('/administrador/areas/agregarArea','Admin\AreaController@registrarArea');
Route::get('/administrador/areas/edit-{id}','Admin\AreaController@edit');
Route::post('/administrador/areas/actualizarArea-{id}','Admin\AreaController@actualizarArea');
Route::get('/administrador/areas/delete-{id}','Admin\AreaController@delete');

//Temas
Route::get('/administrador/areas-{id}/temas','Admin\TemaController@index');//Ver temas del curso
// Route::get('/administrador/areas/temas','Admin\TemaController@index');
Route::get('/administrador/areas-{id}/temasnuevo','Admin\TemaController@create');//Nuevo tema llevando el IdArea
Route::post('/administrador/areas/temas/agregarTema-{id}','Admin\TemaController@agregarTemas'); //agregar tema


Route::get('/administrador/cursos','Admin\CursoController@index');
Route::get('/administrador/cursos/create','Admin\CursoController@create');

Route::post('verificar-usuario','LoginController@verificarUsuario');
Route::post('registrar-usuario','LoginController@registrarUsuario');
Route::get('/registrarse','LoginController@register');