#!/bin/bash
#

sudo sh permission.sh 
php bin/magento cache:clean 
php bin/magento cache:flush 
sudo sh clear.sh
sudo sh permission.sh 
bin/magento setup:static-content:deploy -f
sudo sh permission.sh 
