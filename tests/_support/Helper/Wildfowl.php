<?php

namespace Helper;

use Codeception\Module;
use Codeception\Module\WebDriver;
use Facebook\WebDriver\WebDriverBy;

class Wildfowl extends Module
{
    /**
     * @param $selector
     * @param null|\Facebook\WebDriver\Remote\RemoteWebElement $parent
     * @param null $text
     * @return \Facebook\WebDriver\Remote\RemoteWebElement[]
     */
    public function getElementsBy($selector, $parent = null, $text = null)
    {
        /** @var WebDriver $webDriverModule */
        $webDriverModule = $this->getModule('WebDriver');
        if (null == $parent) {
            $elements = $webDriverModule->_findElements($selector);
        } else {
            $elements = $parent->findElements(WebDriverBy::cssSelector($selector));
        }

        if (!empty($text)) {
            foreach ($elements as $key => $val) {
                if (false === strpos($val->getText(), $text)) {
                    unset($elements[$key]);
                }
            }
            $elements = array_values($elements);
        }

        return $elements;
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