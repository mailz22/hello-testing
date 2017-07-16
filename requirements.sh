#!/usr/bin/env bash

composer install

wget http://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.1.jar
wget https://chromedriver.storage.googleapis.com/2.30/chromedriver_linux64.zip
unzip -o chromedriver_linux64.zip && rm -f chromedriver_linux64.zip

cp tests/_data/users.yml.dist tests/_data/users.yml