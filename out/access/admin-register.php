<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/Advertisement.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='768' />
<meta property='og:title' content='Admin Signup!' />
<meta property='og:description' content='Online Point of Sale (POS), Accounting, Inventory for your Business' />
<meta name='twitter:card' content='summary_large_image'/>
<meta name='twitter:site' content='@eBangali'/>
<meta name='twitter:creator' content='@eBangali'/>
<meta name='twitter:url' content='<?php echo fullUrl; ?>'/>
<meta name='twitter:title' content='Admin Signup!'/>
<meta name='twitter:description' content='Online Point of Sale (POS), Accounting, Inventory for your Business'/>
<meta name='twitter:image' content='<?php echo themeResource; ?>/images/Advertisement.jpg'/>
<title>Admin Signup!</title>
<meta name='description' content='Online Point of Sale (POS), Accounting, Inventory for your Business' />
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header-for-admin.php'); ?>
<?php include_once (eblayout.'/a-common-navebar-admin.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Admin Signup!'>Admin Signup!</h2>
</div>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$full_name_error = "*";
$code_mobile_error = "*";
$email_error = "*";
$username_error = "*";
$password_error = "*";
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
if (empty($_REQUEST["full_name"]))
{
$full_name_error = "<b class='text-warning'>Name required</b>";
$error =1;
} 

elseif(!preg_match("/^[[A-Za-z.,\'\-\ ]{2,32}$/",$full_name))
{
$full_name_error = "<b class='text-warning'>Full Name?</b>";
$error =1;
}
else 
{
$full_name = $sanitization->test_input($_POST["full_name"]);
}
/* Mobile */
if (empty($_REQUEST["code_mobile"]))
{
$code_mobile_error = "<b class='text-warning'>Mobile number required</b>";
$error =1;
} 

elseif (!preg_match("/^[0-9]{8,16}$/",$code_mobile))
{
$code_mobile_error = "<b class='text-warning'>Mobile Number?</b>";
$error =1;
}
else 
{
$code_mobile = $sanitization->test_input($_POST["code_mobile"]);
}
/* eMail */
if (empty($_REQUEST["email"]))
{
$email_error = "<b class='text-warning'>Email required</b>";
$error =1;
}
/* valitation eMail  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (! preg_match("/^[a-z0-9._]+@[a-z0-9.\-]{1,10}[a-z]{2,4}$/",$email))
{
$email_error = "<b class='text-warning'>eMail?</b>";
$error =1;
}
else
{
$email = $sanitization->test_input($_POST["email"]);
}
/* Username */
if (empty($_REQUEST["username"]))
{
$username_error = "<b class='text-warning'>Username required</b>";
$error =1;
}
/* valitation username Tested allow (zakir)(zakir333)(zakir_9us2)*/
elseif(!preg_match("/^[a-z0-9_]{6,32}$/",$username))
{
$username_error = "<b class='text-warning'>Username?</b>";
$error =1;
}
else
{
$username = $sanitization->test_input($_POST["username"]);
}
/* password */
if (empty($_REQUEST["password"]))
{
$password_error = "<b class='text-warning'>Password required</b>";
$error =1;
}
/* valitation password  Tested allow (344@dd!%#.,ABad)*/
elseif (!preg_match("/^[A-Za-z0-9\-\.\,\_\[\]\+\=\)\(\*\&\^\%\$\#\@\!]{6,16}$/",$password))
{
$password_error = "<b class='text-warning'>Password?</b>";
$error =1;
}
else
{
$password = $sanitization->test_input($_POST["password"]);
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
$user->registration_admin_once_and_only($username, $password, $email, $hash, $full_name, $code_mobile, $signup_date, $user_ip_address);
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
<div class='well'>
<!-- main-container -->
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<input type='hidden' name='signup_date' value='<?php echo date('r'); ?>'>
<input type='hidden' name='user_ip_address' value='<?php echo $ip_user ?>'>
<label>Your full name <span class='required'><?php echo $full_name_error;  ?></span></label>
<br>
<input class='form-control' type='text' name='full_name' placeholder='Your name' required  autofocus>
<label>Your mobile number with country code <span class='required'><?php echo $code_mobile_error;  ?></span></label>
<br>
<input class='form-control' type='text' name='code_mobile' placeholder='Country code mobile number' required>
<label>eMail <span class='required'><?php echo $email_error;  ?></span></label>
<br>
<input class='form-control' type='text' name='email' placeholder='username@gmail.com' required>
<label>Username <span class='required'><?php echo $username_error;  ?></span></label>
<br>
<input class='form-control' type='text' name='username' placeholder='username' required>
<label>Password <span class='required'><?php echo $password_error;  ?></span></label>
<br>
<input class='form-control' type='password' name='password' placeholder='password' required>
<div class='buttons-set'>
<button type='submit' name='register' title='Signup' class='button submit'> <span> Signup </span> </button>
</div>
</fieldset>
</form>
<!--End main-container --> 
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout.'/a-common-ad-right.php'); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-for-admin.php'); ?>
<?php exit(); ?>