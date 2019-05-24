<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebcontents.'/contents/');
}
else
{
include_once (ebcontents.'/contents/');
}
?>
