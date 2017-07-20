<?php

class HomePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    public function hasMainMenu(AcceptanceTester $I)
    {
//        $I->seeLink('Questions');
//        $I->seeLink('Tags');
//
//        $androidTags = $I->getElementsBy('.post-tag', null, 'android');
//        if (count($androidTags) > 0) {
//            $tag = $androidTags[0];
//            $tag->click();
//            $I->makeScreenshot('olololo');
//        }
    }
}