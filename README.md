##Risecommerce Abandoned Cart Email Extension
This extension is the perfect tool to convert visitors or guests into real customers. Send email reminders to bring customers back to the store to complete orders by giving lucrative offers.

##Support: 
version - 2.3.x, 2.4.x

##How to install Extension

1. Download the archive file.
2. Unzip the file
3. Create a folder [Magento_Root]/app/code/Risecommerce/AbandonedCart
4. Drop/move the unzipped files to directory '[Magento_Root]/app/code/Risecommerce/AbandonedCart'

#Enable Extension:
- php bin/magento module:enable Risecommerce_AbandonedCart
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:
- php bin/magento module:disable Risecommerce_AbandonedCart
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush
