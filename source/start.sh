#!/usr/bin/bash

tor &
sleep 60
service ssh start
php -S 0.0.0.0:80

exit 130
