<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
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
<div class='well'>
<h2 title='Change password'>Change password</h2>
</div>

<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$password_error = '*';
$confirmpassword_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['change_password']))
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

/* Username */
if (empty($_REQUEST['password']))
{
$password_error = "<b class='text-warning'>password required</b>";
$error =1;
}
/* valitation password */
elseif(! preg_match('/^[A-Za-z0-9\-\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,32}$/',$password))
{
$password_error = "<b class='text-warning'>Passowrd?</b>";
$error =1;
}
else
{
$password = $sanitization->test_input($_POST['password']);
}
/* password */
if (empty($_REQUEST['confirmpassword']))
{
$confirmpassword_error = "<b class='text-warning'>Confirm Password required</b>";
$error =1;
}
/* valitation confirmpassword  */
elseif (! preg_match('/^[A-Za-z0-9\-\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,32}$/',$confirmpassword))
{
$confirmpassword_error = "<b class='text-warning'>Confirm Password?</b>";
$error =1;
}
else
{
$confirmpassword = $sanitization->test_input($_POST['confirmpassword']);
}
/* Submition form */
if($error ==0)
{
extract($_REQUEST);
include_once (eblogin.'/registration_page.php'); 
$user = new ebapps\login\registration_page();
if($password and $confirmpassword){
//
if($password == $confirmpassword){
$ha = new ebapps\hashpassword\hashPassword();
$password = $ha -> hashPassword($password);
$user->changepassword($password);
}
else 
{ 
echo '<b>Password does not match</b>';
}
}
}
}
?>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>

<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>New Password: <?php echo $password_error; ?></span>
<input type='password' name='password' placeholder='Password' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>


<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>Confirm New Password: <?php echo $confirmpassword_error; ?></span>
<input type='password' name='confirmpassword' placeholder='Confirm New Password' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>

<div class='buttons-set'>
<button type='submit' name='change_password' title='Change' class='button submit'> <span> Change </span> </button>
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