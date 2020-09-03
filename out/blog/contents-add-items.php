<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess."/access_permission_online_minimum.php"); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Add Post'>Add Post</h2>
</div>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php include_once (ebblog.'/blog.php'); ?>
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
$("#contents_sub_category").html("<option value=''>Please Select</option>"+option);
}
});
}
else
{
$("#contents_sub_category").html("<option value=''>Please Select</option>");
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
$contents_og_image_title_error = "*";
$contents_og_image_what_to_do_error = "*";
$contents_og_image_how_to_solve_error = "*";
$contents_affiliate_link_error = "*";
$contents_github_link_error = "*";
$contents_preview_link_error = "*";
$contents_video_link_error = "*";

?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['contents_add_items']))
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
if (empty($_REQUEST["contents_og_image_title"]))
{
$contents_og_image_title_error = "<b class='text-warning'>Title required</b>";
$error =1;
} 
/* valitation contents_og_image_title  Tested allow (productname-productname-product-name)*/
elseif (!preg_match("/^([A-Za-z0-9\?\.\,\-\ ]{19,55})$/",$contents_og_image_title))
{
$contents_og_image_title_error = "<b class='text-warning'>Single or double quotes, certain special characters are not allowed. Minimum characters 19 maximum characters 55</b>";
$error =1;
}
/* SEO valitation contents_og_image_title */
elseif (strpos($contents_og_image_title, $merchant->visulString($contents_sub_category)) === false)
{
$keyWord = $merchant->visulString($contents_sub_category);
$contents_og_image_title_error = "<b class='text-warning'>Use mimimum one keyword as '$keyWord' required</b>";
$error =1;
}
else 
{
$contents_og_image_title = $sanitization -> test_input($_POST["contents_og_image_title"]);
}
/* contents_og_image_what_to_do */
if (empty($_REQUEST["contents_og_image_what_to_do"]))
{

} 
/* valitation contents_og_image_what_to_do Tested*/
/* VVI Please Never Allow ~!@#$%^&*(){}[]-+=:;'?/\| */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\?\!\#\-\_\<\>\/\'\"\ ]{3,3000})/",$contents_og_image_what_to_do))
{
$contents_og_image_what_to_do_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
/* SEO valitation contents_og_image_what_to_do */
elseif (strpos($contents_og_image_what_to_do, $merchant->visulString($contents_sub_category)) === false)
{
$keyWord = $merchant->visulString($contents_sub_category);
$contents_og_image_what_to_do_error = "<b class='text-warning'>Use mimimum one keyword as '$keyWord' required</b>";
$error =1;
}
else 
{
$contents_og_image_what_to_do = $sanitization -> testArea($_POST["contents_og_image_what_to_do"]);
}
/* contents_og_image_how_to_solve */
if (empty($_REQUEST["contents_og_image_how_to_solve"]))
{
} 
/* valitation contents_og_image_how_to_solve Tested*/
/* VVI Please Never Allow ~!@#$%^&*(){}[]-+=:;'?/\| */
elseif (!preg_match("/^([a-zA-Z0-9\,\.\?\!\#\-\_\<\>\/\'\"\ ]{3,3000})/",$contents_og_image_how_to_solve))
{
$contents_og_image_how_to_solve_error = "<b class='text-warning'>Certain special characters are not allowed.</b>";
$error =1;
}
/* SEO valitation contents_og_image_how_to_solve */
elseif (strpos($contents_og_image_how_to_solve, $merchant->visulString($contents_sub_category)) === false)
{
$keyWord = $merchant->visulString($contents_sub_category);
$contents_og_image_how_to_solve_error = "<b class='text-warning'>Use mimimum one keyword as '$keyWord' required</b>";
$error =1;
}
else 
{
$contents_og_image_how_to_solve = $sanitization -> testArea($_POST["contents_og_image_how_to_solve"]);
}
	
/* contents_affiliate_link */ 
if (!empty($_REQUEST['contents_affiliate_link']))
{
/* valitation contents_affiliate_link  */
if (!preg_match('/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/',$contents_affiliate_link))
{
$contents_affiliate_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}

else 
{
$contents_affiliate_link = $sanitization -> test_input($_POST['contents_affiliate_link']);
}
}

/* contents_github_link */ 
if (!empty($_REQUEST['contents_github_link']))
{
/* valitation contents_github_link  */
if (!preg_match('/^([a-zA-Z0-9\,\.\/\+\?\-\=\_\-]{3,255})$/',$contents_github_link))
{
$contents_github_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
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
$contents_preview_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
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
$contents_video_link_error = "<b class='text-warning'>Without https:// and some characters</b>";
$error =1;
}
else 
{
$contents_video_link = $sanitization -> test_input($_POST['contents_video_link']);
}
}

/* Submition form */
if($error == 0){
extract($_REQUEST);
$merchant->submit_new_contents_item($contents_category, $contents_sub_category, $contents_og_image_title, $contents_og_image_what_to_do, $contents_og_image_how_to_solve, $contents_affiliate_link, $contents_github_link, $contents_preview_link, $contents_video_link);
}
//
}
?>
<div class="well">
<form method="post" enctype="multipart/form-data">
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
Select Category: <?php echo $contents_category_error;  ?>
<select class='form-control' id='contents_category' name='contents_category' required><option value=''>Please Select</option><?php $merchant->select_contents_category(); ?></select>
Select Sub Category: <?php echo $contents_sub_category_error;  ?>
<select class='form-control' id='contents_sub_category' name='contents_sub_category' required><option value=''>Please Select</option></select>
Title/ Item Name: <?php echo $contents_og_image_title_error;  ?>
<input class='form-control' type="text" name="contents_og_image_title" placeholder="Single or double quotes, certain special characters are not allowed." required autofocus />
What to do? <?php echo $contents_og_image_what_to_do_error;  ?>
<textarea class='form-control' name='contents_og_image_what_to_do' placeholder='Certain special characters are not allowed.' id="WhatToDo"></textarea>
How to do?: <?php echo $contents_og_image_how_to_solve_error;  ?>
<textarea class="form-control" name="contents_og_image_how_to_solve" placeholder="Certain special characters are not allowed." id="HowToDo"></textarea>
Affiliate Link: <?php echo $contents_affiliate_link_error;  ?>
<input class='form-control' placeholder="amazon.com/abc/" type="text" name="contents_affiliate_link" />
Download Link: <?php echo $contents_github_link_error;  ?>
<input class='form-control' placeholder="github.com/abc/" type="text" name="contents_github_link" />
Preview Link: <?php echo $contents_preview_link_error;  ?>
<input class='form-control'  placeholder="domain.com/abc/" type="text" name="contents_preview_link" />
Video Link: <?php echo $contents_video_link_error;  ?>
<input class='form-control'  placeholder="youtube.com/abc/" type="text" name="contents_video_link" />
<div class='buttons-set'><button type='submit' name='contents_add_items' title='Submit' class='button submit'> <span> Submit </span> </button></div>
</fieldset>
</form>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>