<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class AuthenticationController extends Controller {

    public function postLogin(){
        if (Auth::attempt(array('username'=>Input::get('username'), 
            'password'=>Input::get('password')))) {
        return Redirect::to('profile');
        } 
        else {
            if((Input::get('username') == null) || (Input::get('password') == null)){
                return Redirect::to('login')
            ->with('message', 'Required field/s missing.')
            ->withInput();
            }
            else{
                return Redirect::to('login')
            ->with('message', 'Username and password did not match.')
            ->withInput();
            }
        }
    }

    public function getLogin(){
        return View::make('users.login');
    }

    public function getLogout() {
        
        Auth::logout();
        return Redirect::to('login');
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
