<?php
namespace ebapps\login;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
class registration_page extends dbconfig
{
/*** ***/
public function select_user_country()
{
$query = "SELECT country_name FROM";
$query .= " country_and_zone";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function registration_admin_once_and_only($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address)
{
/*OK*/
$usernamelower = strtolower($username);
$account_type = "admin";
$member_level = 13;

$query = "SELECT * FROM  excessusers WHERE username='$usernamelower' OR email='$email' OR mobile='$code_mobile' OR member_level=13 OR account_type='admin'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
echo "<pre><b>Sorry this eMail or Username or Mobile Number Exits!</b></pre>";
}

if($num_result == 0)
{
$this->ebmysqli->query("INSERT INTO excessusers SET username='$usernamelower', password='$password', email='$email', hash='$hash', active=0, full_name='$full_name', mobile='$code_mobile', signup_date='$signup_date', account_type='$account_type', member_level=$member_level, position_names='Founder and CEO', user_ip='$user_ip_address'");
$this->ebmysqli->query("INSERT INTO excess_admin_business_details SET business_username='$usernamelower'");
/*** ***/
$to = $email;
$from = contactEmail;
/*** ***/
$subject = domain." eMail Verification and Business Settings for Admin Account";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
$headers .= "Cc: ".CCEmail." \r\n";
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>2-Steps for Admin Account.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: $usernamelower</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$email&hash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>1. Please Login and Activated your account.</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="<br>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=hostingName;
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>2. Please Submit Your Business Settings.</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo "<pre>An eMail verification has been sent. Check your eMail Inbox to active your account.</pre>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}

/*** ***/
public function update_business_info_read()
{
/*OK*/
if(isset($_SESSION['username'])){$business_username = $_SESSION['username'];
$query = "SELECT * FROM excess_admin_business_details WHERE business_username='$business_username'";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
}
/*** ***/
public function update_merchant_business_details($business_name, $business_full_address, $business_paypal_id, $business_bd_bkash_id, $business_geolocation_longitude, $business_geolocation_latitude, $cash_on_delivery_distance_meter)
{
/*OK*/
$business_username = $_SESSION['username'];
$query = "SELECT * FROM  excess_admin_business_details where business_username='$business_username'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
if(!empty($business_name))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_name='$business_name' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($business_full_address))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_full_address='$business_full_address' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($business_paypal_id))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_paypal_id='$business_paypal_id' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($business_bd_bkash_id))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_bd_bkash_id='$business_bd_bkash_id' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($business_geolocation_longitude))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_geolocation_longitude='$business_geolocation_longitude' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($business_geolocation_latitude))
{
$this->ebmysqli->query("UPDATE excess_admin_business_details SET business_geolocation_latitude='$business_geolocation_latitude' WHERE business_username='$business_username'");
}
/*** ***/
if(!empty($cash_on_delivery_distance_meter))
{
$cash_on_delivery_distance_meter = intval($cash_on_delivery_distance_meter);
$this->ebmysqli->query("UPDATE excess_admin_business_details SET cash_on_delivery_distance_meter=$cash_on_delivery_distance_meter WHERE business_username='$business_username'");
}
/*** ***/
echo $this->ebDone();
}

}
/*** ***/
public function registration($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address)
{
$usernamelower = strtolower($username);
$account_type = "online";
$member_level = 1;
if(isset($_SESSION['omrusername']))
{
$omrusername = strtolower($_SESSION['omrusername']);
}
else
{
$omrusername ='NO';
}

$query = "SELECT * FROM  excessusers WHERE username='$usernamelower' OR email='$email' OR mobile='$code_mobile'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
echo "<pre><b>Sorry this eMail or Username or Mobile Number Exits!</b></pre>";
}

if($num_result == 0)
{
/*** ***/
$this->ebmysqli->query("INSERT INTO excessusers SET username='$usernamelower', password='$password', email='$email', hash='$hash', active=0, full_name='$full_name', mobile='$code_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=$member_level, user_ip='$user_ip_address', address_verified=0, omrusername='$omrusername'");
/*** send email varification link ***/
/*** ***/
$to = $email;
$from = contactEmail;
/*** ***/
$subject = domain." eMail verification for User account";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>eMail verification for user account.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: $usernamelower</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please Login and Activated your account.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$email&hash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo "<pre>An eMail verification has been sent. Check your eMail Inbox to active your account.</pre>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
/*** ***/
public function merchant_registration($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address)
{
$usernamelower = strtolower($username);
$account_type = "merchant";
$member_level = 1;

if(isset($_SESSION['omrusername']))
{
$omrusername = strtolower($_SESSION['omrusername']);
}
else
{
$omrusername = 'NO';
}

$query = "SELECT * FROM  excessusers WHERE username='$usernamelower' OR email='$email' OR mobile='$code_mobile'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
echo "<pre><b>Sorry this eMail or Username or Mobile Number Exits!</b></pre>";
}

if($num_result == 0)
{
/*** ***/
$this->ebmysqli->query("INSERT INTO excessusers SET username='$usernamelower', password='$password', email='$email', hash='$hash', active=0, full_name='$full_name', mobile='$code_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=$member_level, user_ip='$user_ip_address', address_verified=0, omrusername='$omrusername'");
/*** send email varification link ***/
$to = $email;
$from = contactEmail;
/*** ***/
$subject = domain." eMail verification for Merchant account";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>eMail verification for Merchant account</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: $usernamelower</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please Login and Activated your account.</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$email&hash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo "<pre>An eMail verification has been sent. Check your eMail Inbox to active your account.</pre>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}

/*** ***/
public function merchant_pos_registration($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address)
{
$usernamelower = strtolower($username);
$account_type = "intro";
$member_level = 1;

if(isset($_SESSION['omrusername']))
{
$omrusername = strtolower($_SESSION['omrusername']);
}
else
{
$omrusername = 'NO';
}

$query = "SELECT * FROM  excessusers WHERE username='$usernamelower' OR email='$email' OR mobile='$code_mobile'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
echo "<pre><b>Sorry this eMail or Username or Mobile Number Exits!</b></pre>";
}

if($num_result == 0)
{
/*** ***/
$this->ebmysqli->query("INSERT INTO excessusers SET username='$usernamelower', password='$password', email='$email', hash='$hash', active=0, full_name='$full_name', mobile='$code_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=$member_level, user_ip='$user_ip_address', address_verified=0, omrusername='$omrusername'");
/*** send email varification link ***/
$to = $email;
$from = contactEmail;
/*** ***/
$subject = domain." eMail verification for POS account";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";

/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>eMail verification for POS account</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: $usernamelower</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please Login and Activated your account.</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$to&hash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo "<pre>An eMail verification has been sent. Check your eMail Inbox to active your account.</pre>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}

/*** ***/
public function varify_address()
{
if(isset($_REQUEST['submit_address_verification_code']))
{
extract($_REQUEST);
$address_verification_codes = intval($_REQUEST['addressCode']);
$username = $_SESSION['username'];

/* update soft_merchant_add_items */
$query1st = "SELECT address_verification_codes FROM excessusers WHERE username='$username' AND address_verification_codes=$address_verification_codes AND address_verified=0";
$result1st = $this->ebmysqli->query($query1st);
$num_result = $result1st->num_rows;

if($num_result == 1)
{
$query2nd = "UPDATE excessusers SET address_verified =1 WHERE username ='$username' AND address_verification_codes=$address_verification_codes";
$result2nd = $this->ebmysqli->query($query2nd);
if($result2nd)
{
/*** ***/
echo $this->ebDone();
}
}
}
}
/*####################*/
/*** ***/ 
public function edit_view_user_mobile_to_verify($username)
{
$query = "SELECT username, mobile, mobileactive FROM excessusers";
$query .= " WHERE username ='$username' and member_level !=13";
$result= $this->ebmysqli->query($query);
$num_result=$result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/ 
public function submit_user_mobile_to_verify($username)
{
$query = "SELECT username, mobileactive FROM excessusers where username='$username' and mobileactive=0";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
/*** ***/ 
if(!empty($username))
{
$this->ebmysqli->query("UPDATE excessusers SET mobileactive=1 WHERE username='$username'");
}
/*** ***/
echo $this->ebDone();
/*** ***/ 
}
}
/*** ***/
public function varify_mobile_read()
{
$queryCallToAdminNo = "SELECT mobile FROM excessusers WHERE member_level=13";
$resultCallToAdminNo = $this->ebmysqli->query($queryCallToAdminNo);
$num_resultCallToAdminNo = $resultCallToAdminNo->num_rows;

if($num_resultCallToAdminNo == 1)
{
while($rows=$resultCallToAdminNo->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/
public function varify_email_re_sent($usernameemail)
{
/*** $password = md5($password); ***/
$query="SELECT username, email, hash FROM  excessusers WHERE username='$usernameemail' OR email='$usernameemail'";
$testresult= $this->ebmysqli->query($query);
$num_result=$testresult->num_rows;

if($num_result == 0)
{
echo "<pre>Sorry this eMail or Username is not Exits!</pre>";
}

if($num_result == 1)
{
$userinfo = mysqli_fetch_array($testresult);
$userusername = $userinfo['username'];
$hash = $userinfo['hash'];
/*** send email varification link ***/ 
$to = $userinfo['email'];
$from = contactEmail;
/*** ***/
$subject = domain." eMail verification for your account";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** ***/ 
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>eMail verification for your account.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: $userusername</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please Login and Activated your account.</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$to&hash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/ 
mail($to, $subject, $message, $headers);
/*** ***/ 
echo "<pre>An eMail verification has been sent. Check your eMail Inbox to active your account.</pre>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}


/*** ***/ 
public function varify_email($email, $hash)
{
$usernameVerify = $_SESSION['username'];
$query = "SELECT email, hash FROM  excessusers where username='$usernameVerify' AND password='".$_SESSION['password']."' AND email='$email' AND hash='$hash' AND active=0";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;

if($num_result == 0)
{
include (ebaccess.'/access_verification_error.php');
}

if($num_result == 1)
{
$activeEmail = $this->ebmysqli->query("UPDATE excessusers SET active=1 WHERE email='$email' AND hash='$hash'");
if($activeEmail)
{
$_SESSION['activeEmail'] = 1;
include (ebaccess.'/access_registration_done.php');
}
}
}
/*** ***/ 
public function changepassword($password)
{
$username = $_SESSION['username'];
$query = "SELECT username FROM  excessusers WHERE username='$username'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;
if($num_result == 1)
{
$this->ebmysqli->query("UPDATE excessusers SET password='$password' WHERE username='$username'");
/*** ***/
echo $this->ebDone();
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
/*** ***/ 
public function update_account_info_read()
{
$updateaccountfor = $_SESSION['username'];
$query = "SELECT * FROM excessusers WHERE username='$updateaccountfor'";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/ 
public function update_account_to_merchant($username)
{
$query = "SELECT account_type FROM  excessusers WHERE username='$username'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;
/*** ***/ 
if($num_result == 1)
{
$this->ebmysqli->query("UPDATE excessusers SET account_type='merchant' WHERE username='$username'");
/*** ***/
echo $this->ebDone();
}
}
/*** ***/ 
public function update_account_information($email, $full_name, $mobile, $position_names, $state_province_region, $address_line_1, $address_line_2, $city_town, $postal_code, $country, $facebook_link, $twitter_link, $google_plus_link, $github_link, $linkedin_link, $pinterest_link, $youtube_link)
{
$usernameUp = $_SESSION['username'];
$query = "SELECT * FROM  excessusers WHERE username='$usernameUp'";
$testresult = $this->ebmysqli->query($query);
$num_result_up = $testresult->num_rows;
/*** ***/ 
$userinfo = mysqli_fetch_array($testresult);
$previous_email = $userinfo['email'];
$previous_mobile = $userinfo['mobile'];
$previous_address_line_1 = $userinfo['address_line_1'];
/*** ***/ 
if(!empty($email) and $email != $previous_email)
{
$generate_email_hash_formate = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$generated_new_email_hash = ''; 
for ($i = 0; $i < 40; $i++)
{
$generated_new_email_hash .= $generate_email_hash_formate[rand(0, strlen($generate_email_hash_formate)-1)];
}
$hash = $generated_new_email_hash;
}
/*** ***/
if(!empty($address_line_1) and $address_line_1 != $previous_address_line_1)
{ 
$generate_code_formate = '0123456789';
$generated_new_address_verification_codes = ''; 
for ($i = 0; $i < 8; $i++)
{
$generated_new_address_verification_codes .= $generate_code_formate[rand(0, strlen($generate_code_formate)-1)];
}
$generated_code_for_address = intval($generated_new_address_verification_codes);
}
/** **/
if($num_result_up == 1)
{
if(!empty($full_name))
{
$this->ebmysqli->query("UPDATE excessusers SET full_name='$full_name' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($email) and $email!=$previous_email)
{
/*** ***/
$queryToExistingEmailCheck = "SELECT email FROM  excessusers WHERE email ='$email'";
$queryToExistingEmailCheckResult = $this->ebmysqli->query($queryToExistingEmailCheck);
$num_result_email = $queryToExistingEmailCheckResult->num_rows;
/*** ***/
if($num_result_email ==0)
{
$this->ebmysqli->query("UPDATE excessusers SET email='$email', hash='$hash', active=0 WHERE username='$usernameUp'");
}
}
/*** ***/ 
if(!empty($mobile) and $mobile!=$previous_mobile)
{
/*** ***/
$queryToExistingMobileCheck = "SELECT mobile FROM  excessusers WHERE mobile ='$mobile'";
$queryToExistingMobileCheckResult = $this->ebmysqli->query($queryToExistingMobileCheck);
$num_result_mobile = $queryToExistingMobileCheckResult->num_rows;
/*** ***/
if($num_result_mobile ==0)
{
$this->ebmysqli->query("UPDATE excessusers SET mobile='$mobile', mobileactive=0 WHERE username='$usernameUp'");
}
}
/*** ***/ 
if(!empty($position_names) || empty($position_names))
{
$this->ebmysqli->query("UPDATE excessusers SET position_names='$position_names' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($address_line_1) and $address_line_1 != $previous_address_line_1)
{
$this->ebmysqli->query("UPDATE excessusers SET address_line_1='$address_line_1', address_verification_codes=$generated_code_for_address, address_verified=0 WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($address_line_2))
{
$this->ebmysqli->query("UPDATE excessusers SET address_line_2='$address_line_2' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($city_town))
{
$this->ebmysqli->query("UPDATE excessusers SET city_town='$city_town' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($state_province_region))
{
$this->ebmysqli->query("UPDATE excessusers SET state_province_region='$state_province_region' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($postal_code))
{
$this->ebmysqli->query("UPDATE excessusers SET postal_code='$postal_code' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($country))
{
$this->ebmysqli->query("UPDATE excessusers SET country='$country' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($facebook_link) || empty($facebook_link))
{
$this->ebmysqli->query("UPDATE excessusers SET facebook_link='$facebook_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($twitter_link) || empty($twitter_link))
{
$this->ebmysqli->query("UPDATE excessusers SET twitter_link='$twitter_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($google_plus_link) || empty($google_plus_link))
{
$this->ebmysqli->query("UPDATE excessusers SET google_plus_link='$google_plus_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($github_link) || empty($github_link))
{
$this->ebmysqli->query("UPDATE excessusers SET github_link='$github_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($linkedin_link) || empty($linkedin_link))
{
$this->ebmysqli->query("UPDATE excessusers SET linkedin_link='$linkedin_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($pinterest_link) || empty($pinterest_link))
{
$this->ebmysqli->query("UPDATE excessusers SET pinterest_link='$pinterest_link' WHERE username='$usernameUp'");
}
/*** ***/ 
if(!empty($youtube_link) || empty($youtube_link))
{
$this->ebmysqli->query("UPDATE excessusers SET youtube_link='$youtube_link' WHERE username='$usernameUp'");
}
/*** ***/
echo $this->ebDone();
}
}
/*** ***/ 
public function adminViewReferral($username)
{
$query = "SELECT omrusername FROM excessusers";
$query .= " WHERE username='$username'";
$result= $this->ebmysqli->query($query);
$num_result=$result->num_rows;
if($num_result == 1)
{

while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/ 
public function all_user_account_info_read()
{
$query = "SELECT username, email, hash, active, full_name, mobile, mobileactive, account_type, member_level, position_names, address_verification_codes, address_verified, omrusername FROM excessusers";
$query .= " ORDER BY excessusers.account_type DESC";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/ 
public function edit_view_user_power($username)
{
$query = "SELECT username, account_type, member_level, position_names FROM excessusers";
$query .= " WHERE username ='$username' and member_level !=13";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/ 
public function submit_user_power($username, $member_level, $position_names)
{
$member_level = intval($member_level);

$query = "SELECT username, account_type, member_level, position_names FROM excessusers WHERE username='$username'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;
/*** ***/ 
$userinfo = mysqli_fetch_array($testresult);
/*** ***/ 
if($num_result == 1)
{
if($member_level == 8) {$account_type = "merchant";}
if($member_level == 7) {$account_type = "premier";}
if($member_level == 6) {$account_type = "plus";}
if($member_level == 5) {$account_type = "basic";}
if($member_level == 4) {$account_type = "intor";}
if($member_level == 3) {$account_type = "manager";}
if($member_level == 2) {$account_type = "salseman";}
if($member_level == 1) {$account_type = "online";}
if($member_level == 0) {$account_type = "blocked";}

if(isset($member_level))
{
$this->ebmysqli->query("UPDATE excessusers SET account_type='$account_type', member_level=$member_level WHERE username='$username'");
}

/*** ***/ 
if(!empty($position_names))
{
$this->ebmysqli->query("UPDATE excessusers SET account_type='$account_type', position_names='$position_names' WHERE username='$username'");
}
echo $this->ebDone(); 
}
}
/*** ***/ 
public function site_owner_social_info()
{
$query = "SELECT facebook_link, twitter_link, google_plus_link, github_link, linkedin_link, pinterest_link, youtube_link FROM excessusers WHERE account_type='admin' AND member_level=13";
$result = $this->ebmysqli->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/ 
public function support_staff_social_info()
{
$query = "SELECT full_name, position_names, facebook_link, twitter_link, google_plus_link, github_link, linkedin_link, pinterest_link, youtube_link FROM excessusers WHERE member_level >= 2";
$result = $this->ebmysqli->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/ 
public function site_location()
{
$query = "SELECT business_name, business_full_address FROM excess_admin_business_details";
$result = $this->ebmysqli->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/ 
}

?>
