<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7'>
<div class="well">
<h2 title='All mRSS'>All mRSS </h2>
</div>
<div class="well">
<?php
$pubDate =date("r");
$xml_output  = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n";
$xml_output .= "<rss version=\"2.0\">\n";
$xml_output .= "<channel>\n";
$xml_output .= "\t<title>".hostingName."</title>\n";
$xml_output .= "\t<link>".outLink."/</link>\n";
$xml_output .= "\t<description>".hostingName."</description>\n";
$xml_output .= "\t<language>en-us</language>\n";
$xml_output .= "\t<pubDate>$pubDate</pubDate>\n";
$xml_output .= "\t<lastBuildDate>$pubDate</lastBuildDate>\n";
$xml_output .= "\t<copyright>Copyright (c) ".date("Y")." ".domain."</copyright>\n";
?>
<?php include_once (ebblog.'/blog.php'); ?>
<?php $obj= new ebapps\blog\blog(); $obj ->contents_mrss(); ?>
<?php if($obj->data){ foreach($obj->data as $val): extract($val); ?> 
<?php
$xml_output .= "<item>\n";
$xml_output .= "\t<title>$contents_og_image_title</title>\n";
$xml_output .= "\t<link>".outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/</link>\n";
$xml_output .= "\t<description><![CDATA[$contents_og_image_title<br /><a href='".outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/'><img src='".hypertextWithOrWithoutWww."$contents_og_image_url' width='300px' alt='$contents_og_image_title' title='$contents_og_image_title'  /></a>]]></description>\n";
$xml_output .= "\t<category>$contents_category</category>\n";
$xml_output .= "\t<pubDate>$contents_date</pubDate>\n";
$xml_output .= "</item>\n";
?>
<?php endforeach; ?>
<?php } ?>
<?php include_once (ebbay.'/ebcart.php'); ?>
<?php $obj= new ebapps\bay\ebcart(); $obj ->mrss_bay(); ?>
<?php if($obj->data >=1){foreach($obj->data as $val): extract($val); ?> 
<?php
$xml_output .= "<item>\n";
$xml_output .= "\t<title>$s_og_image_title</title>\n";
$xml_output .= "\t<link>".outBayLink."/product/item-details/$bay_showroom_approved_items_id/</link>\n";
$xml_output .= "\t<description><![CDATA[$s_og_image_title<br /><a href='".outBayLink."/product/item-details/$bay_showroom_approved_items_id/'><img src='".hypertextWithOrWithoutWww."$s_og_image_url' width='300px' alt='$s_og_image_title' title='$s_og_image_title' /></a>]]></description>\n";
$xml_output .= "\t<category>$s_category_c</category>\n";
$xml_output .= "\t<pubDate>$s_date</pubDate>\n";
$xml_output .= "</item>\n";
?>
<?php endforeach; ?>
<?php } ?>
<?php include_once (ebSoft.'/soft.php'); ?>
<?php $obj= new ebapps\soft\soft(); $obj ->soft_mrss(); ?>
<?php if($obj->data >=1){ foreach($obj->data as $val): extract($val); ?> 
<?php
$xml_output .= "<item>\n";
$xml_output .= "\t<title>$soft_appro_og_image_title</title>\n";
$xml_output .= "\t<link>".outSoftLink."/copy/details/$soft_appro_add_items_id/$soft_appro_category/$soft_appro_subcategory/</link>\n";
$xml_output .= "\t<description><![CDATA[$soft_appro_og_image_title<br /><a href='".outSoftLink."/copy/details/$soft_appro_add_items_id/$soft_appro_category/$soft_appro_subcategory/'><img src='".hypertextWithOrWithoutWww."$soft_appro_og_image_url' width='300px' alt='$soft_appro_og_image_title' title='$soft_appro_og_image_title'  /></a>]]></description>\n";
$xml_output .= "\t<category>$soft_appro_category $soft_appro_subcategory</category>\n";
$xml_output .= "\t<pubDate>$soft_appro_upload_date</pubDate>\n";
$xml_output .= "</item>\n";
?>
<?php endforeach; ?>
<?php } ?>
<?php include_once (ebEvent.'/event.php'); ?>
<?php $obj= new ebapps\event\eBevent(); $obj ->event_mrss(); ?>
<?php if($obj->data){ foreach($obj->data as $val): extract($val); ?> 
<?php
$xml_output .= "<item>\n";
$xml_output .= "\t<title>$event_appro_og_image_title</title>\n";
$xml_output .= "\t<link>".outEventLink."/manager/details/$event_appro_add_items_id/$event_appro_category/$event_appro_subcategory/</link>\n";
$xml_output .= "\t<description><![CDATA[$event_appro_og_image_title<br /><a href='".outEventLink."/manager/details/$event_appro_add_items_id/$event_appro_category/$event_appro_subcategory/'><img src='".hypertext."$event_appro_og_small_image_url' width='300px' alt='$event_appro_og_image_title' title='$event_appro_og_image_title'  /></a>]]></description>\n";
$xml_output .= "\t<category>$event_appro_category</category>\n";
$xml_output .= "\t<pubDate>$event_appro_upload_date</pubDate>\n";
$xml_output .= "</item>\n";
?>
<?php endforeach; ?>
<?php } ?>
<?php
$xml_output .=  "</channel>\n";
$xml_output .=  "</rss>";
$filenamepath =  eb."/mrss.xml";
$fp = fopen($filenamepath,'w');
$write = fwrite($fp,$xml_output);
echo $xml_output;
?> 
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>	
<?php include_once (eblayout.'/a-common-footer.php'); ?>