<?php
namespace ebapps\formkeys;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
/*############# USE SSL ####################################*/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class valideForm extends dbconfig
{
private function generateKey()
{
$uniqid = uniqid(mt_rand(), true);
$shah_1 = sha1(salt_1.$uniqid.salt_2);
$shah_2 = sha1($shah_1);
return $shah_2;
}

public function outputKey()
{
$ip = $_SERVER['REMOTE_ADDR'];
$domain = $_SERVER['SERVER_NAME'];
$fromkey = $this->generateKey();


$query = "INSERT INTO fromkey set requestip='$ip', domain='$domain', fromkey='$fromkey', fromkeystatus='NO'";
$result = $this->ebmysqli->query($query);
return $fromkey;
}

/*** ***/
public function read_and_check_formkey($form_key)
{
$dom = domain;
$query = "SELECT fromkey FROM fromkey where domain='$dom' and fromkey='$form_key' and fromkeystatus='NO'";
$testresult = $this->ebmysqli->query($query);
$num_result = $testresult->num_rows;
if($num_result == 1)
{
$query2nd = "UPDATE fromkey SET fromkeystatus = 'OK' WHERE fromkey = '$form_key'";
$testresult = $this->ebmysqli->query($query2nd);

$query3 = "DELETE FROM fromkey WHERE fromkey = '$form_key' and fromkeystatus = 'NO'";
$testresult3 = $this->ebmysqli->query($query3);
return true;
}
}
/*** ***/
}
?>