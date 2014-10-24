<?php
use \AcceptanceTester;

class CourseCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'F3$kw31@');
        $I->click('LOGIN');
        $I->click('Courses');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToSeeListOfCourse(AcceptanceTester $I)
    {
        $I->wantTo('perform actions and see result');
        $I->see('CSC188');
        $I->see('CSC186');
        $I->see('HIST1');
    }

    public function tryToAddCourseWithValidData(AcceptanceTester $I)
    {
        $I->wantTo('add new course');
        $I->click('#create');
        $I->fillField('course_code', 'CSC145');
        $I->fillField('course_title', 'Programming Languages');
        $I->fillField('course_description', 'Sample description');
        $I->click('Submit');
        //$I->see('CSC145');
    }

    public function tryToAddExistingCourse(AcceptanceTester $I)
    {
        $I->wantTo('add existing course');
        $I->click('#create');
        $I->fillField('course_code', 'CSC188');
        $I->fillField('course_title', 'Software Project Management');
        $I->fillField('course_description', 'Sample description');
        $I->click('Submit');
        $I->see('Error. Please try again.');
    }

    public function tryToAddCourseWithInvalidData(AcceptanceTester $I)
    {
        $I->wantTo('add course but required field left blank');
        $I->click('#create');
        $I->fillField('course_code', '');
        $I->fillField('course_title', 'Software Project Management');
        $I->fillField('course_description', 'Sample description');
        $I->click('Submit');
        $I->see('Error. Please try again.');
    }

    public function tryToEditCourse(AcceptanceTester $I)
    {
        $I->wantTo('edit CSC186 description from "a human computer interaction course for cs students" to "Edit description"');
        $I->click('#edit1');
        $I->fillField('course_description', 'Edit description');
        //$I->click('#submit');
        $I->click('Submit');
        $I->see('CSC186');
        $I->see('Edit description');
    }

    public function tryToDeleteCourse(AcceptanceTester $I)
    {
        $I->wantTo('delete course');
        $I->click('#delete0');
        $I->click('Yes');
        $I->dontSee('CSC145');
    }
}