<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-title-one.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-noindex.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-page-id-start.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='Payment'>Payment</h2>
</div>
<div class='well'>
<article>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="heading1">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
#1. How do I pay on <?php echo domain; ?>?
</a>
</h4>
</div>
<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
<div class="panel-body"><ol>
<li>bKash</li>
<li>PayPal</li>
</ol>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="heading2">
<h4 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
#2. Can I pay with any Credit or Debit card?
</a>
</h4>
</div>
<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
<div class="panel-body">
You can choose to pay on <?php echo domain; ?> with any Visa, Master or American Express Cards.
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="heading3">
<h4 class="panel-title">
<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
#3. Which currencies does <?php echo domain; ?> accept?
</a>
</h4>
</div>
<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
<div class="panel-body">
We accept <?php echo primaryCurrency; ?> and <?php echo secondaryCurrency; ?>.
</div>
</div>
</div>
</div>
</article>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>
