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
<h2 title='Edit Power'>Edit Power</h2>
</div> 
<div class="well">
<?php 
include_once (eblogin.'/registration_page.php'); 
?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
if(isset($_REQUEST['EditMemberLevel']))
{
extract($_REQUEST);
$obj = new ebapps\login\registration_page();
$obj->edit_view_user_power($username);
}
?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$member_level_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['UpdateMember']))
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

/* valitation member_level */
if (! preg_match('/^([0-8])$/',$member_level))
{
$member_level_error = "<b class='text-warning'>0 to 8?</b>";
$error =1;
}
else 
{
$member_level = $sanitization -> test_input($_POST['member_level']);
}
/* Submition form */
if($error == 0)
{
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user->submit_user_power($username, $member_level,$position_names);
}
//
}
?>
<?php
$obj = new ebapps\login\registration_page();
$obj->edit_view_user_power($username);
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
$updateBusinessInfo .="<li>Account Type : $account_type </li>"; 
$updateBusinessInfo .="<li>Member Level : $member_level $member_level_error</li>";
$updateBusinessInfo .="<li>
<select class='form-control' name='member_level' placeholder='' required autofocus>
<option value='8'>Merchant (Power 8)</option>
<option value='7'>Premier Member (Power 7)</option>
<option value='6'>Plus Member (Power 6)</option>
<option value='5'>Basic Member (Power 5)</option>
<option value='4'>Intro Member (Power 4)</option>
<option value='3'>Manager (Power 3)</option>
<option value='2'>CMO (Power 2)</option>
<option value='2'>CTO (Power 2)</option>
<option value='2'>Salseman (Power 2)</option>
<option value='2'>OMR (Power 2)</option>
<option value='2'>Team Leader (Power 2)</option>
<option value='2'>Senior Software Engineer (Power 2)</option>
<option value='1'>UI UX Designer (Power 1)</option>
<option value='1'>Graphic Designer (Power 1)</option>
<option value='1'>Online (Power 1)</option>
<option value='0'>Blocked (Power 0)</option>
</select> </li>";
$updateBusinessInfo .="<li>Position : $position_names</li>"; 
$updateBusinessInfo .="<li><select class='form-control' name='position_names' placeholder='' required autofocus>
<option value='Merchant'>Merchant (Power 8)</option>
<option value='Premier Member'>Premier Member (Power 7)</option>
<option value='Plus Member'>Plus Member (Power 6)</option>
<option value='Basic Member'>Basic Member (Power 5)</option>
<option value='Intro Member'>Intro Member (Power 4)</option>
<option value='Manager'>Manager (Power 3)</option>
<option value='CMO'>CMO (Power 2)</option>
<option value='CTO'>CTO (Power 2)</option>
<option value='Salseman'>Salseman (Power 2)</option>
<option value='OMR'>OMR (Power 2)</option>
<option value='Team Leader'>Team Leader (Power 2)</option>
<option value='Senior Software Engineer'>Senior Software Engineer (Power 2)</option>
<option value='UI UX Designer'>UI UX Designer (Power 1)</option>
<option value='Graphic Designer'>Graphic Designer (Power 1)</option>
<option value='Online'>Online (Power 1)</option>
<option value='Blocked'>Blocked (Power 0)</option>
</select> </li>"; 
$updateBusinessInfo .="<div class='buttons-set'>";
$updateBusinessInfo .="<button type='submit' name='UpdateMember' title='Update' class='button submit'>Update</button>";
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