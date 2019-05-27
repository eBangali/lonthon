<?php include_once (ebblog.'/blog.php'); ?>
<?php if(isset($_GET['id'])){$contentsid = $_GET['id']; ?>
<?php $obj= new ebapps\blog\blog(); $obj -> content_item_details_seo($contentsid); ?>
<?php if($obj->data >= 1) { foreach($obj->data as $val){ extract($val); ?>
<meta property='og:image:url' content='<?php echo hypertextWithOrWithoutWww.$contents_og_small_image_url; ?>' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='956' />
<meta property='og:title' content='<?php echo ucfirst($contents_og_image_title); ?>' />
<meta property='og:description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>' />

<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:site' content='eBangali'>
<meta name='twitter:creator' content='@eBangali'>
<meta name='twitter:url' content='<?php echo fullUrl; ?>'>
<meta name='twitter:title' content='<?php echo ucfirst($contents_og_image_title); ?>' />
<meta name='twitter:description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>' />
<meta name='twitter:image' content='<?php echo hypertextWithOrWithoutWww.$contents_og_small_image_url; ?>'>

<title><?php echo ucfirst($contents_og_image_title); ?></title>
<meta name='description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>'>
<meta name='keywords' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>, <?php echo ucfirst($obj->visulString($contents_category)); ?>'>
<?php }}}
else { ?>
<?php $obj= new ebapps\blog\blog(); $obj -> content_item_details_seo_last(); ?>
<?php if($obj->data >= 1) { foreach($obj->data as $val){ extract($val); ?>
<meta property='og:image:url' content='<?php echo hypertextWithOrWithoutWww.$contents_og_small_image_url; ?>' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='956' />
<meta property='og:title' content='<?php echo ucfirst($contents_og_image_title); ?>' />
<meta property='og:description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>' />

<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:site' content='eBangali'>
<meta name='twitter:creator' content='@eBangali'>
<meta name='twitter:url' content='<?php echo fullUrl; ?>'>
<meta name='twitter:title' content='<?php echo ucfirst($contents_og_image_title); ?>' />
<meta name='twitter:description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>' />
<meta name='twitter:image' content='<?php echo hypertextWithOrWithoutWww.$contents_og_small_image_url; ?>'>

<title><?php echo ucfirst($contents_og_image_title); ?></title>
<meta name='description' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>: <?php echo ucfirst($contents_og_image_title); ?>'>
<meta name='keywords' content='<?php echo ucfirst($obj->visulString($contents_sub_category)); ?>, <?php echo ucfirst($obj->visulString($contents_category)); ?>'>
<?php }}} ?>