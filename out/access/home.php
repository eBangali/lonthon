<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<?php
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebOutSoft.'/copy.php');
}
else
{
include_once (ebOutSoft.'/copy.php');
}
?>
<?php

/* Soft Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebOutSoft.'/copy.php');
}
else
{
include_once (ebOutSoft.'/copy.php');
}
*/
/* POS Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebOutSys.'/product.php');
}
else
{
include_once (ebOutSys.'/product.php');
}
*/
/* Bay Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebproduct.'/product.php');
}
else
{
include_once (ebproduct.'/product.php');
}
*/
/* Event CMS */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebOutEvent.'/manager.php');
}
else
{
include_once (ebOutEvent.'/manager.php');
}
*/

/* Corporate Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebcorporatePages.'/project.php');
}
else
{
include_once (ebcorporatePages.'/project.php');
}
*/
/* Portfolio Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebportfolio.'/portfolio.php');
}
else
{
include_once (ebportfolio.'/portfolio.php');
}
*/
/* Blog Dashboard */
/*
if ($_SESSION['memberlevel'] >= 4)
{
include_once (ebcontents.'/contents.php');
}
else
{
include_once (ebcontents.'/contents.php');
}
*/
?>