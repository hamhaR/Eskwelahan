<?php

use Illuminate\Support\MessageBag;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//for index views of users
		$users = User::all();
		
		return View::make('users.index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//load the create form (app/views/users/create.blade.php)
		return View::make('users.create')
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validate

		$rules = array(
			'username'		=>	'required',
			'password'		=>	'required',
			'role'			=>	'required',
			'fname'			=>	'required',
			'mname'			=>	'required',
			'lname'			=>	'required',
			'gender'		=> 	'required',
			'address'		=> 	'required',
			'email'			=> 	'required|email'
		);
		$validator = Validator::make(Input:all(), $rules)
		
		//do again
		if ($validator->fails()){
			return RedirectL::to('users/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		
		}
		
		else {
			//store
			$user = new User;
			$user->username		= Input::get('username');
			$user->password		= Input::get('password');
			$user->role			= Input::get('role');
			$user->fname		= Input::get('fname');
			$user->mname		= Input::get('mname');
			$user->lname		= Input::get('lname');
			$user->gender		= Input::get('gender');
			$user->address		= Input::get('address');
			$user->email		= Input::get('email');
			$user->save();
			
			Session::flash('message', 'Congratulations you have been registered!!');
			return Redirect::to('users');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
