<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header-for-admin.php'); ?>
<?php include_once (eblayout.'/a-common-navebar-admin.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Admin Accounting Setup'>Admin Accounting Setup</h2>
</div>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$business_name_error = '*';
$business_full_address_error = '*';
$business_paypal_id_error = '*';
$business_bd_bkash_id_error = '*';
$stripe_secret_key_error = '*';
$stripe_publishable_key_error = '*';
$business_geolocation_longitude_error = '*';
$business_geolocation_latitude_error = '*';
$cash_on_delivery_distance_meter_error = '*';

?>
<?php
if(isset($_REQUEST['BusinessSettings']))
{
extract($_REQUEST);
/* Form Key*/
if(isset($_REQUEST["form_key"]))
{
$form_key = preg_replace('#[^a-zA-Z0-9]#i','',$_POST["form_key"]);
if($formKey->read_and_check_formkey($form_key) == true)
{

}
else
{
$formKey_error = "<b class='text-warning'>Sorry the server is currently too busy please try again later.</b>";
$error = 1;
}
}

/* business_name */
if (empty($_REQUEST['business_name']))
{
$business_name_error = "<b class='text-warning'>Legal company name or Brand name required.</b>";
$error =1;
} 
/* valitation business_name  Tested*/

elseif (!preg_match('/^([A-Za-z0-9\.\,\- ]{3,32})$/',$business_name))
{
$business_name_error = "<b class='text-warning'>Legal company name or Brand name ?</b>";
$error =1;
}
else 
{
$business_name = $sanitization -> test_input($_POST['business_name']);
}

/* business_full_address */
if (empty($_REQUEST['business_full_address']))
{
$business_full_address_error = "<b class='text-warning'>Legal Business Full Address Required.</b>";
} 
/* valitation business_full_address Tested*/
elseif (!preg_match('/^([A-Za-z0-9\.\,\- ]{3,160})$/',$business_full_address))
{
$business_full_address_error = "<b class='text-warning'>Legal Business Address?</b>";
$error =1;
}
else 
{
$business_full_address = $sanitization -> test_input($_POST['business_full_address']);
}

/* business_paypal_id */
if (empty($_REQUEST['business_paypal_id']))
{
$business_paypal_id_error = "<b class='text-warning'>PayPal ID Required</b>";
$error = 1;
} 
/* valitation eMail  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (!preg_match('/^[a-z0-9._]+@[a-z0-9.\-]{1,16}[a-z]{2,4}$/',$business_paypal_id))
{
$business_paypal_id_error = "<b class='text-warning'>PayPal?</b>";
$error =1;
}
/* DNS Check  */
elseif ($sanitization->validEmail($business_paypal_id) === false)
{
$business_paypal_id_error = "<b class='text-warning'>Invalid PayPal eMail ID?</b>";
$error =1;
}
else 
{
$business_paypal_id = $sanitization -> test_input($_POST['business_paypal_id']);
}
/* business_bd_bkash_id */
if (empty($_REQUEST['business_bd_bkash_id']))
{
$business_bd_bkash_id_error = "<b class='text-warning'>bKash ID Required.</b>";
} 
/* valitation business_bd_bkash_id  Tested*/
elseif (!preg_match('/^([A-Za-z0-9\.\,\- ]{3,160})$/',$business_bd_bkash_id))
{
$business_bd_bkash_id_error = "<b class='text-warning'>bKash?</b>";
$error =1;
}
else 
{
$business_bd_bkash_id = $sanitization -> test_input($_POST['business_bd_bkash_id']);
}

/* stripe_secret_key */
if (empty($_REQUEST['stripe_secret_key']))
{
$stripe_secret_key_error = "<b class='text-warning'>Secret Key</b>";
} 
/* valitation stripe_secret_key  Tested*/
elseif (!preg_match('/^([A-Za-z0-9\.\,\-]{3,160})$/',$stripe_secret_key))
{
$stripe_secret_key_error = "<b class='text-warning'>Secret Key</b>";
$error =1;
}
else 
{
$stripe_secret_key = $sanitization -> test_input($_POST['stripe_secret_key']);
}

/* stripe_publishable_key */
if (empty($_REQUEST['stripe_publishable_key']))
{
$stripe_publishable_key_error = "<b class='text-warning'>Publishable Key</b>";
} 
/* valitation stripe_publishable_key  Tested*/
elseif (!preg_match('/^([A-Za-z0-9\.\,\-]{3,160})$/',$stripe_publishable_key))
{
$stripe_publishable_key_error = "<b class='text-warning'>Publishable Key</b>";
$error =1;
}
else 
{
$stripe_publishable_key = $sanitization -> test_input($_POST['stripe_publishable_key']);
}

/* business_geolocation_longitude */
if (empty($_REQUEST['business_geolocation_longitude']))
{
$business_geolocation_longitude_error = "<b class='text-warning'>GEO Location Longitude Required.</b>";
} 
/* valitation business_geolocation_longitude Tested*/
elseif (!preg_match('/^[0-9.]{1,16}$/',$business_geolocation_longitude))
{
$business_geolocation_longitude_error = "<b class='text-warning'>GEO Location Longitude?</b>";
$error =1;
}
else 
{
$business_geolocation_longitude = $sanitization -> test_input($_POST['business_geolocation_longitude']);
}
/* business_geolocation_latitude */
if (empty($_REQUEST['business_geolocation_latitude']))
{
$business_geolocation_latitude_error = "<b class='text-warning'>GEO Location Latitude Required</b>";
} 
/* valitation business_geolocation_latitude Tested*/
elseif (!preg_match('/^[0-9.]{1,16}$/',$business_geolocation_latitude))
{
$business_geolocation_latitude_error = "<b class='text-warning'>GEO Location Latitude?</b>";
$error =1;
}
else 
{
$business_geolocation_latitude = $sanitization -> test_input($_POST['business_geolocation_latitude']);
}
/* cash_on_delivery_distance_meter */
if (empty($_REQUEST['cash_on_delivery_distance_meter']))
{
$cash_on_delivery_distance_meter_error = "<b class='text-warning'>Meter required.</b>";
}
/* valitation cash_on_delivery_distance_meter Tested*/
elseif (!preg_match('/^[0-9]{1,6}$/',$cash_on_delivery_distance_meter))
{
$cash_on_delivery_distance_meter_error = "<b class='text-warning'>Meter?</b>";
$error =1;
}
else 
{
$cash_on_delivery_distance_meter = $sanitization -> test_input($_POST['cash_on_delivery_distance_meter']);
}

/* Submition form */
if($error == 0){
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user->update_merchant_business_details($business_name, $business_full_address, $business_paypal_id, $business_bd_bkash_id, $stripe_secret_key, $stripe_publishable_key, $business_geolocation_longitude, $business_geolocation_latitude, $cash_on_delivery_distance_meter);
}
//
}
?>
<div class='well'>
<?php
$obj = new ebapps\login\registration_page();
$obj->update_business_info_read();
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updateBusinessInfo ="<form method='post'>"; 
$updateBusinessInfo .="<fieldset class='group-select'>";
$updateBusinessInfo .="<ul>";

$updateBusinessInfo .="<input type='hidden' name='form_key' value='";
$updateBusinessInfo .= $formKey->outputKey(); 
$updateBusinessInfo .="'>"; 
$updateBusinessInfo .="$formKey_error";

$updateBusinessInfo .="<li>Business Username: $business_username</li>"; 
$updateBusinessInfo .="<li>Legal Company/ Brand name: $business_name_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_name' placeholder='' required autofocus value='$business_name' /></li>"; 
$updateBusinessInfo .="<li>Business Address: $business_full_address_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_full_address'  value='$business_full_address'/></li>";
$updateBusinessInfo .="<li>PayPal ID : $business_paypal_id_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_paypal_id' value='$business_paypal_id' /></li>";

$updateBusinessInfo .="<li>bKash ID : $business_bd_bkash_id_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_bd_bkash_id' value='$business_bd_bkash_id' /></li>";
	
$updateBusinessInfo .="<li>Stripe Secret Key : $stripe_secret_key_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='stripe_secret_key' value='$stripe_secret_key' /></li>";

$updateBusinessInfo .="<li>Stripe Publishable Key : $stripe_publishable_key_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='stripe_publishable_key' value='$stripe_publishable_key' /></li>";
	
$updateBusinessInfo .="<li>Business GPS Longitude : $business_geolocation_longitude_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_geolocation_longitude' value='$business_geolocation_longitude' /></li>";
$updateBusinessInfo .="<li>Business GPS Latitude : $business_geolocation_latitude_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='business_geolocation_latitude' value='$business_geolocation_latitude' /></li>";
$updateBusinessInfo .="<li>Cash on Delivery Distance in Meter: $cash_on_delivery_distance_meter_error</li>";
$updateBusinessInfo .="<li><input class='form-control' type='text' name='cash_on_delivery_distance_meter' value='$cash_on_delivery_distance_meter' /></li>";  
$updateBusinessInfo .="<div class='buttons-set'><button type='submit' name='BusinessSettings' title='Update' class='button submit'> <span> Update </span> </button></div>";
$updateBusinessInfo .="</ul>";
$updateBusinessInfo .="</fieldset>";
$updateBusinessInfo .="</form>";
echo $updateBusinessInfo;  
}
}
?>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout.'/a-common-ad-right.php'); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-for-admin.php'); ?>
<?php exit(); ?>