<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h2 title='Add Sub Category'>Add Sub Category</h2>
</div>
<?php include_once (ebblog.'/blog.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$contentCategory_error = '*';
$contentsSub_category_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>

<?php
$user = new ebapps\blog\blog();
if(isset($_REQUEST['submit_contents_sub_category']))
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

/* contents_category */
if (empty($_REQUEST['contentCategory']))
{
$contentCategory_error = "<b class='text-warning'>Category name required</b>";
$error =1;
} 
/* valitation contentCategory  */
elseif (! preg_match('/^([a-zA-Z0-9\/\-]+)$/',$contentCategory))
{
$contentCategory_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contentCategory = $sanitization -> test_input($_POST['contentCategory']);
}
/* contentsSub_category */
if (empty($_REQUEST['contentsSub_category']))
{
$contentsSub_category_error = "<b class='text-warning'>Sub Category required</b>";
$error =1;
} 
/* valitation contentsSub_category  */
elseif (!preg_match('/^([a-zA-Z0-9\/\-]+)$/',$contentsSub_category))
{
$contentsSub_category_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contentsSub_category = $sanitization -> test_input($_POST['contentsSub_category']);
}
/* Submition form */
if($error ==0){
$user = new ebapps\blog\blog();
extract($_REQUEST);
$user->submit_contents_sub_category($contentCategory, $contentsSub_category);
}
//
}
?>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<ul>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
<li>Select Category: <?php echo $contentCategory_error;  ?></li>
<li><select class='form-control' name='contentCategory'><option selected='selected'>Please Select</option><?php $user->select_contents_category(); ?></select></li>
<li>Sub Category: <?php echo $contentsSub_category_error;  ?></li>
<li><input class='form-control' type='text' name='contentsSub_category' placeholder="Men-s-T-shirts will be shown as Men's T-shirts" required autofocus /></li>
<div class='buttons-set'><button type='submit' name='submit_contents_sub_category' title='Submit' class='button submit'> <span> Submit </span> </button></div>
</ul>
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