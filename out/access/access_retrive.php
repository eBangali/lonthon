<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$username_error = '*';
$password_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['login']))
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
if (empty($_REQUEST['username']))
{
$username_error = "<b class='text-warning'>Username required</b>";
$error =1;
}
/* valitation username */
elseif(! preg_match('/^[a-z0-9_]{2,64}$/',$username))
{
$username_error = "<b class='text-warning'>Use no-whitespace mini 2 max 64</b>";
$error =1;
}
else
{
$username = $sanitization->test_input($_POST['username']);
}
/* password */
if (empty($_REQUEST['password']))
{
$password_error = "<b class='text-warning'>Password required</b>";
$error =1;
}
/* valitation password  */
elseif (! preg_match('/^[A-Za-z0-9\-\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,64}$/',$password))
{
$password_error = "<b class='text-warning'>Use no-whitespace, mini 6 max 64</b>";
$error =1;
}
else
{
$password = $sanitization->test_input($_POST['password']);
}
/* Submition form */
if($error == 0)
{
extract($_REQUEST);
$user -> login2system($username, $password);
}

}
?>
<?php
if(!$user->getsession())
{
?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Temporary Login'>Temporary Login</h2>
</div>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<ul>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>Username: <?php echo $username_error; ?></li>
<li><input class='form-control' type='text' name='username' placeholder='username' required autofocus /></li>
<li>Password: <?php echo $password_error; ?></li>
<li><input class='form-control' type='password' name='password' placeholder='password' required autofocus /></li>
<div class='buttons-set'>
<button type='submit' name='login' title='Login' class='button submit'> <span> Login </span> </button>
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
<?php exit(); } ?>