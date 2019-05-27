<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
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
<h2 title='Send eMail verification'>Send eMail verification</h2>
</div>
<div class="well">
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$usernameemail_error = "*";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['send_verification']))
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
if (empty($_REQUEST["usernameemail"]))
{
$usernameemail_error = "<b class='text-warning'>Username or eMail required</b>";
$error =1;
} 
/* valitation fullname  */
elseif (! preg_match("/^[a-z0-9_.@]{2,64}$/",$usernameemail))
{
$usernameemail_error = "<b class='text-warning'>Username or eMail?</b>";
$error =1;
}
else 
{
$usernameemail = $sanitization -> test_input($_POST["usernameemail"]);
}
//
/* Submition form */
if($error ==0)
{
include_once (eblogin.'/registration_page.php');
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user -> varify_email_re_sent($usernameemail);
}
//
}
?>
<form method='post'>
<fieldset class='group-select'>
<ul><p>eMail verification required to access your account</p>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>Username or eMail: <?php echo $usernameemail_error;  ?></li>
<li><input class='form-control' type='text' name='usernameemail' placeholder="username or eMail" required autofocus></li>
<div class='buttons-set'>
<button type='submit' name='send_verification' title='Send eMail Verification' class='button submit'> <span> Send eMail Verification </span> </button>
</div>
</ul>
</fieldset>
</form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>