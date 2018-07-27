<!-- Footer -->
<footer class='footer'>
  <div class='footer-middle'>
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 col-sm-6'>
          <div class='footer-column pull-left'>
            <h4>Guide</h4>
            <ul class='links'>
              <?php if(!mysqli_connect_errno()){ ?>
              <li><a href='<?php echo outPagesLink; ?>/aboutus.php' title='About us'><span>About us</span></a></li>
              <li><a href='<?php echo outPagesLink; ?>/terms-conditions.php' title='Terms'><span>Terms</span></a></li>
              <li class='last'><a href='<?php echo outPagesLink; ?>/contact.php' title='Contact us'><span>Contact us</span></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class='col-md-3 col-sm-6'>
          <div class='footer-column pull-left'>
            <h4>Advisor</h4>
            <ul class='links'>
            <?php if(!mysqli_connect_errno()){ ?>
              <li><a href='<?php echo outAccessLink; ?>/home.php' title='My Account'>My Account</a></li>
              <li><a href='<?php echo outAccessLink; ?>/access_update_account_information.php' title='Account Settings'>Account Settings </a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class='col-md-3 col-sm-6'>
          <div class='footer-column pull-left'>
            <h4>Information</h4>
            <ul class='links'>
            <?php if(!mysqli_connect_errno()){ ?>
              <li><a href='<?php echo outPagesLink; ?>/faq.php' title='FAQs'><span>FAQs</span></a></li>
              <li><a href='<?php echo outPagesLink; ?>/pricing.php' title='Pricing'><span>Pricing</span></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class='col-md-3 col-sm-6'>
          <h4>Site Location</h4>
          <div class='contacts-info'>
          <?php if(!mysqli_connect_errno()){ ?>
          <?php include_once(eblogin.'/registration_page.php');
        $siteLocation = new ebapps\login\registration_page();
        $siteLocation -> site_location();
        ?>
        <?php if($siteLocation->data >= 1) { foreach($siteLocation->data as $val){ extract($val); ?>
            <address>
            <i class='add-icon'>&nbsp;</i><?php if(!empty($business_name)){echo "$business_name <br>"; } ?>
            <?php if(!empty($business_full_address)){echo "$business_full_address"; } ?>
            </address>
            <div class='phone-footer'><i class='phone-icon'>&nbsp;</i> <?php echo adminMobile; ?></div>
            <div class='email-footer'><i class='email-icon'>&nbsp;</i> <a href='mailto:<?php echo adminEmail; ?>'><?php echo adminEmail; ?></a> </div>
            <?php }} ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='footer-top'>
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-6'>
          <div class='social'>
            <ul>
            <?php if(!mysqli_connect_errno()){ ?>
            <li class='rss'><a href='/mrss.xml'></a></li>
            <?php include_once(eblogin.'/registration_page.php');
			$social = new ebapps\login\registration_page();
			$social -> site_owner_social_info();
			?>
            <?php if($social->data >= 1) { foreach($social->data as $val){ extract($val); ?>
            <?php if(!empty($facebook_link)){echo "<li class='fb'><a href='".hypertextWithOrWithoutWww."$facebook_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($twitter_link)){echo "<li class='tw'><a href='".hypertextWithOrWithoutWww."$twitter_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($google_plus_link)){echo "<li class='googleplus'><a href='".hypertextWithOrWithoutWww."$google_plus_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($github_link)){echo "<li class='github'><a href='".hypertextWithOrWithoutWww."$github_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($linkedin_link)){echo "<li class='linkedin'><a href='".hypertextWithOrWithoutWww."$linkedin_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($pinterest_link)){echo "<li class='pintrest'><a href='".hypertextWithOrWithoutWww."$pinterest_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php if(!empty($youtube_link)){echo "<li class='youtube'><a href='".hypertextWithOrWithoutWww."$youtube_link' target='_blank' rel='nofollow'></a></li>"; } ?>
            <?php }} ?>
            <?php } ?>
            </ul>
          </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
          <div class='payment-accept'> <img src='<?php echo themeResource; ?>/images/payment-1.png' alt='PayPal'> <img src='<?php echo themeResource; ?>/images/payment-2.png' alt='VISA CARD'> <img src='<?php echo themeResource; ?>/images/payment-3.png' alt='AMERICAN EXPRESS CARD'> <img src='<?php echo themeResource; ?>/images/payment-4.png' alt='MASTER CARD'> </div>
        </div>
      </div>
    </div>
  </div>
  <div class='footer-bottom'>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-5 col-xs-12 coppyright'> &copy; 2007 - <?php echo date('Y'); ?> <a href='<?php echo hypertextWithOrWithoutWww.domain; ?>'><?php echo domain; ?></a> All Rights Reserved. Develop by <a href='https://ebangali.com'>eBangali</a></div>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer -->
</div>
<?php include (eblayout.'/a-common-mobile-nav.php'); ?>
<!-- JavaScript --> 
<script src='<?php echo themeResource; ?>/js/bootstrap.min.js'></script> 
<script src='<?php echo themeResource; ?>/js/revslider.js'></script> 
<script src='<?php echo themeResource; ?>/js/common.js'></script> 
<script src='<?php echo themeResource; ?>/js/jquery.bxslider.min.js'></script> 
<script src='<?php echo themeResource; ?>/js/owl.carousel.min.js'></script> 
<script src='<?php echo themeResource; ?>/js/jquery.mobile-menu.min.js'></script> 
<script src='<?php echo themeResource; ?>/js/countdown.js'></script> 
<script src='<?php echo themeResource; ?>/js/cloud-zoom.js'></script>

<script src='<?php echo themeResource; ?>/js/jquery.waypoints.min.7.10.js'></script> 
<script src='<?php echo themeResource; ?>/js/main.eb.7.10.js'></script>
<script src='<?php echo themeResource; ?>/js/filter.bootstrap.7.10.js'></script>
<script>
jQuery(document).ready(function() {
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 3000,
startwidth: 915,
startheight: 497,
hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,
navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',
touchenabled: 'on',
onHoverStop: 'on',
swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,
spinner: 'spinner0',
keyboardNavigation: 'off',
navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,
soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,
soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,
shadow: 0,
fullWidth: 'on',
fullScreen: 'off',
stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,
shuffle: 'off',
autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,
hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,
hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});
</script> 
<!-- Hot Deals Timer 1--> 
<script>
var dthen1 = new Date('12/25/18 11:59:00 PM');
start = '08/04/08 03:02:11 AM';
start_date = Date.parse(start);
var dnow1 = new Date(start_date);
if (CountStepper > 0)
ddiff = new Date((dnow1) - (dthen1));
else
ddiff = new Date((dthen1) - (dnow1));
gsecs1 = Math.floor(ddiff.valueOf() / 1000);
var iid1 = 'countbox_1';
CountBack_slider(gsecs1, 'countbox_1', 1);
</script>
</body>
</html>