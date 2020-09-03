<?php
$postArticle ="<div class='site-content' id='primary'>";
$postArticle .="<div role='main' id='content'>";
$objPost = new ebapps\blog\blog(); $objPost -> contentsPostAll();
if($objPost->data){foreach($objPost->data as $valPost): extract($valPost);
$postArticle .="<article class='blog_entry clearfix wow bounceInUp animated' id='post-$contents_id'>";
$postArticle .="<header class='blog_entry-header clearfix'>";
$postArticle .="<div class='blog_entry-header-inner'>";
$postArticle .="<h2 class='blog_entry-title' title='".$contents_og_image_title."'>";
$postArticle .=strtoupper($contents_og_image_title)."</h2>";
$postArticle .="</div>";
$postArticle .="</header>";
$postArticle .="<div class='entry-content'>";
$postArticle .="<div class='featured-thumb'>";
if(!empty($contents_og_image_url)){
$postArticle .="<a href='";
$postArticle .=outContentsLink."/contents/solve/$contents_id/".$objPost->seoUrl($contents_og_image_title)."/";
$postArticle .="'><img class='img-responsive' alt='".ucfirst($contents_og_image_title)."' src='";
$postArticle .=hypertextWithOrWithoutWww."$contents_og_image_url";
$postArticle .="' /></a>";
}
$postArticle .="</div>";
/**/
$postArticle .="<div class='entry-content'>";
$postArticle .="<ul class='post-meta'>";
$postArticle .="<li><i class='fa fa-user'></i>Posted by <a href='";
$postArticle .=outContentsLink."/contents/writer/$username_contents/";
$postArticle .="'>$username_contents</a></li>";

/*Like?*/
$countLikeNow = new ebapps\blog\blog();
$countLikeNow ->count_like_now($contents_id);

if($countLikeNow->data)
{
foreach($countLikeNow->data as $valcountLikeNow): extract($valcountLikeNow);
	
if(isset($_SESSION['ebusername']) and $likeNow == 0)
{
/*Logined True with hober effect */
/*Like Now*/
if(isset($_REQUEST['add_for_like']))
{
extract($_REQUEST);
$countLike = new ebapps\blog\blog();
$countLike ->add_for_like($contents_id_for_like);

}
$postArticle .="<li><form method='post' class='toLike'><input type='hidden' name='contents_id_for_like' value='$contents_id' /><button type='submit' name='add_for_like'><i class='fa fa-heart'></i></button></form></li>";
}
else 
{
/*Logined False with hober effect */
/* Login to like */
$postArticle .="<li><i class='fa fa-heart'></i></li>";
}
endforeach;
}   
				   
				   
$postArticle .="<li><a href='";
$postArticle .=outContentsLink."/contents/solve/$contents_id/".$objPost->seoUrl($contents_og_image_title)."/";			   
$postArticle .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_like($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
	
if($totalPostLikes <= 1)
{
$postArticle .=$totalPostLikes;
$postArticle .=" like";
}
else 
{
$postArticle .=$totalPostLikes;
$postArticle .=" Likes";	
}
endforeach;
}
$postArticle .="</a></li>";

/* */				   
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
