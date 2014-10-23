<?php
use \AcceptanceTester;

class CreateAccountCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('Create Account');
        $I->amOnPage('/users/create');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToCreateAccountWithValidData(AcceptanceTester $I)
    {
        $I->wantTo('create account with valid data');
        $I->fillField('username', 'kerty');
        $I->fillField('password', 'bubbles123');
        $I->fillField('fname', 'Louie Kert');
        $I->fillField('mname', 'Bubbles');
        $I->fillField('lname', 'Basay');
        $I->selectOption(['xpath'=>'//select[@id="role"]'], 'Student');
        $I->selectOption(['xpath'=>'//select[@id="gender"]'], 'Male');
        $I->fillField('address', 'Iligan City');
        $I->fillField('email', 'lkb123@yahoo.com');
        $I->click('Register!');
        $I->amOnPage('/login');
    }

    public function tryToCreateAccountWithInvalidData(AcceptanceTester $I)
    {
        $I->wantTo('create account with invalid email format');
        $I->fillField('username', 'kerty');
        $I->fillField('password', 'bubbles123');
        $I->fillField('fname', 'Louie Kert');
        $I->fillField('mname', 'Bubbles');
        $I->fillField('lname', 'Basay');
        $I->selectOption(['xpath'=>'//select[@id="role"]'], 'Student');
        $I->selectOption(['xpath'=>'//select[@id="gender"]'], 'Male');
        $I->fillField('address', 'Iligan City');
        $I->fillField('email', 'lkb123');
        $I->click('Register!');
        $I->amOnPage('/users/create');
        //$I->see('Invalid input type for email.');
    }

    public function tryToCreateAccountWithBlankFields(AcceptanceTester $I)
    {
        $I->wantTo('create account with missing data');
        $I->fillField('username', 'kerty');
        $I->fillField('password', 'bubbles123');
        $I->fillField('fname', 'Louie Kert');
        $I->fillField('mname', '');
        $I->fillField('lname', 'Basay');
        $I->selectOption(['xpath'=>'//select[@id="role"]'], 'Student');
        $I->selectOption(['xpath'=>'//select[@id="gender"]'], 'Male');
        $I->fillField('address', 'Iligan City');
        $I->fillField('email', 'lkb123');
        $I->click('Register!');
        $I->amOnPage('/users/create');
        //$I->see('Required field/s missing');
    }
}