<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<?php 
include_once (eblogin.'/registration_page.php'); 
$obj = new ebapps\login\registration_page();
?>
<div class='container'>
  <div class='row row-offcanvas row-offcanvas-right'>
    <div class='col-xs-12 col-md-2'>
    
    </div>
    <div class='col-xs-12 col-md-7 sidebar-offcanvas'>

<?php include_once (ebformkeys.'/valideForm.php'); ?>
      <?php $formKey = new ebapps\formkeys\valideForm(); ?>
      <?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$usernameEmailMobile_error = '*';
?>
      <?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
      <?php
if (isset($_REQUEST['searchUsernameEmailMobile']))
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

/* usernameEmailMobile */
if (empty($_REQUEST['usernameEmailMobile']))
{
$usernameEmailMobile_error = "<b class='text-warning'>Required.</b>";
$error =1;
}
/* valitation usernameEmailMobile  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (! preg_match('/^[a-zA-Z0-9\-\.\@\_]{3,32}$/',$usernameEmailMobile))
{
$usernameEmailMobile_error = "<b class='text-warning'>Search?</b>";
$error =1;
}
else
{
$usernameEmailMobile = $sanitization->test_input($_POST['usernameEmailMobile']);
}
}
?>

<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?> Search by username or email or mobile: <?php echo $usernameEmailMobile_error;  ?>
<input class='form-control' type='text' name='usernameEmailMobile' placeholder='Username or Email Or Mobile' required autofocus />
<button type='submit' name='searchUsernameEmailMobile' title='Search' class='form-control button submit'>Search</button>
</fieldset>
</form>

</div>
    <div class='col-xs-12 col-md-3 sidebar-offcanvas'>
    
    </div>
  </div>
</div>
<?php
if(isset($_REQUEST['usernameEmailMobile']))
{
?>
<div class='container-fluid'>
  <div class='row'>
    <div class='col-xs-12'>
      <?php
$obj->search_all_user_read($_REQUEST['usernameEmailMobile']);
$updateAccount ="<div class='table-responsive'>"; 
$updateAccount .="<table class='table'>";
$updateAccount .="<thead>";
$updateAccount .="<tr>";
$updateAccount .="<th>Edit</th>";
$updateAccount .="<th>Username</th>";
$updateAccount .="<th>Invited By</th>";
$updateAccount .="<th>Level Name</th>";
$updateAccount .="<th>Level Power</th>";
$updateAccount .="<th>Level Type</th>";
$updateAccount .="<th>Full Name</th>";
$updateAccount .="<th>Mobile</th>";
$updateAccount .="<th>Mobile Verified</th>";
$updateAccount .="<th>eMail</th>";
$updateAccount .="<th>eMail Verified</th>";
$updateAccount .="<th>IP Location</th>";
$updateAccount .="<th>Address Verification Code</th>";
$updateAccount .="</tr>";
$updateAccount .="</thead>";
$updateAccount .="<tbody>";
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updateAccount .="<tr>";
$updateAccount .="<td>";
$updateAccount .="<form action='access_all_account_information_edit.php' method='get'>";
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<input type='hidden' name='username' value='$ebusername' />";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='EditMemberLevel' title='Edit' class='button submit'>Edit</button>";
$updateAccount .="</div>";
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
$updateAccount .="</td>";
$updateAccount .="<td>$ebusername</td>";
$updateAccount .="<td>$omrusername</td>";
$updateAccount .="<td>".ucfirst($position_names)."</td>";
$updateAccount .="<td>".ucfirst($member_level)."</td>";
$updateAccount .="<td>".ucfirst($account_type)."</td>";
$updateAccount .="<td>".ucfirst($full_name)."</td>";
$updateAccount .="<td>$mobile</td>";
$updateAccount .="<td>";
if($mobileactive == 0 and is_numeric($mobile))
{
$updateAccount .="<form action='access_all_account_information_mobile_edit.php' method='get'>";
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<input type='hidden' name='username' value='$ebusername' />";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='MobileVerify' title='Verify' class='button submit'>Verify</button>";
$updateAccount .="</div>";
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
}
else
{
$updateAccount .="$mobileactive";
}
$updateAccount .="</td>";
$updateAccount .="<td>$email</td>";
$updateAccount .="<td>$active</td>";
$updateAccount .="<td>$address_verified</td>";
$updateAccount .="<td>$address_verification_codes</td>";
$updateAccount .="</tr>";
}
}
$updateAccount .="</tbody>";
$updateAccount .="</table>";
$updateAccount .="</div>";
echo $updateAccount;

?>
    </div>
  </div>
</div>
<?php
include_once (eblayout.'/a-common-footer.php');
exit();
}
?>
<div class='container-fluid'>
  <div class='row'>
    <div class='col-xs-12'>
      <?php
$obj->all_user_account_info_read();
$updateAccount ="<div class='table-responsive'>"; 
$updateAccount .="<table class='table'>";
$updateAccount .="<thead>";
$updateAccount .="<tr>";
$updateAccount .="<th>Edit</th>";
$updateAccount .="<th>Username</th>";
$updateAccount .="<th>Invited By</th>";
$updateAccount .="<th>Level Name</th>";
$updateAccount .="<th>Level Power</th>";
$updateAccount .="<th>Level Type</th>";
$updateAccount .="<th>Full Name</th>";
$updateAccount .="<th>Mobile</th>";
$updateAccount .="<th>Mobile Verified</th>";
$updateAccount .="<th>eMail</th>";
$updateAccount .="<th>eMail Verified</th>";
$updateAccount .="<th>IP Location</th>";
$updateAccount .="<th>Address Verification Code</th>";
$updateAccount .="</tr>";
$updateAccount .="</thead>";
$updateAccount .="<tbody>";
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updateAccount .="<tr>";
$updateAccount .="<td>";
$updateAccount .="<form action='access_all_account_information_edit.php' method='get'>";
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<input type='hidden' name='username' value='$ebusername' />";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='EditMemberLevel' title='Edit' class='button submit'>Edit</button>";
$updateAccount .="</div>";
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
$updateAccount .="</td>";
$updateAccount .="<td>$ebusername</td>";
$updateAccount .="<td>$omrusername</td>";
$updateAccount .="<td>".ucfirst($position_names)."</td>";
$updateAccount .="<td>".ucfirst($member_level)."</td>";
$updateAccount .="<td>".ucfirst($account_type)."</td>";
$updateAccount .="<td>".ucfirst($full_name)."</td>";
$updateAccount .="<td>$mobile</td>";
$updateAccount .="<td>";
if($mobileactive == 0 and is_numeric($mobile))
{
$updateAccount .="<form action='access_all_account_information_mobile_edit.php' method='get'>";
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<input type='hidden' name='username' value='$ebusername' />";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='MobileVerify' title='Verify' class='button submit'>Verify</button>";
$updateAccount .="</div>";
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
}
else
{
$updateAccount .="$mobileactive";
}
$updateAccount .="</td>";
$updateAccount .="<td>$email</td>";
$updateAccount .="<td>$active</td>";
$updateAccount .="<td>$address_verified</td>";
$updateAccount .="<td>$address_verification_codes</td>";
$updateAccount .="</tr>";
}
}
$updateAccount .="</tbody>";
$updateAccount .="</table>";
$updateAccount .="</div>";
echo $updateAccount;
?>
    </div>
  </div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>
