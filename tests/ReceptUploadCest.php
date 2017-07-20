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
        $I->wantTo('Ensure that add recipe form works fine!');

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

//        $I->click('.header__menu-item:nth-child(4) .header__menu-link');
//        $I->seeCurrentUrlEquals('/recipes');
//        $I->see('Рецепты Простоквашино');
//        $I->click('.recipe__btn-add recipe__btn-add_top js_add_recipe_link');
//        $I->waitForText('Добавление рецепта');

        $I->amOnPage('/recipes/recipe_add');

        $I->fillField('#add_recipe_title', 'header');
        $I->selectCuselOption('#cuselFrame-add_recipe_level', 'span[val="1"]');

//        $I->fillField('#add_recipe_usr_ingredients_0_usr_product_term', 'картошка');
//        $I->waitForElementVisible('.ui-corner-all');
//        $I->click('.ui-corner-all:nth-child(1)');
        $this->fillIngr($I, 0, 'картошка');
        $I->click('#add_step_link btn orange');
        $this->fillIngr($I, 1, 'свекла');

        $I->selectCuselOption('#cuselFrame-add_recipe_usr_ingredients_0_dimension', 'span[val="11"]');
        $I->makeScreenshot('option');
//        $I->fillField('id add_recipe_usr_ingredients_0_quantity', 'ingridient2');
//        $I->click('.add_step_link btn orange');
//        $I->waitForElement('.add_recipe_usr_ingredients_1_usr_product_term', 'ingridient2');
//        $I->fillField('.id add_recipe_usr_ingredients_0_quantity', 'ingridient3');
//        $I->click('.add_step_link btn orange');
//        $I->waitForElement('.add_recipe_usr_ingredients_1_usr_product_term', 'ingridient3');
//        $I->fillField('.id add_recipe_usr_ingredients_0_quantity', 'ingridient4');
//        $I->click('.add_step_link btn orange');
//        $I->waitForElement('.add_recipe_usr_ingredients_1_usr_product_term', 'ingridient4');
//        $I->fillField('.id add_recipe_usr_ingredients_0_quantity', 'ingridient5');
//        $I->click('.add_step_link btn orange');
        //$I->waitForElement('.add_recipe_usr_ingredients_1_usr_product_term' 'ingridient5');
        //$I->attachFile($filename '.add_recipe_steps_0_image_binaryContent');
        //$I->fillField('.add_recipe_steps_0_desc' text for image);
        //;$I->fillField('.add_recipe_text' recept coment )
    }

    private function fillIngr(AcceptanceTester $I, $number, $productname)
    {
        $I->fillField('#add_recipe_usr_ingredients_' . $number . '_usr_product_term', $productname);
        $I->waitForElementVisible('.ui-corner-all');
        $I->click('.ui-corner-all:nth-child(1)');
    }
}