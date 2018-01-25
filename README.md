# MyProject

This Magento 2 module provides the functionality that when an order is fully paid, stores the order ID and the paid total sum multiplied by a decimal factor.

## Module Details:

* The paid total sum is multiplied by a preset decimal factor
* Values and order IDs are logged into a database table
* Admin page enables and disables the function
* Admin page sets the decimal factor

## Installation Instruction:

* The downloaded module has to be placed in the app/code/MadePeople/Worksample namespace  
* Run magento2 command line bin/magento setup:upgrade and bin/magento cache:clean
