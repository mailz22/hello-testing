<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.07.2017
 * Time: 13:49
 */
class ReceptUploadCest
{
    public function loginSuccessfully(AcceptanceTester $I)
    {
        $I->wantTo('Ensure that login work fine for correct credentials');

        $I->amOnPage('/');
        $I->click('.js_call_login');


        $user = $I->getRandUserByRoles(['USERProst']);

        $I->fillField('#app__simple_logon_login', $user->getUsername());
        $I->fillField('#app__simple_logon_password', $user->getPassword());
        $I->click('#logonSubmitBtn');

        $I->waitForText('Пройдите опрос о продуктах');
        $I->click('#reg-popup_survey .reg-popup__close');
        $I->waitForElementNotVisible('.reg-popup__overlay');
        $I->waitForElement('.js_user_auth_data');

        $I->click('.header__menu-item:nth-child(4) .header__menu-link');
        $I->seeCurrentUrlEquals('/recipes');
        $I->see('Рецепты Простоквашино');

    }
}