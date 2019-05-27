<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess."/access_permission_online_minimum.php"); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>

<div class='well'>
<h2 title='Upgrade your membership'>Upgrade your membership</h2>
</div>
<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$aggreeTerms_error ="";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['updatetomerchant']))
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
/* aggreeTerms */
if (empty($_REQUEST["aggreeTerms"]))
{
$aggreeTerms_error = "<b class='text-warning'>Agreement required</b>";
$error =1;
} 
/* Submition form */
if($error ==0)
{
extract($_REQUEST);
$user = new ebapps\login\registration_page();
$user->update_account_to_merchant($username);
}}
?>
<?php
$obj = new ebapps\login\registration_page();
$obj->update_account_info_read();
if($obj->data)
{
foreach($obj->data as $val)
{
extract($val);
$updateAccount ="<form method='post'>"; 
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<li><input type='hidden' name='form_key' value='";
$updateAccount .= $formKey->outputKey(); 
$updateAccount .="'>"; 
$updateAccount .="</li>"; 
$updateAccount .="<li>$formKey_error</li>";
$updateAccount .="<li>Username: $username <input type='hidden' name='username' value='$username' /></li>";
$updateAccount .="<li>Account Type: $account_type</li>"; 
$updateAccount .="<li>Member Level: $member_level</li>";  
$updateAccount .="<li>$aggreeTerms_error <input type='checkbox' name='aggreeTerms' /> <b>By sign up you agree our <a href='".outPagesLink."/terms-conditions.php'>terms and conditions.</a></b></li>";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='updatetomerchant' title='Update' class='button submit'> <span> Update </span> </button>"; 
$updateAccount .="</div>"; 
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
echo $updateAccount;  
}
}
?>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>
