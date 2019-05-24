<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once ('views/shop/seo.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-below-body-facebook.php'); ?>
<?php include_once (ebblog.'/blog.php'); ?>
<?php
$obj= new ebapps\blog\blog();
$obj ->blog_control();
?>