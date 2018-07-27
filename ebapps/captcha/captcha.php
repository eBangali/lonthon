<?php
namespace ebapps\captcha;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class captchaClass extends dbconfig
{
/*** ***/
public function captchaFun()
{
$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = ''; 
for ($i = 0; $i < 5; $i++)
{
$randomString .= $chars[rand(0, strlen($chars)-1)];
}     
$_SESSION['captcha'] = $randomString;	
return $randomString;
}

}

?>