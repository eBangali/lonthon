<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
</div>
<div class='col-xs-12 col-md-7'>
<?php
$pubDate = date('c',time());
$xml_output  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$xml_output .= "<urlset\n";
$xml_output .= "xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"\n";
$xml_output .= "xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\n";
$xml_output .= "xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9\n";
$xml_output .= "http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";
?>
<?php include_once (ebblog.'/blog.php'); ?>
<?php $obj= new ebapps\blog\blog(); $obj ->contents_mrss(); ?>
<?php if($obj->data){ foreach($obj->data as $val): extract($val); ?> 
<?php
$xml_output .= "<url>\n";
$xml_output .= "\t<loc>".outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/</loc>";
$xml_output .= "\t<lastmod>$pubDate</lastmod>";
$xml_output .= "</url>\n";
?>
<?php endforeach; ?>
<?php } ?>
<?php
$xml_output .= "</urlset>";
$filenamepath =  eb."/sitemap.xml";
chmod($filenamepath, 0755);
$fp = fopen($filenamepath,'w');
$write = fwrite($fp,$xml_output);
echo $xml_output;
?>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>	
<?php include_once (eblayout.'/a-common-footer.php'); ?>