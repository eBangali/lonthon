<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once('breadcrumbs.php'); ?>
<?php include_once (eblayout."/a-common-share-button-for-blog.php"); ?>
<section class='contentIndex'>
<?php include_once('search.php'); ?>
<?php
$objPost = new ebapps\blog\blog(); $objPost -> contents_detail_all_part($contentsid);
if($objPost->data){foreach($objPost->data as $valPost): extract($valPost);
$postTitle ="<h1 class='text-uppercase text-center' title='$contents_og_image_title'>";
$postTitle .=strtoupper($contents_og_image_title);
$postTitle .="</h1>";
echo $postTitle;
endforeach;
}
?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<?php include_once("post-header.php"); ?>
<?php include_once (eblayout."/a-common-ad-body.php"); ?>
<?php include_once("post-details.php"); ?>
</div>
<div class='col-right sidebar col-md-3 col-xs-12'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
<?php include_once('rightWidgetForCategory.php'); ?>
<?php include_once("rightWidgetForPostCategory.php"); ?>
</div>
</div>
</div>
</section>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>