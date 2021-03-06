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

 
// Route::filter('auth', function()
// {
//     if (Auth::guest()) return Redirect::guest('login');
// });

Route::group(["before" => "auth"], function() {
    Route::any("/", [
        "as" => "profile",
        "uses" => "AuthenticationController@getProfile"
    ]);
    Route::any("/editprofile", [
        "as" => "editprofile",
        "uses" => "AuthenticationController@editProfile"
    ]);
    Route::any("/profileSaveChanges/{id}", [
        "as" => "profileSaveChanges",
        "uses" => "AuthenticationController@profileSaveChanges"
    ]);
    Route::any("/profilechangepass/{id}", [
    "as" => "profilechangepass",
    "uses" => "AuthenticationController@profilechangepass"
    		]);
    Route::any("/logout", [
        "as" => "logout",
        "uses" => "AuthenticationController@getLogout"
    ]);

    /**
     * Manage User Accounts (Administrator)
     */
    Route::any("/manageaccounts", [
    "as" => "manageaccounts",
    "uses" => "UserController@showAllUsers"
    ]);
    Route::any("/createaccountadmin", [
    "as" => "createaccountadmin",
    "uses" => "UserController@createAccountAdminPanel"
    ]);
    Route::any("/addnewacct", [
    "as" => "addnewacct",
    "uses" => "UserController@createAcctAdminHelper"
    		]);
    Route::any("/editinfoadmin/{id}", [
    "as" => "editinfoadmin",
    "uses" => "UserController@editAccountAdminPanel"
            ]);
    Route::any("/editinfoadminhelper/{id}", [
            "as" => "editinfoadminhelper",
            "uses" => "AuthenticationController@editAcctHelper"
            ]);


   /*
    * HomeworkController
    */
   Route::resource('homeworks', 'HomeworkController');

   /*
    * TestController
    */
   Route::resource('tests', 'TestController');
   
   
});



 Route::resource('studentcourses', 'StudentCourseController');


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
Route::resource('courses', 'CourseController');


//Route::post('course/{id}/{attributes}', 'CourseController@update');
Route::post('/update/{id}', 'TestController@update');

//Route::post('/destroy/{id}', 'QuestionController@destroy');

//Route::resource('questions', 'QuestionController');

/* 
 * Homework Controller
 */
Route::resource('homeworks', 'HomeworkController');
//Route::post('course/{id}/{attributes}', 'CourseController@update');
Route::post('homework/update/{id}', 'HomeworkController@update');

Route::resource('submithomeworks', 'SubmithomeworkController');
Route::post('/update/{id}', 'SubmithomeworkController');


Route::resource('sections', 'SectionController');
Route::resource('classes','ClassController');
Route::resource('students','StudentController');
Route::resource('questions', 'QuestionController');
Route::post('/destroy/{id}', array('uses' => 'QuestionController@destroy'));
Route::post('/update/{id}', 'QuestionController@update');
Route::post('questions/{id}', array('uses' => 'QuestionController@store'));


Route::resource('materials', 'MaterialController');
Route::post('/update/{id}', 'MaterialController@update');

Route::resource('friends', 'FriendController');
Route::get('/taketest/{id}', 'TestController@taketest');
Route::get('testfrontview/{id}', 'TestController@testfrontview');
Route::post('aftertest/', 'TestController@testanswer_store');


Route::resource('messages','MessageController');
Route::resource('conversations','ConversationController');
Route::post('confirmfriend', 'FriendController@confirm');
Route::post('unconfirmfriend', 'FriendController@unconfirm');


/***********FOR FILE UPLOAD*******************/

Route::get('form', function(){
 return View::make('form');
});

Route::any('form-submit', function(){
 var_dump(Input::file('file'));
});

Route::any('form-submit', function(){
 return Input::file('file')->getClientOriginalName();
});

 Route::any('form-submit', function(){
 return Input::file('file')->getRealPath();
});

/**********FOR FILE UPLOAD**********************/