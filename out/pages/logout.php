<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
session_destroy();
unset($_SESSION['ebusername']);
unset($_SESSION['ebpassword']);
?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (ebaccess.'/landingPage.php'); ?>
<?php include_once (eblayout.'/a-common-footer.php'); ?>