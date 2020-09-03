<?php
if(!mysqli_connect_errno()){ ?>
<?php if (empty($_SESSION['ebusername'])){ ?>
<li><a href='<?php echo outAccessLink; ?>/home.php' title='Sign In'><i class='fa fa-sign-in fa-lg' aria-hidden='true'></i> Sign In</a></li>
<li><a href='<?php echo outAccessLink; ?>/signup.php' title='Sign Up'><i class='fa fa-user-plus fa-lg' aria-hidden='true'></i> Sign Up</a></li>
<?php }} ?>