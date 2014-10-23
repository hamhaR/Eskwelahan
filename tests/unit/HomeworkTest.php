<?php


class HomeworkTest extends \Codeception\TestCase\Test
{
	protected $tester;
	protected $section;
	protected $course;
	protected $sectioncourse;
	protected $homework;

	/**
    * @var \UnitTester
    */
    protected function _before()
    {
    	$this->section = new Section;
    	$this->section->section_name = 'AUS1';
    	$this->section->teacher_id = 5;
    	$this->section->save();

    	$this->course = new Course;
    	$this->course->course_code = 'CSC112';
        $this->course->course_title = 'Computer Architecture and Organization';
        $this->course->course_description = 'Sample description';
        $this->course->save();

    	$this->sectioncourse = new SectionCourse;
    	$this->sectioncourse->section_id = $this->section->section_id;
    	$this->sectioncourse->course_id = $this->course->id;
    	$this->sectioncourse->save();

    	$this->homework = new Homework;
    	$this->homework->homework_title = 'Assignment 1: Before the British Colonisation';
    	$this->homework->homework_instruction = '<p>G\'day, this is an easy homework.</p>';
    	$this->homework->section_course_id = $this->sectioncourse->section_course_id;
    	$this->homework->deadline = '2014-12-16';
    	$this->homework->save();
    } 

    protected function _after()
    {
    }

    // tests

    /*
     * testAddQuestionValidData() function
     * add questions with valid data
     */
    public function testAddHomeworkValidData()
    {
        $find = Homework::find($this->homework->id);
        $this->assertEquals('Assignment 1: Before the British Colonisation', $find['homework_title']);
        $this->assertEquals('<p>G\'day, this is an easy homework.</p>', $find['homework_instruction']);
        $this->assertEquals($this->sectioncourse->section_course_id, $find['section_course_id']);
        $this->assertEquals('2014-12-16', $find['deadline']);
    }

    public function testAddHomeworkInvalidData()
    {
    	$this->homework->homework_title = 'Assignment 2: The Landing of Captain James Cook at Sydney Cove';
    	$this->homework->section_course_id = $this->sectioncourse->section_course_id;
    	$this->homework->deadline = '2014-12-16';
    	$this->homework->save();
    }

    public function testEditHomeworkValidData()
    {
    	$find = $this->homework->find($this->homework->id);
        $this->assertNotNull($find);
        $find->homework_instruction = '<p>List the possible survival methods used by the Aboriginal People before the British colonisation.</p>';
        $find->save();
        $this->assertEquals('<p>List the possible survival methods used by the Aboriginal People before the British colonisation.</p>', $find['homework_instruction']);
    }

    public function testEditHomeworkInvalidData()
    {
    	$find = $this->homework->find($this->homework->id);
        $this->assertNotNull($find);
        $find->homework_instruction = '';
        $find->save();
    }

    public function testDeleteHomework()
    {
        $find = $this->homework->find($this->homework->id);
        $this->assertNull($find['deleted_at']);
        $find->delete($this->homework->id);
        $this->assertNotNull($find['deleted_at']);
    }
}