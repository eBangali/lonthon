<?php
$postArticle ="<div class='site-content' id='primary'>";
$postArticle .="<div role='main' id='content'>";
$objPost = new ebapps\blog\blog(); $objPost -> contentsPostAll();
if($objPost->data){foreach($objPost->data as $valPost): extract($valPost);
$postArticle .="<article class='blog_entry clearfix wow bounceInUp animated' id='post-$contents_id'>";
$postArticle .="<header class='blog_entry-header clearfix'>";
$postArticle .="<div class='blog_entry-header-inner'>";
$postArticle .="<h2 class='blog_entry-title'><a href='";
$postArticle .=outContentsLink."/contents/details/$contents_id/$contents_category/$contents_sub_category/";
$postArticle .="'>".strtoupper($contents_og_image_title)."</a></h2>";
$postArticle .="</div>";
$postArticle .="</header>";
$postArticle .="<div class='entry-content'>";
$postArticle .="<div class='featured-thumb'><a href='";
$postArticle .=outContentsLink."/contents/solve/$contents_id/".$objPost->seoUrl($contents_og_image_title)."/";
$postArticle .="'><img class='img-responsive' alt='".ucfirst($contents_og_image_title)."' src='";
$postArticle .=hypertextWithOrWithoutWww."$contents_og_image_url";
$postArticle .="' /></a></div>";
/**/
$postArticle .="<div class='entry-content'>";
$postArticle .="<ul class='post-meta'>";
$postArticle .="<li><i class='fa fa-user'></i>Posted by <a href='";
$postArticle .=outContentsLink."/contents/user/$contents_id/";
$postArticle .="'>$username_contents</a></li>";
$postArticle .="<li><i class='fa fa-comments'></i><a href='";
$postArticle .=outContentsLink."/contents/solve/$contents_id/".$objPost->seoUrl($contents_og_image_title)."/";
$postArticle .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_contents($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostComments <= 1)
{
$postArticle .=$totalPostComments;
$postArticle .=" Comment";
}
else 
{
$postArticle .=$totalPostComments;
$postArticle .=" Comments";	
}
endforeach;
}
$postArticle .="</a></li>";

$postArticle .="<li><i class='fa fa-clock-o'></i><span class='day'>".date('d M Y',strtotime($contents_date))."</span></li>";
$postArticle .="</ul>";
$postArticle .="<div>";
$postArticle .=ucfirst($contents_og_image_what_to_do);
$postArticle .="</div>";
$postArticle .="</div>";
$postArticle .="<p><a class='eb-cart-back' href='";
$postArticle .=outContentsLink."/contents/solve/$contents_id/".$objPost->seoUrl($contents_og_image_title)."/";
$postArticle .="'>Read More</a></p>";
$postArticle .="</div>";
$postArticle .="<footer class='entry-meta'> This entry was posted in <a title='View all posts in ".ucfirst($contents_category)."' href='";
$postArticle .=outContentsLink."/contents/category/$contents_id/";
$postArticle .="'>".$objPost->visulString($contents_category)."</a> and <a title='View all posts in ".ucfirst($contents_sub_category)."' href='";
$postArticle .=outContentsLink."/contents/subcategory/$contents_id/";
$postArticle .="'>".$objPost->visulString($contents_sub_category)."</a></footer>";
$postArticle .="</article>";
endforeach;
}
$postArticle .="</div>";
$postArticle .="</div>";
echo $postArticle;
$obj = new ebapps\blog\blog(); 
echo $obj -> contentsPagination();
?>
