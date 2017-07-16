#!/usr/bin/env bash

curl -o composer.phar https://getcomposer.org/composer.phar -O composer.phar
php composer.phar install

curl -o selenium-server-standalone.jar http://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.1.jar

curl -o chromedriver.zip https://chromedriver.storage.googleapis.com/2.30/chromedriver_linux64.zip
unzip -o chromedriver.zip && rm -f chromedriver.zip

cp tests/_data/users.yml.dist tests/_data/users.yml