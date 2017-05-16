<img src="paygol_logo.png" alt="PayGol - WHMCS" /><br>



# WHMCS


## PayGol module for WHMCS, version 4.0<br>
[About PayGol](#about-paygol) <br>
[About this module](#about-this-module) <br>
[Requirements](#requirements) <br>
[Installation](#installation) <br>
[Testing](#testing) <br>
[Important Notes](#important-notes) <br><br>

---

## PayGol module for WHMCS, version 4.0 

### About PayGol:

- PayGol is an online payment service provider that offers a wide variety of both worldwide and local payment methods.
- Additional information can be found at:
  https://www.paygol.com  <br>
  https://www.paygol.com/pricing

  
### About this module:
- This module allows you to easily integrate PayGol on your platform. PayGol is an online payment gateway that offers a 
  wide array of both worldwide and local payment methods such as credit and debit card, paysafecard, bank transfers, cash payments, 
  SMS/call and more. More payment options and wider coverage means that paying for your products and services is easier than ever 
  for your customers, and at the same time it means higher revenue for you.
  

### Requirements:

- Working WHMCS installation (tested up to version 7.1.1).
- PayGol account.
- Standard type PayGol service.
  
  
### Installation:

- Unzip the paygol_whmcs_4.0.zip file directly in the modules/gateways folder of your WHMCS installation.
- Activate the PayGol module in your WHMCS admin panel (`Setup -> Payment -> Payment Gateways -> All Payment Gateways`).
- Once it's activated, proceed to the module's setup page (`Setup -> Payment -> Payment Gateways -> Manage Existing Gateways`).
- Enter the ID of your PayGol service (can be found at the My Services section of your panel, at PayGol's website).
- Paste the provided URL into the Background URL (IPN) field at your service's configuration, 
  which you can access through the My Services section of your panel, at PayGol's website.

	

### Testing:

- To test the newly installed module you can enable your service's test mode at the My Services section of your panel, at PayGol's website. 
  Be sure to change it back before going live.

 
### Important Notes:

- While in test mode, an IPN request (payment notification to your platform) will be issued immediately after each test.
- After a payment is completed it will remain at pending state until you activate it at your WHMCS panel, 
  this is a safety measure to prevent abuse.
- Payments are usually notified immediately; however, certain payment methods may take longer to confirm the payment 
  (e.g. methods that take a few minutes to notify the transaction, or voucher-based transactions that require the payer to print 
  it in order to pay by cash at a given place). In these cases the product is shown as not paid, and only once it's confirmed by the 
  provider will it show as paid. We strongly recommend that you inform your customers about this beforehand in order to avoid confusions.
	

---
<br>

