<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row'>
<div class='col-xs-12 col-md-9'>
<div class='well'>
<h2 title='User Info'>User Info</h2>
</div>
<div class='well'>
<?php 
include_once (eblogin.'/registration_page.php'); 
$obj = new ebapps\login\registration_page();
?>
<?php
$obj->all_user_account_info_read();
$updateAccount ="<div class='table-responsive'>"; 
$updateAccount .="<table class='table'>";
$updateAccount .="<thead>";
$updateAccount .="<tr>";
$updateAccount .="<th>Edit</th>";
$updateAccount .="<th>Username</th>";
$updateAccount .="<th>Position</th>";
$updateAccount .="<th>Power</th>";
$updateAccount .="<th>Type</th>";
$updateAccount .="<th>Name</th>";
$updateAccount .="<th>Mobile</th>";
$updateAccount .="<th>Mobile Verified</th>";
$updateAccount .="<th>eMail</th>";
$updateAccount .="<th>eMail Verified</th>";
$updateAccount .="<th>IP Location</th>";
$updateAccount .="<th>Address Verified</th>";
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
$updateAccount .="<input type='hidden' name='username' value='$username' />";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='EditMemberLevel' title='Edit' class='button submit'>Edit</button>";
$updateAccount .="</div>";
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
$updateAccount .="</td>";
$updateAccount .="<td>$username</td>";
$updateAccount .="<td>".ucfirst($position_names)."</td>";
$updateAccount .="<td>".ucfirst($member_level)."</td>";
$updateAccount .="<td>".ucfirst($account_type)."</td>";
$updateAccount .="<td>".ucfirst($full_name)."</td>";
$updateAccount .="<td>$mobile</td>";
$updateAccount .="<td>";
if($mobileactive == 0)
{
$updateAccount .="<form action='access_all_account_information_mobile_edit.php' method='get'>";
$updateAccount .="<fieldset class='group-select'>";
$updateAccount .="<ul>";
$updateAccount .="<input type='hidden' name='username' value='$username' />";
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
//
$ip = $user_ip;
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//
$updateAccount .="<td>$details->city, $details->region, $details->country</td>";
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
<div class='col-xs-12 col-md-3'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>	
<?php include_once (eblayout.'/a-common-footer.php'); ?>