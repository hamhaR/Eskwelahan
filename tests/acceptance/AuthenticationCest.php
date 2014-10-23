<?php
use \AcceptanceTester;

class AuthenticationCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests

    public function tryToLoginWithValidData(AcceptanceTester $I)
    {
        $I->wantTo('login with valid username and password');
        $I->fillField('username', 'juan');
        $I->fillField('password', 'tamad');
        $I->click('LOGIN');
        $I->see('Welcome');
    }

    public function tryToLoginWithInvalidData(AcceptanceTester $I)
    {
        $I->wantTo('login with invalid username and password');
        $I->fillField('username', 'juan');
        $I->fillField('password', 'masipag');
        $I->click('LOGIN');
        $I->see('Username and password did not match.');
    }

    public function tryToLoginWithEmptyField(AcceptanceTester $I)
    {
        $I->wantTo('login, required field left blank');
        $I->fillField('username', '');
        $I->fillField('password', 'masipag');
        $I->click('LOGIN');
        $I->see('Required field/s missing.');
    }
}