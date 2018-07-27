<section class='supportteam'>
  <h3 class='text-center text-uppercase'>Support Team</h3>
  <div class='container'>
    <div class='row'>
    <?php include_once(eblogin.'/registration_page.php');
    $social = new ebapps\login\registration_page();
    $social -> support_staff_social_info();
    ?>
    <?php if($social->data >= 1) { foreach($social->data as $val){ extract($val); ?>
      <div class='col-xs-12 col-sm-4'>
        <div class='thumbnail'><img alt='<?php echo $full_name; ?>' title='<?php echo $full_name; ?>' src='<?php echo themeResource; ?>/images/person.jpg' />
          <div class='staff'>
            <?php if(!empty($full_name)){echo "<p>$full_name</p>";} ?>
            <?php if(!empty($position_names)){echo "<b>$position_names</b>";} ?>
          </div>
          <div class='social-follow'>
          <ul>
          <?php if(!empty($facebook_link)){echo "<li class='facebook'><a href='https://$facebook_link' rel='nofollow'><i class='fa fa-facebook'></i></a></li>"; } ?>
          <?php if(!empty($twitter_link)){echo "<li class='twitter'><a href='https://$twitter_link' rel='nofollow'><i class='fa fa-twitter'></i></a></li>"; } ?>
          <?php if(!empty($google_plus_link)){echo "<li class='google-plus'><a href='https://$google_plus_link' rel='nofollow'><i class='fa fa-google-plus'></i></a></li>"; } ?>
          <?php if(!empty($github_link)){echo "<li class='github'><a href='https://$github_link' rel='nofollow'><i class='fa fa-github'></i></a></li>"; } ?>
          <?php if(!empty($linkedin_link)){echo "<li class='linkedin'><a href='https://$linkedin_link' rel='nofollow'><i class='fa fa-linkedin'></i></a></li>"; } ?>
          <?php if(!empty($pinterest_link)){echo "<li class='pinterest'><a href='https://$pinterest_link' rel='nofollow'><i class='fa fa-pinterest'></i></a></li>"; } ?>
          <?php if(!empty($youtube_link)){echo "<li class='youtube'><a href='https://$youtube_link' rel='nofollow'><i class='fa fa-youtube-play'></i></a></li>"; } ?>
          </ul>
        </div>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
</section>