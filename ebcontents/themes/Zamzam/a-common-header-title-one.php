<?php if(!mysqli_connect_errno()){
include_once(eblogin.'/registration_page.php');
$siteTitle = new ebapps\login\registration_page();
$siteTitle -> site_owner_title();
if($siteTitle->data >= 1) { foreach($siteTitle->data as $val){ extract($val); 
if(!empty($business_title_one)){
$ebmeta="<meta property='og:image:url' content='".themeResource."/images/Advertisement.jpg' />";
$ebmeta.="<meta property='og:image:type' content='image/jpeg' />";
$ebmeta.="<meta property='og:image:width' content='1024' />";
$ebmeta.="<meta property='og:image:height' content='717' />";
$ebmeta.="<meta property='og:title' content='$business_title_one' />";
$ebmeta.="<meta property='og:description' content='$business_title_one' />";
$ebmeta.="<meta name='twitter:card' content='summary_large_image'>";
$ebmeta.="<meta name='twitter:site' content='@eBangali'>";
$ebmeta.="<meta name='twitter:domain' content='".domain."'/>";
$ebmeta.="<meta name='twitter:creator' content='@eBangali'>";
$ebmeta.="<meta name='twitter:title' content='$business_title_one'>";
$ebmeta.="<meta name='twitter:description' content='$business_title_one'>";
$ebmeta.="<meta name='twitter:image' content='".themeResource."/images/Advertisement.jpg'/>";
$ebmeta.="<meta name='twitter:url' content='".fullUrl."'>";
$ebmeta.="<title>$business_title_one</title>";
$ebmeta.="<meta name='description' content='$business_title_one' />";
echo $ebmeta;
}
}
}
}
?>