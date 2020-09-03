<?php include_once(ebformmail.'/formMail.php'); ?>
<?php $formMail = new ebapps\formmail\formMail(); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$full_name_error = "";
$email_error = "";
$subjectfor_error = "";
$messagepre_error = "";
$captcha_error = "";

?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['contact_button']))
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

/* fullname */
if (empty($_REQUEST["fullname"]))
{
$full_name_error = "<b class='text-warning'>Name required.</b>";
$error =1;
} 
/* valitation fullname  */
elseif (! preg_match("/^([A-Za-z.,0-9\'\-\ ]+)$/",$fullname))
{
$full_name_error = "<b class='text-warning'>Only letters, numbers are allowed.</b>";
$error =1;
}
else 
{
$fullname = $sanitization -> test_input($_POST["fullname"]);
}
/* email_address */
if (empty($_REQUEST["email_address"]))
{
$email_error = "<b class='text-warning'>Email required.</b>";
$error =1;
}
/* valitation email_address  */
elseif (! preg_match("/^[a-z0-9._]+@[a-z0-9.\-]{1,10}[a-z]{2,4}$/",$email_address))
{
$email_error = "<b class='text-warning'>Invalid email format.</b>";
$error =1;
}
/* DNS Check  */
elseif ($sanitization->validEmail($email_address) === false)
{
$email_error = "<b class='text-warning'>Invalid eMail ID.</b>";
$error =1;
}
else
{
$email_address = $sanitization -> test_input($_POST["email_address"]);
}
/* subjectfor */
if (empty($_REQUEST["subjectfor"]))
{
$subjectfor_error = "<b class='text-warning'>Subject required.</b>";
$error =1;
}
/* valitation subjectfor*/
elseif(! preg_match("/^([A-Za-z.,0-9\'\-\?\ ]+){4,180}$/",$subjectfor))
{
$subjectfor_error = "<b class='text-warning'>Use A-Za-z0-9., mini 4 max 180.</b>";
$error =1;
}
else
{
$subjectfor = $sanitization ->test_input($_POST["subjectfor"]);
}
/* message */
if (empty($_REQUEST["messagepre"]))
{
$messagepre_error = "<b class='text-warning'>Message required.</b>";
$error =1;
}
/* valitation message  */
elseif (! preg_match("/^([A-Za-z0-9\:\#\-\_\.\,\?\/\ ]+){4,600}$/",$messagepre))
{
$messagepre_error = "<b class='text-warning'>Use A-Za-z0-9.,? mini 4 max 600.</b>";
}
else
{
$messagepre = $sanitization -> test_input($_POST["messagepre"]);
}
/* Captcha */
if (empty($_REQUEST["answer"]))
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
$sanitization->test_input($_POST["answer"]);
}
/* Submition form */
if($error ==0)
{
extract($_REQUEST);
$formMail->ebMail($fullname,$email_address,$subjectfor,$messagepre);
include (ebpages.'/thanks.php');
include_once (eblayout.'/a-common-footer.php');
exit();
}
}
?>
<section id='contact'>
<div class='container'>
    <div class='row'>
      <div class='col-xs-12 col-sm-6'>
      <div class='well'>
        <h2>E-MAIL US</h2>
<form method='post' name='eBformName'>
<fieldset>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>' />
<?php echo $formKey_error; ?>
<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>Full Name <?php echo $full_name_error;  ?></span>
<input type='text' name='fullname' placeholder='Full Name' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>
<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>Your eMail <?php echo $email_error;  ?></span>
<input type='email' name='email_address' placeholder='example@domain.com' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>
<div class='input-group'>
<span class='input-group-addon' id='sizing-addon2'>Subject <?php echo $subjectfor_error;  ?></span>
<input type='text' name='subjectfor' placeholder='Subject' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
</div>
<div class='form-group'>
<label>Your Message <?php echo $messagepre_error;  ?></label>
<textarea class='form-control' name='messagepre' placeholder='Your Message'></textarea>
</div>
<div class='form-group'>
<label>Type Captcha <?php echo $captcha_error;  ?></label>
<?php
include_once(ebfromeb.'/captcha.php');
$cap = new ebapps\captcha\captchaClass();	
$captcha = $cap -> captchaFun();
echo "<b class='btn btn-Captcha btn-sm gradient'>$captcha</b>";
?>
</div>             


<input class='form-control' type='text' name='answer' placeholder='Enter captcha here' required />
<div class='buttons-set'><button type='submit' name='contact_button' title='Submit' class='button submit'> <span> Submit </span> </button></div>
</fieldset>
</form>
</div>
      </div>
      <div class='col-xs-12 col-sm-6'>
        <h2>SITE LOCATION</h2>
        <?php include_once(eblogin.'/registration_page.php');
        $social = new ebapps\login\registration_page();
        $social -> site_location();
        ?>
        <?php if($social->data >= 1) { foreach($social->data as $val){ extract($val); ?>
        <?php if(!empty($business_name)){echo "<p><i class='fa fa-building fa-lg' aria-hidden='true'> $business_name</i></p>"; } ?>
        <?php if(!empty($business_bd_bkash_id)){echo "<p><i class='fa fa-mobile fa-lg' aria-hidden='true'> $business_bd_bkash_id</i></p>"; } ?>
        <?php if(!empty($business_full_address)){echo "<p><i class='fa fa-location-arrow fa-lg'></i> $business_full_address</p>"; } ?>
        <?php }} ?>
        <div>
        <?php include_once (eblayout.'/a-common-google-map.php'); ?>
        </div>
      </div>
    </div>
  </div>
</section>