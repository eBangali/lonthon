<?php if (isset($_SESSION['ebusername'])){ ?>
<div class='well'>
<?php include_once (ebformkeys.'/valideForm.php'); 
$formKey = new ebapps\formkeys\valideForm();
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$email_error = '';
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php');
include_once (ebHashKey.'/hashPassword.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
if (isset($_REQUEST['InviteAFriend']))
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
/* eMail */
if (empty($_REQUEST['email']))
{
$email_error = "<b class='text-warning'>Email required.</b>";
$error =1;
}
/* valitation eMail  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (! preg_match('/^[a-z0-9._]+@[a-z0-9.\-]{1,33}[a-z]{2,4}$/',$email))
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
/* Submition form */
if($error ==0)
{
extract($_REQUEST);
include_once(eblogin.'/registration_page.php');
$inviteAFriend = new ebapps\login\registration_page();
$inviteAFriend -> inviteAFriend($email);
}
}
?>
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>eMail: <?php echo $email_error;  ?></span>
<input type='text' name='email' placeholder='Enter email address' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>
<div class='buttons-set'>
<button type='submit' name='InviteAFriend' title='Invite a Friend' class='button submit'> <span> Invite a Friend </span> </button>
</div>
</fieldset>
</form>
</div>
<?php } ?>