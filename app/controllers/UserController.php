<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class UserController extends Controller {

 	private $users;
 	 
 	public function __construct(UserModel $users) {
        $this->users = $users;
    }
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
		return View::make('users.create');
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
			'username'		=>	'required|Unique:users',
			'password'		=>	'required',
			'role'			=>	'required',
			'fname'			=>	'required',
			'mname'			=>	'required',
			'lname'			=>	'required',
			'gender'		=> 	'required',
			'address'		=> 	'required',
			'email'			=> 	'required|email'
		);
		
		$validator = Validator::make(Input::all(), $rules);
		
		//do again
		if ($validator->fails()){
			return Redirect::to('users/create')
				->withErrors('Required field left blank.')
				->withInput(Input::except('password'));
		
		}
		
		else {
			//store
			$user = new User;
			$user->username		= Input::get('username');
			$user->password     = Hash::make(Input::get('password'));
			$user->role			= Input::get('role');
			$user->fname		= Input::get('fname');
			$user->mname		= Input::get('mname');
			$user->lname		= Input::get('lname');
			$user->gender		= Input::get('gender');
			$user->address		= Input::get('address');
			$user->email		= Input::get('email');
			$user->save();

			
			
			return Redirect::to('login')->with('message', 'Congratulations! You are now registered!');
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
		$user = User::find($id);
		return View::make('users.show')->with('friend',$user);
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

	/**
	 * Admin Panel - Manage Account - Show all users' info on a table
	 *
	 * @return Response
	 */
	public function showAllUsers()
	{
		$role = Auth::user()->role;
		if ($role == 'admin') 
		{
			$users = User::all();
		
			return View::make('users.manageindex')->with('users', $users);
		}
		else 
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
	}
	
	/**
	 * Admin Panel - Add New Account
	 */
	public function createAccountAdminPanel()
	{
		$role = Auth::user()->role;
		if ($role == 'admin')
		{
			return View::make('users.managecreate');
		}
		else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
	}
	
	/**
	 * Used for POSTs in Add New Account.
	 */
	public function createAcctAdminHelper()
	{
		$role = Auth::user()->role;
		if ($role == 'admin')
		{
			$pass = Input::get('password');
			$confirm = Input::get('confirm');
					
			if ($pass == $confirm)
			{
				
				$passHashed = Hash::make($pass);
				
				$rules = array(
						'username'		=>	'required',
						'password'		=>	'required',
						'confirm'		=> 	'required',
						'role'			=>	'required',
						'fname'			=>	'required',
						'mname'			=>	'required',
						'lname'			=>	'required',
						'gender'		=> 	'required',
						'address'		=> 	'required',
						'email'			=> 	'required|email'
				);
				
				$validator = Validator::make(Input::all(), $rules);
				
				//do again
				if ($validator->fails()){
					return Redirect::to('createaccountadmin')
					->withErrors($validator)
					->withInput(Input::except(array('password','confirm')));
				}
				
				else {
					//store
					$user = new User;
					$user->username		= Input::get('username');
					$user->password     = $passHashed;
					$user->role			= Input::get('role');
					$user->fname		= Input::get('fname');
					$user->mname		= Input::get('mname');
					$user->lname		= Input::get('lname');
					$user->gender		= Input::get('gender');
					$user->address		= Input::get('address');
					$user->email		= Input::get('email');
					$user->save();
				
						
						
					return Redirect::to('manageaccounts')->with('message','User added.');
				}
				
				
			}
			else
			{
				return Redirect::to('createaccountadmin')->with('message', 'Passwords do not match.');
			}

		}
		else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
	}
	
	/**
	 * Admin Panel - Edit Account
	 */
	public function editAccountAdminPanel($id)
	{
		$role = Auth::user()->role;
		$user = User::find($id);
		if ($role == 'admin')
		{
			return View::make('users.manageedit')->with('user', $user);
		}
		else
		{
			return Redirect::to('profile')->with('message', 'Access is restricted.');
		}
	}
	
	/**
	 * Helper for the above function.
	 */
	public function editAcctHelper($id)
	{
		// validate
		$rules = array(
						'role'			=>	'required',
						'fname'			=>	'required',
						'mname'			=>	'required',
						'lname'			=>	'required',
						'gender'		=> 	'required',
						'address'		=> 	'required',
						'email'			=> 	'required|email'
				);
		

		
		$validator = Validator::make(Input::all(), $rules);
		
		if ($validator->fails())
		{
			return Redirect::to('editinfoadminhelper/' . $id)
			->withErrors($validator);
		}
		else
		{
			$user = User::find($id);
			$user->fname = Input::get('fname');
			$user->mname = Input::get('mname');
			$user->lname = Input::get('lname');
			$user->role = Input::get('role');
			$user->gender = Input::get('gender');
			$user->address = Input::get('address');
			$user->email = Input::get('email');
			$user->save();
			Session::flash('message', 'User info successfully updated.');
			return Redirect::to('manageaccounts');
		}
	}
}
