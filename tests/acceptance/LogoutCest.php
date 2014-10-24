<?php
use \AcceptanceTester;

class LogoutCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToLogout(AcceptanceTester $I)
    {
        $I->wantTo('logout from the system');
        $I->fillField('username', 'juan');
        $I->fillField('password', 'tamad');
        $I->click('LOGIN');
        $I->click('Logout');
        $I->amOnPage('/login');
    }
}