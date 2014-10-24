<?php
use \AcceptanceTester;

class TestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    public function tryToCreateTestWithValidData(AcceptanceTester $I){
        $I->wantTo('create new test with valid data');
        $I->amOnPage('/');
        $I->fillField('username', 'samantha');
        $I->fillField('password', 'samsam');
        $I->click('LOGIN');
        $I->click('Tests');
        $I->click('#create');
        $I->fillField('test_name', 'Final Exam');
        $I->fillField('test_instructions', 'Final Exam na jud. Tarunga ug answer!.');
        //$I->fillField('test_name', 'Final Exam');
        $I->fillField('time_start', '10-22-14, 8:00 AM');
        $I->fillField('time_end', '10-23-14, 8:00 AM');
        //$I->fillField('teacher_id', '5');
        //$I->fillField('section_id', '1');
        $I->click('Create');
        $I->see('Final Exam');
    }
	
	public function tryToSeeListOfTest(AcceptanceTester $I)
    {
        $I->wantTo('see list of tests');
        $I->amOnPage('/');
        $I->fillField('username', 'samantha');
        $I->fillField('password', 'samsam');
        $I->click('LOGIN');
        $I->click('Tests');
        $I->see('Test');
        $I->see('Final Exam');
    }
}