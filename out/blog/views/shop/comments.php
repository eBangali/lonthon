<?php
if(isset($contentsid))
{ 
if(isset($_SESSION["memberlevel"]))
{
if($_SESSION["memberlevel"]<=8)
{
include_once ("query-visitor.php"); 
}
elseif($_SESSION["memberlevel"]>=9)
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
$queryMe  ="<div class='well'>";
$queryMe .="By <a href='".outContentsLink."/contents/writer/$blogs_username/'>$blogs_username</a> on ".date('d M Y',strtotime($blogs_comment_date));
$queryMe .="<p>$blogs_comment_details</p>";
$queryMe .="</div>"; 
echo $queryMe;  
}
}
?>
