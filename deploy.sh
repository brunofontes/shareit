#!/bin/sh
git checkout production && git merge master && git checkout - && git push origin production && ssh -A contabo -t "cd /var/www/shareit.brunofontes.net; git fetch --all; git checkout --force production; git pull origin production --force; ~/composer.phar install -n --optimize-autoloader --no-dev; npm install"
