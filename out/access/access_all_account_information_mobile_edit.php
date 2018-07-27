<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>	
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'> 
<div class="well">
<h2 title='Mobile verify'>Mobile verify</h2>
</div>
<div class="well">
<?php 
include_once (eblogin.'/registration_page.php'); 
?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
if(isset($_REQUEST['MobileVerify']))
{
extract($_REQUEST);
$obj = new ebapps\login\registration_page();
$obj->edit_view_user_mobile_to_verify($username);
}
?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['UpdateMemberMobile']))
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

/* Submition form */
if($error == 0)
{
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user->submit_user_mobile_to_verify($username);
}
//
}
?>
<?php
$obj = new ebapps\login\registration_page();
$obj->edit_view_user_mobile_to_verify($username);
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updateBusinessInfo ="<form method='post'>"; 
$updateBusinessInfo .="<fieldset class='group-select'>";
$updateBusinessInfo .="<ul>"; 
$updateBusinessInfo .="<input type='hidden' name='form_key' value='";
$updateBusinessInfo .= $formKey->outputKey(); 
$updateBusinessInfo .="'>"; 
$updateBusinessInfo .="$formKey_error";
$updateBusinessInfo .="<li>Username: $username</li>"; 
$updateBusinessInfo .="<input type='hidden' name='username' value='$username' />";
$updateBusinessInfo .="<li>Mobile Number : $mobile</li>";
$updateBusinessInfo .="<li>Mobile verified : $mobileactive</li>";
$updateBusinessInfo .="<div class='buttons-set'>";
$updateBusinessInfo .="<button type='submit' name='UpdateMemberMobile' title='Update' class='button submit'>Update</button>";
$updateBusinessInfo .="</div>";
$updateBusinessInfo .="</ul>";
$updateBusinessInfo .="</fieldset>";
$updateBusinessInfo .="</form>";
echo $updateBusinessInfo;  
}
}
?>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>