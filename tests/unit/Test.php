<?php


class Test extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;
    protected $mytest;

    /*
     * samantha (id = 5) create section A1B1
     */
    protected function _before()
    {
        $this->section = new Section;
        $this->section->section_name = 'A1B1';
        $this->section->teacher_id = 5;
        $this->section->save();       
        
        $this->mytest = new Testunit;
        $this->mytest->test_name = 'Final Exam';
        $this->mytest->test_instructions = 'Sample Instruction';
        $this->mytest->time_start = '10-23-14, 10:00 AM';
        $this->mytest->time_end = '10-29-14, 11:00 AM';
        $this->mytest->section_id = $this->section->section_id;
        $this->mytest->teacher_id = 5;
        $this->mytest->save();
    }

    protected function _after()
    {
    }

    // tests

    /*
     * testAddTestWithValidData() function
     * add test with valid data
     * the user login as samantha (id = 5)
     */
    public function testAddTestWithValidData()
    {
        $find2 = Testunit::find($this->mytest->id);
        $this->assertEquals('Final Exam', $find2['test_name']);
    }

    /*
     * testAddTestWithInvalidData() function
     * required field left blank
     * the user login as samantha (id = 5)
     * @expectedException ErrorException
     */
    public function testAddTestWithInvalidData()
    {
        $this->mytest->test_name = 'Final Exam';
        $this->mytest->time_start = '10-23-14, 10:00 AM';
        $this->mytest->time_end = '10-29-14, 11:00 AM';
        $this->mytest->section_id = $this->section->section_id;
        $this->mytest->teacher_id = 5;
        $this->mytest->save();
    }

    /*
     * testEditTest() function
     * edit test with valid data
     */
    public function testEditTest()
    {
        $find1 = $this->mytest->find($this->mytest->id);
        $this->assertNotNull($find1);
        $find1->test_name = 'Final Quiz';
        $find1->save();
        $this->assertEquals('Final Quiz', $find1['test_name']);
    }

    /*
     * testEditTestInvalidDat() function
     * edit test with invalid data
     * @expectedException ErrorException
     */
    // public function testEditTestInvalidData()
    // {
    //     $this->mytestmodel = new TestModel;
    //     $data = [
    //         'test_name' => 'Final Examination',
    //         'test_instructions' => 'Sample Instructions for this course',
    //         'time_start' => '20-23-14, 10:00 AM',
    //         'time_end' => '10-29-14, 11:00 AM'
    //     ];
    //     $add = $this->mytestmodel->add($data);
    //     $this->assertNull($add);
        // $find1 = $this->mytest->find($this->mytest->id);
        // $this->assertNotNull($find1);
        // $find1->test_name = 'Final Examination';
        // $find1->test_instructions = 'Sample Instructions for this course';
        // $find1->time_start = '10-23-14, 10:00 AM';
        // $find1->time_end = '10-29-14, 11:00 AM';
        // $find1->section_id = $this->section->section_id;
        // $find1->teacher_id = 5;
        // $find1->save();
        // $this->assertEquals('1234', $find1['test_name']);
    //}

    /*
     * testDeleteTest() function
     * delete test
     */
    public function testDeleteTest()
    {
        $find1 = $this->mytest->find($this->mytest->id);
        $this->assertNull($find1['deleted_at']);
        $find1->delete($this->mytest->id);
        $this->assertNotNull($find1['deleted_at']);
    }

}