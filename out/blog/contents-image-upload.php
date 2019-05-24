<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
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
<h2 title='Profile Image:'>Profile Image:</h2>
</div> 
<?php include_once (ebblog.'/blog.php'); ?>
<?php include_once (ebimageupload.'/uploadimage-blog.php'); ?>
<?php
if(isset($_REQUEST['submit']))
{
extract($_REQUEST);
$merchant_small = new ebapps\blog\blog();
$up = new ebapps\upload\uploadimage();
$url_raw_small = $up -> upload_file_small('item_picture');
/* Change it later with your cpanel login username and hostname*/
$contents_og_small_image_url = str_replace(docRoot, domainForImagStore, $url_raw_small);
$merchant_small->updates_contents_small_image_url($contents_id,$contents_og_small_image_url);
//
$merchant = new ebapps\blog\blog();
$up = new ebapps\upload\uploadimage();
$url_raw = $up -> upload_file('item_picture');
/* Change it later with your cpanel login username and hostname*/
if($url_raw)
{
$contents_og_image_url = str_replace(docRoot, domainForImagStore, $url_raw);
$merchant->updates_contents_image_url($contents_id,$contents_og_image_url);
}
}
?>

<?php $merchant = new ebapps\blog\blog(); $merchant -> select_image_from_contents(); ?>
<?php  if($merchant->data >= 1) { foreach($merchant->data as $val){ extract($val); ?>
<div class="well">
<form method='post' enctype='multipart/form-data'>
<fieldset class='group-select'>
<ul>
<li>Profile Image: .jpg</li>
<li>NB: Image dimensions must be 1366x956 in pixels</li>
<li><input type='hidden' name='contents_id' value='<?php echo $contents_id; ?>'></li>
<li><input type='file' required autofocus name='item_picture' /></li>
<div class='buttons-set'>
<button type='submit' name='submit' title='Submit' class='button submit'> <span> Submit </span> </button>
</div>
</ul>
</fieldset>
</form>
</div>
<?php } } ?>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>