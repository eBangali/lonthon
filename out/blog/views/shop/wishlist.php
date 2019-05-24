<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblogin."/session.inc.php"); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess."/access_permission_online_minimum.php"); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Likelist'>Likelist</h2>
</div>
<div class='my-wishlist'>
<div class='table-responsive'>
<table id='wishlist-table' class='clean-table linearize-table data-table'>
<tbody>
<?php $obj= new ebapps\blog\blog(); $obj -> contentsLikeAll();
if($obj->data > 0)
{
foreach($obj->data as $val): extract($val);
$likeList ="<tr>";
$likeList .="<td class='wishlist-cell0 customer-wishlist-item-image'>";
$likeList .="<a title='".ucfirst( $contents_og_image_title )."' href='";
$likeList .=outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/";
$likeList .="' class='product-image'>";
$likeList .="<img width='150' alt='".ucfirst( $contents_og_image_title )."' src='";
$likeList .=hypertextWithOrWithoutWww . "$contents_og_small_image_url";
$likeList .="'></a>";
$likeList .="</td>";
$likeList .="<td class='wishlist-cell1 customer-wishlist-item-info'>";
//
$countComment = new ebapps\blog\blog();
$countComment ->count_total_like($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostLikes <= 1)
{
$likeList .=" ";
$likeList .=$totalPostLikes;
}
else 
{
$likeList .=" ";
$likeList .=$totalPostLikes;
}
endforeach;
$likeList .="</a>";
}
$likeList .=" <i class='fa fa-comments'></i><a href='";
$likeList .=outContentsLink."/contents/solve/$contents_id/".$obj->seoUrl($contents_og_image_title)."/";
$likeList .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_contents($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostComments <= 1)
{
$likeList .=" ";
$likeList .=$totalPostComments;
}
else 
{
$likeList .=" ";
$likeList .=$totalPostComments;
}
$likeList .="</a>";
$likeList .=" <i class='fa fa-clock-o'></i><span class='day'> ".date('d M Y',strtotime($contents_date))."</span>";
endforeach;
} 
//
$likeList .="<br />";
$likeList .="<a title='".ucfirst( $contents_og_image_title )."' href='";
$likeList .=outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/";
$likeList .="'>";
$likeList .=ucfirst( $contents_og_image_title );
$likeList .="</a></h3>";
$likeList .="<div class='description std'>";
$likeList .="<div class='inner'>".ucfirst( $contents_og_image_what_to_do )."</div>";
$likeList .="</div>";
$likeList .="</td>";
$likeList .="</tr>";
echo $likeList;
endforeach;
}
?>
</tbody>
</table>
</div>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>
