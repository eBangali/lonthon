<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'> 
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class="well">
<h2 title='MOU'>MOU</h2>
</div>
<?php include_once (eblogin.'/registration_page.php'); ?>
<?php
$obj = new ebapps\login\registration_page();
$obj->update_account_info_read();
if($obj->data)
{
foreach($obj->data as $val)
{
extract($val);
?>
<div class='well'>
<p align="center">MEMORANDUM OF  UNDERSTANDING<br>
BETWEEN<br>
<?php if(!empty($full_name)){ echo $full_name; } ?><br>
AND<br>
<?php echo domain; ?></p>
<ol start="1" type="1">
<li>PURPOSE:</li>
<p>The purpose of this MOU is to continue to supply apparels  product and sales permission between <?php if(!empty($full_name)){ echo $full_name; } ?> and <?php echo domain; ?></p>
<li><?php if(!empty($full_name)){ echo $full_name; } ?> SHALL:</li>
<p>Manufacture and supply the apparels product as order.</p>
<li><?php echo domain; ?>  SHALL:</li>
<p>Can be sell the product.</p>
<li>IT IS MUTUALLY UNDERSTOOD AND AGREED BY AND BETWEEN THE PARTIES THAT:</li>
<li><u>MODIFICATION</u>.  Modifications to this agreement shall be made  by mutual consent of the parties, by the issuance of a written modification,  signed and dated by authorized officials, prior to any changes being performed. </li>
<li><u>PARTICIPATION  IN SIMILAR ACTIVITIES</u>.  This agreement  in no way restricts <?php if(!empty($full_name)){ echo $full_name; } ?> or <?php echo domain; ?> from participating in  similar activities with other public or private agencies, organizations, and  individuals.</li>
<li><u>TERMINATION</u>.  Either party, upon thirty (30) days written  notice, may terminate the agreement in whole, or in part, at any time.</li>
<li>PRINCIPAL CONTACTS.  The principal contacts for this instrument  are:</li>
<p><?php if(!empty($full_name)){ echo $full_name; } ?><br></p>
<p>&nbsp;</p>
<p><strong><?php echo domain; ?></strong><br>
<li><u>NON-FUND  OBLIGATION DOCUMENT.</u>  This agreement  is neither a fiscal nor a funds obligation document.  Any endeavor or transfer of anything of value  involving reimbursement or contribution of funds between the parties to this  agreement will be handled in accordance with applicable laws, regulations, and  procedures.  Such endeavors will be  outlined in separate agreements that shall be made in writing by  representatives of the parties and shall be independently authorized by  appropriate statutory authority.</li>
<li><u>COMPLIANCE.</u>  The  parties agree to be bound by applicable state and federal rules governing Equal  Employment Opportunity, Non-Discrimination and Immigration. </li>
<li><u>COMMENCEMENT/EXPIRATION  DATE</u>.  This agreement is executed as  of the date of last signature and is effective through thirty (30) days written  termination notice which time it will expire unless extended.</li>
<p>IN WITNESS WHEREOF, the parties hereto have executed this  agreement as of the last written date below.</p>
<p>FOR: <?php if(!empty($full_name)){ echo $full_name; } ?></p>
<p><strong>&nbsp;</strong></p>
<p><strong>&nbsp;</strong></p>
<p>FOR: <?php echo domain; ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</ol>
<?php } } ?>
<p>Attachments</p>
<ol start="1" type="1">  <li>Copy of Trade License</li>
<li>Business Bank Statement</li>
<li>Copy of Passport/NID/Smartcard</li>
</ol>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout."/a-common-ad-right.php"); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>
