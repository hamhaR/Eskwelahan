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
    		'course_id' => 2,
    		'teacher_id' => 5
    	];
    
    	$homework = new HomeworkModel;
    	$id = $homework->add($homeworkData);
    	$this->assertEquals($id, 4);
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
    		'course_id' => 2,
    		'teacher_id' => 1
    	];
    
    	$homework = new HomeworkModel;
    	$id = $homework->add($homeworkData);
    	$attributes = $homework->find($id);
    }

}