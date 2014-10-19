<?php

class HomeworkTest extends TestCase 
{
	protected $useDatabase = true;
    
    /**
     * Tests add() function with valid data
     * and authorized user currently logged in.
     * The function should match the homework ID.
     */
    public function testAddHomeworkWithAuthorizedUser() {
    	Auth::attempt($this->teacherCredentials);
    
    	$homeworkData = [
    		'homework_title' => 'Reading - Animaks the Mudkip',
    		'homework_instruction' => '<p>Phnglui mglwnafh cthulhu rylei</p>',
    		'section_course_id' => 1
    	];
    
    	$homework = new HomeworkModel;
    	$id = $homework->add($homeworkData);
    	$this->assertEquals($id, 1);
    }
    
    /**
     * Tests add() function with valid data
     * and unauthorized user currently logged in.
     * The function should throw UnauthorizedException.
     * @expectedException UnauthorizedException
     */
    public function testAddHomeworkWithUnauthorizedUser() {
    	Auth::attempt($this->studentCredentials);
    
    	$homeworkData = [
    		'homework_title' => 'Propaganda of the Corrupt Philippine Politicians',
    		'homework_instruction' => '<p>Phnglui mglwnafh cthulhu rylei</p>',
    		'section_course_id' => 1
    	];
    
    	$homework = new HomeworkModel;
    	$id = $homework->add($homeworkData);
    	$attributes = $homework->find($id);
    }
    
    /**
     * Tests all() function with teacher logged in.
     * The function should return an array.
     */
    public function testAllHomeworkWithTeacherCredentials()
    {
    	Auth::attempt($this->teacherCredentials);
    
    	$homework = new HomeworkModel;
    	$results = $homework->all();
    	$this->assertEquals(1, $results[0]['id']);
    	$this->assertEquals('Reading - Animaks the Mudkip', $results[0]['homework_title']);
    	$this->assertEquals('CSC186', $results[0]['course_code']);
    	
    }
    
    /**
     * Tests all() function with student logged in.
     * The function should return an array.
     */
	public function testAllHomeworkWithStudentCredentials() 
	{
		Auth::attempt($this->studentCredentials);
		
		$homework = new HomeworkModel;
		$results = $homework->all();
		$this->assertEquals(1, $results[0]['id']);
		$this->assertEquals('Reading - Animaks the Mudkip', $results[0]['homework_title']);
		$this->assertEquals('CSC186', $results[0]['course_code']);
	}
}