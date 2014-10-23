<?php


class QuestionTest extends \Codeception\TestCase\Test
{
   /**
    * @var \UnitTester
    */
    protected $tester;
    protected $myquestion;

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

        $this->myquestion = new Question;
        $this->myquestion->content = '1+1=?';
        $this->myquestion->a = '0';
        $this->myquestion->b = '1';
        $this->myquestion->c = '3';
        $this->myquestion->d = '2';
        $this->myquestion->correct_answer = 'd';
        $this->myquestion->test_id = $this->mytest->id;
        $this->myquestion->save();
    }

    protected function _after()
    {
    }

    // tests

    /*
     * testAddQuestionValidData() function
     * add questions with valid data
     */
    public function testAddQuestionValidData()
    {
        $find = Question::find($this->myquestion->id);
        $this->assertEquals('d', $find['correct_answer']);
    }

    /*
     * testAddQuestionInvalidData() function
     * add questions with invalid data
     * @expectedException ErrorException
     */
    public function testAddQuestionInvalidData()
    {
        $this->myquestion->content = '1+1=?';
        $this->myquestion->a = '0';
        $this->myquestion->b = '1';
        $this->myquestion->d = '2';
        $this->myquestion->correct_answer = 'd';
        $this->myquestion->test_id = $this->mytest->id;
        $this->myquestion->save();
    }

    public function testEditQuestion()
    {
        $find = $this->myquestion->find($this->myquestion->id);
        $this->assertNotNull($find);
        $find->content = '1-1=?';
        $find->correct_answer = 'a';
        $find->save();
        $this->assertEquals('a', $find['correct_answer']);
    }

    /*
     * @expectedException ErrorException
     */
    // public function testEditQuestionInvalidData()
    // {
    //     $find = $this->myquestion->find($this->myquestion->id);
    //     $this->assertNotNull($find);
    //     $find->correct_answer = 5123;
    //     $find->save();
    // }

    /*
     * testDeleteQuestion() function
     * delete test
     */
    public function testDeleteQuestion()
    {
        $find = $this->myquestion->find($this->myquestion->id);
        $this->assertNull($find['deleted_at']);
        $find->delete($this->myquestion->id);
        $this->assertNotNull($find['deleted_at']);
    }
}