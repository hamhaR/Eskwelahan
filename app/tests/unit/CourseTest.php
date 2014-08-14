<?php


class CourseTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        $id = 1;
        $course = new CourseRepository;
        $find = $this->course->find($id);
        $this->assertEquals($find['course_code'], $id);
    }

}