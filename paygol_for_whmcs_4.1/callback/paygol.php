<?php
// PayGol module for WHMCS, version 4.1
// Require libraries needed for gateway module functions.
require_once __DIR__ . '/../../../init.php';
require_once __DIR__ . '/../../../includes/gatewayfunctions.php';
require_once __DIR__ . '/../../../includes/invoicefunctions.php';

// Detect module name from filename.
$paygol = basename(__FILE__, '.php');

// Fetch gateway configuration parameters.
$gatewayParams  = getGatewayVariables($paygol);
$accountID      = $gatewayParams['accountID'];
$secretKEY      = $gatewayParams['secretKEY'];
$moduleName     = $gatewayParams['paymentmethod'];

// Die if module is not active.
if (!$gatewayParams['type']) { die("Module Not Activated"); }

// Retrieve data returned in payment gateway callback.
$invoiceId      = $_GET['custom'];
$amount         = $gatewayParams['amount'];
$transactionId  = $_GET["transaction_id"];
$paymentAmount  = $_GET["frmprice"];
$paymentMethod  = $_GET["frmprice"];	

use Illuminate\Database\Capsule\Manager as Capsule;
$order_data     = Capsule::table('tblinvoices')->where('id',$invoiceId)->get();
$idInvoice      = $order_data[0]->id;
$statusInvoice  = $order_data[0]->status;
$totalInvoice   = $order_data[0]->total;	 	

// PayGol GET parameters.
$transaction_id = $_GET['transaction_id'];
$service_id	    = $_GET['service_id'];
$country	    = $_GET['country'];
$custom	        = $_GET['custom'];
$price	        = $_GET['price'];
$currency	    = $_GET['currency'];
$frmprice	    = $_GET['frmprice'];
$frmcurrency	= $_GET['frmcurrency'];
$key			= $_GET['key'];



if ( ( (isset($frmprice) && isset($frmcurrency)) && (isset($custom) && isset($price)) ) && ($key == trim($secretKEY)) )
	{
			
			
				   if ($statusInvoice == 'Unpaid' && ($idInvoice == $custom && $totalInvoice == $frmprice))
				   {
						$transactionId = $transaction_id;
						addInvoicePayment
						(
						 $invoiceId,
						 $transactionId,
						 $paymentAmount,
						 $moduleName,
						 $paygol
						);
						logTransaction($gatewayParams["name"],$_POST,"Successful"); 
					}
				
			
	} else {
		logTransaction($gatewayParams["name"],$_POST,"Unsuccessful");
	}
  
$invoiceId = checkCbInvoiceID($invoiceId, $gatewayParams['name']);
checkCbTransID($transactionId);
logTransaction($gatewayParams['name'], $_POST, $transactionStatus);