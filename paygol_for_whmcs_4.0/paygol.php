<?php
 /*
 * paygol.php
 * PayGol v4.0 2016
 *
 * LICENSE:
 * 
 * This payment module is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation; either version 3 of the License, or (at
 * your option) any later version.
 * 
 * This payment module is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser General Public
 * License for more details.
 * 
 * @author     PayGol 
 * @copyright  2016 PayGol
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       https://www.paygol.com
 * @
 */

require_once __DIR__ . '/../../init.php';
require_once __DIR__ . '/../../includes/functions.php';
 
if (!defined("WHMCS")){
    die("This file cannot be accessed directly");
}


// PayGol
function paygol_MetaData(){

    return array('DisplayName' 				        => 'PayGol',
                 'APIVersion'  				        => '1.1', // Use API Version 1.1
                 'DisableLocalCredtCardInput' => true,
                 'TokenisedStorage' 			    => false);

} 


// Define gateway configuration options
function paygol_config(){
		
    // Global variable required
    global $customadminpath;
    
    // Build IPN URL.
    $url_s   = ($_SERVER['HTTPS'] == "on") ? "https://" : "http://";				
		$url1    = $url_s.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$url2    = strpos($url1, $customadminpath);
		$url3    = substr($url1, 0, $url2);
		$url_ipn = $url3."modules/gateways/callback/paygol.php";
		
    // Config settings
		return array(
      'FriendlyName' => array('Type'  	     => 'System',
                              'Value' 	     => 'PayGol'),
      'accountID' 	 => array('FriendlyName' => 'Service ID',
                              'Type'         => 'text',
                              'Size'         => '20',
                              'Default'      => ''),
      'url_ipn'      => array('FriendlyName' => 'URL IPN',
                              'Type'         => '',
                              'Size'         => '',
                              'Default'      => '',
                              'Description'  => $url_ipn),
      'readme'       => array('FriendlyName' => '',
                              'Type'         => '',
                              'Size'         => '',
                              'Default'      => '',
                              'Description'  => 'Please read the readme.txt file for instructions on how to use this module')
    );
                    
}


// PayGol form link
function paygol_link($params){ 
	  
    // Gateway configuration parameters
    $accountId                   = $params['accountID'];
    	
	  // Invoice parameters
	  $invoiceId                   = $params['invoiceid'];
	  $description                 = $params["description"];
	  $amount                      = $params['amount'];
    $currencyCode                = $params['currency'];
    
	  // Client parameters
	  $id                          = $params['clientdetails']['userid'];
    $firstname                   = $params['clientdetails']['firstname'];
    $lastname                    = $params['clientdetails']['lastname'];
    $email                       = $params['clientdetails']['email'];
    $address1                    = $params['clientdetails']['address1'];
    $address2                    = $params['clientdetails']['address2'];
    $city                        = $params['clientdetails']['city'];
    $state                       = $params['clientdetails']['state'];
    $postcode                    = $params['clientdetails']['postcode'];
    $country                     = $params['clientdetails']['country'];
    $phone                       = $params['clientdetails']['phonenumber'];
     
    // System parameters
    $companyName                 = $params['companyname'];
	  $systemUrl                   = $params['systemurl'];
	  
    // Cancel invoice
	  $returnUrl 		               = $params['returnurl']; 
	  $returnUrl                   = $params['returnurl'];
	  $langPayNow                  = $params['langpaynow'];
	  $moduleDisplayName           = $params['name'];
	  $moduleName                  = $params['paymentmethod'];
	  $whmcsVersion                = $params['whmcsVersion'];
	  $url                         = 'https://www.paygol.com/pay';
   	
  	// PayGol form
    $postfields                  = array();
  	$postfields['pg_serviceid']  = $accountId;
  	$postfields['pg_currency']   = $currencyCode;
  	$postfields['pg_price']      = $amount;
  	$postfields['pg_return_url'] = $returnUrl;
  	$postfields['pg_cancel_url'] = $returnUrl; 
  	$postfields['pg_name']       = $description; 
  	$postfields['pg_custom']     = $invoiceId;
	
	  $htmlOutput = '<form method="post" name="pg_frm" action="'.$url.'">';
	  foreach ($postfields as $k => $v) {
      $htmlOutput .= '<input type="hidden" name="'.$k.'" value="'.$v.'" />';
    }
    $htmlOutput .= '<input type="submit" value="'.$langPayNow.'" />';
    $htmlOutput .= '</form>';
    return $htmlOutput;

}    