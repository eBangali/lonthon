<?php include_once (dirname(dirname(__FILE__)).'/initialize.php'); ?>
<?php include_once (eblayout.'/a-common-header-icon.php'); ?>
<meta property='og:image:url' content='<?php echo themeResource; ?>/images/Advertisement_POS.jpg' />
<meta property='og:image:type' content='image/jpeg' />
<meta property='og:image:width' content='1366' />
<meta property='og:image:height' content='768' />
<meta property='og:title' content='Free Point of Sale (POS) for your Store' />
<meta property='og:description' content='Track Sales, Cash flow, Inventory and Simplify your Business processes Digitally' />
<meta name='twitter:card' content='summary_large_image'/>
<meta name='twitter:site' content='eBangali'/>
<meta name='twitter:creator' content='@eBangali'/>
<meta name='twitter:url' content='<?php echo fullUrl; ?>'/>
<meta name='twitter:title' content='Free Point of Sale (POS) for your Store'>
<meta name='twitter:description' content='Track Sales, Cash flow, Inventory and Simplify your Business processes Digitally'/>
<meta name='twitter:image' content='<?php echo themeResource; ?>/images/Advertisement_POS.jpg'/>
<title>Free Point of Sale (POS) for your Store</title>
<meta name='description' content='Track Sales, Cash flow, Inventory and Simplify your Business processes Digitally' />
<?php include_once (eblayout.'/a-common-header-meta-scripts.php'); ?>
<?php include_once (eblayout.'/a-common-header.php'); ?>
<?php include_once (eblayout.'/a-common-navebar.php'); ?>
<div class='container'>
<div class='row row-offcanvas row-offcanvas-right'>
<div class='col-xs-12 col-md-2'>
<?php include_once (eblayout.'/a-common-ad.php'); ?>
</div>
<div class='col-xs-12 col-md-7 sidebar-offcanvas'>
<div class='well'>
<h1 title='Free POS Software for your Store'>Free Point of Sale (POS) for your Store</h1>
<p>Track Sales, Cash flow, Inventory and Simplify your Business processes Digitally</p>
<?php 
if(isset($_SESSION['addressverified']))
{
if($_SESSION['addressverified']==0)
{
?>
<p><a href='<?php echo outAccessLink; ?>/access_update_account_information.php'><button type='button' class='button submit' title='Update your account information'><span>Update your account information</span></button></a></p>
<?php
}
}
?>
</div>
<div class='well'>
<table class='table table-condensed'>
<tr>
<td class='active'><b>Plans</b></td>
<td class='success'><b>Intro</b></td>
<td class='info'><b>Premier</b></td>
</tr>
<tr>
<td class='active'>Price</td>
<td class='success'><b>FREE</b></td>
<td class='info'>US $10/Month</td>
</tr>
<tr>
<td class='active'>Items</td>
<td class='success'>20</td>
<td class='info'>200</td>
</tr>
<tr>
<td class='active'>Purchase Entry</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>

<tr>
<td class='active'>Stock Report</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Purchase History</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Sales Report</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Damage and Return</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Client's Review, Wish, Support CRM System</td>
<td class='success'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Home Delivery</td>
<td class='success'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Profit Chart</td>
<td class='success'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Stock Transfer</td>
<td class='success'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
<tr>
<td class='active'>Multi Warehouse</td>
<td class='success'><i class='fa fa-times-circle fa-2x' aria-hidden='true'></i></td>
<td class='info'><i class='fa fa-check-circle fa-2x' aria-hidden='true'></i></td>
</tr>
</table>
</div>
<div class='well'>
<h2>POS Software Features</h2>
</div>
<div class='well'>
<ol>
<li>Purchase, Sales and Inventory Management System (Tracking Purchase, Sales and Inventory)</li>
<li>Stripe, Cash payment processing</li>
<li>Malti store sales and stock control</li>
<li>Barcode scanner checkout option</li>
<li>Home Delivery</li>
<li>VAT for countries that support a Value Added Tax</li>
<li>Capable for unlimited product</li>
<li>Responsive design shopping cart, Specially design for Mac, iPhone, iPad, PC and Android</li>
<li>Works with touch screens and click screen based systems</li>
</ol>
<b>Sales Manager Features</b>
<ol>
<li>Purchase history</li>
<li>Salesman's daily, monthly, yearly report</li>
</ol>
<b>Software development factors</b>
<ol>
<li>Custom PHP Library</li>
<li>High Performance 30 Transaction / POS/ User/ Hour</li>
</ol>
</div>
<div class='well'>
<h2 title='Scope of Use:'>Scope of Use:</h2>
</div>
<div class='panel-group' id='accordion' role='tablist'>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading1'>
<h3 class='panel-title'> <a data-toggle='collapse' data-parent='#accordion' href='#collapse1' aria-expanded='true' aria-controls='collapse1'> #1. Superstore Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse1' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='heading1'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>70gm</td>
<td>Maggi 2 Minute Noodles</td>
<td>Nestle</td>
<td>Noodles</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading2'>
<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse2' aria-expanded='false' aria-controls='collapse2'> #2. Library Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse2' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading2'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>500sheets</td>
<td>A4 White Paper 80gsm</td>
<td>Bashundahra</td>
<td>Paper</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading3'>
<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse3' aria-expanded='false' aria-controls='collapse3'> #3. Restaurant Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse3' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading3'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>pcs</td>
<td>Garlic Chicken</td>
<td>KFC</td>
<td>Chicken</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading4'>
<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse4' aria-expanded='false' aria-controls='collapse4'> #4. Fashion Shop Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse4' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading4'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>pcs</td>
<td>Cotton Mens Shirts</td>
<td>Harve-Benard</td>
<td>Shirt</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading5'>
<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse5' aria-expanded='false' aria-controls='collapse5'> #5. Distributor Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse5' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading5'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>450ml</td>
<td>Sunsilk</td>
<td>Unilever</td>
<td>Shampoo</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class='panel panel-defaolt'>
<div class='panel-heading' role='tab' id='heading6'>
<h3 class='panel-title'> <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapse6' aria-expanded='false' aria-controls='collapse6'> #7. Pharmacy Point of Sale - Item Entry. </a> </h3>
</div>
<div id='collapse6' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading6'>
<div class='table-responsive panel-body'>
<table class='table'>
<thead>
<tr>
<th>Barcode</th>
<th>Unit /Size</th>
<th>Item Name</th>
<th>Manufacturer/ Brand</th>
<th>Group</th>
</tr>
</thead>
<tbody>
<tr>
<td>40 character hex number</td>
<td>100ml</td>
<td>Soltoin Syrup</td>
<td>Square</td>
<td>Salbutamol-BP</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class='col-xs-12 col-md-3 sidebar-offcanvas'>
<?php include_once (eblayout.'/a-common-ad-right.php'); ?>
</div>
</div>
</div>
<?php include_once (eblayout.'/a-common-footer.php'); ?>