<!--#video-->
<?php $obj= new ebapps\blog\blog(); $obj -> contents_video(); ?>
<?php if($obj->data > 0) { ?>
<section id='video' class='video'>
<div class='container'>
<div class='row'>     
<?php if($obj->data >= 1) { ?>
<?php foreach($obj->data as $val): extract($val); ?>
<?php if(!empty($contents_video_link)) { ?>
<div class='col-xs-12 col-sm-3'>
<div class='thumbnail text-center homeCategory'>
<h5 title='<?php echo ucfirst($obj->visulString($contents_category)); ?>'><?php echo ucfirst($obj->visulString($contents_category)); ?></h5>
<div class='bs-example' data-example-id='responsive-embed-16by9-iframe-youtube'>
<div class='embed-responsive embed-responsive-16by9'>
<iframe class='embed-responsive-item' src='<?php if(isset($contents_video_link)){echo hypertextWithOrWithoutWww.$contents_video_link;} ?>' allowfullscreen=''> </iframe>
</div>
</div>          
</div>
</div>
<?php } endforeach; }  ?>
</div>
</div>
</section> 
<?php  }  ?>    
<!--/#video-->