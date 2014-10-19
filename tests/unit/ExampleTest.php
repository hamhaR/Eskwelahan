<?php


class ExampleTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected $user_id;

    protected function _before()
    {
        $this->user_id = $this->tester->haveRecord([
            'username' => 'samantha',
            'password' => 'samsam',
            'is_active' => 0
            ]);
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {

    }

}