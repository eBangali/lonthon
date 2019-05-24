<?php 
namespace ebapps\sanitization;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;

class formSanitization extends dbconfig
{
public function test_input($data)
{
/* never use this here $data = strip_tags($data, "<ol><li>"); */
$data = trim($data);
$data = htmlspecialchars($data);
$data = json_encode($data);
/* if your use addslashes you have to use stripslashes to print */
$data = addslashes($data);
return $data;
}
/*** ***/
public function validEmail($email)
{
/*** Check the formatting is correct ***/
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
return FALSE;
}
/***  Next check the domain is real. ***/
$eMailDomain = explode("@", $email, 2);
return checkdnsrr($eMailDomain[1]);
}

public function testArea($data)
{
$data = trim($data);
$data = strip_tags($data, "<p><ul><ol><li><strong><b><i><em>");
$data = htmlspecialchars($data);
$data = urlencode($data);
$data = json_encode($data);
/* if your use addslashes you have to use stripslashes to print */
$data = addslashes($data);
return $data;
}

/*** ***/
}
?>
