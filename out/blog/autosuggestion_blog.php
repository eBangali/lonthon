<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
include_once (ebbd."/connection.inc.php");
if(isset($_POST['searchQuery'])  && $_POST['searchQuery'] != '')
{
$outPut = "";
//
$query  ="SELECT";
$query .=" contents_id,";
$query .=" contents_og_small_image_url,";
$query .=" contents_og_image_title";
$query .=" FROM blog_contents";
$query .=" WHERE";
$query .=" contents_approved = 1";
$query .=" AND contents_og_image_title LIKE '%".$_POST['searchQuery']."%'";
$query .=" ORDER BY contents_id DESC";
$res = mysqli_query($link,$query);
$outPut = "<ul class='list-group'>";
if(mysqli_num_rows($res))
{
while($row = mysqli_fetch_array($res))
{ 
$outPut .= "<li class='list-group-item'><img class='search-img' src='".hypertextWithOrWithoutWww.$row['contents_og_small_image_url']."' />".$row['contents_og_image_title']."</li>";
}
}
else
{
$outPut .= "<li class='list-group-item'>Nothing Found</li>";
}
$outPut .= "</ul>";
echo $outPut;
}
?>