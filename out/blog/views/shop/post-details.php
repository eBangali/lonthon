<?php $obj= new ebapps\blog\blog(); $obj -> contents_detail_how_to_do($contentsid); ?>
<?php if($obj->data >= 1) { ?>
<?php foreach($obj->data as $val): extract($val); ?>
<?php if(!empty($contents_og_image_what_to_do)){ ?>
<?php 
$whatToDo ="<div class='well'>";
$whatToDo .=ucfirst($contents_og_image_what_to_do);
$whatToDo .="</div>";
echo $whatToDo;  
?>
<?php } endforeach; } ?>
<?php $obj= new ebapps\blog\blog(); $obj -> contents_detail_how_to_do($contentsid); ?>
<?php if($obj->data >= 1) { ?>
<?php foreach($obj->data as $val): extract($val); ?>
<?php if(!empty($contents_og_image_how_to_solve)){ ?>
<?php 
$howToDo ="<div class='well'>";
$howToDo .=ucfirst($contents_og_image_how_to_solve);
$howToDo .="</div>";
echo $howToDo;  
?>
<?php } endforeach; } ?>
<?php include_once("download.php"); ?>
<?php include_once("post-video.php"); ?>
<?php include_once("comments.php"); ?>