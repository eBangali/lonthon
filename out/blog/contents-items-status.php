<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess."/access_permission_online_minimum.php"); ?>

<div class='container'>
  <div class='row row-offcanvas row-offcanvas-right'>
    <div class='col-xs-12 col-md-2'>
      <?php include_once (eblayout.'/a-common-ad.php'); ?>
    </div>
    <div class='col-xs-12 col-md-7 sidebar-offcanvas'>
      <div class="well">
        <h2 title='Post Status'>Post Status</h2>
      </div>
      <?php include_once (ebblog.'/blog.php'); ?>
      <?php

if(isset($_REQUEST['delete_contents_items']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->delete_contents_items($contents_id, $contents_og_image_url);
$obj=new ebapps\blog\blog();
$obj->delete_contents_small_items($contents_id, $contents_og_small_image_url);
}
?>
<?php
$obj=new ebapps\blog\blog();
$obj->contents_view_items();
if($obj->data)
{
$solutionStatus ="<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";
foreach($obj->data as $val)
{
extract($val);
$solutionStatus .= "<div class='panel panel-default'>";
$solutionStatus .= "<div class='panel-heading' role='tab' id='heading".$contents_id."'>";
$solutionStatus .= "<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse".$contents_id."' aria-expanded='false' aria-controls='collapse".$contents_id."'>";
//
$solutionStatus .= "<div class='row'>";
$solutionStatus .= "<div class='col-xs-12 col-md-12'>";
$solutionStatus .= "<div class='table-responsive'>";
$solutionStatus .= "<table class='table table-bordered'>";
$solutionStatus .= "<tbody>";
$solutionStatus .= "<tr>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$solutionStatus .= "<td width='30%'><img class='img-responsive' src='".hypertextWithOrWithoutWww."$contents_og_image_url' /></td>";
}
else
{
$solutionStatus .= "<td width='30%'><img class='img-responsive' src='".themeResource."/images/blankImage.jpg' /></td>";
}
$solutionStatus .= "<td>";
if($contents_approved==0){
$solutionStatus .= "<i class='fa fa-times-circle fa-lg' aria-hidden='true'></i> REVIEWING <br>";
}
if($contents_approved==1){
$solutionStatus .= "<i class='fa fa-check-circle fa-lg' aria-hidden='true'></i> PUBLISHED <br>";
}
$solutionStatus .= "<b>Title: ".ucfirst($contents_og_image_title)."</b><br>";
//$solutionStatus .= "<b>".$this->visulString($contents_category)." <i class='fa fa-angle-double-right' aria-hidden='true'></i>".$this->visulString($contents_sub_category)."</b><br>";
$solutionStatus .= "<b>".$obj->visulString($contents_category)." <i class='fa fa-angle-double-right' aria-hidden='true'></i> ".$obj->visulString($contents_sub_category)."</b><br>";
$solutionStatus .= "<b>ID: $contents_id</b>";
$solutionStatus .= "</td>"; 
$solutionStatus .= "</tr>";
$solutionStatus .= "</tbody>";
$solutionStatus .= "</table>";
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
//
$solutionStatus .= "</a>";
$solutionStatus .= "</h3>";
$solutionStatus .= "</div>";
$solutionStatus .= "<div id='collapse".$contents_id."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading".$contents_id."'>";
$solutionStatus .= "<div class='table-responsive panel-body'>";
$solutionStatus .= "<table class='table'>";
$solutionStatus .= "<tbody>";
$solutionStatus .= "<tr><td>Title:</td><td>".ucfirst($contents_og_image_title)."</td></tr>";
$solutionStatus .= "<tr><td>Category:</td><td>".$obj->visulString($contents_category)."</td></tr>";
$solutionStatus .= "<tr><td>Sub Category:</td><td>".$obj->visulString($contents_sub_category)."</td></tr>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$solutionStatus .= "<tr><td>Profile Image:</td><td>";
$solutionStatus .= "<img src='".hypertextWithOrWithoutWww."$contents_og_image_url' class='img-responsive' />";
$solutionStatus .= "</td></tr>";
}
else
{
/* Do not use, it will not remove the image */
$solutionStatus .= "<tr><td>Profile Image:</td><td><form action='contents-image-upload.php' method='post'><input type='hidden' name='contents_id' value='$contents_id' /><div class='buttons-set'>
<button type='submit' name='upload_image' title='Upload Profile Image' class='button submit'> <span> Upload Profile Image </span> </button>
</div></form></td></tr>";
}
$solutionStatus .= "<tr><td>What to do:</td><td class='well'>".ucfirst($contents_og_image_what_to_do)."</td></tr>";
$solutionStatus .= "<tr><td>How to do:</td><td class='well'>".ucfirst($contents_og_image_how_to_solve)."</td></tr>";


if(!empty($contents_affiliate_link)){
$solutionStatus .= "<tr><td>Affiliate Link:</td><td>";
$solutionStatus .= "<p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_affiliate_link' target='_blank'><button type='button' class='button submit' title='Affiliate Link'><span> Visit </span></button></a></p>";
}

if(!empty($contents_github_link)){
$solutionStatus .= "<tr><td>Download:</td><td>";
$solutionStatus .= "<p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_github_link' target='_blank'><button type='button' class='button submit' title='Download'><span> Download </span></button></a></p>";
}

$solutionStatus .= "</td></tr>";
if(!empty($contents_preview_link)){
$solutionStatus .= "<tr><td>Preview:</td><td>";
$solutionStatus .= "<p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_preview_link' target='_blank'><button type='button' class='button submit' title='Preview'><span> Preview </span></button></a></p>";
}

$solutionStatus .= "</td></tr>";
if(!empty($contents_video_link)){
$solutionStatus .= "<tr><td>Video:</td><td>";
$solutionStatus .="<div class='bs-example' data-example-id='responsive-embed-16by9-iframe-youtube'>";
$solutionStatus .="<div class='embed-responsive embed-responsive-16by9'>";
$solutionStatus .="<iframe class='embed-responsive-item' src='".hypertextWithOrWithoutWww."$contents_video_link' allowfullscreen=''>";
$solutionStatus .="</iframe>";
$solutionStatus .="</div>";
$solutionStatus .="</div>";
}
$solutionStatus .= "</td></tr>";
$solutionStatus .= "<tr><td>Upload Date:</td><td>$contents_date</td></tr>";
$solutionStatus .= "<tr><td>OPTION:</td><td>";
$solutionStatus .= "<form action='contents-add-items_edit.php' method='get'><input type='hidden' name='username_contents' value='$username_contents' /><input type='hidden' name='contents_id' value='$contents_id' /><div class='buttons-set'>
<button type='submit' name='option_contents_edit' title='EDIT' class='button submit'> <span> EDIT </span> </button>
</div></form>";
$solutionStatus .= "</td></tr>";
if(empty($contents_approved)){
$solutionStatus .= "<tr><td>Delete:</td><td><form method='post'><input type='hidden' name='contents_id' value='$contents_id' /><input type='hidden' name='contents_og_image_url' value='$contents_og_image_url' /><input type='hidden' name='contents_og_small_image_url' value='$contents_og_small_image_url' /><div class='buttons-set'>
<button type='submit' name='delete_contents_items' title='Delete' class='button submit'> <span> Delete </span> </button>
</div></form></td></tr>";
}
$solutionStatus .= "</tbody>";
$solutionStatus .= "</table>";
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
}
$solutionStatus .= "</div>";
echo $solutionStatus;
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
