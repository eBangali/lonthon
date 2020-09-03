<?php
$rightColumn ="<div role='complementary' class='widget_wrapper13'>";
$rightColumn .="<div class='popular-posts widget widget__sidebar wow bounceInUp animated'>";
$rightColumn .="<h3 class='widget-title'><span>CATEGORIES</span></h3>";
$rightColumn .="<div class='widget-content'>";
$rightColumn .="<ul class='posts-list unstyled clearfix'>";
$objThumb = new ebapps\blog\blog(); $objThumb -> rightBarAllCategory();
if($objThumb->data){foreach($objThumb->data as $valThumb): extract($valThumb);
$rightColumn .="<li class='cat-item'><a href='";
$rightColumn .=outContentsLink."/contents/category/$contents_id/";
$rightColumn .="'>".strtoupper($objThumb->visulString($contents_category))."</a></li>";
endforeach;
}
$rightColumn .="</ul>";
$rightColumn .="<ul class='posts-list unstyled clearfix'>";
$objThumb = new ebapps\blog\blog(); $objThumb -> rightBarAllCategory();
if($objThumb->data){foreach($objThumb->data as $valThumb): extract($valThumb);
$rightColumn .="<li class='cat-item'><a href='";
$rightColumn .=outContentsLink."/contents/subcategory/$contents_id/";
$rightColumn .="'>".strtoupper($objThumb->visulString($contents_sub_category))."</a></li>";
endforeach;
}
$rightColumn .="</ul>";
$rightColumn .="</div>";
$rightColumn .="</div>";
$rightColumn .="</div>";
echo $rightColumn;
?>