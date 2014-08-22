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

    // test find() function
    public function testFind()
    {
        $id = 1;
        $course = new CourseRepository;
        $find = $this->course->find($id);
        $this->assertEquals($find['course_code'], 'CSC188');
        $this->assertEquals($find['course_title'], 'Software Project Management');
        $this->assertEquals($find['course_section'], 'CS');
    }

    public function testAddWithValidData()
    {
        $coureData = [
            'course_code' => 'CSSC102',
            'course_section' => 'A2',
            'course_title' => 'Computer Programming II',
            'course_descripiton' => 'csc102'
        ];

        $course = new CourseRepository;
        $add = $course->add($courseData);
        $this->assertEquals($add, 20);
    }

    public function testAddWithInvalidData()
    {
        $coureData = [
            'course_code' => CSSC102,
            'course_section' => 'A2',
            'course_title' => 'Computer Programming II',
            'course_descripiton' => 'csc102'
        ];

        $course = new CourseRepository;
        $add = $course->add($courseData);
        $this->assertEquals($add, 'Invalid data.');
    }

    public function testDelete()
    {
        $id = 20;
        $course = new CourseRepository;
        $course->delete($id);
        $find = $course->find($id);
        $this->assertNull($find);
    }

    public function testEditWithValidData()
    {
        $id = 1;
        $data = [
            'course_descripiton' => 'update description'
        ];
        $course = new CourseRepository;
        $testIfNull = $course->find($id);
        $this->assertNotNull($testIfNull);
        $course->edit($id, $data);
        $testAttributes = $course->find($id);
        $this->assertEquals($testAttributes['course_descripiton'], $data['course_descripiton']);
    }

    public function testEditWithInvalidData()
    {
        $id = 1;
        $data = [
            'course_descripiton' => update description
        ];
        $course = new CourseRepository;
        $testIfNull = $course->find($id);
        $this->assertNotNull($testIfNull);
        $update = $course->edit($id, $data);
        $this->assertEquals($update, 'Invalid course definition.');
    }

}