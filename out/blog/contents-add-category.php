<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
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
<h2 title='Add Category'>Add Category</h2>
</div>
<?php include_once (ebblog.'/blog.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = '';
$contents_category_error = '*';
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if(isset($_REQUEST['contents_category_submit']))
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
if (empty($_REQUEST['contents_category']))
{
$contents_category_error = "<b class='text-warning'>Category name required</b>";
$error =1;
} 
/* valitation contents_category  */
elseif (! preg_match('/^([a-zA-Z0-9\/\-]+)$/',$contents_category))
/*
elseif (! preg_match('/^[\p{L}\p{N}\-]+/u',$contents_category))
*/
{
$contents_category_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else 
{
$contents_category = $sanitization -> test_input($_POST['contents_category']);
}
/* Submition form */
if($error ==0){
$user = new ebapps\blog\blog();
extract($_REQUEST);
$user->submit_contents_category($contents_category);
}
//
}
?>
<div class='well'>
<form method='post'>
<fieldset class='group-select'>
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<?php echo $formKey_error; ?>
Category: <?php echo $contents_category_error;  ?>
<input class='form-control' type='text' name='contents_category' placeholder="Men-s-T-shirts will be shown as Men's T-shirts" required autofocus />
<div class='buttons-set'><button type='submit' name='contents_category_submit' title='Submit' class='button submit'> <span> Submit </span> </button></div>
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