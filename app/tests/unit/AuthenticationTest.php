<?php

class AuthenticationTest extends TestCase
{
    protected $useDatabase = true;
    
    /**
     * Tests login with invalid username or password.
     * The function should return false.
     */
    public function testLoginWithInvalidCredentials(){
        $this->assertFalse(Auth::attempt([
                    'username' => 'juan',
                    'password' => ''
        ]));
        
        $this->assertFalse(Auth::attempt([
                    'username' => 'juan',
                    'password' => 'masipag'
        ]));
    }
	
    /**
     * Tests login with valid username and password.
     * The function should return true.
     */
    public function testLoginWithValidCredentials(){
       // $this->assertTrue(Auth::attempt($this->adminCredentials));
         $this->assertTrue(Auth::attempt([
                    'username' => 'juan',
                    'password' => 'tamad'
        ]));
    }

     /**
     * Tests the login method with missing arguments.
     * @expectedException ErrorException
     */
    public function testLoginWithMissingArguments(){
        Auth::attempt([
                    'username' => 'juan'
        ]);
    }
    
    /**
     * Tests the login method with invalid arguments.
     * @expectedException ErrorException
     */
    public function testLoginWithInvalidArguments(){
        Auth::attempt([
                    'username' => juan,
                    password => 'tamad'
        ]);
    }
    
 	
    /**
     * Tests the logout method with user not logged in.
     * The user must not be logged in before and after the method call.
     */
    public function testLogoutWithUserNotLoggedIn(){
        $this->assertFalse(Auth::check());
        Auth::logout();
        $this->assertFalse(Auth::check());
    }
    
}
