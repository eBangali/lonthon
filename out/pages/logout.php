<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
session_destroy();
unset($_SESSION['username']);
unset($_SESSION['password']);
?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<title>Sign Out</title>
<meta name='description' content='Frequently asked questions' />
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='You are Sign Out'>You are Sign Out</h2>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>