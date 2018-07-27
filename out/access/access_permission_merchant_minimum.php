<?php 
/* Member level
admin = 13
merchant = 8
premier = 7
plus = 6
basic = 5
intro = 4
manager = 3
salseman = 2
staff = 2
online = 1
blocked = 0
*/
if(isset($_SESSION['memberlevel']))
{
if($_SESSION['memberlevel'] >= 8)
{

}
else
{
$printText = "<section>";
$printText .= "<div class='container'>";
$printText .= "<div class='row'>";
$printText .= "<div class='col-xs-12 jumbotron'>";
$printText .= "<pre><b>You have no enough permission to access.</b></pre>";
$printText .= "</div>";
$printText .= "</div>";
$printText .= "</div>";
$printText .= "</section>";
echo $printText;
include_once (eblayout.'/a-common-footer.php');
die();
}	
}
?>