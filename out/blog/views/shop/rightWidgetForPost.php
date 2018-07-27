<?php
$rightColumn ="<div role='complementary' class='widget_wrapper13'>";
$rightColumn .="<div class='popular-posts widget widget__sidebar wow bounceInUp animated'>";
$rightColumn .="<h3 class='widget-title'><span>LATEST POSTS</span></h3>";
$rightColumn .="<div class='widget-content'>";
$rightColumn .="<ul class='posts-list unstyled clearfix'>";
$rightColumn .="<li>";
$objThumb = new ebapps\blog\blog(); $objThumb -> rightBarAll();
if($objThumb->data){foreach($objThumb->data as $valThumb): extract($valThumb);
$rightColumn .="<a href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$objThumb->seoUrl($contents_og_image_title)."/";
$rightColumn .="'><img class='img-responsive' alt='$contents_og_image_title' title='$contents_og_image_title' src='";
$rightColumn .=hypertextWithOrWithoutWww."$contents_og_small_image_url";
$rightColumn .="' /></a>";
$rightColumn .="<h4><a title='".$objThumb->visulString($contents_og_image_title)."' href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$objThumb->seoUrl($contents_og_image_title)."/";
$rightColumn .="'>".strtoupper($contents_og_image_title)."</a></h4>";
$rightColumn .="<p class='post-meta'>";
$rightColumn .="<i class='icon-calendar'></i>";
$rightColumn .="<time class='entry-date'> ".date('Y-m-d H:i:s',strtotime($contents_date))."</time>";
$rightColumn .=" <i class='fa fa-comments'></i><a href='";
$rightColumn .=outContentsLink."/contents/solve/$contents_id/".$objThumb->seoUrl($contents_og_image_title)."/";
$rightColumn .="'>";
$countComment = new ebapps\blog\blog();
$countComment ->count_total_contents($contents_id);
if($countComment->data)
{
foreach($countComment->data as $valcountComment): extract($valcountComment);
if($totalPostComments <= 1)
{
$rightColumn .=" ";
$rightColumn .=$totalPostComments;
$rightColumn .=" Comment";
}
else 
{
$rightColumn .=" ";
$rightColumn .=$totalPostComments;
$rightColumn .=" Comments";	
}
endforeach;
$rightColumn .="</a>";
}
endforeach;
}
$rightColumn .="</li>";
$rightColumn .="</ul>";
$rightColumn .="</div>";
$rightColumn .="</div>";
$rightColumn .="</div>";
echo $rightColumn;
?>