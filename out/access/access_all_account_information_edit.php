<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
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
$userpower_level_names_error = '*';
$userpower_level_power_error = '*';
$userpower_position_error = '*';
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
/* userpower_position */
if (empty($_REQUEST['userpower_position']))
{
$userpower_position_error = "<b class='text-warning'>Position name required.</b>";
$error =1;
}
else
{
$userpower_position = $sanitization->test_input($_POST['userpower_position']);
}
//
if (isset($_REQUEST['userpower_position']))
{
$userpower_position = $_POST['userpower_position'];
$levelNames = new ebapps\login\registration_page();
$levelNames->selectedUserPositionToLevelName($userpower_position);
if($levelNames->data)
{
foreach($levelNames->data as $vallevelNames)
{
extract($vallevelNames);
$userpower_level_names = $userpower_level_names;
}
}
}
//
if (isset($_REQUEST['userpower_position']))
{
$userpower_position = $_POST['userpower_position'];
$levelPower = new ebapps\login\registration_page();
$levelPower->selectedUserPositionToPower($userpower_position);
if($levelPower->data)
{
foreach($levelPower->data as $vallevelPower)
{
extract($vallevelPower);
$userpower_level_power = $userpower_level_power;
}
}
}

/* Submition form */
if($error == 0)
{
$user = new ebapps\login\registration_page();
extract($_REQUEST);
$user->submit_user_power($username, $userpower_level_names, $userpower_level_power, $userpower_position);
}
//
}
?>
<div class="well">
<?php
$obj = new ebapps\login\registration_page();
$obj->edit_view_user_power($username);
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updateAccountInfo ="<form method='post'>"; 
$updateAccountInfo .="<fieldset class='group-select'>";
$updateAccountInfo .="<ul>";
$updateAccountInfo .="<input type='hidden' name='form_key' value='";
$updateAccountInfo .= $formKey->outputKey(); 
$updateAccountInfo .="'>"; 
$updateAccountInfo .="$formKey_error";
$updateAccountInfo .="<li>Username: $username</li>"; 
$updateAccountInfo .="<input type='hidden' name='username' value='$username' />";
$updateAccountInfo .="<li>Power : $member_level $userpower_level_power_error</li>";
$updateAccountInfo .="<li>Position : $position_names $userpower_position_error</li>";
$updateAccountInfo .="<select class='form-control' name='userpower_position'>";
$objCountry = new ebapps\login\registration_page();
$objCountry->select_userpower();
if($objCountry->data)
{
foreach($objCountry->data as $val)
{
extract($val);
$updateAccountInfo .="<option value='$userpower_position'>".ucfirst($userpower_position)." (Power $userpower_level_power) "."</option>";
}
}
$updateAccountInfo .="</select>";
$updateAccountInfo .="<div class='buttons-set'>";
$updateAccountInfo .="<button type='submit' name='UpdateMember' title='Update' class='button submit'>Update</button>";
$updateAccountInfo .="</div>";
$updateAccountInfo .="</ul>";
$updateAccountInfo .="</fieldset>";
$updateAccountInfo .="</form>";
echo $updateAccountInfo;  
}
}
?>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>