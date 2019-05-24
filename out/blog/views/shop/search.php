<?php
$searchobj= new ebapps\blog\blog();
$searchobj -> search_in_contents();
if($searchobj->data)
{
$newSearch ="<div class='content-page'>";
$newSearch .="<div class='container'>"; 
$newSearch .="<div class='category-product'>";
$newSearch .="<div class='navbar nav-menu'>";
$newSearch .="<div class='navbar-collapse'>";
$newSearch .="<ul class='nav navbar-nav'>";
$newSearch .="<li>";
$newSearch .="<div class='new_title'>";
$newSearch .="<h2>Search Result</h2>";
$newSearch .="</div>";
$newSearch .="</li>";
$newSearch .="</ul>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="<div class='product-bestseller'>";
$newSearch .="<div class='product-bestseller-content'>";
$newSearch .="<div class='product-bestseller-list'>";
$newSearch .="<div class='tab-container'>";
$newSearch .="<div class='tab-panel active'>";
$newSearch .="<div class='category-products'>";
$newSearch .="<ul class='products-grid'>";
foreach($searchobj->data as $vaLsearchobj): extract($vaLsearchobj);
$newSearch .="<li class='item col-lg-3 col-md-3 col-sm-4 col-xs-6'>";
$newSearch .="<div class='item-inner'>";
$newSearch .="<div class='item-title'><h2>".ucfirst($contents_og_image_title)."</h2></div>";
$newSearch .="<div class='item-title'><h3>".strtoupper($searchobj->visulString($contents_category))."</h3></div>";
$newSearch .="<div class='item-img'>";
$newSearch .="<div class='item-img-info'><a class='product-image' title='$contents_og_image_title' href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="'><img alt='$contents_og_image_title' src='";
$newSearch .=hypertextWithOrWithoutWww.$contents_og_small_image_url;
$newSearch .="'></a>";
$newSearch .="<div class='box-hover'>";
$newSearch .="<ul class='add-to-links'>";
$newSearch .="<li><a class='link-quickview' href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="'>Quick View</a></li>";
$newSearch .="<li><a class='link-compare' href='";
$newSearch .=outContentsLink."/contents/category/$contents_id/";
$newSearch .="'>Compare</a></li>";
$newSearch .="</ul>";
$newSearch .="</div>";
/*############*/
$newSearch .="<p class='post-meta'>";									
$countLikeNow = new ebapps\blog\blog();
$countLikeNow ->count_like_now($contents_id);
if($countLikeNow->data)
{
foreach($countLikeNow->data as $valcountLikeNow): extract($valcountLikeNow);	
if(isset($_SESSION['username']) and $likeNow == 0)
{
/*Logined True with hober effect */
/*Like Now*/
if(isset($_REQUEST['add_for_like']))
{
extract($_REQUEST);
$countLike = new ebapps\blog\blog();
$countLike ->add_for_like($contents_id_for_like);
}
$newSearch .="<form method='post' class='toLike'><input type='hidden' name='contents_id_for_like' value='$contents_id' /><button type='submit' name='add_for_like'><i class='fa fa-heart'></i></button></form>";
}
else 
{
/*Logined False with hober effect */
/* Login to like */
$newSearch .="<i class='fa fa-heart'></i>";	
}
endforeach;
}   			   
$newSearch .="<a href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";			   
$newSearch .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_like($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostLikes <= 1)
{
$newSearch .=" ";
$newSearch .=$totalPostLikes;
}
else 
{
$newSearch .=" ";
$newSearch .=$totalPostLikes;	
}
endforeach;
}
$newSearch .="</a>";
/**/
$newSearch .=" <i class='fa fa-comments'></i><a href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_contents($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostComments <= 1)
{
$newSearch .=" ";
$newSearch .=$totalPostComments;
}
else 
{
$newSearch .=" ";
$newSearch .=$totalPostComments;
}
$newSearch .="</a>";
$newSearch .=" <i class='fa fa-clock-o'></i><span class='day'> ".date('d M Y',strtotime($contents_date))."</span>";
endforeach;
}
$newSearch .="</p>";
/*############*/
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="<div class='item-info'>";
$newSearch .="<div class='info-inner'>";
$newSearch .="<div class='item-content'>";

$newSearch .="<div class='action'>";
$newSearch .="<a href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="'><button class='button btn-cart' type='button' title='Read More' data-original-title='$contents_og_image_title'><span>Read More</span></button></a>";
$newSearch .="</div>";

$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</li>";
endforeach;

$newSearch .="</ul>";
$newSearch .="</div>";
$newSearch .="</div>";

$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="</div>";
echo $newSearch;
}
?>