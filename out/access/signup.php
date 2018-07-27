<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/Advertisement.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='768' />
<meta property='og:title' content='Sign up' />
<meta property='og:description' content='Convert your Idea into Code. Turn your Dreams comes True' />
<title>Sign up</title>
<meta name='description' content='Convert your Idea into Code. Turn your Dreams comes True' />
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Sign up'>Sign up</h2>
</div> 
<div class='well'>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$full_name_error = '*';
$code_mobile_error = '*';
$email_error = '*';
$username_error = '*';
$password_error = '*';
$captcha_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['register']))
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

/* Full name */
if (empty($_REQUEST['full_name']))
{
$full_name_error = "<b class='text-warning'>Name required.</b>";
$error =1;
} 

elseif (! preg_match('/^[[A-Za-z.,\'\-\ ]{2,32}$/',$full_name))
{
$full_name_error = "<b class='text-warning'>Only letters are allowed.</b>";
$error =1;
}
else 
{
$full_name = $sanitization->test_input($_POST['full_name']);
}
/* Mobile */
if (empty($_REQUEST['code_mobile']))
{
$code_mobile_error = "<b class='text-warning'>Mobile number required.</b>";
$error =1;
} 

elseif (! preg_match('/^[0-9]{6,16}$/',$code_mobile))
{
$code_mobile_error = "<b class='text-warning'>Only numbers are allowed.</b>";
$error =1;
}
else 
{
$code_mobile = $sanitization->test_input($_POST['code_mobile']);
}
/* eMail */
if (empty($_REQUEST['email']))
{
$email_error = "<b class='text-warning'>Email required.</b>";
$error =1;
}
/* valitation eMail  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (! preg_match('/^[a-z0-9._]+@[a-z0-9.\-]{1,16}[a-z]{2,4}$/',$email))
{
$email_error = "<b class='text-warning'>eMail?</b>";
$error =1;
}
/* DNS Check  */
elseif ($sanitization->validEmail($email) === false)
{
$email_error = "<b class='text-warning'>Invalid eMail ID.</b>";
$error =1;
}
else
{
$email = $sanitization->test_input($_POST['email']);
}
/* Username */
if (empty($_REQUEST['username']))
{
$username_error = "<b class='text-warning'>Username required.</b>";
$error =1;
}
/* valitation username Tested allow (zakir)(zakir333)(zakir_9us2)*/
elseif(! preg_match('/^[a-z0-9_]{6,64}$/',$username))
{
$username_error = "<b class='text-warning'>Username?</b>";
$error =1;
}
else
{
$username = $sanitization->test_input($_POST['username']);
}
/* password */
if (empty($_REQUEST['password']))
{
$password_error = "<b class='text-warning'>Password required.</b>";
$error =1;
}
/* valitation password  Tested allow (344@dd!%#.,ABad)*/
elseif (! preg_match('/^[A-Za-z0-9\-\.\,\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,16}$/',$password))
{
$password_error = "<b class='text-warning'>Minimum 6 characters.</b>";
$error =1;
}
else
{
$password = $sanitization->test_input($_POST['password']);
}
/* Captcha */
if (empty($_REQUEST['answer']))
{
$captcha_error = "<b class='text-warning'>Captcha required.</b>";
$error =1;
}
elseif (isset($_SESSION['captcha']) and $_POST['answer'] !==$_SESSION['captcha'])
{
unset($_SESSION['captcha']);
$captcha_error = "<b class='text-warning'>Captcha?</b>";
$error =1;
}
else
{
$sanitization->test_input($_POST['answer']);
}


/* Submition form */
if($error ==0)
{
extract($_REQUEST);
//
$ha = new ebapps\hashpassword\hashPassword();
$pass = $ha -> hashPassword($password);
$password = $pass;
/*** ***/ 
$generate_email_hash_formate = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$generated_new_email_hash = ''; 
for ($i = 0; $i < 40; $i++)
{
$generated_new_email_hash .= $generate_email_hash_formate[rand(0, strlen($generate_email_hash_formate)-1)];
}
$hash = $generated_new_email_hash;
/*** ***/
$user = new ebapps\login\registration_page();
$user->registration($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address);
}
}
?>
<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
$ip_user=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip_user=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ip_user=$_SERVER['REMOTE_ADDR'];
}
?>
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<input type='hidden' name='signup_date' value='<?php echo date('r'); ?>' />
<input type='hidden' name='user_ip_address' value='<?php echo $ip_user ?>' />
Your full name: <?php echo $full_name_error;  ?>
<input class='form-control' type='text' name='full_name' placeholder='Your name' required autofocus />
Your mobile number with country code: <?php echo $code_mobile_error;  ?>
<input class='form-control' type='text' name='code_mobile' placeholder='Country code mobile number' required />
eMail: <?php echo $email_error;  ?>
<input class='form-control' type='text' name='email' placeholder='username@gmail.com' required />
Username: <?php echo $username_error;  ?>
<input class='form-control' type='text' name='username' placeholder='username' required />
Password: <?php echo $password_error;  ?>
<input class='form-control' type='password' name='password' placeholder='password' required />
Captcha: <?php echo $captcha_error; ?>
<?php
include_once(ebfromeb.'/captcha.php');
$cap = new ebapps\captcha\captchaClass();	
$captcha = $cap -> captchaFun();
echo "<b class='btn btn-Captcha btn-sm gradient'>$captcha</b>";
?>
<br />
<input type='text' name='answer' placeholder='Enter captcha' required />
<div class='buttons-set'>
<button type='submit' name='register' title='Signup' class='button submit'> <span> Signup </span> </button>
</div>
</fieldset>
</form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>