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
/*** ***/
include_once(ebbd.'/eBConDb.php');
use ebapps\dbconnection\eBConDb;
//
class formmail extends dbconfig
{
/*** ***/
public function selectMassEmail()
{
$query = "SELECT email FROM excessusers";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function ebMassMail($subjectfor,$messagepre)
{
/*** eMail to Users ***/
$arr_email = $this->selectMassEmail();
if( $arr_email >= 1){
foreach($arr_email as $val): extract($val);
$iTo[]=$email;
endforeach;
}
/*** eMail from ***/
/*** 
$from = contactEmail;
OR
$from = adminEmail; 
***/
$from = adminEmail; 
$subject = $subjectfor;
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** $headers .= "Cc: ".CCEmail." \r\n"; ***/
/*** ***/
$message =$messagepre;
/*** ***/
for($i =0; $i<=count($iTo)-1; $i++){
mail($iTo[$i], $subject, $message, $headers);
}
}

/*** ***/
}

?>