<?php


class CreateAccountTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected $user;

    protected function _before()
    {
        $this->user = new User;
    }

    protected function _after()
    {
    }

    /*
     * testCreateAccount() function
     * create account with valid data
     */
    public function testCreateAccount()
    {
        $this->user->username = 'kerti';
        $this->user->role = 'student';
        $this->user->password = 'lkb123';
        $this->user->fname = 'Kert';
        $this->user->mname = 'Bubbles';
        $this->user->lname = 'Basay';
        $this->user->gender = 'male';
        $this->user->address = 'Iligan City';
        $this->user->email = 'kerti@gmail.com';
        $this->user->save();
        $find = User::find($this->user->id);
        $this->assertEquals('kerti', $find['username']);
    }

    /*
     * testCreateAccount() function
     * create account with valid data
     */
    public function testCreateInvalidAccount()
    {
        $this->controller  = new UserController;
        $data = [
            'username' => 'juan',
            'password' => 'juan',
            'role' => 'student',
            'fname' => 'Juna',
            'mname' => 'Janu',
            'lname' => 'Jnau',
            'gender' => 'male',
            'address' => 'Iligan City',
            'email' => 'janu@gmail.com'
        ];
        $store = $this->controller->store();
        $this->assertNotNull($store);
    }

}