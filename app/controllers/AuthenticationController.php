<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class AuthenticationController extends Controller {

public function postLogin() {
        //sets rules for validator
        $validator = Validator::make(Input::all(), [
                    'username' => 'required',
                    'password' => 'required'
        ]);
        //checks if validator passes and tries to get user's input for username and password
        if ($validator->passes()) {
            $credentials = [
                'username' => Input::get('username'),
                'password' => Input::get('password')
            ];
            // Try to log the user in.
            //sets remember_token to true para ang newly created user kay maka log in
            if (Auth::attempt($credentials, $remember_token = true)) {
                return Redirect::route('profile');
            }
        }
        //sets the error message
        $data['errors'] = new MessageBag([
            'password' => [
                'Invalid username and/or password.'
            ]
        ]);
        $data['username'] = Input::get('username');
        //if mag error pag log in
        return Redirect::route("login")
                        ->withInput($data);
    }

    public function getLogin() {
        $errors = new MessageBag();
        $old = Input::old("errors");
                
        if ($old) {
            $errors = $old;
        }
        $data = ['errors' => $errors];
        return View::make('users.login', $data);
    }
    
    public function getLogout() {
        
        Auth::logout();
        return Redirect::to('login')->with('message', 'You are logged out');
    }

    public function getProfile() {
        return View::make('users.profile');
    }

    public function editProfile()
    {
        return View::make('users.editprofile');
    }

    public function profileSaveChanges($id)
    {
        // validate
        $rules = [
            'fname'         =>  'required',
            'mname'         =>  'required',
            'lname'         =>  'required',
            'gender'        =>  'required',
            'address'       =>  'required',
            'email'         =>  'required|email'
        ];

        

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return Redirect::to('editprofile')->withErrors($validator);
        } 
        else 
        {
            $user = User::find($id);
            $user->fname        = Input::get('fname');
            $user->mname        = Input::get('mname');
            $user->lname        = Input::get('lname');
            $user->gender       = Input::get('gender');
            $user->address      = Input::get('address');
            $user->email        = Input::get('email');
            $user->save();
            Session::flash('message', 'Profile updated.');
            return Redirect::to('profile');
        }
    }
    
    public function profilechangepass($id)
    {
    	$pass = Input::get('password');
    	$newPassword = Input::get('newpassword');
    	$confirm = Input::get('confirm');
    	
    	$user = DB::table('users')->where('id', $id)->first();
    	if (Hash::check(Input::get('password'), $user->password)) 
    	{
    		// The passwords match...
    		if ($newPassword == $confirm) 
    		{
    			$user = User::find($id);
    			$user->password = Hash::make($newPassword);
    			$user->save();
    			Session::flash('message', 'Password successfully changed.');
    			return Redirect::to('profile');
    		}
    		else 
    		{
    			return Redirect::to('editprofile')->with('message', 'Passwords do not match.');
    		}
    	}
    	else {
    		return Redirect::to('editprofile')->with('message', 'Please enter your current password.');
    	}
    }

}
