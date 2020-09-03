<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts-text-editor.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
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
//
$solutionStatus .= "<div class='row'>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$solutionStatus .= "<div class='col-xs-12 col-md-3'><img src='".hypertextWithOrWithoutWww."$contents_og_image_url' class='img-responsive' /></div>";
}
else
{
$solutionStatus .= "<div class='col-xs-12 col-md-3'><img src='".themeResource."/images/blankImage.jpg' class='img-responsive' /></div>";
}
$solutionStatus .= "<div class='col-xs-12 col-md-9'>";
if($contents_approved==0){
$solutionStatus .= "<i class='fa fa-times-circle fa-lg' aria-hidden='true'></i> REVIEWING <br>";
}
if($contents_approved==1){
$solutionStatus .= "<i class='fa fa-check-circle fa-lg' aria-hidden='true'></i> PUBLISHED <br>";
}
$solutionStatus .= "<b>Title: ".ucfirst($contents_og_image_title)."</b><br>";
$solutionStatus .= "<b>".$obj->visulString($contents_category)." <i class='fa fa-angle-double-right' aria-hidden='true'></i> ".$obj->visulString($contents_sub_category)."</b><br>";
$solutionStatus .= "<b>ID: $contents_id</b>";
$solutionStatus .= "</div>"; 
$solutionStatus .= "</div>";
//
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
//
$solutionStatus .= "</a></h3>";
$solutionStatus .= "</div>";
$solutionStatus .= "<div id='collapse".$contents_id."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading".$contents_id."'>";
//
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Title:</div><div class='col-xs-12 col-md-9'>".ucfirst($contents_og_image_title)."</div></div>";
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Category:</div><div class='col-xs-12 col-md-9'>".$obj->visulString($contents_category)."</div></div>";
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Sub Category:</div><div class='col-xs-12 col-md-9'>".$obj->visulString($contents_sub_category)."</div></div>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Profile Image:</div><div class='col-xs-12 col-md-9'>";
$solutionStatus .= "<img src='".hypertextWithOrWithoutWww."$contents_og_image_url' class='img-responsive' />";
$solutionStatus .= "</div></div>";
}
else
{
/* Do not use, it will not remove the image */
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Profile Image:</div><div class='col-xs-12 col-md-9'><form action='contents-image-upload.php' method='post'><input type='hidden' name='contents_id' value='$contents_id' /><div class='buttons-set'>
<button type='submit' name='upload_image' title='Upload Profile Image' class='button submit'> <span> Upload Profile Image </span> </button>
</div></form></div></div>";
}
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>What to do:</div><div class='col-xs-12 col-md-9'>".ucfirst($contents_og_image_what_to_do)."</div></div>";
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>How to do:</div><div class='col-xs-12 col-md-9'>".ucfirst($contents_og_image_how_to_solve)."</div></div>";

if(!empty($contents_affiliate_link))
{
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Affiliate Link:</div><div class='col-xs-12 col-md-9'><p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_affiliate_link' target='_blank'><button type='button' class='button submit' title='Affiliate Link'><span> Visit </span></button></a></p></div></div>";
}
if(!empty($contents_github_link))
{
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Download Link:</div><div class='col-xs-12 col-md-9'><p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_github_link' target='_blank'><button type='button' class='button submit' title='Download'><span> Download </span></button></a></p></div></div>";
}
if(!empty($contents_preview_link))
{
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Preview Link:</div><div class='col-xs-12 col-md-9'><p><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_preview_link' target='_blank'><button type='button' class='button submit' title='Preview'><span> Preview </span></button></a></p></div></div>";
}
if(!empty($contents_video_link))
{
$solutionStatus .="<div class='row'><div class='col-xs-12 col-md-3'>Video:</div><div class='col-xs-12 col-md-9'>";
$solutionStatus .="<div class='bs-example' data-example-id='responsive-embed-16by9-iframe-youtube'>";
$solutionStatus .="<div class='embed-responsive embed-responsive-16by9'>";
$solutionStatus .="<iframe class='embed-responsive-item' src='".hypertextWithOrWithoutWww."$contents_video_link' allowfullscreen=''>";
$solutionStatus .="</iframe>";
$solutionStatus .="</div>";
$solutionStatus .="</div>";
$solutionStatus .= "</div></div>";
}
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>Upload Date:</div><div class='col-xs-12 col-md-9'>$contents_date</div></div>";
$solutionStatus .= "<div class='row'><div class='col-xs-12 col-md-3'>OPTION:</div><div class='col-xs-12 col-md-9'>";
$solutionStatus .= "<form action='contents-add-items_edit.php' method='get'><input type='hidden' name='username_contents' value='$username_contents' /><input type='hidden' name='contents_id' value='$contents_id' /><div class='buttons-set'>
<button type='submit' title='EDIT' class='button submit'> <span> EDIT </span> </button>
</div></form>";
$solutionStatus .= "<form method='post'><input type='hidden' name='contents_id' value='$contents_id' /><input type='hidden' name='contents_og_image_url' value='$contents_og_image_url' /><input type='hidden' name='contents_og_small_image_url' value='$contents_og_small_image_url' /><div class='buttons-set'>
<button type='submit' name='delete_contents_items' title='Delete' class='button submit'> <span> Delete </span> </button>
</div></form>";
$solutionStatus .= "</div></div>";
//
$solutionStatus .= "</div>";
$solutionStatus .= "</div>";
}
$solutionStatus .= "</div>";
echo $solutionStatus;
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
