<div class='breadcrumbs'>
<div class='container'>
<div class='row'>
<div class='col-xs-12'>
<ul>
<li class='home'><a href='<?php echo outContentsLink; ?>/contents/' title='HOME'>HOME</a><span>/ </span></li>
<?php if(isset($_GET['id'])){$contentsid = $_GET['id']; ?>
<?php $obj= new ebapps\blog\blog(); $obj -> itemDetailsContents($contentsid); ?>
<?php  if($obj->data) { foreach($obj->data as $val){ extract($val); ?>
<li><a href='<?php echo outContentsLink; ?>/contents/category/<?php echo $contents_id; ?>/'><strong><?php echo strtoupper($obj->visulString($contents_category)); ?></strong></a><span>/ </span></li>
<li><a href='<?php echo outContentsLink; ?>/contents/subcategory/<?php echo $contents_id; ?>/'><strong><?php echo strtoupper($obj->visulString($contents_sub_category)); ?></strong></a></li>
<?php }}} ?>
</ul>
</div>
</div>
</div>
</div>