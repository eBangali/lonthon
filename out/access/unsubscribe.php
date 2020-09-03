<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
  <div class='row row-offcanvas row-offcanvas-right'>
    <div class='col-xs-12 col-md-2'>
    </div>
    <div class='col-xs-12 col-md-7 sidebar-offcanvas'>
    <div class='well'>
    <h2 title='Unsubscribe'>Unsubscribe</h2>
    </div>
    <div class='well'>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php
if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['hash']) && !empty($_GET['hash'])){
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
/* valitation eMail  */
$email = $sanitization->test_input($_GET['email']);
/* valitation hash  */
$hash = $sanitization->test_input($_GET['hash']);
/* Updating varification */
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user->unsubscribe($email, $hash);
}
?>
    </div> 
    </div>
    <div class='col-xs-12 col-md-3 sidebar-offcanvas'>
    </div>
  </div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>
