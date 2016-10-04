<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/test', function () {
    return "olá  mundo";
});
*/

Route::get('/test/{nome}', 'TestController@index');
Route::get('notas', 'TestController@notas');

Route::get('blog', 'PostsController@index');
Route::get('/', 'PostsController@index');

Route::get('/auth', function(){

        //login forcado
        /*$user = App\User::find(1);
        //Auth::login($user);

        if(Auth::check())
            return "ola mundo";
        */

        if(Auth::attempt(['email'=>'bartsimpson@gmail.com', 'password'=>'1234567']))
        {
            return "Oi";
        }
        return "Fahou!";
});

Route::get('/auth/logout', function(){
        Auth::logout();
    });

Route::get("auth/login", 'Auth\AuthController@getLogin'); //getLogin (Auth\AuthController nativo do Laravel). deve chamar a tela onde o usuario sera redirecionado ao logar.

Route::post("auth/login", 'Auth\AuthController@postLogin'); //postLogin (Auth\AuthController nativo do Laravel). após logar, o usuario é redirecionado para pagina acessada anteriormente.

Route::get("auth/logout", 'Auth\AuthController@getLogout');

//agrupamento de rotas
// middleware => e utilizado para verificar se o usuario esta autenticado. caso nao esteja logado o usuario e enviado para auth/login
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){

    Route::group(['prefix'=>'posts'], function(){

        Route::get('', ['as'=>'admin.index','uses'=>'PostsAdminController@index']);
        Route::get('create', ['as'=>'admin.posts.create','uses'=>'PostsAdminController@create']);
        Route::post('store', ['as'=>'admin.posts.store','uses'=>'PostsAdminController@store']);
        Route::get('edit/{id}', ['as'=>'admin.posts.edit','uses'=>'PostsAdminController@edit']);
        Route::put('update/{id}', ['as'=>'admin.posts.update','uses'=>'PostsAdminController@update']);
        Route::get('delete/{id}', ['as'=>'admin.posts.delete','uses'=>'PostsAdminController@delete']);
    });
});


/*rotas nomeadas*/
//Route::get('admin/posts', ['as'=>'admin.index','uses'=>'PostsAdminController@index']);
//Route::get('admin/posts/create', ['as'=>'admin.posts.create','uses'=>'PostsAdminController@create']);
//Route::post('admin/posts/store', ['as'=>'admin.posts.store','uses'=>'PostsAdminController@store']);
//Route::get('admin/posts/edit/{id}', ['as'=>'admin.posts.edit','uses'=>'PostsAdminController@edit']);
//Route::put('admin/posts/update/{id}', ['as'=>'admin.posts.update','uses'=>'PostsAdminController@update']);
//Route::get('admin/posts/delete/{id}', ['as'=>'admin.posts.delete','uses'=>'PostsAdminController@delete']);
