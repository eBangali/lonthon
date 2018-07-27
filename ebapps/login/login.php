<?php
namespace ebapps\login;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class login extends dbconfig
{
/*** for login process ***/
public function login2system($ebusername, $ebpassword)
{
$check = $this -> ebmysqli -> query("SELECT username, password, active, full_name, mobileactive, account_type, member_level, address_verified FROM excessusers WHERE username='$ebusername' and password='$ebpassword'");
$userinfo = mysqli_fetch_array($check);
if ($check -> num_rows == 1)
{
$this->eBusername = $_SESSION['username'] = $userinfo['username'];
$this->eBpassword = $_SESSION['password'] = $userinfo['password'];
$this->activeEmail = $_SESSION['activeEmail'] = $userinfo['active'];
$this->fullname = $_SESSION['fullname'] = $userinfo['full_name'];
$this->activeMobil = $_SESSION['activeMobile'] = $userinfo['mobileactive'];
$this->membertype = $_SESSION['membertype'] = $userinfo['account_type'];
$this->memberlevel = $_SESSION['memberlevel'] = $userinfo['member_level'];
$this->addressverified = $_SESSION['addressverified'] = $userinfo['address_verified'];
}
}
/*** For email verification ***/
private function verifiedEmail()
{
if($_SESSION['activeEmail'] == 0)
{
include_once (ebaccess.'/access_verify_re_send.php');
exit();
}
}

/*** For address verification ***/
private function verifiedAddress()
{
if($_SESSION['addressverified'] == 0)
{
include_once (ebaccess.'/access_update_account_information.php');
exit();
}
}
/*** ***/
public function getsession_verify()
{
if(isset($_SESSION['username']) and isset($_SESSION['password']))
{
$this->login2system(isset($_SESSION['username']), isset($_SESSION['password']));
}
}
/*** ***/
public function getsession()
{
if(isset($_SESSION['username']) and isset($_SESSION['password']))
{
if($_SESSION['memberlevel'] < 5)
{
$this->verifiedEmail();
/* $this->verifiedAddress(); */
$this->login2system(isset($_SESSION['username']), isset($_SESSION['password']));
}
if($_SESSION['memberlevel'] >= 5)
{
$this->verifiedEmail();
/* $this->verifiedAddress(); */
$this->login2system(isset($_SESSION['username']), isset($_SESSION['password']));
}
}
}

/*** ***/
public function retrieve($usernameemail)
{
$query = "SELECT username, password, email, mobile from excessusers WHERE username='$usernameemail' OR email='$usernameemail' OR mobile ='$usernameemail'";
$result = $this->ebmysqli->query($query);
$num_result = $result->num_rows;
$userinfo = mysqli_fetch_array($result);
if ($num_result == 1)
{
/*** send email ***/
$to = $userinfo['email'];
$from = contactEmail;
$subject = domain." Retrieve your username and password";
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
$message .="<td>Retrieve your username and password.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Please follow the instructions below.</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: ".$userinfo['username']."</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>Username: ".$userinfo['password']."</td>";
$message .="</tr>";
//
$message .="<tr>";
$message .="<td>This is temporary login page. Please change your password with above username and password</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='".outAccessLink."/accessChangePassswordTemporary.php' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Change your password</a>";
$message .="</td>";
$message .="</tr>";
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo "<pre>We have eMailed your username and password, please check your eMail in SPAM folder.</pre>";
/*** ***/
echo "</div></div></div></div>";
include_once (eblayout.'/a-common-footer.php');
exit();
}
else
{
echo "<pre>Sorry, there is no user.</pre>";
echo "</div></div></div></div>";
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
/*** ***/
}
?>
