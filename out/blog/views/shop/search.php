<?php
$searchobj= new ebapps\blog\blog();
$searchobj -> search_in_contents();
if($searchobj->data)
{
$newSearch ="<div class='content-page'>";
$newSearch .="<div class='container'>"; 
$newSearch .="<div class='category-product'>";

$newSearch ="<div class='navbar nav-menu'>";
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

$newSearch ="<div class='product-bestseller'>";
$newSearch .="<div class='product-bestseller-content'>";
$newSearch .="<div class='product-bestseller-list'>";
$newSearch .="<div class='tab-container'>";

$newSearch .="<div class='tab-panel active'>";
$newSearch .="<div class='category-products'>";
$newSearch .="<ul class='products-grid'>";
foreach($searchobj->data as $vaLsearchobj): extract($vaLsearchobj);
$newSearch .="<li class='item col-sm-6 col-xs-12'>";
$newSearch .="<div class='item-inner'>";
$newSearch .="<div class='item-title'><h2>".strtoupper($contents_og_image_title)."</h2></div>";
$newSearch .="<div class='item-title'><h3>".strtoupper($searchobj->visulString($contents_category))."</h3></div>";
$newSearch .="<div class='item-img'>";
$newSearch .="<div class='item-img-info'><a class='product-image' title='$contents_og_image_title' href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="'><img alt='$contents_og_image_title' src='";
$newSearch .=hypertextWithOrWithoutWww.$contents_og_image_url;
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
$newSearch .="</div>";
$newSearch .="</div>";
$newSearch .="<div class='item-info'>";
$newSearch .="<div class='info-inner'>";
$newSearch .="<div class='item-content'>";

$newSearch .="<div class='action'>";
$newSearch .="<a href='";
$newSearch .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$newSearch .="' class='eb-shop-back'><span>Read More</span></a>";
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