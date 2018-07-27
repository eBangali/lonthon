<div id='mobile-menu'>
  <ul>
    <li>
      <div class='mm-search'>
        
      </div>
    </li>
    <?php if (isset($_SESSION['username'])){ ?>
    <li><a><?php echo $_SESSION['username']; ?></a>
      <!--Blog-->
      <ul>
        <li><a href='<?php echo outContentsLink; ?>/contents/'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Blog </a>
          <ul>
            <?php if ($_SESSION['memberlevel'] >= 1) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents/' title='Blog'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Blog View</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 9) { ?>
<li><a href='<?php echo outContentsLink; ?>/contentsMrssGenerator.php' title='Blog mRSS'><i class='fa fa-rss fa-lg' aria-hidden='true'></i> Blog mRSS</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-approve-query.php' title='Comments'><i class='fa fa-comment fa-lg' aria-hidden='true'></i> Comments</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-admin-view-items.php' title='Approval'><i class='fa fa-refresh fa-lg' aria-hidden='true'></i> Approval</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 2) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents-items-status.php' title='Post Status'><i class='fa fa-tasks fa-lg' aria-hidden='true'></i> Post Status</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-add-items.php' title='New Post'><i class='fa fa-plus fa-lg' aria-hidden='true'></i> New Post</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 9) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents-add-sub-category.php' title='Add Sub Category'><i class='fa fa-sort-amount-asc fa-lg' aria-hidden='true'></i> Add Sub Category</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-add-category.php' title='Add Category'><i class='fa fa-database fa-lg' aria-hidden='true'></i> Add Category</a></li>
<?php } ?>
          </ul>
        </li>
      </ul>
      <!--SATTINGS-->
      <ul>
        <li><a href='<?php echo outAccessLink; ?>/home.php'><i class='fa fa-cogs fa-lg' aria-hidden='true'></i> SATTINGS</a>
          <ul>
            <?php if ($_SESSION['memberlevel'] >= 9) { ?>
            <li><a href='<?php echo outAccessLink; ?>/access_all_account_information.php' title='User Info'><i class='fa fa-users fa-lg' aria-hidden='true'></i> User Info</a></li>
            <li><a href='<?php echo outAccessLink; ?>/mrss.php' title='All mRSS'><i class='fa fa-rss fa-lg' aria-hidden='true'></i> All mRSS</a></li>
            <li><a href='<?php echo outAccessLink; ?>/access-admin-merchant-profile.php' title='Business Info'><i class='fa fa-briefcase fa-lg' aria-hidden='true'></i> Business Info</a></li>
            <?php } ?>
            <?php if ($_SESSION['memberlevel'] >= 1) { ?>
            <li><a href='<?php echo outAccessLink; ?>/access_update_account_information.php' title='Settings'><i class='fa fa-cog fa-lg' aria-hidden='true'></i> Settings </a></li>
            <?php } ?>
            <li><a href='<?php echo outPagesLink; ?>/logout.php' title='Sign Out'><i class='fa fa-sign-out fa-lg' aria-hidden='true'></i> Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </li>
    <?php } else { ?>
    <?php if(!mysqli_connect_errno()){ ?>
    <li class='nosub'><a href='<?php echo outAccessLink; ?>/home.php' title='Sign In'><i class='fa fa-sign-in fa-lg' aria-hidden='true'></i> Sign In</a></li>
    <li class='nosub'><a href='<?php echo outAccessLink; ?>/signup.php' title='Sign Up'><i class='fa fa-user-plus fa-lg' aria-hidden='true'></i> Sign Up</a></li>
    <?php }} ?>
    <?php if(!mysqli_connect_errno()){ ?> 
    <!--Start Blog Mobile Manue -->
    <?php include_once (ebblog.'/blog.php'); ?>
    <li><a href='<?php echo outContentsLink; ?>/contents/' title='Blog'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Blog</a>
      <?php $contentCategory = new ebapps\blog\blog(); $contentCategory ->menu_category_contents(); ?>
      <?php if($contentCategory->data >= 1) { ?>
      <?php foreach($contentCategory->data as $contentCategoryVal): extract($contentCategoryVal); ?>
      <?php if (!empty($contents_category)){ ?>
      <ul>
        <li> <a href='<?php echo outContentsLink; ?>/contents/category/<?php echo $contents_id; ?>/'><?php echo ucfirst($contentCategory->visulString($contents_category)); ?></a>
          <?php $contentSubCategory = new ebapps\blog\blog(); $contentSubCategory ->menu_sub_category_contents($contents_category); ?>
          <?php if($contentSubCategory->data >= 1) { ?>
          <?php foreach($contentSubCategory->data as $contentSubCategoryVal): extract($contentSubCategoryVal); ?>
          <?php if (!empty($contents_category) and !empty($contents_sub_category)){ ?>
          <ul>
            <li><a href='<?php echo outContentsLink; ?>/contents/subcategory/<?php echo $contents_id; ?>/' title='<?php echo ucfirst($contents_sub_category); ?>'><?php echo ucfirst($contentSubCategory->visulString($contents_sub_category)); ?></a></li>
          </ul>
          <?php } endforeach; } ?>
        </li>
      </ul>
      <?php } endforeach; } ?>
    </li>
    <!--End Blog Mobile Manue -->
    <?php } ?>
  </ul>
</div>
