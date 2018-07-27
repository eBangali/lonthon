<div class="well">
<?php $obj= new ebapps\blog\blog(); $obj -> contents_detail_how_to_do($contentsid); ?>
<?php if($obj->data >= 1) { ?>
<?php foreach($obj->data as $val): extract($val); ?>
<?php if(!empty($contents_og_image_what_to_do)){ ?>
<?php echo ucfirst($contents_og_image_what_to_do); ?>
<?php } endforeach; } ?>
</div>
<div class="well">
<?php $obj= new ebapps\blog\blog(); $obj -> contents_detail_how_to_do($contentsid); ?>
<?php if($obj->data >= 1) { ?>
<?php foreach($obj->data as $val): extract($val); ?>
<?php if(!empty($contents_og_image_how_to_solve)){ ?>
<?php echo ucfirst($contents_og_image_how_to_solve); ?>
<?php } endforeach; } ?>
</div>
<?php include_once("download.php"); ?>
<?php include_once("post-video.php"); ?>
<?php include_once("comments.php"); ?>