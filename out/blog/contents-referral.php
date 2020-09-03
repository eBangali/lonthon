<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/reffer-friends.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='956' />
<meta property='og:title' content='Refer friend to buy from us' />
<meta property='og:description' content='Refer friend to buy from us' />

<meta name='twitter:card' content='summary_large_image'>
<meta name='twitter:site' content='@eBangali'>
<meta name='twitter:domain' content='ebangali.com'/>
<meta name='twitter:creator' content='@eBangali'>
<meta name='twitter:title' content='Refer friend to buy from us'>
<meta name='twitter:description' content='Refer friend to buy from us'>
<meta name='twitter:image' content='<?php echo themeResource; ?>/images/reffer-friends.jpg'/>
<meta name='twitter:url' content='<?php echo fullUrl; ?>'>

<title>Refer friend to buy from us</title>
<meta name='description' content='Refer friend to buy from us' />
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_online_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Referral URLs'>Referral URLs</h2>
</div>
<?php include_once (ebblog.'/blog.php'); ?>
<?php $obj= new ebapps\blog\blog(); $obj -> contentsPostAll(); 
if($obj->data > 0)
{
foreach($obj->data as $valRef): extract($valRef);
$bayReferral ="<div class='row'>";
$bayReferral .="<div class='col-xs-12 col-md-4'>";
$bayReferral .="<b><a title='".ucfirst($contents_og_image_title)."' href='";
$bayReferral .=outContentsLink."/contents/solve/$contents_id/".$obj->seoUrl($contents_og_image_title)."/";
$bayReferral .="'>";
$bayReferral .=ucfirst($contents_og_image_title);
$bayReferral .="</a></b>";
$bayReferral .="<br>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_small_image_url))) {
$bayReferral .="<a title='".ucfirst($contents_og_image_title)."' href='";
$bayReferral .=outContentsLink."/contents/solve/$contents_id/".$obj->seoUrl($contents_og_image_title)."/";
$bayReferral .="'>";
$bayReferral .="<img class='img-responsive' alt='".ucfirst($contents_og_image_title)."' src='";
$bayReferral .=hypertextWithOrWithoutWww."$contents_og_small_image_url";
$bayReferral .="'>";
$bayReferral .="</a>";
$bayReferral .="<br>";
}
//
$countContentLike = new ebapps\blog\blog();
$countContentLike ->count_total_like($contents_id);
if($countContentLike->data)
{
foreach($countContentLike->data as $valRefLike): extract($valRefLike);
$bayReferral .="<i class='fa fa-heart'></i>  ";
$bayReferral .=$totalPostLikes;
endforeach;
}
$bayReferral .="</div>";
//
$bayReferral .="<div class='col-xs-12 col-md-8'>";
//
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_small_image_url))) {
$bayReferral .="<textarea class='form-control' rows='3'>";
$bayReferral .="<a ";
$bayReferral .="title='$contents_og_image_title' href='";
$bayReferral .=outContentsLink."/contents/solve/$contents_id/".$obj->seoUrl($contents_og_image_title)."/".$_SESSION['ebusername']."/";
$bayReferral .="'>";
$bayReferral .="<img alt='".strtoupper($contents_og_image_title)."' ";
$bayReferral .="src='";
$bayReferral .=hypertextWithOrWithoutWww.$contents_og_small_image_url;
$bayReferral .="'>";
$bayReferral .="$contents_og_image_title";
$bayReferral .="</a>";
$bayReferral .="</textarea>";
}
//
$bayReferral .="<textarea class='form-control' rows='3'>";
$bayReferral .="<a href='";
$bayReferral .=outContentsLink."/contents/solve/$contents_id/".$obj->seoUrl($contents_og_image_title)."/".$_SESSION['ebusername']."/";
$bayReferral .="'>";
$bayReferral .="$contents_og_image_title";
$bayReferral .="</a>";
$bayReferral .="</textarea>";
$bayReferral .="</div>";
$bayReferral .="</div>";
echo $bayReferral;
endforeach;
}
?>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>