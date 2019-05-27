<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc_verify.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Mobile Number Verification'>Mobile Number Verification</h2>
</div>
<div class="well">
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php $objMobile = new ebapps\login\registration_page(); $objMobile -> varify_mobile_read(); ?>
<?php if($objMobile->data){ foreach($objMobile->data as $val): extract($val); ?>
<?php echo "<a href='tel:+".$mobile."'><button type='button' class='button submit' title='Call us to verify'><span> Call us to verify </span></button></a>"; ?>
<?php endforeach; ?>
<?php } ?> 
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>