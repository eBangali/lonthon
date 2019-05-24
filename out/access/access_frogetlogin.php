<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/Advertisement.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='768' />
<meta property='og:title' content='Forget username or password?' />
<meta property='og:description' content='Convert your Idea into Code. Turn your Dreams comes True' />
<title>Forget username or password?</title>
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
<h2 title='Forget username or password?'>Forget username or password?</h2>
</div>
<?php include_once (eblogin.'/login.php'); ?>
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
if (isset($_REQUEST['retrieve']))
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
$usernameemail_error = "<b class='text-warning'>Username or eMail or Mobile Number Required.</b>";
$error =1;
} 
/* valitation fullname  */
elseif (! preg_match("/^[a-z0-9\@\.\_]{2,64}$/",$usernameemail))
{
$usernameemail_error = "<b class='text-warning'>Username or eMail or Mobile Number?</b>";
$error =1;
}
else 
{
$usernameemail = $sanitization->test_input($_POST["usernameemail"]);
}
/* Submition form */
if($error ==0)
{
$user = new ebapps\login\login();
extract($_REQUEST);
$user -> retrieve($usernameemail);
}
}
?>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<ul>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>Username or Email or Mobile: <?php echo $usernameemail_error;  ?></li>
<li><input class='form-control' type='text' name='usernameemail' placeholder='Username or Email or Mobile' required autofocus /></li>
<div class='buttons-set'>
<button type='submit' name='retrieve' title='Submit' class='button submit'> <span> Submit </span> </button>
</div>
</ul>
</fieldset>
</form>
<a href='<?php echo outAccessLink; ?>/signup.php'>Register new user</a>
</div>
</div>

<div class='col-xs-12 col-md-3 sidebar-offcanvas'>

</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>