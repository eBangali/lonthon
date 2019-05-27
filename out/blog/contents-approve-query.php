<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'> 
<div class="well">
<h2 title='Comments'>Comments</h2>
</div>
<?php include_once (ebblog.'/blog.php'); ?>
<?php
if(isset($_REQUEST['option_contents_approve']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->approve_contents_query_admin($blogs_comments_id, $blogs_id_in_comments, $blogs_comment_details);
}
?>
<?php
if(isset($_REQUEST['option_contents_delete']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->delete_contents_query_admin($blogs_comments_id,$blogs_comment_details);
}
?>
<?php
$obj = new ebapps\blog\blog();
$obj->read_all_contents_query_admin();
if($obj->data >= 1)
{
foreach($obj->data as $val)
{
extract($val);
$queryMe ="<div class='well'>";
$queryMe .="By $blogs_username on $blogs_comment_date";
$queryMe .="<pre>"; 
$queryMe .="<form method='post'>";
$queryMe .="<fieldset class='group-select'>";
$queryMe .="<input type='hidden' name='blogs_comments_id' value='$blogs_comments_id' />"; 
$queryMe .="<input type='hidden' name='blogs_id_in_comments' value='$blogs_id_in_comments' />"; 
$queryMe .="<textarea class='form-control' name='blogs_comment_details' rows='6' placeholder='Description' required autofocus>$blogs_comment_details</textarea>";
$queryMe .="<div class='buttons-set'>
<button type='submit' name='option_contents_approve' title='Approve' class='button submit'> <span> Approve </span> </button>
</div>";
$queryMe .="<div class='buttons-set'>
<button type='submit' name='option_contents_delete' title='Delete' class='button submit'> <span> Delete </span> </button>
</div>";
$queryMe .="</fieldset>"; 
$queryMe .="</form>"; 
$queryMe .="</pre>";
$queryMe .="</div>"; 
echo $queryMe;  
}
}
else
{
echo "<pre>No Entry Found</pre>";
}
?>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("contents-my-account.php"); ?>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer-edit.php'); ?>