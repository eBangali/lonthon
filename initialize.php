<?php
/* ini_set('session.save_path', "/var/cpanel/php/sessions/ea-php56"); */
session_start();
session_regenerate_id();
error_reporting(E_ALL);
ini_set("display_errors", 1);
/***************************************************************************************************************************
######################################### CHANGE OPTION STARTS  ############################################################
****************************************************************************************************************************/
/* Database Settings */
const EB_HOSTNAME = "localhost";
const EB_DB_USERNAME = "username";
const EB_DB_PASSWORD = "password";
const EB_DATABASE = "database";
/* eMails Settings */
const adminEmail = "id@gmail.com";
const contactEmail = "info@YourDomain.com";
const billEmail = "bill@YourDomain.com";
const CCEmail = "id@gmail.com";
/* Mobile Settings */
const adminMobile = "0000000000000";
/* Version */
const version = 7.40;
/*Salt User Password Hash*/
const salt_1= "}#f4ga~g%$%#$@!@-wi=6^7-$^R9F|GK5J#~||\E6WT;IO[JN";
const salt_2= "#$%^&*&*^%^&%$^&*:?#<--!<>";
//

//
define("usd",1);
define("bdt",80.00);
define("usd2bdtconverter",usd*bdt);

/* License */
define("license", "YourLicense");
/***************************************************************************************************************************
######################################### END OF CHANGE OPTION  ############################################################
****************************************************************************************************************************/
/* The BackEnd System */
define("eb", dirname(__FILE__));
define("docRoot", dirname(__FILE__));
$eBscema = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://";
define("hypertext", "$eBscema");
define("domain", "$_SERVER[HTTP_HOST]");
define("hostingName", hypertext."$_SERVER[HTTP_HOST]");
define("fullUrl", hostingName."$_SERVER[REQUEST_URI]");
define("ebfromeb", eb."/ebapps/captcha");
//
define("domainForImagStore", str_replace("www.", "", parse_url(hostingName, PHP_URL_HOST)));
define("hypertextWithOrWithoutWww", str_replace(domainForImagStore, "", hostingName));
//
define("ebfromcap", hostingName."/ebapps/captcha");
define("ebbd", eb."/ebapps/dbconnection");
define("ebformkeys", eb."/ebapps/formkeys");
define("ebformmail", eb."/ebapps/formmail");
define("ebHashKey", eb."/ebapps/hashpassword");
define("eblogin", eb."/ebapps/login");
define("ebsanitization", eb."/ebapps/sanitization");
define("themeSetting", eb."/ebapps/themeSetting");
define("ebimageupload", eb."/ebapps/upload");

/*################################# Default Settings ###############################################*/
/* FrontEnd */
define("ebout", eb."/out");
define("outLink", hostingName."/out");
/* Access */
define("ebaccess", eb."/out/access");
define("outAccessLink", hostingName."/out/access");
/* Pages */
define("ebpages", eb."/out/pages");
define("outPagesLink", hostingName."/out/pages");
/* ################################ Problem Solving Blog CMS #############################################################*/
/* BacktEnd */
define("ebblog", eb."/ebapps/blog");
/* FrontEnd */
define("ebcontents", eb."/out/blog");
define("outContentsLink", hostingName."/out/blog");
//
define('ebThemesActive', "Zamzam");
/* For All Apps Theme Settings */
define("ebThemes", eb."/ebcontents/themes");
define("themeResource", hostingName."/ebcontents/themes/".ebThemesActive);
define("eblayout", eb."/ebcontents/themes/".ebThemesActive);
?>