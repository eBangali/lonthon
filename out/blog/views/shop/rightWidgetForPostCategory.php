<?php
$rightColumn ="<div role='complementary' class='widget_wrapper13'>";
$rightColumn .="<div class='popular-posts widget widget__sidebar wow bounceInUp animated'>";
$rightColumn .="<h3 class='widget-title'><span>LATEST POSTS</span></h3>";
$rightColumn .="<div class='widget-content'>";
$rightColumn .="<ul class='posts-list unstyled clearfix'>";
$rightColumn .="<li>";
$searchobj = new ebapps\blog\blog(); $searchobj -> rightBarAllCategoryPost($contentsid);
if($searchobj->data){foreach($searchobj->data as $valThumb): extract($valThumb);
if(!empty($contents_og_small_image_url)){
$rightColumn .="<a href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$rightColumn .="'><img class='img-responsive' alt='$contents_og_image_title' title='$contents_og_image_title' src='";
$rightColumn .=hypertextWithOrWithoutWww."$contents_og_small_image_url";
$rightColumn .="' /></a>";
}
$rightColumn .="<h4><a title='".$searchobj->visulString($contents_og_image_title)."' href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$rightColumn .="'>".strtoupper($contents_og_image_title)."</a></h4>";
/*############*/
$rightColumn .="<div class='entry-content'>";
$rightColumn .="<ul class='post-meta'>";
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
$rightColumn .="<li><form method='post' class='toLike'><input type='hidden' name='contents_id_for_like' value='$contents_id' /><button type='submit' name='add_for_like'><i class='fa fa-heart'></i></button></form></li>";
}
else 
{
/*Logined False with hober effect */
/* Login to like */
$rightColumn .="<li><i class='fa fa-heart'></i></li>";
}
endforeach;
}   
				   
				   
$rightColumn .="<li><a href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";			   
$rightColumn .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_like($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
	
if($totalPostLikes <= 1)
{
$rightColumn .=$totalPostLikes;
$rightColumn .=" like";
}
else 
{
$rightColumn .=$totalPostLikes;
$rightColumn .=" Likes";	
}
endforeach;
}
$rightColumn .="</a></li>";

/* */				   
$rightColumn .="<li><i class='fa fa-comments'></i><a href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$searchobj->seoUrl($contents_og_image_title)."/";
$rightColumn .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_contents($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostComments <= 1)
{
$rightColumn .=$totalPostComments;
$rightColumn .=" Comment";
}
else 
{
$rightColumn .=$totalPostComments;
$rightColumn .=" Comments";	
}
endforeach;
}
$rightColumn .="</a></li>"; 

$rightColumn .="<li><i class='fa fa-clock-o'></i><span class='day'>".date('d M Y',strtotime($contents_date))."</span></li>";
$rightColumn .="</ul>";
$rightColumn .="</div>";
/*############*/
endforeach;
}
$rightColumn .="</div>";
$rightColumn .="</div>";
$rightColumn .="</div>";
echo $rightColumn;
?>
