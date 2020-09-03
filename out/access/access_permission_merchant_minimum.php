<?php 
/*
Account Level Type | Access Level Power
admin = 9 TO 13
merchant = 8
plus = 6
basic = 5
intro = 4
manager = 3
salseman = 2
staff = 2
public = 1
protected = 1
private = 1
invited = 1
unsubscribe = 1
blocked = 0
*/
if(isset($_SESSION['memberlevel']))
{
if($_SESSION['memberlevel'] >= 8)
{

}
else
{
$printText = "<div class='container'>";
$printText .= "<div class='row'>";
$printText .= "<div class='col-xs-12'>";
$printText .= "<div class='well'><b>You have no enough permission to access.</b></div>";
$printText .= "</div>";
$printText .= "</div>";
$printText .= "</div>";
echo $printText;
include_once (eblayout.'/a-common-footer.php');
die();
}	
}
?>