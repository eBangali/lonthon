<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once ('searchForIndex.php'); ?>
<?php include_once ('carousel.php'); ?>
<section class='contentIndex'>
<h2 class='text-uppercase text-center'>Blog Posts</h2>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<?php include_once ('indexAllPost.php'); ?>
</div>
<div class='col-right sidebar col-md-3 col-xs-12'>
<?php include_once ('rightWidgetForPost.php'); ?>
</div>
</div>
</div>
</section>