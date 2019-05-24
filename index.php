<?php
include_once('initialize.php');
include_once(ebbd.'/dbconfig.php');
$adMin = new ebapps\dbconnection\dbconfig();
if(isset($adMin->AdminUserIsSet))
{
header("Location: ".outLink."/blog/contents/");
}
else
{
header("Location: ".outLink."/access/admin-register.php");
}
?>

