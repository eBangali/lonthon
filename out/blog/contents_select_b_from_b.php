<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
include_once (ebbd."/connection.inc.php");
include_once (ebblog.'/blog.php');
$obj = new ebapps\blog\blog();
if(isset($_POST['pic_name']) && $_POST['pic_name'] != '')
{
$pic_name = $_POST['pic_name'];
$query = "SELECT * FROM ";
$query .= "blog_sub_category ";
$query .= "where contents_category_in_blog_sub_category='".$pic_name."'";

$res = mysqli_query($link,$query);
if(mysqli_num_rows($res))
{
while($row = mysqli_fetch_array($res))
{
echo "<option value='".$row['contents_sub_category']."'>".ucfirst($obj->visulString($row['contents_sub_category']))."</option>";
}
}

}
?>