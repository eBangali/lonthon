<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7'>
<div class='well'>
<h2 title='Send eMail'>Send eMail</h2>
</div>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php $formMail = new ebapps\login\registration_page(); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
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
if (isset($_REQUEST['massMailSend']))
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
/* email */
if (empty($_REQUEST["email"]))
{
$email_error = "<b class='text-warning'>Email required.</b>";
$error =1;
}
/* valitation email  */
elseif (! preg_match("/^[a-z0-9._]+@[a-z0-9.\-]{1,33}[a-z]{2,4}$/",$email))
{
$email_error = "<b class='text-warning'>Invalid email format.</b>";
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
$email = $sanitization -> test_input($_POST["email"]);
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
$messagepre_error = "<b class='text-warning'>How to solve description required</b>";
$error =1;
} 

elseif (!preg_match("/^([a-zA-Z0-9\<\,\>\.\?\/\|\'\"\!\@\#\(\)\-\_\=\+\ ]{3,50000})/",$messagepre))
{
$messagepre_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$messagepre = $sanitization -> testArea($_POST["messagepre"]);
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
$formMail->ebSendMail($email,$subjectfor,$messagepre);
}
}
?>
<div class='well'>
<form method='post' enctype="multipart/form-data">
          <fieldset class='group-select'>
                <input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>' />
				<?php echo $formKey_error; ?>
                
                <div class='input-group'>
                <span class='input-group-addon' id='sizing-addon2'>Email To: <?php echo $email_error; ?></span>
                <input type='email' name='email' placeholder='example@domain.com' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
                </div>
                
                
                <div class='input-group'>
                <span class='input-group-addon' id='sizing-addon2'>Subject: <?php echo $subjectfor_error;  ?></span>
                <input type='text' name='subjectfor' placeholder='Subject' class='form-control' aria-describedby='sizing-addon2' required  autofocus>
                </div>
                
                Message: <?php echo $messagepre_error;  ?>			  
			  <textarea class="form-control" name="messagepre" placeholder="Certain special characters are not allowed." id="HowToDo"></textarea>
			  
                <?php echo $captcha_error;  ?>
				<?php
                include_once(ebfromeb.'/captcha.php');
                $cap = new ebapps\captcha\captchaClass();	
                $captcha = $cap -> captchaFun();
                echo "<b class='btn btn-Captcha btn-sm gradient'>$captcha</b>";
                ?>
                <input class='form-control' type='text' name='answer' placeholder='Enter captcha here' required />
                <div class='buttons-set'><button type='submit' name='massMailSend' title='Mass eMail' class='button submit'> <span> SEND </span> </button></div>
          </fieldset>
        </form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>
