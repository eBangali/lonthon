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
<div class='well'>
<h2 title='Address verification'>Address verification</h2>
<p>Submit address verify verification code.</p>
</div> 
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$addressCode_error = "*";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['submit_address_verification_code']))
{
extract($_REQUEST);
/* Form Key*/
if(isset($_REQUEST["form_key"]))
{
$form_key = preg_replace('#[^a-zA-Z0-9]#i','',$_POST["form_key"]);
if($formKey->read_and_check_formkey($form_key) == true)
{

}
else
{
$formKey_error = "<b class='text-warning'>Sorry the server is currently too busy please try again later.</b>";
$error = 1;
}
}
/* Full name */
if (empty($_REQUEST["addressCode"]))
{
$addressCode_error = "<b class='text-warning'>Code Required</b>";
$error =1;
} 
/* valitation fullname  */
elseif (! preg_match("/^[0-9]{1,8}$/",$addressCode))
{
$addressCode_error = "<b class='text-warning'>Code?</b>";
$error =1;
}
else 
{
$addressCode = $sanitization->test_input($_POST["addressCode"]);
}
//
/* Submition form */
if($error ==0)
{
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user -> varify_address($addressCode);
}
//
}
?>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<ul>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>Address Verified Code: <?php echo $addressCode_error;  ?></li>
<li><input class='form-control' type='text' name='addressCode' value=''></li>
<div class='buttons-set'>
<button type='submit' name='submit_address_verification_code' title='Verify Address' class='button submit'>Verify Address</button>
</div>
</ul>
</fieldset>
</form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout.'/a-common-ad-right.php'); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>