<?php
namespace ebapps\login;
/*****************************************************************************
############################### GNU General Public License ###################
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
#############################################################################
*****************************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/** **/
include_once(ebbd.'/eBConDb.php');
use ebapps\dbconnection\eBConDb;
/*** ***/
include_once(ebphpmailer.'/Exception.php');
use ebapps\PHPMailer\Exception;
/*** ***/
include_once(ebphpmailer.'/PHPMailer.php');
use ebapps\PHPMailer\PHPMailer;
/*** ***/
include_once(ebphpmailer.'/SMTP.php');
use ebapps\PHPMailer\SMTP;

class registration_page extends dbconfig
{
/*** ***/
public function ebSendMail($email,$subjectfor,$messagepre)
{
/*** eMail to User ***/
$mailOffer = new PHPMailer(true);
try
{
//
$mailOffer->isSMTP();
$mailOffer->Host       = smtpHost;
$mailOffer->SMTPAuth   = true;
$mailOffer->Username   = smtpUsername;
$mailOffer->Password   = smtpPassword;
$mailOffer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailOffer->Port       = smtpPort; 
//
$mailOffer->setFrom(adminEmail, domain);
$mailOffer->addAddress($email);
$mailOffer->isHTML(true);
$mailOffer->Subject = $subjectfor;

$mailOffer->Body = $messagepre;
//
$mailOffer->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailOffer->ErrorInfo}";
*/
}
//
echo $this->ebDone();
}
/*** ***/
public function countFirstLevelOfInvite()
{
$user = $_SESSION['ebusername'];
$query ="SELECT COUNT(omrusername) AS countFirstLevelTotal FROM";
$query .=" excessusers WHERE omrusername='$user'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function firstLevelOfInvite()
{
$user = $_SESSION['ebusername'];
$query ="SELECT ebusername AS firstLevelOfInviteUsername FROM excessusers WHERE omrusername='$user'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function secondLevelOfInvite($levelOne)
{
$query ="SELECT ebusername AS secondLevelOfInviteUsername FROM excessusers WHERE omrusername='$levelOne'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function thirdLevelOfInvite($levelTwo)
{
$query ="SELECT ebusername AS thirdLevelOfInviteUsername FROM excessusers WHERE omrusername='$levelTwo'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function selectedUserPositionToLevelName($userpower_position)
{
$query = "SELECT userpower_level_names FROM";
$query .= " userpower";
$query .= " WHERE userpower_position='$userpower_position'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function selectedUserPositionToPower($userpower_position)
{
$query = "SELECT userpower_level_power FROM";
$query .= " userpower";
$query .= " WHERE userpower_position='$userpower_position'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}

/*** ***/
public function select_userpower()
{
$query = "SELECT * FROM";
$query .= " userpower";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}

/*** ***/
public function selectedCountryAndCodeWhenSignup($selectCountryVal)
{
$selectCountryVal = intval($selectCountryVal);
$query = "SELECT country_name, country_code FROM";
$query .= " country_and_zone";
$query .= " WHERE bay_dhl_country_zone_id=$selectCountryVal";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
//
public function select_country_id()
{
$query = "SELECT bay_dhl_country_zone_id, country_name, country_code FROM";
$query .= " country_and_zone ORDER BY country_name ASC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
echo "<option value='".$rows['bay_dhl_country_zone_id']."'>(".$rows['country_code'].") ".ucfirst($rows['country_name'])."</option>"; 
}
}
}
//
public function select_user_country()
{
$query = "SELECT country_name FROM";
$query .= " country_and_zone";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
//
//
public function verifyMobile($smsCode)
{
$username = $_SESSION["ebusername"];

$query1 = "SELECT mobilehash FROM excessusers WHERE ebusername='$username' AND mobilehash='$smsCode' AND mobileactive=0";
$resultOne = eBConDb::eBgetInstance()->eBgetConection()->query($query1);
$numResultOne = $resultOne->num_rows;
/*** ***/
if($numResultOne == 1)
{
$query2 = "UPDATE excessusers SET mobileactive=1 WHERE ebusername='$username'";
$result2nd = eBConDb::eBgetInstance()->eBgetConection()->query($query2);
echo $this->ebDone();
}
}
/*** ***/
public function registration_admin_once_and_only($username, $password, $email, $emailhash, $full_name, $signup_date, $user_ip_address, $code_mobile, $countryNameWhenSignup)
{
/*OK*/
$usernamelower = strtolower($username);
$account_type = "admin";
$member_level = 13;

$query = "SELECT email FROM  excessusers WHERE ebusername='$usernamelower' OR email='$email' OR mobile='$code_mobile' OR member_level=13 OR account_type='admin'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
echo "<div class='well'><b>Sorry this eMail or Username or Mobile Number Exits!</b></div>";
}

if($num_result == 0)
{
/*** ***/
if(!empty($code_mobile))
{ 
$generate_sms_code_formate = '0123456789';
$generated_new_address_verification_codes = ''; 
for ($i = 0; $i < 6; $i++)
{
$generated_new_address_verification_codes .= $generate_sms_code_formate[rand(0, strlen($generate_sms_code_formate)-1)];
}
$generated_sms_code_for_mobile = intval($generated_new_address_verification_codes);
}
eBConDb::eBgetInstance()->eBgetConection()->query("INSERT INTO excessusers SET ebusername='$usernamelower', ebpassword='$password', email='$email', emailhash='$emailhash', active=0, full_name='$full_name', gender='', date_of_birth='', mobile='$code_mobile', mobilehash='$generated_sms_code_for_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=$member_level, position_names='Founder and CEO', user_ip='$user_ip_address', address_line_1='', address_line_2='', city_town='', state_province_region='', postal_code='', country='$countryNameWhenSignup', address_verification_codes=0, address_verified=0, omrusername='', paypalid='', bkashid=0, branch_name='', facebook_link='',twitter_link='', github_link='', linkedin_link='', pinterest_link='', youtube_link='', instagram_link='', profile_picture_link='', cover_photo_link=''");
/*** ***/
eBConDb::eBgetInstance()->eBgetConection()->query("INSERT INTO excess_admin_business_details SET business_username='$usernamelower', business_name='', business_title_one='', business_title_two='', business_full_address='', business_city_town='', business_state_province_region='', business_postal_code='', business_country='', business_paypal_id='', business_bd_bkash_id='', stripe_secret_key='', stripe_publishable_key='', business_geolocation_longitude='', business_geolocation_latitude='', cash_on_delivery_distance_meter=1000, business_logo_link='', business_cover_photo_link=''");

$mail = new PHPMailer(true);
try
{
//
$mail->isSMTP();
$mail->Host       = smtpHost;
$mail->SMTPAuth   = true;
$mail->Username   = smtpUsername;
$mail->Password   = smtpPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = smtpPort; 
//
$mail->setFrom(adminEmail, domain);
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "eMail Verification and Business Settings for Admin Account";
//
$message ="<html>";
$message .="<head>";
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
$message .=outAccessLink."/access_verify.php?email=$email&emailhash=$emailhash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>1. Please Login and Activated your account.</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="<br>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=hostingAndRoot;
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>2. Please Submit Your Business Settings.</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mail->Body = $message;
//
$mail->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
*/
}
/*** ***/
/*
echo "<div class='well'><b>An eMail verification has been sent. Check your eMail Inbox to active your account.</b></div>";
*/
echo "<div class='well'><b>Signup Done.</b></div>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}

/*** ***/
public function update_business_info_read()
{
/*OK*/
if(isset($_SESSION['ebusername'])){$business_username = $_SESSION['ebusername'];
$query = "SELECT * FROM excess_admin_business_details WHERE business_username='$business_username'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
}
/*** ***/
public function update_merchant_business_details($business_name, $business_title_one, $business_title_two, $business_full_address, $business_city_town, $business_state_province_region, $business_postal_code, $business_country, $business_paypal_id, $business_bd_bkash_id, $stripe_secret_key, $stripe_publishable_key, $business_geolocation_longitude, $business_geolocation_latitude, $cash_on_delivery_distance_meter)
{
/*OK*/
$business_username = $_SESSION['ebusername'];
$query = "SELECT * FROM  excess_admin_business_details where business_username='$business_username'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
/*** ***/
if(isset($business_name))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_name='$business_name' WHERE  business_username='$business_username'");
}
/*** ***/
if(isset($business_title_one))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_title_one='$business_title_one' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_title_two))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_title_two='$business_title_two' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_full_address))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_full_address='$business_full_address' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_city_town))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_city_town='$business_city_town' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_state_province_region))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_state_province_region='$business_state_province_region' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_postal_code))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_postal_code='$business_postal_code' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_country))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_country='$business_country' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_paypal_id))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_paypal_id='$business_paypal_id' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_bd_bkash_id))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_bd_bkash_id='$business_bd_bkash_id' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($stripe_secret_key))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET stripe_secret_key='$stripe_secret_key' WHERE business_username='$business_username'");
}	
/*** ***/
if(isset($stripe_publishable_key))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET stripe_publishable_key='$stripe_publishable_key' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_geolocation_longitude))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_geolocation_longitude='$business_geolocation_longitude' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($business_geolocation_latitude))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET business_geolocation_latitude='$business_geolocation_latitude' WHERE business_username='$business_username'");
}
/*** ***/
if(isset($cash_on_delivery_distance_meter))
{
$cash_on_delivery_distance_meter = intval($cash_on_delivery_distance_meter);
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excess_admin_business_details SET cash_on_delivery_distance_meter=$cash_on_delivery_distance_meter WHERE business_username='$business_username'");
}
/*** ***/
echo $this->ebDone();
}

}
/*** ***/
public function registrationInvitedSignup($full_name, $code_mobile, $username, $password, $email, $emailhash, $signup_date, $user_ip_address, $countryNameWhenSignup)
{
/* ########## Default Seting ###############
$account_type = "public";
$member_level = 1;
############################################
$account_type = "intro";
$member_level = 4;
############################################
$account_type = "merchant";
$member_level = 8;
############################################
*/
$usernamelower = strtolower($username);
$account_type = "public";

$query ="SELECT email FROM excessusers WHERE email='$email' AND account_type='invited'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
$query2ndForInviet = "SELECT ebusername FROM excessusers WHERE ebusername='$usernamelower'";
$testresultquery2ndForInviet = eBConDb::eBgetInstance()->eBgetConection()->query($query2ndForInviet);
$num_testresultquery2ndForInviet = $testresultquery2ndForInviet->num_rows;
if($num_testresultquery2ndForInviet == 0)
{
/*** ***/
if(!empty($code_mobile))
{ 
$generate_sms_code_formate = '0123456789';
$generated_new_address_verification_codes = ''; 
for ($i = 0; $i < 6; $i++)
{
$generated_new_address_verification_codes .= $generate_sms_code_formate[rand(0, strlen($generate_sms_code_formate)-1)];
}
$generated_sms_code_for_mobile = intval($generated_new_address_verification_codes);
}
/*** ***/
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET ebusername='$usernamelower', ebpassword='$password', emailhash='$emailhash', active=0, full_name='$full_name', mobile='$code_mobile', mobilehash='$generated_sms_code_for_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=1, position_names='', user_ip='$user_ip_address', address_line_1='', address_line_2='', city_town='', state_province_region='', postal_code='', country='$countryNameWhenSignup', address_verification_codes=0, address_verified=0, paypalid='', bkashid=0, branch_name='', facebook_link='', twitter_link='', github_link='',linkedin_link='', pinterest_link='', youtube_link='', instagram_link='', profile_picture_link='', cover_photo_link='' WHERE email='$email' AND account_type='invited'");
/*** send email varification link ***/
$mailInvited = new PHPMailer(true);
try
{
//
$mailInvited->isSMTP();
$mailInvited->Host       = smtpHost;
$mailInvited->SMTPAuth   = true;
$mailInvited->Username   = smtpUsername;
$mailInvited->Password   = smtpPassword;
$mailInvited->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailInvited->Port       = smtpPort; 
//
$mailInvited->setFrom(contactEmail, domain);
$mailInvited->addAddress($email);
$mailInvited->isHTML(true);
$mailInvited->Subject = "eMail verification for User account";
//
$messageInvitedUser ="<html>";
$messageInvitedUser .="<head>";
$messageInvitedUser .="<meta charset='utf-8'>";
$messageInvitedUser .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$messageInvitedUser .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$messageInvitedUser .="<style type='text/css'>
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
$messageInvitedUser .="</head>";
$messageInvitedUser .="<body>";
$messageInvitedUser .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$messageInvitedUser .="<tr>";
$messageInvitedUser .="<td>eMail verification for user account.</td>";
$messageInvitedUser .="</tr>";
//
$messageInvitedUser .="<tr>";
$messageInvitedUser .="<td>Please follow the instructions below.</td>";
$messageInvitedUser .="</tr>";
//
$messageInvitedUser .="<tr>";
$messageInvitedUser .="<td>Username: $usernamelower</td>";
$messageInvitedUser .="</tr>";
//
$messageInvitedUser .="<tr>";
$messageInvitedUser .="<td>Please Login and Activated your account.</td>";
$messageInvitedUser .="</tr>";
//
$messageInvitedUser .="<tr bgcolor='#014693'>";
$messageInvitedUser .="<td>";
$messageInvitedUser .="<a href='";
$messageInvitedUser .=outAccessLink."/access_verify.php?email=$email&emailhash=$emailhash";
$messageInvitedUser .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$messageInvitedUser .="</td>";
$messageInvitedUser .="</tr>";
//
$messageInvitedUser .="</table>";
$messageInvitedUser .="</body>";
$messageInvitedUser .="</html>";
//
$mailInvited->Body = $messageInvitedUser;
//
$mailInvited->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailInvited->ErrorInfo}";
*/
}
/*** ################# eMail alert for admin for new user ################ ***/
$mailAlert = new PHPMailer(true);
try
{
//
$mailAlert->isSMTP();
$mailAlert->Host       = smtpHost;
$mailAlert->SMTPAuth   = true;
$mailAlert->Username   = smtpUsername;
$mailAlert->Password   = smtpPassword;
$mailAlert->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailAlert->Port       = smtpPort; 
//
$mailAlert->setFrom(adminEmail, domain);
$mailAlert->addAddress(alertToAdmin);
$mailAlert->isHTML(true);
$mailAlert->Subject = "New invited user $usernamelower";
//
$message ="<html>";
$message .="<head>";
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
$message .="<td>New user invited $usernamelower registration done.</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mailAlert->Body = $message;
//
$mailAlert->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailAlert->ErrorInfo}";
*/
}
/*
echo "<b>Sign Up Done. An eMail verification has been sent. Check your eMail Inbox or Spam to active your account.</b>";
*/
echo "<b>Signup Done.</b>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
else
{
echo "<div class='well'><b>Sorry please change this Username!</b></div>";
}
//
}
else
{
echo "<div class='well'><b>Sorry this eMail is not exits or already Sign Up!</b></div>";
}
}
/*** ***/
public function registration($full_name, $email, $code_mobile, $username, $password, $hash, $signup_date, $user_ip_address, $countryNameWhenSignup)
{
/* ########## Default Seting ###############
$account_type = "public";
$member_level = 1;
############################################
$account_type = "intro";
$member_level = 4;
############################################
$account_type = "merchant";
$member_level = 8;
############################################
*/
$usernamelower = strtolower($username);
$account_type = "public";
if(isset($_SESSION['omrusername']))
{
$omrusername = strtolower($_SESSION['omrusername']);
}
else
{
$omrusername = 0;
}

$query = "SELECT * FROM excessusers WHERE ebusername='$usernamelower' OR email='$email'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_testresult = $testresult->num_rows;

if($num_testresult == 1)
{
echo "<b>Sorry this eMail or Username Exits!</b>";
}

if($num_testresult == 0)
{
/*** ***/
if(!empty($code_mobile))
{ 
$generate_sms_code_formate = '0123456789';
$generated_new_address_verification_codes = ''; 
for ($i = 0; $i < 6; $i++)
{
$generated_new_address_verification_codes .= $generate_sms_code_formate[rand(0, strlen($generate_sms_code_formate)-1)];
}
$generated_sms_code_for_mobile = intval($generated_new_address_verification_codes);
}
/*** ***/
$queryNewUser = "INSERT INTO excessusers SET ebusername='$usernamelower', ebpassword='$password', email='$email', emailhash='$hash', active=0, full_name='$full_name', gender='', date_of_birth='', mobile='$code_mobile', mobilehash='$generated_sms_code_for_mobile', mobileactive=0, signup_date='$signup_date', account_type='$account_type', member_level=1, position_names='', user_ip='$user_ip_address', address_line_1='', address_line_2='', city_town='', state_province_region='', postal_code='', country='$countryNameWhenSignup', address_verification_codes=0, address_verified=0, omrusername='$omrusername', paypalid='', bkashid=0, branch_name='', facebook_link='', twitter_link='', github_link='', linkedin_link='', pinterest_link='',youtube_link='', instagram_link='', profile_picture_link='', cover_photo_link=''";

$inserActionNewUser = eBConDb::eBgetInstance()->eBgetConection()->query($queryNewUser);
if($inserActionNewUser)
{
/*** send email varification link ***/
$mailSignup = new PHPMailer(true);
try
{
//
$mailSignup->isSMTP();
$mailSignup->Host       = smtpHost;
$mailSignup->SMTPAuth   = true;
$mailSignup->Username   = smtpUsername;
$mailSignup->Password   = smtpPassword;
$mailSignup->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailSignup->Port       = smtpPort; 
//
$mailSignup->setFrom(adminEmail, domain);
$mailSignup->addAddress($email);
$mailSignup->isHTML(true);
$mailSignup->Subject = "eMail verification for User account";
//
$message ="<html>";
$message .="<head>";
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
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/access_verify.php?email=$email&emailhash=$hash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mailSignup->Body = $message;
//
$mailSignup->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailSignup->ErrorInfo}";
*/
}
/*** ################# eMail alert for admin for new user ################ ***/
$mail2nd = new PHPMailer(true);
try
{
//
$mail2nd->isSMTP();
$mail2nd->Host       = smtpHost;
$mail2nd->SMTPAuth   = true;
$mail2nd->Username   = smtpUsername;
$mail2nd->Password   = smtpPassword;
$mail2nd->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail2nd->Port       = smtpPort; 
//
$mail2nd->setFrom(adminEmail, domain);
$mail2nd->addAddress(alertToAdmin);
$mail2nd->isHTML(true);
$mail2nd->Subject = "New user $usernamelower";
//
$messageSystem ="<html>";
$messageSystem .="<head>";
$messageSystem .="<meta charset='utf-8'>";
$messageSystem .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$messageSystem .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$messageSystem .="<style type='text/css'>
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
$messageSystem .="</head>";
$messageSystem .="<body>";
$messageSystem .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$messageSystem .="<tr>";
$messageSystem .="<td>New user: $usernamelower registration done.</td>";
$messageSystem .="</tr>";
//
$messageSystem .="</table>";
$messageSystem .="</body>";
$messageSystem .="</html>";
//
$mail2nd->Body = $messageSystem;
//
$mail2nd->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mail2nd->ErrorInfo}";
*/
}
/*
echo "<b>Sign Up Done. An eMail verification has been sent. Check your eMail Inbox or Spam to active your account.</b>";
*/
echo "<b>Signup Done.</b>";
}
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
/*** ***/
public function inviteAFriend($email)
{
$email = strtolower($email);
$account_type = "invited";
$omrusername = $_SESSION['ebusername'];
$query = "SELECT email FROM excessusers WHERE email='$email'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$numInviteAFriend = $testresult->num_rows;
if($numInviteAFriend == 1)
{
echo "<b>Sorry this eMail Exits!</b>";
}
if($numInviteAFriend == 0)
{
$resultInvited = eBConDb::eBgetInstance()->eBgetConection()->query("INSERT INTO excessusers SET ebusername='$email', ebpassword='', email='$email', emailhash='', active=0, full_name='', gender='', date_of_birth='', mobile='$email', mobilehash='', mobileactive=0, signup_date='', account_type='$account_type', member_level=1, position_names='', user_ip='', address_line_1='', address_line_2='', city_town='', state_province_region='', postal_code='', country='', address_verification_codes=0, address_verified=0, omrusername='$omrusername', branch_name='', facebook_link='', twitter_link='', github_link='', linkedin_link='', pinterest_link='', youtube_link='', instagram_link='', profile_picture_link='', cover_photo_link=''");
//
$mailInvite = new PHPMailer(true);
try
{
//
$mailInvite->isSMTP();
$mailInvite->Host       = smtpHost;
$mailInvite->SMTPAuth   = true;
$mailInvite->Username   = smtpUsername;
$mailInvite->Password   = smtpPassword;
$mailInvite->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailInvite->Port       = smtpPort; 
//
$mailInvite->setFrom(adminEmail, domain);
$mailInvite->addAddress($email);
$mailInvite->isHTML(true);
$mailInvite->Subject = "We invite you to join us";
//
$message ="<html>";
$message .="<head>";
$message .="<title>We invite you to join us</title>";
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
$message .="<td>We invite you to join us</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outAccessLink."/signupByInvite.php?email=$email";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>SIGN UP</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mailInvite->Body = $message;
//
$mailInvite->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailInvite->ErrorInfo}";
*/
}
//
if($resultInvited)
{
/*** ***/
echo "<b>Done</b>";
}
}
}
/*** ***/
public function varify_address()
{
if(isset($_REQUEST['submit_address_verification_code']))
{
extract($_REQUEST);
$address_verification_codes = intval($_REQUEST['addressCode']);
$username = $_SESSION['ebusername'];

/* update soft_merchant_add_items */
$query1st = "SELECT address_verification_codes FROM excessusers WHERE ebusername='$username' AND address_verification_codes=$address_verification_codes AND address_verified=0";
$result1st = eBConDb::eBgetInstance()->eBgetConection()->query($query1st);
$num_result = $result1st->num_rows;

if($num_result == 1)
{
$query2nd = "UPDATE excessusers SET address_verified =1 WHERE ebusername ='$username' AND address_verification_codes=$address_verification_codes";
$result2nd = eBConDb::eBgetInstance()->eBgetConection()->query($query2nd);
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
$query = "SELECT ebusername, mobile, mobileactive FROM excessusers";
$query .= " WHERE ebusername ='$username' and member_level !=13";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result=$result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}

/*** ***/ 
public function submit_user_mobile_to_verify($username)
{
$query = "SELECT ebusername, mobileactive FROM excessusers where ebusername='$username' and mobileactive=0";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;

if($num_result == 1)
{
/*** ***/ 
if(!empty($username))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET mobileactive=1 WHERE ebusername='$username'");
}
/*** ***/
echo $this->ebDone();
/*** ***/ 
}
}
/*** ***/
public function varify_mobile()
{
/*### Please use sms mobile verification api ###*/
$mobileUser = $_SESSION["ebusername"];
$queryCallToAdminNo = "SELECT mobile, mobilehash FROM excessusers WHERE ebusername='$mobileUser'";
$resultCallToAdminNo = eBConDb::eBgetInstance()->eBgetConection()->query($queryCallToAdminNo);
$num_resultCallToAdminNo = $resultCallToAdminNo->num_rows;

if($num_resultCallToAdminNo == 1)
{
while($rows=$resultCallToAdminNo->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}

/*** ***/
public function varify_email_re_sent($usernameemail)
{
/*** $password = md5($password); ***/
$query="SELECT ebusername, email, emailhash FROM excessusers WHERE ebusername='$usernameemail' OR email='$usernameemail'";
$testresult= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result=$testresult->num_rows;

if($num_result == 0)
{
echo "<b>Sorry this eMail or Username is not Exits!</b>";
}

if($num_result == 1)
{
$userinfo = mysqli_fetch_array($testresult);
$userusername = $userinfo['ebusername'];
$emailhash = $userinfo['emailhash'];
$email = $userinfo['email'];
/*** send email varification link ***/ 
$mail = new PHPMailer(true);
try
{
//
$mail->isSMTP();
$mail->Host       = smtpHost;
$mail->SMTPAuth   = true;
$mail->Username   = smtpUsername;
$mail->Password   = smtpPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = smtpPort; 
//
$mail->setFrom(adminEmail, domain);
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = "eMail verification for your account";
//
$message ="<html>";
$message .="<head>";
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
$message .=outAccessLink."/access_verify.php?email=$email&emailhash=$emailhash";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Active your Account</a>";
$message .="</td>";
$message .="</tr>";
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mail->Body = $message;
//
$mail->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
*/
}
/*
echo "<b>An eMail verification has been sent. Check your eMail Inbox to active your account.</b>";
*/
echo "<b>Signup Done</b>";
echo '</div></div></div></div>';
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
//
/*** ***/ 
public function unsubscribe($email, $emailhash)
{
$query = "SELECT email, emailhash FROM  excessusers where email='$email' AND emailhash='$emailhash' AND account_type='invited'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
if($num_result == 0)
{
include (ebaccess.'/access-unsubscribe-sorry.php');
}
if($num_result == 1)
{
$unsubscribeEmail = eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET account_type='unsubscribe' WHERE email='$email' AND emailhash='$emailhash'");
if($unsubscribeEmail)
{
include (ebaccess.'/access-unsubscribe.php');
}
}
}

/*** ***/ 
public function varify_email($email, $emailhash)
{
$usernameVerify = $_SESSION['ebusername'];
$query = "SELECT email, emailhash FROM  excessusers where ebusername='$usernameVerify' AND ebpassword='".$_SESSION['ebpassword']."' AND email='$email' AND emailhash='$emailhash' AND active=0";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;

if($num_result == 0)
{
include (ebaccess.'/access_verification_error.php');
}

if($num_result == 1)
{
$activeEmail = eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET active=1 WHERE email='$email' AND emailhash='$emailhash'");
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
$username = $_SESSION['ebusername'];
$query = "SELECT ebusername FROM  excessusers WHERE ebusername='$username'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
if($num_result == 1)
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET ebpassword='$password' WHERE ebusername='$username'");
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
$updateaccountfor = $_SESSION['ebusername'];
$query = "SELECT * FROM excessusers WHERE ebusername='$updateaccountfor'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

}
/*** ***/ 
public function update_account_for_free_pos($username)
{
$query = "SELECT account_type FROM  excessusers WHERE ebusername='$username'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
/*** ***/ 
if($num_result == 1)
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET account_type='Request for Free POS' WHERE ebusername='$username'");
/*** ***/
/*** ################# eMail alert for admin requested to upgrade access levels ################ ***/
$mail = new PHPMailer(true);
try
{
//
$mail->isSMTP();
$mail->Host       = smtpHost;
$mail->SMTPAuth   = true;
$mail->Username   = smtpUsername;
$mail->Password   = smtpPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = smtpPort; 
//
$mail->setFrom(adminEmail, domain);
$mail->addAddress(alertToAdmin);
$mail->isHTML(true);
$mail->Subject = "$username requested for Free POS";
//
$message ="<html>";
$message .="<head>";
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
$message .="<td>$username requested for Free POS</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mail->Body = $message;
//
$mail->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
*/
}
echo $this->ebDone();
//
?>
<script>
window.location.replace('access_update_account_information.php');
</script>
<?php
}
}
/*** ***/ 
public function update_account_information($email, $full_name, $gender, $mobile, $position_names, $address_line_1, $address_line_2, $city_town, $state_province_region, $postal_code, $country, $paypalid, $bkashid, $facebook_link, $twitter_link, $github_link, $linkedin_link, $pinterest_link, $youtube_link, $instagram_link)
{
$usernameUp = $_SESSION['ebusername'];
$query = "SELECT * FROM  excessusers WHERE ebusername='$usernameUp'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result_up = $testresult->num_rows;
/*** ***/ 
$userinfo = mysqli_fetch_array($testresult);
$previous_email = $userinfo['email'];
$previous_mobile = intval($userinfo['mobile']);
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
$emailhash = $generated_new_email_hash;
}
/*** ***/
$mobileNew = intval($mobile); 

if(!empty($mobileNew) and $mobileNew != $previous_mobile)
{
$generate_sms_code_formate = '0123456789';
$generated_new_address_verification_codes = ''; 
for ($i = 0; $i < 6; $i++)
{
$generated_new_address_verification_codes .= $generate_sms_code_formate[rand(0, strlen($generate_sms_code_formate)-1)];
}
$generated_sms_code_for_mobile = intval($generated_new_address_verification_codes);
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
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET full_name='$full_name' WHERE ebusername='$usernameUp'");
}
if(!empty($gender))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET gender='$gender' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($email) and $email!=$previous_email)
{
/*** ***/
$queryToExistingEmailCheck = "SELECT email FROM  excessusers WHERE email ='$email'";
$queryToExistingEmailCheckResult = eBConDb::eBgetInstance()->eBgetConection()->query($queryToExistingEmailCheck);
$num_result_email = $queryToExistingEmailCheckResult->num_rows;
/*** ***/
if($num_result_email ==0)
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET email='$email', emailhash='$emailhash', active=0 WHERE ebusername='$usernameUp'");
}
}
/*** ***/ 
if(!empty($mobileNew) and $mobileNew != $previous_mobile)
{
/*** ***/
$queryToExistingMobileCheck = "SELECT mobile FROM  excessusers WHERE ebusername='$usernameUp'";
$queryToExistingMobileCheckResult = eBConDb::eBgetInstance()->eBgetConection()->query($queryToExistingMobileCheck);
$num_result_mobile = $queryToExistingMobileCheckResult->num_rows;
/*** ***/
if($num_result_mobile ==1)
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET mobile='$mobileNew', mobilehash='$generated_sms_code_for_mobile', mobileactive=0 WHERE ebusername='$usernameUp'");
}
/*** ***/
}
/*** ***/ 
if(!empty($position_names) || empty($position_names))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET position_names='$position_names' WHERE ebusername='$usernameUp'");
}

/*** ***/ 
if(!empty($paypalid) || empty($paypalid))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET paypalid='$paypalid' WHERE ebusername='$usernameUp'");
}

/*** ***/ 
if(!empty($bkashid) || empty($bkashid))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET bkashid='$bkashid' WHERE ebusername='$usernameUp'");
}

/*** ***/ 
if(!empty($address_line_1) and $address_line_1 != $previous_address_line_1)
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET address_line_1='$address_line_1', address_verification_codes=$generated_code_for_address, address_verified=0 WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($address_line_2))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET address_line_2='$address_line_2' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($city_town))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET city_town='$city_town' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($state_province_region))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET state_province_region='$state_province_region' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($postal_code))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET postal_code='$postal_code' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($country))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET country='$country' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($facebook_link) || empty($facebook_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET facebook_link='$facebook_link' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($twitter_link) || empty($twitter_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET twitter_link='$twitter_link' WHERE ebusername='$usernameUp'");
}

/*** ***/ 
if(!empty($github_link) || empty($github_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET github_link='$github_link' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($linkedin_link) || empty($linkedin_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET linkedin_link='$linkedin_link' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($pinterest_link) || empty($pinterest_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET pinterest_link='$pinterest_link' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($youtube_link) || empty($youtube_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET youtube_link='$youtube_link' WHERE ebusername='$usernameUp'");
}
/*** ***/ 
if(!empty($instagram_link) || empty($instagram_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET instagram_link='$instagram_link' WHERE ebusername='$usernameUp'");
}
/*** ***/
echo $this->ebDone();
}
}
/*** ***/ 
public function adminViewReferral($username)
{
$query = "SELECT omrusername FROM excessusers";
$query .= " WHERE ebusername='$username'";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result=$result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

}
/*** ***/ 
public function pos_user_rool_power($usernameEmailMobile)
{
$query = "SELECT ebusername, email, emailhash, active, full_name, mobile, mobileactive, account_type, member_level, position_names, user_ip, address_verification_codes, address_verified, omrusername FROM excessusers WHERE ebusername='$usernameEmailMobile' OR email='$usernameEmailMobile' OR mobile='$usernameEmailMobile' ORDER BY userid DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function search_all_user_read($usernameEmailMobile)
{
$query = "SELECT ebusername, email, emailhash, active, full_name, mobile, mobileactive, account_type, member_level, position_names, user_ip, address_verification_codes, address_verified, omrusername FROM excessusers WHERE ebusername='$usernameEmailMobile' OR email='$usernameEmailMobile' OR mobile='$usernameEmailMobile' ORDER BY userid DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function all_user_account_info_read()
{
$query = "SELECT ebusername, email, emailhash, active, full_name, mobile, mobileactive, account_type, member_level, position_names, user_ip, address_verification_codes, address_verified, omrusername FROM excessusers WHERE member_level !=13 ORDER BY userid DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function edit_view_user_power($username)
{
$query = "SELECT ebusername, email, member_level, position_names FROM excessusers";
$query .= " WHERE ebusername ='$username' and member_level !=13";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}

/*** ***/ 
public function submit_user_power($email, $username, $userpower_level_names, $userpower_level_power, $userpower_position)
{
$account_type = $userpower_level_names;
$member_level = intval($userpower_level_power);
$position_names = $userpower_position;

$query = "SELECT ebusername, account_type, member_level, position_names FROM excessusers WHERE ebusername='$username'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
/*** ***/ 
$userinfo = mysqli_fetch_array($testresult);
/*** ***/ 
if($num_result == 1)
{
if(isset($account_type))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET account_type='$account_type' WHERE ebusername='$username'");
}
/** **/
if(isset($member_level))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET member_level=$member_level WHERE ebusername='$username'");
}
/*** ***/ 
if(!empty($position_names))
{
eBConDb::eBgetInstance()->eBgetConection()->query("UPDATE excessusers SET position_names='$position_names' WHERE ebusername='$username'");
}
/* Intro */
if($member_level == 4)
{
/*** ################# eMail alert for user ################ ***/
$mailFreePOS = new PHPMailer(true);
try
{
//
$mailFreePOS->isSMTP();
$mailFreePOS->Host       = smtpHost;
$mailFreePOS->SMTPAuth   = true;
$mailFreePOS->Username   = smtpUsername;
$mailFreePOS->Password   = smtpPassword;
$mailFreePOS->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailFreePOS->Port       = smtpPort; 
//
$mailFreePOS->setFrom(adminEmail, domain);
$mailFreePOS->addAddress($email);
$mailFreePOS->isHTML(true);
$mailFreePOS->Subject = "Your Intro POS Account Approved";
//
$message ="<html>";
$message .="<head>";
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
$message .="<td>Please configure pos for your shop</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mailFreePOS->Body = $message;
//
$mailFreePOS->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailFreePOS->ErrorInfo}";
*/
}
}
//
/* Plus */
if($member_level == 6)
{
/*** ################# eMail alert for user ################ ***/
$mailPlusPOS = new PHPMailer(true);
try
{
//
$mailPlusPOS->isSMTP();
$mailPlusPOS->Host       = smtpHost;
$mailPlusPOS->SMTPAuth   = true;
$mailPlusPOS->Username   = smtpUsername;
$mailPlusPOS->Password   = smtpPassword;
$mailPlusPOS->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mailPlusPOS->Port       = smtpPort; 
//
$mailPlusPOS->setFrom(adminEmail, domain);
$mailPlusPOS->addAddress($email);
$mailPlusPOS->isHTML(true);
$mailPlusPOS->Subject = "Your Plus POS Account Approved";
//
$message ="<html>";
$message .="<head>";
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
$message .="<td>Please configure pos for your shop</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
//
$mailPlusPOS->Body = $message;
//
$mailPlusPOS->send();
}
catch (Exception $e)
{
/*
echo "Message could not be sent. Mailer Error: {$mailPlusPOS->ErrorInfo}";
*/
}
}
//
echo $this->ebDone(); 
}
}
/*** ***/ 
public function site_owner_social_info()
{
$query = "SELECT facebook_link, twitter_link, github_link, linkedin_link, pinterest_link, youtube_link, instagram_link FROM excessusers WHERE account_type='admin' AND member_level=13";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result==1)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function site_owner_title()
{
$query = "SELECT business_title_one, business_title_two FROM excess_admin_business_details order by business_details_id DESC limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function omr_support_social_info()
{
$queryOne = "SELECT full_name, position_names, facebook_link, twitter_link, github_link, linkedin_link, pinterest_link, youtube_link, instagram_link 
FROM excessusers WHERE member_level >= 8";
$resultOne = eBConDb::eBgetInstance()->eBgetConection()->query($queryOne);
if($resultOne)
{
while($rows = $resultOne->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
public function site_location()
{
$query = "SELECT business_name, business_city_town FROM excess_admin_business_details order by business_details_id DESC limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/ 
}

?>
