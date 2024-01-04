#!/bin/bash
#

sh permission.sh 
php bin/magento cache:clean 
php bin/magento cache:flush 
sh clear.sh
bin/magento setup:static-content:deploy -f
