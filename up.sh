#!/usr/bin/env bash

java -jar selenium-server-standalone-2.53.1.jar -Dwebdriver.chrome.driver=./chromedriver
vendor/bin/codecept run --steps