<?php if (empty($_SESSION['username'])){ ?>
<div class='newsletter-wrap'>
      <div class='container'>
        <div class='row'>
          <div class='col-xs-12'>
            <div class='newsletter'>
                <div>
                  <h4><span>Never miss a story when you sign up <?php echo domain; ?></span></h4>
                  <a class='eb-cart-back' href='<?php echo outAccessLink; ?>/signup.php'><i class='fa fa-envelope fa-lg' aria-hidden='true'></i>   Get Updates</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--newsletter-->
<?php } ?>