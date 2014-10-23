<?php
use \AcceptanceTester;

class HomeworkCest
{
    public function _before()
    {
        
    }

    public function _after()
    {
    }

	public function tryToCreateHomeworkWithValidData(AcceptanceTester $I)
    {
        $I->wantTo('add a new homework');
        $I->expectTo('see the new added homework');
        $I->amOnPage('/');
        $I->fillField('username', 'samantha');
        $I->fillField('password', 'samsam');
        $I->click('LOGIN');
        $I->click('Classes');
        $I->click('Add Class');
        $I->selectOption('course_id',2);
        $I->fillField('section_name', 'AUS');
        $I->click('Create');
        $I->wantTo('create new homework with valid data');
        $I->click('Homeworks');
        $I->click('Add New Homework');
        $I->amOnPage('/homeworks/create');
        $I->selectOption('section_course_id','CSC186 (Human Computer Interaction, section AUS )');
        $I->fillField('homework_title', 'Assignment 1: Understanding Our Wiccan Friends');
        $I->fillField('deadline', '2014-11-02');
        $I->fillField('homework_instruction', 'Whatever this is.');
        $I->click('Post Homework');
        $I->amOnPage('/homeworks');
        $I->see('Assignment 1: Understanding Our Wiccan Friends');
    }

    public function tryToCreateHomeworkWithInvalidData(AcceptanceTester $I)
    {
        $I->wantTo('add a new homework with invalid or missing data');
        $I->amOnPage('/');
        $I->fillField('username', 'samantha');
        $I->fillField('password', 'samsam');
        $I->click('LOGIN');
        $I->click('Homeworks');
        $I->click('Add New Homework');
        $I->amOnPage('/homeworks/create');
        $I->selectOption('section_course_id','CSC186 (Human Computer Interaction, section AUS )');
        $I->fillField('homework_title', '');
        $I->fillField('deadline', '2014-11-02');
        $I->fillField('homework_instruction', 'Whatever this is.');
        $I->click('Post Homework');
        $I->canSeeInCurrentUrl('/homeworks/create');
        $I->see('Required field is left blank.');
    }
/*
    public function tryToDeleteHomework(AcceptanceTester $I)
    {
        $I->wantTo('delete a homework');
        $I->expectTo('see that the homework is not listed');
        $I->amOnPage('/homeworks');
        $I->click('View Homework');
        $I->click('Delete Homework');
        $I->canSeeInCurrentUrl('/homeworks');
        $I->dontSee('Assignment 1: Understanding Our Wiccan Friends');
    }
    */
}