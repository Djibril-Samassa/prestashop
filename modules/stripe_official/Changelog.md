Changelog for Stripe Connector
===

3.0.2
---

* _FIXED_ amount not calculated correctly on checkout
* _FIXED_ javascript interferrence on older PS versions
* _FIXED_ json decoding information for payment intent
* _FIXED_ payment element initialization on older PS versions
* _FIXED_ logger errors on Stripe Customer
* _FIXED_ incompatibility issues with PS version newer than 8.0.0
* _FIXED_ specific compatibility issues for PS version 8.0.3
* _FIXED_ user not able to save live keys
* _CHANGED_ Version

3.0.1
---

* _FIXED_ Plugin interacting and breaking css on checkout
* _FIXED_ Plugin interacting and breaking other plugins/payment methods
* _CHANGED_ Version

3.0.0
---

* _FIXED_ Remove beta flags
* _CHANGED_ Version

3.0.0-RC2
---

* _FIXED_ Billing Details are not used to render Payment Elements
* _FIXED_ When using Stripe Checkout, the total amount does not include VAT
* _FIXED_ Send billing details when rendering payment elements
* _FIXED_ "Do not collect zip code" is working now
* _FIXED_ Checkout and Payment Element are displayed in the wrong locale
* _FIXED_ Refund page problem, where we got a blank page instead of an error
* _FIXED_ Full/Partial Refund status syncing
* _FIXED_ Missing images for payment methods
* _FIXED_ Caching issue
* _FIXED_ Rename the "Payment form settings" option
* _FIXED_ SEPA doesn't capture automatically
* _FIXED_ Text and asterisk corrections on Prestashop backoffice
* _FIXED_ Cancel Payment Sync between Stripe dashboard and Prestashop backoffice
* _FIXED_ Checkout error on successful transactions
* _FIXED_ Payment Error status on Prestashop backoffice
* _FIXED_ Remove shipping and product details and only send total amount with checkout
* _FIXED_ Do not filter payment methods when separate auth and capture is activated
* _FIXED_ 3D Secure 'Cancel' button redirect to correct page
* _ADDED_ Style Payment Element from back office

3.0.0-RC1
---

* _ADDED_ Billing and delivery details sent when creating a checkout session
* _ADDED_ Decouple Payment Intent creation and Payment Element rendering
* _ADDED_ Fraud and payment data with OMS sync
* _FIXED_ Capture option in backoffice			
* _FIXED_ Remove 'Save customer cards' option	
* _ADDED_ Radio button for both Payment Elements and Stripe Checkout		
* _FIXED_ Remove "Collect client name" option in connector options	
* _FIXED_ Customers are not created in stripe dashboard	
* _FIXED_ Remove the option for Google Pay and Apple Pay from the backoffice
* _FIXED_ Fix the current refund implementation	
* _FIXED_ Removing support from PrestaShop 1.6		
* _ADDED_ Payments with Payment Element	
* _ADDED_ Payments with Stripe Checkout	
* _ADDED_ Simultaneous auth and capture with OMS sync		
* _ADDED_ Separate auth and capture with OMS sync
