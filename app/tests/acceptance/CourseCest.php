<?php
use \AcceptanceTester;

class CourseCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function tryToTestListOfCourse(AcceptanceTester $I)
    {
        $I->wantTo('see the list of course in the system');
        $I->amOnPage('/course');
        $I->see('CSC188');  
    }

    public function tryToAddCourseWithValidData(AcceptanceTester $I){
        $I->wantTo('add a new course');
        $I->expectTo('see the new added course');
        $I->amOnPage('/course');
        $I->click('Create Course');
        $I->fillField('course_code', 'CSC145');
        $I->fillField('course_title', 'Programming Languages');
        $I->fillField('course_description', 'PL course');
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/course');
        $I->see('CSC145');
    }

    public function tryToAddCourseAlreadyExist(AcceptanceTester $I){
        $I->wantTo('add an existing course');
        $I->expectTo('see Invalid data!');
        $I->amOnPage('/course');
        $I->click('Create Course');
        $I->fillField('course_code', 'CSC186');
        $I->fillField('course_title', 'Human Computer Interaction');
        $I->fillField('course_description', 'HCI course');
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/course');
        $I->see('Invalid data.');
    }

    public function tryToDeleteCourse(AcceptanceTester $I){
        $I->wantTo('delete a course');
        $I->expectTo('the course is deleted from the system');
        $I->amOnPage('/course');
        $I->click('HIST1');
        $I->click('Delete Course');
        $I->canSeeInCurrentUrl('/course');
        $I->dontSee('HIST1');
    }

    public function tryToEditCourse(AcceptanceTester $I){
        $I->wantTo('edit a course');
        $I->expectTo('the course is updated');
        $I->amOnPage('/course');
        $I->click('CSC188');
        $I->click('Edit Course');
        $I->fillField('course_description', 'Subject for software engineering students');
        $I->click('Submit');
        $I->canSeeInCurrentUrl('/update/2');
        $I->see('Subject for software engineering students');
    }
}