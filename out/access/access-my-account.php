<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<aside class='col-right sidebar wow bounceInUp animated'>
  <div class='block block-account'>
    <div class='block-title'>Portfolio My Account</div>
    <div class='block-content'>
      <ul>
        <?php if ($_SESSION['memberlevel'] >= 9) { ?>
        <li><a href='<?php echo outAccessLink; ?>/sendMassMail.php' title='Send Mass eMail'><i class='fa fa-envelope fa-lg' aria-hidden='true'></i> Send Mass eMail</a></li>
        <li><a href='<?php echo outAccessLink; ?>/access_all_account_information.php' title='User Info'><i class='fa fa-users fa-lg' aria-hidden='true'></i> User Info</a></li>
        <li><a href='<?php echo outAccessLink; ?>/mrss.php' title='All mRSS'><i class='fa fa-rss fa-lg' aria-hidden='true'></i> All mRSS</a></li>
        <li><a href='<?php echo outAccessLink; ?>/access-admin-merchant-profile.php' title='Business Info'><i class='fa fa-briefcase fa-lg' aria-hidden='true'></i> Business Info</a></li>
        <?php } ?>
        <?php if ($_SESSION['memberlevel'] >= 1) { ?>
        <li><a href='<?php echo outAccessLink; ?>/access_update_account_information.php' title='Settings'><i class='fa fa-cog fa-lg' aria-hidden='true'></i> Settings </a></li>
        <?php } ?>
        <li class='last'><a href='<?php echo outPagesLink; ?>/logout.php' title='Sign Out'><i class='fa fa-sign-out fa-lg' aria-hidden='true'></i> Sign Out</a></li>
      </ul>
    </div>
  </div>
</aside>
