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
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Settings'>Settings</h2>
</div>
<?php include_once (ebHashKey.'/hashPassword.php'); ?>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$full_name_error = "*";
$mobile_error = "*";
$email_error = "*";
$position_names_error ="*";
$address_line_1_error = "*";
$address_line_2_error = "*";
$city_town_error = "*";
$state_province_region_error = "*";
$postal_code_error = "*";
$country_error = "*";
$facebook_link_error = "*";
$twitter_link_error = "*";
$github_link_error = "*";
$linkedin_link_error = "*";
$pinterest_link_error = "*";
$youtube_link_error = "*";
$instagram_link_error = "*";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['updateregister']))
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
elseif (! preg_match("/^([A-Za-z.,\-\ ]+)$/",$full_name))
{
$full_name_error = "<b class='text-warning'>Full Name?</b>";
$error =1;
}
else 
{
$full_name = $sanitization -> test_input($_POST["full_name"]);
}
/* Mobile */
if (empty($_REQUEST["mobile"]))
{
$mobile_error = "<b class='text-warning'>Mobile number required</b>";
$error =1;
} 
elseif (! preg_match("/^[0-9]{6,18}$/",$mobile))
{
$mobile_error = "<b class='text-warning'>Mobile Number?</b>";
$error =1;
}
else 
{
$mobile = $sanitization -> test_input($_POST["mobile"]);
}
/* eMail */
if (empty($_REQUEST["email"]))
{
$email_error = "<b class='text-warning'>Email required</b>";
$error =1;
}
/* valitation eMail  Tested allow (info@bd.com)(info234_bd@google.com)*/
elseif (! preg_match("/^[a-z0-9._]+@[a-z0-9.\-]{1,16}[a-z]{2,4}$/",$email))
{
$email_error = "<b class='text-warning'>eMail?</b>";
$error =1;
}
/* DNS Check  */
elseif ($sanitization->validEmail($email) === false)
{
$email_error = "<b class='text-warning'>Invalid eMail ID?</b>";
$error =1;
}
else
{
$email = $sanitization->test_input($_POST["email"]);
}
/* position_names */
if (empty($_REQUEST["position_names"]))
{

} 
/* valitation position_names  */
elseif (!preg_match("/^([a-zA-Z0-9\.\-\ ]+)$/",$position_names))
{
$position_names_error = "<b class='text-warning'>Error on position name</b>";
$error =1;
}
else
{
$position_names = $sanitization -> test_input($_POST["position_names"]);
}

/* address_line_1 */
if (empty($_REQUEST["address_line_1"]))
{

} 
/* valitation address_line_1 */
elseif (!preg_match("/^([a-zA-Z0-9\.\,\#\-\ ]+)$/",$address_line_1))
{
$address_line_1_error = "<b class='text-warning'>Error on Address</b>";
$error =1;
}
else
{
$address_line_1 = $sanitization -> test_input($_POST["address_line_1"]);
}

/* address_line_2 */
if (empty($_REQUEST["address_line_2"]))
{

} 
/* valitation address_line_2  */
elseif (!preg_match("/^([a-zA-Z0-9\.\,\#\-\ ]+)$/",$address_line_2))
{
$address_line_2_error = "<b class='text-warning'>Error on Address</b>";
$error =1;
}
else
{
$address_line_2 = $sanitization -> test_input($_POST["address_line_2"]);
}

/* city_town */
if (empty($_REQUEST["city_town"]))
{

} 
/* valitation city_town  */
elseif (!preg_match("/^([a-zA-Z0-9\.\-\ ]+)$/",$city_town))
{
$city_town_error = "<b class='text-warning'>Error on City / Town</b>";
$error =1;
}
else
{
$city_town = $sanitization -> test_input($_POST["city_town"]);
}

/* state_province_region */
if (empty($_REQUEST["state_province_region"]))
{

} 
/* valitation state_province_region  */
elseif (!preg_match("/^([a-zA-Z0-9\.\-\ ]+)$/",$state_province_region))
{
$state_province_region_error = "<b class='text-warning'>Error on State Or Province Or Region</b>";
$error =1;
}
else
{
$state_province_region = $sanitization -> test_input($_POST["state_province_region"]);
}

/* postal_code */
if (empty($_REQUEST["postal_code"]))
{

} 
/* valitation postal_code  */
elseif (!preg_match("/^([a-zA-Z0-9\.\-\ ]+)$/",$postal_code))
{
$postal_code_error = "<b class='text-warning'>Error on Postal Code</b>";
$error =1;
}
else
{
$postal_code = $sanitization -> test_input($_POST["postal_code"]);
}

/* country */
if (empty($_REQUEST["country"]))
{

} 
/* valitation country  */
elseif (!preg_match("/^([a-zA-Z\.\-\)\(\ ]+)$/",$country))
{
$country_error = "<b class='text-warning'>Error on Country</b>";
$error =1;
}
else
{
$country = $sanitization -> test_input($_POST["country"]);
}
/* facebook_link */
if (empty($_REQUEST["facebook_link"]))
{

} 
/* valitation facebook_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$facebook_link))
{
$facebook_link_error = "<b class='text-warning'>Error on FaceBook link</b>";
$error =1;
}

else 
{
$facebook_link = $sanitization -> test_input($_POST["facebook_link"]);
}
/* twitter_link */
if (empty($_REQUEST["twitter_link"]))
{

} 
/* valitation twitter_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$twitter_link))
{
$twitter_link_error = "<b class='text-warning'>Error on Twitter link</b>";
$error =1;
}

else 
{
$twitter_link = $sanitization -> test_input($_POST["twitter_link"]);
}

/* github_link */
if (empty($_REQUEST["github_link"]))
{

} 
/* valitation github_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$github_link))
{
$github_link_error = "<b class='text-warning'>Error on GitHub link</b>";
$error =1;
}

else 
{
$github_link = $sanitization -> test_input($_POST["github_link"]);
}
/* linkedin_link */
if (empty($_REQUEST["linkedin_link"]))
{

} 
/* valitation linkedin_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$linkedin_link))
{
$linkedin_link_error = "<b class='text-warning'>Error on Linked link</b>";
$error =1;
}

else 
{
$linkedin_link = $sanitization -> test_input($_POST["linkedin_link"]);
}
/* pinterest_link */
if (empty($_REQUEST["pinterest_link"]))
{

} 
/* valitation pinterest_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$pinterest_link))
{
$pinterest_link_error = "<b class='text-warning'>Error on Pinterest link</b>";
$error =1;
}
else 
{
$pinterest_link = $sanitization -> test_input($_POST["pinterest_link"]);
}
/* youtube_link */
if (empty($_REQUEST["youtube_link"]))
{

} 
/* valitation youtube_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$youtube_link))
{
$youtube_link_error = "<b class='text-warning'>Error on Youtube link</b>";
$error =1;
}
else 
{
$youtube_link = $sanitization -> test_input($_POST["youtube_link"]);
}

/* instagram_link */
if (empty($_REQUEST["instagram_link"]))
{

} 
/* valitation instagram_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$instagram_link))
{
$instagram_link_error = "<b class='text-warning'>Error on Instagram link</b>";
$error =1;
}
else 
{
$instagram_link = $sanitization -> test_input($_POST["instagram_link"]);
}

/* Submition form */
if($error == 0)
{
extract($_REQUEST);
//
$update = new ebapps\login\registration_page();
$update ->update_account_information($email, $full_name, $mobile, $position_names, $state_province_region, $address_line_1, $address_line_2, $city_town, $postal_code, $country, $facebook_link, $twitter_link, $github_link, $linkedin_link, $pinterest_link, $youtube_link, $instagram_link);
}
}
?>
<div class='well'>
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
$updateAccount .="<li>Username: $username</li>";
$updateAccount .="<li>Position: ".ucfirst($position_names)."</li>";  
$updateAccount .="<li>Member Level: $member_level</li>"; 
$updateAccount .="<li>Account Type: ".ucfirst($account_type)."</li>"; 
$updateAccount .="<li>Full name: $full_name_error <input class='form-control' type='text' name='full_name' value='$full_name' /></li>"; 
$updateAccount .="<li>Mobile number: $mobile_error <input class='form-control' type='text' name='mobile' value='$mobile' />";
if($mobileactive == 0)
{
$updateAccount .= "<b>Mobile Number Not verified. <a href='/out/access/access_verify_mobile_number.php'><button type='button' class='button submit' title='Please Verify.'><span> Please Verify. </span></button></a></b>";
}
if($mobileactive == 1)
{
$updateAccount .= "<b>Verified Mobile Number.</b>";
}
$updateAccount .="</li>";  
$updateAccount .="<li>eMail ID: $email_error <input class='form-control' type='text' name='email' value='$email' />";
if($active == 0)
{
$updateAccount .= "<b>eMail ID Not verified.</b>";
$updateAccount .= "<a href='/out/access/access_verify_re_send.php'><button type='button' class='button submit' title='Send eMail verification'><span> Send eMail verification </span></button></a>";
}
if($active == 1)
{
$updateAccount .= "<b>Verified eMail.</b>";
}
$updateAccount ."</li>"; 
$updateAccount .="<li>Position: $position_names_error <input class='form-control' type='text' name='position_names' value='$position_names' /></li>";
$updateAccount .="<li>";
if($address_verified == 0)
{
$updateAccount .= "<b>This Address is Not verified. <a href='/out/access/access_verify_address.php'><button type='button' class='button submit' title='Send eMail verification'><span> Please Verify. </span></button></a></b>";
}
if($address_verified == 1)
{
$updateAccount .= "<b>Verified Address.</b>";
}
$updateAccount .="</li>";
$updateAccount .="<li>Address 1: $address_line_1_error <input class='form-control' type='text' name='address_line_1' value='$address_line_1' /></li>";
$updateAccount .="<li>Address 2: $address_line_2_error <input class='form-control' type='text' name='address_line_2' value='$address_line_2' /></li>";
$updateAccount .="<li>City Or Town: $city_town_error <input class='form-control' type='text' name='city_town' value='$city_town' /></li>";
$updateAccount .="<li>State Or Province Or Region: $state_province_region_error <input class='form-control' type='text' name='state_province_region' value='$state_province_region' /></li>";
$updateAccount .="<li>Postal Code: $postal_code_error <input class='form-control' type='text' name='postal_code' value='$postal_code' /></li>";
if(!empty($country))
{
$updateAccount .="<li>Country: $country_error <input class='form-control' type='text' name='country' value='$country' /></li>";
}
else
{
$updateAccount .="<li>";
$updateAccount .="Country: $country_error";
$updateAccount .="<select class='form-control' name='country'>";

$objCountry = new ebapps\login\registration_page();
$objCountry->select_user_country();
if($objCountry->data)
{
foreach($objCountry->data as $val)
{
extract($val);
$updateAccount .="<option value='$country_name'>".ucfirst($country_name)."</option>";
}
}
$updateAccount .="</select>";
$updateAccount .="</li>";
}

if($mobileactive ==1 and $active ==1 and $member_level < 4 and $_SESSION['addressverified']==1)
{
$updateAccount .= "<li><a href='/out/access/upgrade-your-membership.php'><b> Upgrade your membership</b></a></li>";
}
$updateAccount .="<li>OMR (Online Marketing Representative): ".$_SESSION['omrusername']."</li>";
$updateAccount .="<li>FaceBook url without http://: $facebook_link_error <input class='form-control' type='text' name='facebook_link' placeholder='facebook.com' value='$facebook_link' /></li>";
$updateAccount .="<li>Twitter url without http://: $twitter_link_error <input class='form-control' type='text' name='twitter_link' placeholder='twitter.com' value='$twitter_link' /></li>";
$updateAccount .="<li>GitHub url without http://: $github_link_error <input class='form-control' type='text' name='github_link' placeholder='github.com' value='$github_link' /></li>";
$updateAccount .="<li>Linkedin url without http://: $linkedin_link_error <input class='form-control' type='text' name='linkedin_link' placeholder='linkedin.com' value='$linkedin_link' /></li>";
$updateAccount .="<li>Pinterest url without http://: $pinterest_link_error <input class='form-control' type='text' name='pinterest_link' placeholder='pinterest.com' value='$pinterest_link' /></li>";
$updateAccount .="<li>Youtube url without http://: $youtube_link_error <input class='form-control' type='text' name='youtube_link' placeholder='youtube.com' value='$youtube_link' /></li>";
$updateAccount .="<li>Instagram url without http://: $instagram_link_error <input class='form-control' type='text' name='instagram_link' placeholder='instagram.com' value='$instagram_link' /></li>";
$updateAccount .="<div class='buttons-set'>";
$updateAccount .="<button type='submit' name='updateregister' title='Update' class='button submit'>Update</button>";
$updateAccount .="</div>"; 
$updateAccount .="<div class='buttons-set'><a href='/out/access/access_change_passsword.php'><button type='button' class='button submit' title='Change Password'><span> Change Password </span></button></a></div>";  
$updateAccount .="</ul>";
$updateAccount .="</fieldset>";
$updateAccount .="</form>";
echo $updateAccount;  
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