<?php
if(isset($contentsid))
{ 
if(isset($_SESSION["memberlevel"]))
{
if($_SESSION["memberlevel"]<=4)
{
include_once ("query-visitor.php"); 
}
elseif($_SESSION["memberlevel"]>=5)
{
include_once ("query-admin.php"); 
}
}
else
{
echo "<b>You have to Signin to Query</b><br />";
}
}
?>
<?php
$obj = new ebapps\blog\blog();
$obj->read_all_contents_query($contentsid);
if($obj->data > 1)
{
foreach($obj->data as $val)
{
extract($val);
$queryMe ="<div class='well'";
$queryMe .="<p>By $blogs_username on $blogs_comment_date</p>";
$queryMe .="<p>$blogs_comment_details</p>";
$queryMe .="</div>"; 
echo $queryMe;  
}
}
?>