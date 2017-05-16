<?php
// PayGol module for WHMCS, version 4.0

// IP filter.
if (!in_array($_SERVER['REMOTE_ADDR'],array('109.70.3.48', '109.70.3.146', '109.70.3.210'))){
     header("HTTP/1.0 403 Forbidden");
     die("Error: Unknown IP");      
}
 
// Require libraries needed for gateway module functions.
require_once __DIR__ . '/../../../init.php';
require_once __DIR__ . '/../../../includes/gatewayfunctions.php';
require_once __DIR__ . '/../../../includes/invoicefunctions.php';

// Detect module name from filename.
$paygol = basename(__FILE__, '.php');

// Fetch gateway configuration parameters.
$gatewayParams  = getGatewayVariables($paygol);
$accountID      = $gatewayParams['accountID'];
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
$country	      = $_GET['country'];
$custom	        = $_GET['custom'];
$price	        = $_GET['price'];
$currency	      = $_GET['currency'];
$frmprice	      = $_GET['frmprice'];
$frmcurrency	  = $_GET['frmcurrency'];

if ((isset($frmprice) && isset($frmcurrency)) && (isset($custom) && isset($price))){
	   if ($statusInvoice == 'Unpaid' && ($idInvoice == $custom && $totalInvoice == $frmprice)){
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