<?php

class HomePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function hasMainMenu(AcceptanceTester $I)
    {
        $I->seeLink('Questions');
        $I->seeLink('Tags');
    }
}