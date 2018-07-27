<?php
namespace ebapps\hashpassword;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class hashPassword extends dbconfig
{
public function hashPassword($password)
{
$shah_1 = sha1(salt_1.$password.salt_2);
$shah_2 = sha1($shah_1);
return $shah_2;
}
}
?>
