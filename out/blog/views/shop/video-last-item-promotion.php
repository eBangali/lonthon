<?php $obj= new ebapps\blog\blog(); $obj -> contents_implementation_video_last_for_promotion(); ?>
<?php if($obj->data > 0) { ?>
<?php foreach($obj->data as $val): extract($val); ?>    
<?php if(!empty($contents_video_link)) { ?>
<div class='thumbnail'>
<div class='bs-example' data-example-id='responsive-embed-16by9-iframe-youtube'>
<div class='embed-responsive embed-responsive-16by9'>
<iframe class='embed-responsive-item' src='<?php echo hypertextWithOrWithoutWww.$contents_video_link; ?>' allowfullscreen=''> </iframe>
</div>
</div>
</div>
<?php } endforeach; }  ?>