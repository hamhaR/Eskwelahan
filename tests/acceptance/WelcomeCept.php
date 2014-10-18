<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/login');
$I->fillField('username', 'juan');
$I->fillField('password', 'tamad');
$I->click('LOGIN');
$I->see('welcome');
