<?php
/*
*************************************************************************************
Please Do not edit or add any code in this file without permission of transactworld.com.
@Developed by bluezeal.in

opencart version 1.5.5.1			Transactworld Version 1.0.0


Module Version. Transactworld-1.0.0  			Module release: August 16/2017
**************************************************************************************
 */
 

$_['heading_title']							= 'TransactWorld Online Payment';

$_['text_payment']							= 'Payment';
$_['entry_title']							= 'Title :';
$_['entry_live_url']					    = 'Live Url to send the request:';
$_['entry_test_url']					    = 'Test Url to send the request:';
$_['entry_description']					    = 'Description :';
$_['text_success']							= 'Success: You have modified Paymentz Pay account details!';
$_['text_paymentz']					    	= '<a onclick="window.open(\'https://www.paymentz.com\');"><img src="view/image/payment/paymentz.png" alt="TransactWorld Online Payment" title="TransactWorld Online Payment" style="border: 1px solid #EEEEEE; max-width: 65px;" /></a>';
$_['entry_status']							= 'Status:';
$_['text_live']						    	= 'Live:';
$_['text_test']							    = 'Test:';
//$_['text_upload']						    = 'Upload:';
$_['text_file']							    = 'Send this file:';

$_['entry_partner_name']	              	= 'Name of Payment Service Provider:<br /><span class="help">Provided by Transactworld.com. Do not change the value. It will be fixed for all transactions Accept only [0-9][A-Z][a-z] .</span>';

$_['entry_partner_id']	              	    = 'Partner Id:<br /><span class="help">Enter partner id provided to you by paymentz.com</span>';
$_['entry_ipaddr']	              	    = 'Ip Address:<br /><span class="help">Your Ip address</span>';

$_['entry_mode']	                     	= 'Transaction Mode:<span class="help">Transaction mode used for processing orders.</span>';

$_['entry_merchant_id']	                   	= 'Merchant ID:';
$_['entry_working_key']	                   	= 'Working Key:<span class="help">Put in the 32 bit alphanumeric key. To get this key, Login to your TransactWorld Merchant Account and click Settings -> Generate Key</span>';
$_['entry_license_key']	                   	= 'License Key:';
$_['entry_payment_confirmation_mail']       = 'Payment Confirmation E-Mail';
//$_['entry_total']                           = 'Total:<br /><span class="help">The checkout total the order must reach before this payment method becomes active.</span>';
$_['entry_geo_zone']						= 'Geo Zone:';
$_['entry_sort_order']						= 'Sort Order:';
$_['entry_completed_status']				= 'Order Status Completed:<br /><span class="help">This is the status set when the payment has been completed successfully.</span>';
$_['entry_pending_status']			        = 'Order Status Pending:<br /><span class="help">The payment is pending; see the pending_reason variable for more information. Please note, you will receive another Instant Payment Notification when the status of the payment changes to Completed, Failed, or Denied.</span>';
$_['entry_failed_status']				    = 'Order Status Failed:<br /><span class="help">The payment has failed. This will only happen if the payment was attempted from your customers bank account.</span>';


$_['error_permission']						= 'Warning: You do not have permission to modify payment Paymentz Pay!';
$_['error_merchant_id']						= 'Merchant ID required!';
$_['error_partner_name']					= 'Partner Name/Totype required!';

$_['error_partner_id']					    = 'Partner id required!';
$_['error_ipaddr']					        = 'Ip address required';

$_['error_working_key']						= 'Working Key required!';
$_['error_license_key']						= 'License Key required!';
?>