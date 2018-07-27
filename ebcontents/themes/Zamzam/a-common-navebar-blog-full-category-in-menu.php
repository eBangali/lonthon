<?php include_once (ebblog.'/blog.php'); ?>
<?php
$category = new ebapps\blog\blog();
$category ->menu_category_contents();
?>
<?php if($category->data >= 1) { ?>
<?php foreach($category->data as $catval): extract($catval); ?>
<?php if (!empty($contents_category)){ ?>
<?php $cat = $contents_category; ?>
<li class='dropdown'> <a href='<?php echo outContentsLink; ?>/contents/' class='dropdown-toggle' data-toggle='dropdown'> <?php echo ucfirst($category->visulString($contents_category)); ?> <b class='caret'></b></a>
<ul class='dropdown-menu'>
<?php
$subcategory = new ebapps\blog\blog();
$subcategory ->menu_sub_category_contents($cat);
?>
<?php if($subcategory->data >= 1) { ?>
<?php foreach($subcategory->data as $subval): extract($subval); ?>
<?php if (!empty($contents_category) and !empty($contents_sub_category)){ ?>
<li><a href='<?php echo outContentsLink; ?>/contents/category/<?php echo $contents_id; ?>/' title='<?php echo ucfirst($contents_sub_category); ?>'><?php echo ucfirst($subcategory->visulString($contents_sub_category)); ?></a></li>
<?php } ?>
<?php endforeach; } ?>
</ul>
</li>
<?php } ?>
<?php endforeach; } ?>