<?php

class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('.js_call_login');
    }

    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->wantTo('Ensure that login work fine for correct credentials');

        $user = $I->getRandUserByRoles(['USERProst']);

        $I->fillField('#app__simple_logon_login', $user->getUsername());
        $I->fillField('#app__simple_logon_password', $user->getPassword());
        $I->click('#logonSubmitBtn');

        $I->amOnPage('/');

        $I->see('Выйти');
        $I->see('Моя страница');
    }

    public function loginWithInvalidPassword(AcceptanceTester $I)
    {
        $I->wantTo('Ensure that login work fine for incorrect credentials');

        $I->fillField('#app__simple_logon_login', 'hello-wildfowl@gmail.com');
        $I->fillField('#app__simple_logon_password', 'hello-wildfowl-123456');
        $I->click('#logonSubmitBtn');

        $I->waitForText('Неправильный логин или пароль');
    }
}