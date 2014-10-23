<?php


class CourseTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;
    protected $course;

    protected function _before()
    {
        $this->course = new Course;
    }

    protected function _after()
    {
    }

    // tests

    /*
     * testSeeAllListOfCourses() view the list of courses.
     */
    public function testSeeAllListOfCourses()
    {
        $all = $this->course->all();
        $this->assertEquals('CSC188',$all[0]['course_code']);
        $this->assertEquals('CSC186',$all[1]['course_code']);
        $this->assertEquals('HIST1',$all[2]['course_code']);
    }

    /*
     * testAddCourseWithValidData() function 
     * add new course with valid data
     */
    public function testAddCourseWithValidData()
    {
        $this->course->course_code = 'CSC112';
        $this->course->course_title = 'Computer Architecture and Organization';
        $this->course->course_description = 'Sample description';
        $this->course->save();
        $find = Course::find($this->course->id);
        $this->assertEquals('CSC112', $find['course_code']);
    }

    /*
     * testAddCourseWithInvalidData() function 
     * add new course with not enough data
     * @expectedException ErrorException
     */
    public function testAddCourseWithNotEnoughData()
    {
        $this->c = new CourseRepository;
        $data = [
            'course_code' => 'CSC112',
            'course_title' => 'Computer Programming II'
        ];
        $result = $this->c->add($data);
        $this->assertNull($result);
    }

    /*
     * testAddCourseWithInvalidData() function 
     * add new course with not enough data
     * @expectedException ErrorException
     */
    public function testAddExistingCourse()
    {
        $this->c = new CourseRepository;
        $data = [
            'course_code' => 'CSC188',
            'course_title' => 'Software Project Management',
            'course_description' => 'a software project management course'
        ];
        $result = $this->c->add($data);
        $this->assertNull($result);
    }

    /*
     * testEditCourse() function
     * edit course with valid data
     */
    public function testEditCourse()
    {
        $find1 = $this->course->find(1);
        $this->assertNotNull($find1);
        $find1->course_description = 'xox';
        $find1->save();
        $this->assertEquals('xox', $find1['course_description']);
    }

    /*
     * testEditCourse() function
     * edit course with valid data
     * @expectedException ErrorException
     */
    // public function testEditCourseWithEmptyData()
    // {
    //     $find1 = $this->course->find(1);
    //     $this->assertNotNull($find1);
    //     $find1->course_description = $data;
    // }

    /*
     * testdeleteCourse() function
     * delete course
     * I want to delete CSC188 course (id = 1)
     */
    public function testDeleteCourse()
    {
        $find1 = $this->course->find(1);
        $this->assertNull($find1['deleted_at']);
        $find1->delete(1);
        $this->assertNotNull($find1['deleted_at']);
    }

}