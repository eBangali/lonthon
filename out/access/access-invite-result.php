<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<?php include_once (ebaccess.'/access_permission_admin_minimum.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<!-- Level Starts -->
<div class='side-nav-categories'>
<div class='well'><h2 title='Invited by <?php echo $_SESSION['ebusername']; ?>'>Referral by <?php echo $_SESSION['ebusername']; ?></h2></div>
<div class='box-content box-category'>
<ul>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php 
$count1stLevel = new ebapps\login\registration_page();
$count1stLevel ->countFirstLevelOfInvite();
if($count1stLevel->data)
{
foreach($count1stLevel->data as $count1stLevelval): extract($count1stLevelval);
echo "<b>Directly Invited : $countFirstLevelTotal</b>";
endforeach;
} 
?>
<?php $firstLevel = new ebapps\login\registration_page(); $firstLevel ->firstLevelOfInvite(); ?>
<?php if($firstLevel->data >= 1) { ?>
<?php foreach($firstLevel->data as $firstLevelval): extract($firstLevelval); ?>
<?php if (!empty($firstLevelOfInviteUsername)){ ?>
<li> <a class='active' href=''>
<?php $levelOne = $firstLevelOfInviteUsername; echo ucfirst($firstLevel->visulString($firstLevelOfInviteUsername)); ?>
</a> <span class='subDropdown minus'></span>
<ul class='level0_415' style='display:block'>
<?php $secondLevel = new ebapps\login\registration_page(); $secondLevel ->secondLevelOfInvite($levelOne); ?>
<?php if($secondLevel->data >= 1) { ?>
<?php $levelSep =0; foreach($secondLevel->data as $secondLevelval): extract($secondLevelval); ?>
<?php if (!empty($levelOne) and !empty($secondLevelOfInviteUsername)){ ?>
<?php $levelTwo = $secondLevelOfInviteUsername; ?>
<li> <a href=''><?php echo ucfirst($secondLevel->visulString($secondLevelOfInviteUsername)); ?></a> <span class='subDropdown plus'></span>
<ul class='level1' style='display:none'>
<?php $thirdLevel = new ebapps\login\registration_page(); $thirdLevel ->thirdLevelOfInvite($levelTwo); ?>
<?php if($thirdLevel->data >= 1) { ?>
<?php foreach($thirdLevel->data as $thirdLevelval): extract($thirdLevelval); ?>
<?php if (!empty($thirdLevelOfInviteUsername)){ ?>
<li><a href=''><?php echo ucfirst($thirdLevel->visulString($thirdLevelOfInviteUsername)); ?></a></li>
<?php } endforeach; } ?>
</ul>
</li>
<?php  } $levelSep++; endforeach; } ?>
</ul>
</li>
<?php } endforeach; } ?>
<!--End eCommerce Dextop Menue-->
</ul>
</div> 
</div>
<!-- Level End -->
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once ("access-my-account.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>