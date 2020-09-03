<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7'>
<div class='well'>
<h2 title='Business Info'>Business Info</h2>
</div>

<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$business_name_error = '*';
$business_title_one_error = '*';
$business_title_two_error = '*';
$business_full_address_error = '*';
$business_city_town_error = '*';
$business_state_province_region_error = '*';
$business_postal_code_error = '*';
$business_country_error = '*';
$business_paypal_id_error = '*';
$business_bd_bkash_id_error = '*';
$stripe_secret_key_error = '*';
$stripe_publishable_key_error = '*';
$business_geolocation_longitude_error = '*';
$business_geolocation_latitude_error = '*';
$cash_on_delivery_distance_meter_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
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

/* business_title_one */
if (empty($_REQUEST['business_title_one']))
{
$business_title_one_error = "<b class='text-warning'>Legal company title or Brand title required.</b>";
$error =1;
} 
/* valitation business_title_one  Tested*/

elseif (!preg_match('/^([A-Za-z0-9\.\,\- ]{3,160})$/',$business_title_one))
{
$business_title_one_error = "<b class='text-warning'>Legal company title or Brand title ?</b>";
$error =1;
}
else 
{
$business_title_one = $sanitization -> test_input($_POST['business_title_one']);
}

/* business_title_two */
if (empty($_REQUEST['business_title_two']))
{
$business_title_two_error = "<b class='text-warning'>Legal company title or Brand title required.</b>";
$error =1;
} 
/* valitation business_title_two  Tested*/

elseif (!preg_match('/^([A-Za-z0-9\.\,\- ]{3,160})$/',$business_title_two))
{
$business_title_two_error = "<b class='text-warning'>Legal company title or Brand title ?</b>";
$error =1;
}
else 
{
$business_title_two = $sanitization -> test_input($_POST['business_title_two']);
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

/* business_city_town */
if (empty($_REQUEST['business_city_town']))
{
$business_city_town_error = "<b class='text-warning'>City /Town required</b>";
$error =1;
} 
/* valitation business_city_town  */
elseif (! preg_match('/^([A-Za-z.,\-\ ]+)$/',$business_city_town))
{
$business_city_town_error = "<b class='text-warning'>City/Town letters?</b>";
$error =1;
}
else 
{
$business_city_town = $sanitization -> test_input($_POST['business_city_town']);
}
/* business_state_province_region */
if (empty($_REQUEST['business_state_province_region']))
{
$business_state_province_region_error = "<b class='text-warning'>State/Province/Region required</b>";
} 
/* valitation business_state_province_region  */
elseif (! preg_match('/^([A-Za-z.,\-\ ]+)$/',$business_state_province_region))
{
$business_state_province_region_error = "<b class='text-warning'>State/Province/Region?</b>";
$error =1;
}
else 
{
$business_state_province_region = $sanitization -> test_input($_POST['business_state_province_region']);
}

/* business_postal_code */
if (empty($_REQUEST['business_postal_code']))
{
$business_postal_code_error = "<b class='text-warning'>Postal code required</b>";
$error =1;
} 
/* valitation business_postal_code */
elseif (! preg_match('/^([A-Za-z0-9\-]{2,20})$/',$business_postal_code))
{
$business_postal_code_error = "<b class='text-warning'>Postal code?</b>";
$error =1;
}
else 
{
$business_postal_code = $sanitization -> test_input($_POST['business_postal_code']);
}
/* business_country */
if (empty($_REQUEST["business_country"]))
{

} 
/* valitation business_country  */
elseif (!preg_match("/^([a-zA-Z\.\-\)\(\ ]+)$/",$business_country))
{
$business_country_error = "<b class='text-warning'>Error on Country</b>";
$error =1;
}
else
{
$business_country = $sanitization -> test_input($_POST["business_country"]);
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

} 
/* valitation business_bd_bkash_id  Tested*/
elseif (!preg_match('/^([0-9]{11,11})$/',$business_bd_bkash_id))
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
$user->update_merchant_business_details($business_name, $business_title_one, $business_title_two, $business_full_address, $business_city_town, $business_state_province_region, $business_postal_code, $business_country, $business_paypal_id, $business_bd_bkash_id, $stripe_secret_key, $stripe_publishable_key, $business_geolocation_longitude, $business_geolocation_latitude, $cash_on_delivery_distance_meter);
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
$updateBusinessInfo .="<input type='hidden' name='form_key' value='";
$updateBusinessInfo .= $formKey->outputKey(); 
$updateBusinessInfo .="'>"; 
$updateBusinessInfo .="$formKey_error";
//
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Username: </span><span class='form-control' aria-describedby='sizing-addon2'>$business_username</span></div>";
//
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Business Name: $business_name_error</span><input type='text' name='business_name' value='$business_name' placeholder='Business name' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Business Title: $business_title_one_error</span><input type='text' name='business_title_one' value='$business_title_one' placeholder='Business title' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Business Subtitle: $business_title_two_error</span><input type='text' name='business_title_two' value='$business_title_two' placeholder='Business title' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Address: $business_full_address_error</span><input type='text' name='business_full_address' value='$business_full_address' placeholder='Business address' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>City/Town: $business_city_town_error</span><input type='text' name='business_city_town' value='$business_city_town' placeholder='City/Town' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>State/Province/Region: $business_state_province_region_error</span><input type='text' name='business_state_province_region' value='$business_state_province_region' placeholder='State/Province/Region' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Postal Code: $business_postal_code_error</span><input type='text' name='business_postal_code' value='$business_postal_code' placeholder='Postal Code' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
//
$updateBusinessInfo .="<div class='input-group'>";
$updateBusinessInfo .="<span class='input-group-addon' id='sizing-addon2'>Country: $business_country_error</span>";
$updateBusinessInfo .="<select class='form-control' name='business_country'>";
if(isset($business_country))
{
$updateBusinessInfo .="<option selected value='$business_country'>".ucfirst($business_country)."</option>";
}
$objCountry = new ebapps\login\registration_page();
$objCountry->select_user_country();
if($objCountry->data)
{
foreach($objCountry->data as $val)
{
extract($val);
$updateBusinessInfo .="<option value='$country_name'>".ucfirst($country_name)."</option>";
}
}
$updateBusinessInfo .="</select>";
$updateBusinessInfo .="</div>";
//
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>PayPal ID: $business_paypal_id_error</span><input type='text' name='business_paypal_id' value='$business_paypal_id' placeholder='PayPal ID' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>bKash ID: $business_bd_bkash_id_error</span><input type='text' name='business_bd_bkash_id' value='$business_bd_bkash_id' placeholder='bKash ID' class='form-control' aria-describedby='sizing-addon2'></div>";
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Stripe Secret Key: $stripe_secret_key_error</span><input type='text' name='stripe_secret_key' value='$stripe_secret_key' placeholder='Stripe Secret Key' class='form-control' aria-describedby='sizing-addon2'></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Stripe Publishable Key : $stripe_publishable_key_error</span><input type='text' name='stripe_publishable_key' value='$stripe_publishable_key' placeholder='Stripe Publishable Key' class='form-control' aria-describedby='sizing-addon2'></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Longitude : $business_geolocation_longitude_error</span><input type='text' name='business_geolocation_longitude' value='$business_geolocation_longitude' placeholder='GPS Longitude' class='form-control' aria-describedby='sizing-addon2'></div>"; 
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Latitude : $business_geolocation_latitude_error</span><input type='text' name='business_geolocation_latitude' value='$business_geolocation_latitude' placeholder='GPS Latitude' class='form-control' aria-describedby='sizing-addon2'></div>"; 	
$updateBusinessInfo .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>COD in Meter: $cash_on_delivery_distance_meter_error</span><input type='text' name='cash_on_delivery_distance_meter' value='$cash_on_delivery_distance_meter' placeholder='Cash on Delivery Distance in Meter' class='form-control' aria-describedby='sizing-addon2'></div>";  
$updateBusinessInfo .="<div class='buttons-set'>";
$updateBusinessInfo .="<button type='submit' name='BusinessSettings' title='Update' class='button submit'>Update</button>";
$updateBusinessInfo .="</div>";
$updateBusinessInfo .="</fieldset>";
$updateBusinessInfo .="</form>";
echo $updateBusinessInfo;  
}
}
?>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>