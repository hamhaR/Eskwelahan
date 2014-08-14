<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('login');

$I->amOnPage('/');
$I->see('Welcome');