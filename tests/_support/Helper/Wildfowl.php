<?php

namespace Helper;

use Codeception\Module;
use Codeception\Module\WebDriver;
use Codeception\TestInterface;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\DomCrawler\Crawler;

class Wildfowl extends Module
{
    /**
     * @param $selector
     * @param null|\Facebook\WebDriver\Remote\RemoteWebElement $parent
     * @return \Facebook\WebDriver\Remote\RemoteWebElement[]
     */
    public function getElementsBy($selector, $parent = null)
    {
        /** @var WebDriver $webDriverModule */
        $webDriverModule = $this->getModule('WebDriver');
        if (null == $parent) {
            return $webDriverModule->_findElements($selector);
        } else {
            return $parent->findElements(WebDriverBy::cssSelector('.question-hyperlink'));
        }
    }

    /**
     * @param string $url
     * @return string
     */
    public function getUriFrom($url)
    {
        $url = str_replace('https://', '', $url);
        $url = str_replace('http://', '', $url);
        $url = explode('/', $url);
        unset($url[0]);

        return '/' . implode('/', $url);
    }
}