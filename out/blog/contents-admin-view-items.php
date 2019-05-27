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
     <div class='well'>
        <h2 title='Approval'>Approval</h2>
      </div>
      <?php include_once (ebblog.'/blog.php'); ?>
      <?php

if(isset($_REQUEST['approve_contents_items']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->approve_contents_items($contents_id);
}
?>
      <?php
if(isset($_REQUEST['notSercicesApproved']))
{
extract($_REQUEST);
$obj=new ebapps\blog\blog();
$obj->notSercicesApproved($contents_id, $contents_og_image_url);
$obj=new ebapps\blog\blog();
$obj->notSercicesApproved_small($contents_id, $contents_og_small_image_url);
}
?>
<?php

if(isset($_REQUEST['reject_blogs_item']))
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
$obj->admin_contents_view_items();
if($obj->data >= 1)
{
$contentviewitems ="<div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>";
foreach($obj->data as $val)
{
extract($val);
$contentviewitems .="<div class='panel panel-default'>";
$contentviewitems .="<div class='panel-heading' role='tab' id='heading".$contents_id."'>";
$contentviewitems .="<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse".$contents_id."' aria-expanded='false' aria-controls='collapse".$contents_id."'>";
//
$contentviewitems .= "<div class='row'>";
$contentviewitems .= "<div class='col-xs-12 col-md-12'>";
$contentviewitems .= "<div class='table-responsive'>";
$contentviewitems .= "<table class='table table-bordered'>";
$contentviewitems .= "<tbody>";
$contentviewitems .= "<tr>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$contentviewitems .= "<td width='30%'><img class='img-responsive' src='".hypertextWithOrWithoutWww."$contents_og_image_url' /></td>";
}
else
{
$contentviewitems .= "<td width='30%'><img class='img-responsive' src='".themeResource."/images/blankImage.jpg' /></td>";
}
$contentviewitems .= "<td>";
if($contents_approved==0)
{
$contentviewitems .= "<i class='fa fa-times-circle fa-lg' aria-hidden='true'></i> REVIEWING <br>";
}
if($contents_approved==1)
{
$contentviewitems .= "<i class='fa fa-check-circle fa-lg' aria-hidden='true'></i> PUBLISHED <br>";
}
$contentviewitems .= "<b>Title: ".ucfirst($contents_og_image_title)."</b><br>";
$contentviewitems .= "<b>".$obj->visulString($contents_category)." <i class='fa fa-angle-double-right' aria-hidden='true'></i> ".$obj->visulString($contents_sub_category)."</b><br>";
$contentviewitems .= "<b>ID: $contents_id</b>";
$contentviewitems .= "</td>"; 
$contentviewitems .= "</tr>";
$contentviewitems .= "</tbody>";
$contentviewitems .= "</table>";
$contentviewitems .= "</div>";
$contentviewitems .= "</div>";
$contentviewitems .= "</div>";
//
$contentviewitems .="</h3>";
$contentviewitems .="</div>";
$contentviewitems .="<div id='collapse".$contents_id."' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading".$contents_id."'>";
$contentviewitems .="<div class='table-responsive panel-body'>";
$contentviewitems .="<table class='table'>";
$contentviewitems .="<tbody>";
$contentviewitems .="<tr><td scope='row'>Author:</td><td>$username_contents</td></tr>";
$contentviewitems .="<tr><td>Title:</td><td>".ucfirst($contents_og_image_title)."</td></tr>";
$contentviewitems .="<tr><td>Category:</td><td>".$obj->visulString($contents_category)."</td></tr>";
$contentviewitems .="<tr><td>Sub Category:</td><td>".$obj->visulString($contents_sub_category)."</td></tr>";
if(file_exists(str_replace(hostingName, docRoot, hypertextWithOrWithoutWww.$contents_og_image_url)))
{
$contentviewitems .="<tr><td>Profile Image:</td><td><img src='".hypertextWithOrWithoutWww."$contents_og_image_url' class='img-responsive' /></td></tr>";
}
$contentviewitems .= "<tr><td>What to do:</td><td class='well'>".ucfirst($contents_og_image_what_to_do)."</td></tr>";
if(!empty($contents_og_image_how_to_solve))
{
$contentviewitems .= "<tr><td>How to do:</td><td class='well'>".ucfirst($contents_og_image_how_to_solve)."</td></tr>";
}

if(!empty($contents_affiliate_link))
{
$contentviewitems .= "<tr><td>Affiliate Link:</td><td><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_affiliate_link' target='_blank'><button type='button' class='button submit' title='Visit'><span> Visit </span></button></a></td></tr>";
}

if(!empty($contents_github_link))
{
$contentviewitems .= "<tr><td>Download:</td><td><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_github_link' target='_blank'><button type='button' class='button submit' title='Download'><span> Download </span></button></a></td></tr>";
}
if(!empty($contents_preview_link))
{
$contentviewitems .= "<tr><td>Preview:</td><td><a rel='nofollow' href='".hypertextWithOrWithoutWww."$contents_preview_link' target='_blank'><button type='button' class='button submit' title='Preview'><span> Preview </span></button></a></td></tr>";
}
if(!empty($contents_video_link))
{
$contentviewitems .= "<tr><td>Video:</td>";
$contentviewitems .= "<td>";
$contentviewitems .="<div class='bs-example' data-example-id='responsive-embed-16by9-iframe-youtube'>";
$contentviewitems .="<div class='embed-responsive embed-responsive-16by9'>";
$contentviewitems .="<iframe class='embed-responsive-item' src='".hypertextWithOrWithoutWww."$contents_video_link' allowfullscreen=''>";
$contentviewitems .="</iframe>";
$contentviewitems .="</div>";
$contentviewitems .="</div>";
$contentviewitems .="</td>";
$contentviewitems .= "</tr>";
}
$contentviewitems .= "<tr><td>Submit Date:</td><td>$contents_date</td></tr>";

if(!empty($contents_og_image_url) and $contents_approved != 1)
{
$contentviewitems .= "<tr><td>OPTION:</td><td><form method='post'><input type='hidden' name='contents_id' value='$contents_id' /><div class='buttons-set'><button type='submit' name='approve_contents_items' title='PUBLISH' class='button submit'> <span> PUBLISH </span> </button></div></form></td></tr>";
}
$contentviewitems .= "<tr><td>OPTION:</td><td><form method='post'><input type='hidden' name='contents_id' value='$contents_id' /><input type='hidden' name='contents_og_image_url' value='$contents_og_image_url' /><input type='hidden' name='contents_og_small_image_url' value='$contents_og_small_image_url' /><div class='buttons-set'><button type='submit' name='notSercicesApproved' title='Not Approved' class='button submit'> <span> Not Approved </span> </button></div></form><form method='post'><input type='hidden' name='contents_id' value='$contents_id' /><input type='hidden' name='contents_og_image_url' value='$contents_og_image_url' /><input type='hidden' name='contents_og_small_image_url' value='$contents_og_small_image_url' /><div class='buttons-set'><button type='submit' name='reject_blogs_item' title='REJECT' class='button submit'> <span> REJECT </span> </button></div></form></td></tr>";
$contentviewitems .="</tbody>";
$contentviewitems .="</table>";
$contentviewitems .="</div>";
$contentviewitems .="</div>";
$contentviewitems .="</div>";
}
$contentviewitems .="</div>";
echo $contentviewitems;
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
<?php include_once (eblayout.'/a-common-footer.php'); ?>