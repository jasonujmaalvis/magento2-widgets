# Magento 2: Widgets
This module is to demonstrate the different fields available for Magento 2 widgets. The idea is to use this as a base or reference for creating your own widgets.

## Installation
You can install manually by following these steps:

  1. [Download](https://github.com/jasonujmaalvis/magento2-widgets/archive/master.zip) the repo zip file and extract
  2. You should have a folder called 'magento2-widgets-master'. Rename this folder to 'Widgets'
  3. Under your Magento site folder create a new directory 'app/code/Alvis'
  4. Upload the module to this folder 'app/code/Alvis/Widgets'

## Enable the module

    php bin/magento module:enable Alvis_Widgets

You may also need to re-compile:

    php bin/magento setup:upgrade
    php bin/magento setup:di:compile

## Integration
There is an example widget provided which has all the possible field types available. The available fields are listed below:

  * Text field
  * Text area field
  * Select field (boolean)
  * Select field (custom options)
  * Select field (custom source)
  * Depends on field (only shows depending on the value of another field)
  * Category chooser
  * Product chooser
  * Static block chooser
  * CMS page chooser
  * Image chooser
  * Conditions field

You can insert a widget through the Magento 2 admin area by adding it to the WYSIWYG editor when creating a page or static CMS block.