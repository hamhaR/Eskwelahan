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

}
