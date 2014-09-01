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
    * HomeworkController
    */
   Route::resource('homeworks', 'HomeworkController');
});

/*
    * TestController
    */
   Route::resource('tests', 'TestController');
});


//Route::resource('users', 'UserController');

//Route::get('/', function()
//{
//	return View::make('users.index');
//});
/*
Route::get('/create', function()
{
	return View::make('create');
});

*/

/*
     * UserController
     */
    Route::resource('users', 'UserController');

 /*create account route*/
     Route::get('/create', function()
    {
        return View::make('users.create');
    });

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

/***********************
karaan nga routes basta mao ning gamiton dili na mag error ang create
***********************/

/*Route::resource('users', 'UserController');

Route::get('/', function()
{
	return View::make('users.index');
});
Route::get('/create', function()
{
	return View::make('create');
});
Route::get('/profile', function()
{
	return View::make('users.profile');
});*/

/*
 * Course Controller
 */
Route::resource('course', 'CourseController');
//Route::post('course/{id}/{attributes}', 'CourseController@update');
Route::post('/update/{id}', 'CourseController@update');
