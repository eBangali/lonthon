<?php include_once (ebblog.'/blog.php'); ?>
<?php if(isset($_GET['id'])){$contentsid = $_GET['id']; ?>
<?php $obj= new ebapps\blog\blog(); $obj -> content_item_details_seo($contentsid); ?>
<?php  if($obj->data >= 1) { foreach($obj->data as $val){ extract($val); ?>
<div class='social-share-vertical'>
  <ul>
<li class='facebook'><a target='_blank' href='<?php echo hypertextWithOrWithoutWww; ?>facebook.com/sharer/sharer.php?u=<?php echo fullUrl; ?>'><i class='fa fa-facebook'></i></a></li>
<li class='google-plus'><a target='_blank' href='<?php echo hypertextWithOrWithoutWww; ?>plus.google.com/share?url=<?php echo fullUrl; ?>'><i class='fa fa-google-plus'></i></a></li>
  </ul>
</div>
<?php }}} ?>
