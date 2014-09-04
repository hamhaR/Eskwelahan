<?php

use Illuminate\Support\MessageBag;
use Illuminate\Routing\Controller;

class AuthenticationController extends Controller {

public function postLogin() {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        // Declare the rules for the form validation.
        $rules = array(
            'username'  => 'Required',
            'password'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            // Try to log the user in.
            //sets remember_token to true para ang newly created user kay maka log in
            if (Auth::attempt($userdata, $remember_token = true))
            {
                // Redirect to homepage
                return Redirect::to('profile')->with('message', 'You have logged in successfully');
            }
            else
            {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Username and password did not match'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogin() {
       // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('profile')->with('message', 'You are already logged in');
        }

        // Show the login page
        return View::make('users.login');
    }

    public function getLogout() {
        
        Auth::logout();
        return Redirect::to('login')->with('message', 'You are logged out');
    }

    public function getProfile() {
        return View::make('users.profile');
    }

}
