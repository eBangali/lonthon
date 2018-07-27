<?php
namespace ebapps\formmail;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class formMail extends dbconfig
{
public function ebMail($fullname,$email_address,$subjectfor,$messagepre)
{	
/*** eMail to Administration ***/
$to = contactEmail;
$from = $email_address;
/*** ***/
$subject = domain." ".$subjectfor;
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
$message .="<td>";
$message .=$messagepre;
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";

/*** ***/
mail($to, $subject, $message, $headers);
}

/*** ***/
}

?>