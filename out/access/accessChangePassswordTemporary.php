<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session_access_retrive.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/Advertisement.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='768' />
<meta property='og:title' content='Please change your password!' />
<meta property='og:description' content='Convert your Idea into Code. Turn your Dreams comes True' />
<title>Please change your password!</title>
<meta name='description' content='Convert your Idea into Code. Turn your Dreams comes True' />
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
<h2 title='Please change your password'>Please change your password</h2>
</div>
<div class='well'>
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
elseif(! preg_match('/^[A-Za-z0-9\-\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,16}$/',$password))
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
elseif (! preg_match('/^[A-Za-z0-9\-\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,16}$/',$confirmpassword))
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
else{echo '<b>Password does not match</b>';}
}
}
}
?>

<form method='post'>
<fieldset class='group-select'>
<ul>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>New Password: <?php echo $password_error; ?></li>
<li><input class='form-control' type='password' name='password'></li>
<li>Confirm New Password: <?php echo $confirmpassword_error; ?></li>
<li><input class='form-control' type='password' name='confirmpassword'></li>
<div class='buttons-set'>
<button type='submit' name='change_password' title='Change' class='button submit'> <span> Change </span> </button>
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