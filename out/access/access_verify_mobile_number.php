<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc_verify.php'); ?>
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
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Mobile Number Verification'>Mobile Number Verification</h2>
</div>
<div class="well">
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php 
/*### Please use sms mobile verification api ###*/
$objMobile = new ebapps\login\registration_page(); $objMobile -> varify_mobile(); 
?>
<?php if($objMobile->data){ foreach($objMobile->data as $val): extract($val); ?>
<?php echo "<a href='sms:+".$mobile."?body=$mobilehash'><button type='button' class='button submit' title='Send sms verification'><span>Send sms verification</span></button></a>"; ?>
<?php endforeach; ?>
<?php } ?> 
</div>
<div class="well">
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$smsCode_error = "*";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['verifyMobile']))
{
extract($_REQUEST);

/* Form Key*/
if(isset($_REQUEST['form_key']))
{
$form_key = preg_replace('#[^a-zA-Z0-9]#i','',$_POST['form_key']);
if($formKey->read_and_check_formkey($form_key) == true)
{

}
else
{
$formKey_error = "<b class='text-warning'>Sorry the server is currently too busy please try again later.</b>";
$error = 1;
}
}
/* Code */
if (empty($_REQUEST["smsCode"]))
{
$smsCode_error = "<b class='text-warning'>Code required</b>";
$error =1;
} 

elseif(!preg_match("/^[[A-Za-z0-9]{1,6}$/",$smsCode))
{
$smsCode_error = "<b class='text-warning'>Code?</b>";
$error =1;
}
else 
{
$smsCode = $sanitization->test_input($_POST["smsCode"]);
}

/* Submition form */
if($error ==0)
{
extract($_REQUEST);
/*** ***/
$user = new ebapps\login\registration_page();
$user->verifyMobile($smsCode);
}
}
?>
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>Type Code <?php echo $smsCode_error;  ?></span>
<input type='text' name='smsCode' placeholder='Type Code' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>
<div class='buttons-set'>
<button type='submit' name='verifyMobile' title='Verify mobile number' class='button submit'> <span> Verify mobile number </span> </button>
</div>
</fieldset>
</form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>