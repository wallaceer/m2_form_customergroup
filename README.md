# Customer extension for Magento 2

## Description

This module extend the form for register a new customer account and the edit customer account.
It add this fields to new customer form:
- customer groups
- Full street addredd data
- Terms & Conditions

It add this fields to customer's data in the customer reserved area:
- PEC
- Recipient Code for digital billing

By the admin panel, in Extensions WS -> Customer, you can: 
* enable the customer group
* select which groups must be active in the select
* enable Terms & Conditions
* select which of the custom terms & conditions must be enabled
* enable PEC
* enable "Recipient Code" 

The section "Full street addredd data" should be enabled/disabled from xml layout file

## Setup

You can install this module via Composer or a manual setup.
To install it with composer you can insert this rows in your magento's composer.json
```
"require": {
	"ws/customer": "1.0.*"
    },
```
```
"repositories": {
	"m2_warehouse":{
            "type": "git",
            "url": "git@github.com:wallaceer/m2_customer.git"
        }
    }
```
  
After edited composer.json 
- launch composer update
- verify the module status with bin/magento module:status | grep Ws_Customer
- enable the module, if necessary, with bin/magento module:enable Ws_Customer
- run bin/magento setup:upgrade
    
For a manual installation:
* copy the module in your magento `app/code`
* run `bin/magento setup:upgrade`
* verify the module status with `bin/magento module:status | grep Ws_Customer`


In every case remember to launch the command `bin/magento setup:upgrade` for cleaning the cache

## Note
This module was developed with Magento 2.3.4 CE   