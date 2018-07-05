# Opencart_Event_Hide_Shipping_Rate
## Overview
An Opencart event to disable flat rate as soon as the minimum order limit has been reached in the cart.

## Supported Opencart versions
3.0.2.0

## Prerequisites
- This event assumes that you have a flat rate configured in Opencart with a certain shipping cost. After the event is executed and the criteria fulfilled the flat rate will not be shown as a shipping option.
- The SQL script to add assumes the prefix 'OC_' to be used.

## Installation instructions
1. Execute AddEvent.sql on your Opencart database.
2. Add Shipping

## Event structure
The event is structured with the following attributes
Code   : Value shown in Opencart.
Trigger: Moment on which the event is executed.
Action : The file and public function that is executed.

*Values*
Code   : shipping_disablerate
Trigger: catalog/controller/checkout/shipping_method/after
Action : event/shippingrate/disablerate

## Remarks
- It is always recommended that you create a backup of your files and database before applying changes.
- No core files are adjusted by this event.
- In comparison to the [Opencart 2.2 Event documentation](https://github.com/opencart/opencart/wiki/Events-System) it is not required to register the event from the code. This is done via the SQL.
