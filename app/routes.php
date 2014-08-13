<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::group(["before" => "guest"], function() {
    Route::any("/login", [
        "as" => "login",
        "uses" => "AuthenticationController@getLogin"
    ]);

    Route::post("/login", "AuthenticationController@postLogin");
});

Route::group(["before" => "auth"], function() {
Route::group(["before" => "auth"], function() {
    Route::any("/", [
        "as" => "profile",
        "uses" => "AuthenticationController@getProfile"
    ]);
    Route::any("/logout", [
        "as" => "logout",
        "uses" => "AuthenticationController@getLogout"
    ]);

  Route::resource('users', 'UserController');
  Route::get('/', function()
{
  return View::make('users.index');
});
Route::get('/create', function()
{
  return View::make('create');
});


});
*/


Route::group(["before" => "guest"], function() {
    Route::any("/login", [
        "as" => "login",
        "uses" => "AuthenticationController@getLogin"
    ]);

    Route::post("/login", "AuthenticationController@postLogin");
});

Route::group(["before" => "auth"], function() {
    Route::any("/", [
        "as" => "profile",
        "uses" => "AuthenticationController@getProfile"
    ]);
    Route::any("/logout", [
        "as" => "logout",
        "uses" => "AuthenticationController@getLogout"
    ]);

    /*
     * UserController
     */
    Route::resource('users', 'UserController');
   


   /*
    * HomeworkController
    */
   Route::resource('homeworks', 'HomeworkController');
});


//Route::resource('users', 'UserController');

Route::get('/', function()
{
	return View::make('users.index');
});
Route::get('/create', function()
{
	return View::make('create');
});

<<<<<<< HEAD
=======
*/
 /*create account route*/
     Route::get('/create', function()
    {
        return View::make('users.create');
    });
>>>>>>> 02557fd5eb54815cfd44cfdd61f8eef04af1764e

Route::get('/profile', function()
{
	return View::make('users.profile');
});

/*Route::post('/create')
|-----------------------------------------
|		NOTE!!
|-----------------------------------------
| Kulang ang Route::post para sa create
| or himoon nalang sya nga para sa blade
|
*/
