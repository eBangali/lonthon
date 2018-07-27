<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_staff_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Edit Solution'>Edit Solution</h2>
</div>
<?php include_once (ebblog.'/blog.php'); ?> 
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
if(isset($_REQUEST['option_contents_edit']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->edit_select_contents_item($contents_id,$username_contents);
}
?>
<script language='javascript' type='text/javascript'>
/* Select B from A */
$(document).ready(function()
{
$("#contents_category").change(function()
{
var pic_name = $(this).val();
if(pic_name != '')  
{
$.ajax
({
type: "POST",
url: "contents_select_b_from_b.php",
data: "pic_name="+ pic_name,
success: function(option)
{
$("#contents_sub_category").html(option);
}
});
}
else
{
$("#contents_sub_category").html("<option value=''>-- No Sub Category Selected --</option>");
}
return false;
});
});

</script>
<?php
$merchant = new ebapps\blog\blog();
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$contents_category_error = "*";
$contents_sub_category_error = "*";
$contents_og_image_title_error = '*';
$contents_og_image_what_to_do_error = '*';
$contents_og_image_how_to_solve_error = '*';
$contents_github_link_error = '*';
$contents_preview_link_error = '*';
$contents_video_link_error = '*';
$captcha_error = "*";

?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['contents_edit']))
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
/* contents_category */
if (empty($_REQUEST["contents_category"]))
{
$contents_category_error = "<b class='text-warning'>Category required</b>";
$error =1;
} 
/* valitation contents_category  */
elseif (!preg_match("/^([a-zA-Z0-9\/\-]+)$/",$contents_category))
{
$contents_category_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_category = $sanitization -> test_input($_POST["contents_category"]);
}
/* contents_sub_category */
if (empty($_REQUEST["contents_sub_category"]))
{
$contents_sub_category_error = "<b class='text-warning'>Sub category required</b>";
$error =1;
} 
/* valitation contents_sub_category  */
elseif (!preg_match("/^([a-zA-Z0-9\/\-]+)$/",$contents_sub_category))
{
$contents_sub_category_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_sub_category = $sanitization -> test_input($_POST["contents_sub_category"]);
}

/* contents_og_image_title */
if (empty($_REQUEST['contents_og_image_title']))
{
$contents_og_image_title_error = "<b class='text-warning'>Title required</b>";
$error =1;
} 
/* valitation contents_og_image_title  Tested allow (productname-productname-product-name)*/
elseif (!preg_match('/^([A-Za-z0-9\?\.\,\-\ ]+)$/',$contents_og_image_title))
{
$contents_og_image_title_error = "<b class='text-warning'>Single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_og_image_title = $sanitization -> test_input($_POST['contents_og_image_title']);
}
/* contents_og_image_what_to_do */
if (empty($_REQUEST['contents_og_image_what_to_do']))
{
$contents_og_image_what_to_do_error = "<b class='text-warning'>What to do description required</b>";
$error =1;
} 
/* valitation contents_og_image_what_to_do Tested*/
elseif (!preg_match("/^([a-zA-Z0-9\<\,\>\.\?\/\|\'\"\!\@\#\(\)\-\_\=\+\ ]{3,5000})/",$contents_og_image_what_to_do))
{
$contents_og_image_what_to_do_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_og_image_what_to_do = $sanitization -> testArea($_POST['contents_og_image_what_to_do']);
}
/* contents_og_image_how_to_solve */
if (empty($_REQUEST['contents_og_image_how_to_solve']))
{
$contents_og_image_how_to_solve_error = "<b class='text-warning'>How to solve description required</b>";
$error =1;
} 
elseif (!preg_match("/^([a-zA-Z0-9\<\,\>\.\?\/\|\'\"\!\@\#\(\)\-\_\=\+\ ]{3,5000})/",$contents_og_image_how_to_solve))
{
$contents_og_image_how_to_solve_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_og_image_how_to_solve = $sanitization -> testArea($_POST['contents_og_image_how_to_solve']);
}

/* contents_github_link */ 
if (!empty($_REQUEST['contents_github_link']))
{
/* valitation contents_github_link  */
if (!preg_match('/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/',$contents_github_link))
{
$contents_github_link_error = "<b class='text-warning'>Error on download link</b>";
$error =1;
}

else 
{
$contents_github_link = $sanitization -> test_input($_POST['contents_github_link']);
}
}

/* contents_preview_link */ 
if (!empty($_REQUEST['contents_preview_link']))
{
/* valitation contents_preview_link  */
if (!preg_match('/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/',$contents_preview_link))
{
$contents_preview_link_error = "<b class='text-warning'>Error on preview link</b>";
$error =1;
}
else 
{
$contents_preview_link = $sanitization -> test_input($_POST['contents_preview_link']);
}
}

/* contents_video_link */
if (!empty($_REQUEST['contents_video_link']))
{
/* valitation contents_video_link  */
if (!preg_match('/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/',$contents_video_link))
{
$contents_video_link_error = "<b class='text-warning'>Error on video link</b>";
$error =1;
}
else 
{
$contents_video_link = $sanitization -> test_input($_POST['contents_video_link']);
}
}

/* Captcha */
if (empty($_REQUEST['answer']))
{
$captcha_error = "<b class='text-warning'>Captcha required</b>";
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
$sanitization->test_input($_POST['answer']);
}

/* Submition form */
if($error == 0){
extract($_REQUEST);
$merchant->edit_update_contents_item($contents_id,$username_contents,$contents_approved,$contents_category,$contents_sub_category,$contents_og_image_title,$contents_og_image_what_to_do,$contents_og_image_how_to_solve,$contents_github_link,$contents_preview_link,$contents_video_link);
}
//
}
?>
<div class='well'>
<?php
$obj = new ebapps\blog\blog();
$obj->edit_select_contents_item($contents_id,$username_contents);
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updatecontents ="<form method='post' enctype='multipart/form-data'>"; 
$updatecontents .="<fieldset class='group-select'>";
$updatecontents .="<ul>"; 
$updatecontents .="<li><input type='hidden' name='form_key' value='";
$updatecontents .= $formKey->outputKey(); 
$updatecontents .="'>"; 
$updatecontents .="</li>"; 
$updatecontents .="<li>$formKey_error</li>";
$updatecontents .="<li>Title: $contents_og_image_title_error</li>";
$updatecontents .="<li><input class='form-control' type='text' name='contents_og_image_title' value='$contents_og_image_title' placeholder='Single or double quotes, certain special characters are not allowed.' required autofocus /></li>";
$updatecontents .="<li>Select Category: $contents_category_error </li>"; 
$updatecontents .="<li><select class='form-control' id='contents_category' name='contents_category' required><option value='$contents_category'>".$obj->visulString($contents_category)."</option>"; 
$obj = new ebapps\blog\blog();
$obj->edit_select_contents_category();
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$updatecontents .="<option value='$contents_category'>".ucfirst($obj->visulString($contents_category))."</option>"; 
}
}
$updatecontents .="</select></li>"; 
$updatecontents .="<li>Selected Sub Category: $contents_sub_category_error</li>"; 
$updatecontents .="<li><select class='form-control' id='contents_sub_category' name='contents_sub_category' required><option value='$contents_sub_category'>".$obj->visulString($contents_sub_category)."</option></select></li>";
$updatecontents .="<li>What to do? $contents_og_image_what_to_do_error</li>";
$updatecontents .="<textarea class='form-control' name='contents_og_image_what_to_do' required id='WhatToDo'>$contents_og_image_what_to_do</textarea>";
$updatecontents .="<li>How to do?: $contents_og_image_how_to_solve_error</li>";
$updatecontents .="<textarea class='form-control' name='contents_og_image_how_to_solve' required id='HowToDo'>$contents_og_image_how_to_solve</textarea>";
$updatecontents .="<li>Download link whthout https://www: $contents_github_link_error</li>";
$updatecontents .="<li><input class='form-control' type='text' name='contents_github_link' value='$contents_github_link' /></li>";
$updatecontents .="<li>Preview link whthout https://www: $contents_preview_link_error</li>";
$updatecontents .="<li><input class='form-control' type='text' name='contents_preview_link' value='$contents_preview_link' /></li>";
$updatecontents .="<li>Video embed link whthout https://www: $contents_video_link_error</li>";
$updatecontents .="<li><input class='form-control' type='text' name='contents_video_link' value='$contents_video_link'/></li>";
$updatecontents .="<li>Captcha: ";
$updatecontents .= $captcha_error;
$updatecontents .="</li>"; 
$updatecontents .="<li>"; 
include_once(ebfromeb.'/captcha.php');
$cap = new ebapps\captcha\captchaClass();	
$captcha = $cap -> captchaFun();
$updatecontents .="<b class='btn btn-Captcha btn-sm gradient'>$captcha</b>";
$updatecontents .="</li>";
$updatecontents .="<li><input type='text' name='answer' placeholder='Enter captcha' /></li>"; 
$updatecontents .="<li><input type='hidden' name='contents_approved' value='$contents_approved' /></li>";
$updatecontents .="<div class='buttons-set'><button type='submit' name='contents_edit' title='Submit' class='button submit'> <span> Submit </span> </button></div>";
$updatecontents .="</ul>";
$updatecontents .="</fieldset>";
$updatecontents .="</form>";
echo $updatecontents;  
}
}
?>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>