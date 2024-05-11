#!/bin/zsh
export VAGRANT_CWD=/home/bruno/development/Homestead/
vagrant up
eval $DEV_BROWSER http://shareit.test \
https://mailtrap.io/inboxes/455614/messages \
https://dashboard.pusher.com/apps/1505830/console \
&
