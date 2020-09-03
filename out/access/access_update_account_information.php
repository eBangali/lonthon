<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess."/access_permission_online_minimum.php"); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Account Settings'>Account Settings</h2>
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
$gender_error = "*";
$mobile_error = "*";
$email_error = "*";
$position_names_error ="*";
$address_line_1_error = "*";
$address_line_2_error = "*";
$city_town_error = "*";
$state_province_region_error = "*";
$postal_code_error = "*";
$country_error = "*";
$paypalid_error = "*";
$bkashid_error = "*";
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
/* Gender */
if (empty($_REQUEST["gender"]))
{
$gender_error = "<b class='text-warning'>Gender required</b>";
$error =1;
} 
elseif (! preg_match("/^([A-Za-z]+)$/",$gender))
{
$gender_error = "<b class='text-warning'>Gender?</b>";
$error =1;
}
else 
{
$gender = $sanitization -> test_input($_POST["gender"]);
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
$country_error = "<b class='text-warning'>Please Select Country</b>";
} 
/* valitation country  */
elseif (!preg_match("/^([a-zA-Z\.\-\)\(\ ]+)$/",$country))
{
$country_error = "<b class='text-warning'>Error on Country</b>";
}
else
{
$country = $sanitization -> test_input($_POST["country"]);
}

/* paypalid */
if (empty($_REQUEST["paypalid"]))
{
$paypalid_error = "<b class='text-warning'>PayPal ID</b>";
} 
/* valitation paypalid  */
elseif (!preg_match("/^[a-z0-9._]+@[a-z0-9.\-]{1,16}[a-z]{2,4}$/",$paypalid))
{
$paypalid_error = "<b class='text-warning'>Error on PayPal ID</b>";
$error =1;
}
else 
{
$paypalid = $sanitization -> test_input($_POST["paypalid"]);
}

/* bkashid */
if (empty($_REQUEST["bkashid"]))
{
$bkashid_error = "<b class='text-warning'>bKash ID</b>";
} 
/* valitation bkashid  */
elseif (!preg_match("/^[0-9]{11,11}$/",$bkashid))
{
$bkashid_error = "<b class='text-warning'>Error on bKash ID</b>";
$error =1;
}
else 
{
$bkashid = $sanitization -> test_input($_POST["bkashid"]);
}

/* facebook_link */
if (empty($_REQUEST["facebook_link"]))
{
$facebook_link_error = "<b class='text-warning'>Facebook Link</b>";
} 
/* valitation facebook_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$facebook_link))
{
$facebook_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}

else 
{
$facebook_link = $sanitization -> test_input($_POST["facebook_link"]);
}
/* twitter_link */
if (empty($_REQUEST["twitter_link"]))
{
$twitter_link_error = "<b class='text-warning'>Twitter Link</b>";
} 
/* valitation twitter_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$twitter_link))
{
$twitter_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}

else 
{
$twitter_link = $sanitization -> test_input($_POST["twitter_link"]);
}

/* github_link */
if (empty($_REQUEST["github_link"]))
{
$github_link_error = "<b class='text-warning'>Github Link</b>";
} 
/* valitation github_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$github_link))
{
$github_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}

else 
{
$github_link = $sanitization -> test_input($_POST["github_link"]);
}
/* linkedin_link */
if (empty($_REQUEST["linkedin_link"]))
{
$linkedin_link_error = "<b class='text-warning'>Linkedin Link</b>";
} 
/* valitation linkedin_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$linkedin_link))
{
$linkedin_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}

else 
{
$linkedin_link = $sanitization -> test_input($_POST["linkedin_link"]);
}
/* pinterest_link */
if (empty($_REQUEST["pinterest_link"]))
{
$pinterest_link_error = "<b class='text-warning'>Pinterest Link</b>";
} 
/* valitation pinterest_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$pinterest_link))
{
$pinterest_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}
else 
{
$pinterest_link = $sanitization -> test_input($_POST["pinterest_link"]);
}
/* youtube_link */
if (empty($_REQUEST["youtube_link"]))
{
$youtube_link_error = "<b class='text-warning'>Youtube Link</b>";
} 
/* valitation youtube_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$youtube_link))
{
$youtube_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}
else 
{
$youtube_link = $sanitization -> test_input($_POST["youtube_link"]);
}

/* instagram_link */
if (empty($_REQUEST["instagram_link"]))
{
$instagram_link_error = "<b class='text-warning'>Instagram Link</b>";
} 
/* valitation instagram_link  */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/",$instagram_link))
{
$instagram_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
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
$update ->update_account_information($email, $full_name, $gender, $mobile, $position_names, $address_line_1, $address_line_2, $city_town, $state_province_region, $postal_code, $country, $paypalid, $bkashid, $facebook_link, $twitter_link, $github_link, $linkedin_link, $pinterest_link, $youtube_link, $instagram_link);
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
$editAcc ="<form method='post'>"; 
$editAcc .="<fieldset class='group-select'>";
$editAcc .="<input type='hidden' name='form_key' value='";
$editAcc .= $formKey->outputKey(); 
$editAcc .="'>"; 
 
$editAcc .="$formKey_error";
//
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Username: </span><span class='form-control' aria-describedby='sizing-addon2'>$ebusername</span></div>";
//
if(!empty($position_names)){
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Level: </span><span class='form-control' aria-describedby='sizing-addon2'>".ucfirst($position_names)."</span></div>";
}
//
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Power: </span><span class='form-control' aria-describedby='sizing-addon2'>$member_level</span></div>";
//
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Type: </span><span class='form-control' aria-describedby='sizing-addon2'>".ucfirst($account_type)."</span></div>";
//
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Full Name: $full_name_error</span><input type='text' name='full_name' value='$full_name' placeholder='Full name' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>";
//
$editAcc .="<div class='input-group'>";
$editAcc .="<span class='input-group-addon' id='sizing-addon2'>Gender: $gender_error</span>";
$editAcc .="<select class='form-control' name='gender'>";
if(isset($gender))
{
$editAcc .="<option selected value='$gender'>".ucfirst($gender)."</option>";
}
$editAcc .="<option>Please Select</option>";
$editAcc .="<option value='Male'>Male</option>";
$editAcc .="<option value='Female'>Female</option>";
$editAcc .="</select>";
$editAcc .="</div>";
//
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>eMail ID: $email_error</span><input type='email' name='email' value='$email' placeholder='eMail' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>";

if($active == 0)
{
$editAcc .= "<b>eMail Not Verified</b>";
$editAcc .= "<a href='/out/access/access_verify_re_send.php'><button type='button' class='button submit' title='Send eMail Verification'><span> Send eMail Verification </span></button></a>";
}
if($active == 1)
{
$editAcc .= "<b>Verified eMail</b>";
}

if($active ==1 and $mobileactive == 1 and !empty($full_name) and $member_level <=3)
{
$editAcc .= "<a href='/out/access/upgrade-your-access-levels-for-pos.php'><button type='button' class='button submit' title='Request for Free POS'><span>Request for Free POS</span></button></a>";
}
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Mobile Number: $mobile_error</span><input type='text' name='mobile' value='$mobile' placeholder='Mobile No' class='form-control' aria-describedby='sizing-addon2' required  autofocus></div>";
if($mobileactive == 0)
{
$editAcc .= "<b>Mobile Number Not Verified <a href='/out/access/access_verify_mobile_number.php'><button type='button' class='button submit' title='Please Verify Mobile.'><span> Please Verify Mobile </span></button></a></b>";
}
if($mobileactive == 1)
{
$editAcc .= "<b>Verified Mobile Number</b>";
}
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Level: $position_names_error</span><input type='text' name='position_names' value='$position_names' class='form-control' aria-describedby='sizing-addon2'></div>";

if($address_verified == 0)
{
$editAcc .= "<b>This Address is Not Verified <a href='/out/access/access_verify_address.php'><button type='button' class='button submit' title='Send Address Verification'><span> Please Verify Address</span></button></a></b>";
}
if($address_verified == 1)
{
$editAcc .= "<b>Verified Address</b>";
}

$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Address 1: $address_line_1_error</span><input type='text' name='address_line_1' value='$address_line_1' placeholder='Address' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Address 2: $address_line_2_error</span><input type='text' name='address_line_2' value='$address_line_2' placeholder='Address' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>City Or Town: $city_town_error</span><input type='text' name='city_town' value='$city_town' placeholder='City/Town' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>State Or Province Or Region: $state_province_region_error</span><input type='text' name='state_province_region' value='$state_province_region' placeholder='State/Province/Region' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Postal Code: $postal_code_error</span><input type='text' name='postal_code' value='$postal_code' placeholder='Postal code' class='form-control' aria-describedby='sizing-addon2'></div>";
//
$editAcc .="<div class='input-group'>";
$editAcc .="<span class='input-group-addon' id='sizing-addon2'>Country: $country_error</span>";
$editAcc .="<select class='form-control' name='country'>";
if(isset($country))
{
$editAcc .="<option selected value='$country'>".ucfirst($country)."</option>";
}
$objCountry = new ebapps\login\registration_page();
$objCountry->select_user_country();
if($objCountry->data)
{
foreach($objCountry->data as $val)
{
extract($val);
$editAcc .="<option value='$country_name'>".ucfirst($country_name)."</option>";
}
}
$editAcc .="</select>";
$editAcc .="</div>";
//
$editAcc .="OMR: $omrusername ";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>PayPal ID : $paypalid_error</span><input type='email' name='paypalid' value='$paypalid' placeholder='PayPal ID' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>bKash ID : $bkashid_error</span><input type='text' name='bkashid' value='$bkashid' placeholder='bKash ID' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>FaceBook URL: $facebook_link_error</span><input type='text' name='facebook_link' value='$facebook_link' placeholder='facebook.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Twitter URL: $twitter_link_error</span><input type='text' name='twitter_link' value='$twitter_link' placeholder='twitter.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>GitHub URL: $github_link_error</span><input type='text' name='github_link' value='$github_link' placeholder='github.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Linkedin URL: $linkedin_link_error</span><input type='text' name='linkedin_link' value='$linkedin_link' placeholder='linkedin.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Pinterest URL: $pinterest_link_error</span><input type='text' name='pinterest_link' value='$pinterest_link' placeholder='pinterest.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Youtube URL: $youtube_link_error</span><input type='text' name='youtube_link' value='$youtube_link' placeholder='youtube.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='input-group'><span class='input-group-addon' id='sizing-addon2'>Instagram URL: $instagram_link_error</span><input type='text' name='instagram_link' value='$instagram_link' placeholder='instagram.com/username/' class='form-control' aria-describedby='sizing-addon2'></div>";
$editAcc .="<div class='buttons-set'>";
$editAcc .="<button type='submit' name='updateregister' title='Update' class='button submit'>Update</button>";
$editAcc .="</div>"; 
$editAcc .="<div class='buttons-set'><a href='/out/access/access_change_passsword.php'><button type='button' class='button submit' title='Change Password'><span> Change Password </span></button></a></div>";  
$editAcc .="</fieldset>";
$editAcc .="</form>";
echo $editAcc;  
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