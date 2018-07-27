<!-- Header -->
<header>
  <div class='header-container'>
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-3 logo-block'> 
          <!-- Header Logo -->
          <div class='logo'><a href='/index.php'><img alt='<?php echo domain; ?>' src='<?php echo themeResource; ?>/images/Logo.png' /></a></div>
          <!-- End Header Logo --> 
        </div>
        <div class='col-xs-12 col-sm-9 pull-right hidden-xs'>
          <div class='collapse navbar-collapse'>
            <ul class='nav navbar-nav navbar-right'>
              <li><a href='/index.php' title='Home '><i class='fa fa-home fa-lg' aria-hidden='true'></i> Home</a></li>
              <!--Blog-->
              <?php if (isset($_SESSION['username'])){ ?>
              <li class='dropdown'> <a href='' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Blog <b class='caret'></b></a>
                <ul class='dropdown-menu'>
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
                  <?php include_once (eblayout.'/a-common-navebar-blog-cat-sub-menue-login.php'); ?>
                </ul>
              </li>
               <?php }  else { ?>
          <?php include_once (eblayout.'/a-common-navebar-blog-cat-sub-menue.php'); ?>
          <?php //include_once (eblayout.'/a-common-navebar-blog-full-category-in-menu.php'); ?>
          <?php } ?>
              <!--SATTINGS-->
              <?php if (isset($_SESSION['username'])){ ?>
              <li class='dropdown'> <a href='' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-cogs fa-lg' aria-hidden='true'></i> <?php echo $_SESSION['username']; ?> <b class='caret'></b></a>
                <ul class='dropdown-menu'>
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
              <?php } else { ?>
              <?php include_once (eblayout.'/a-common-navebar-settings-cat-sub-menue.php'); ?>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end header -->