<?php
include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
include_once (ebbd."/connection.inc.php");
if(isset($_POST['pic_name']) && $_POST['pic_name'] != '')
{
$pic_name = intval($_POST['pic_name']);
$query ="SELECT country_code FROM";
$query .=" country_and_zone";
$query .=" WHERE bay_dhl_country_zone_id=$pic_name";
$res = mysqli_query($link,$query);
if(mysqli_num_rows($res))
{
while($row = mysqli_fetch_array($res))
{
echo $row['country_code'];
}
}
}
?>