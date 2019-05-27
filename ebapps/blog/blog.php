<?php
namespace ebapps\blog;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/** **/
include_once(ebbd.'/eBConDb.php');
use ebapps\dbconnection\eBConDb;

class blog extends dbconfig
{
/*** ***/
public function __construct()
{
parent::__construct();
include_once(ebblog.'/htaccessContentsGenerator.php');

/* ######## Video Marketing Blog ######## */
eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `blog_category` (
`contents_category_id` int(11) NOT NULL AUTO_INCREMENT,
`contents_category` varchar(160) NOT NULL,
PRIMARY KEY (`contents_category_id`),
UNIQUE KEY `contents_category` (`contents_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");


eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `blog_sub_category` (
`contents_sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
`contents_sub_category` varchar(160) NOT NULL,
`contents_category_in_blog_sub_category` varchar(160) NOT NULL,
PRIMARY KEY (`contents_sub_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `blog_contents` (
`contents_id` int(11) NOT NULL AUTO_INCREMENT,
`username_contents` varchar(160) NOT NULL,
`contents_approved` int(3) NOT NULL,
`contents_category` varchar(160) NOT NULL,
`contents_sub_category` varchar(160) NOT NULL,
`contents_og_image_url` varchar(512) NOT NULL,
`contents_og_small_image_url` varchar(512) NOT NULL,
`contents_og_image_title` varchar(255) NOT NULL,
`contents_og_image_what_to_do` longtext NOT NULL,
`contents_og_image_how_to_solve` longtext NOT NULL,
`contents_affiliate_link` varchar(512) NOT NULL,
`contents_github_link` varchar(512) NOT NULL,
`contents_preview_link` varchar(512) NOT NULL,
`contents_video_link` varchar(512) NOT NULL,
`contents_date` varchar(160) NOT NULL,
PRIMARY KEY (`contents_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `blog_comments` (
`blogs_comments_id` int(11) NOT NULL AUTO_INCREMENT,
`blogs_id_in_comments` int(11) NOT NULL,
`blogs_username` varchar(160) NOT NULL,
`blogs_comment_details` varchar(1024) NOT NULL,
`blogs_comment_date` varchar(160) NOT NULL,
`blogs_comment_status` varchar(4) NOT NULL,
PRIMARY KEY (`blogs_comments_id`),
KEY `blogs_username` (`blogs_username`),
KEY `blogs_comment_status` (`blogs_comment_status`),
CONSTRAINT `blog_comment_fk` FOREIGN KEY (`blogs_id_in_comments`) REFERENCES `blog_contents` (`contents_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
	
eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `blog_like` (
`blog_like_id` int(11) NOT NULL AUTO_INCREMENT,
`blogs_id_in_blog_like` int(11) NOT NULL,
`blogs_username` varchar(160) NOT NULL,
`blogs_like_date` varchar(160) NOT NULL,
PRIMARY KEY (`blog_like_id`),
KEY `blogs_username` (`blogs_username`),
CONSTRAINT `blog_like_fk` FOREIGN KEY (`blogs_id_in_blog_like`) REFERENCES `blog_contents` (`contents_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");
}
/*** ***/
public function contents_implementation_video_last_for_promotion()
{
$query = "select contents_video_link, contents_sub_category FROM blog_contents WHERE contents_approved=1 AND contents_video_link LIKE '%/%' ORDER BY contents_id DESC limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function delete_contents_query_admin($blogs_comments_id,$blogs_comment_details)
{
$blogs_comments_id = intval($blogs_comments_id);
$blogs_comment_details = $_POST['blogs_comment_details'];
$query = "DELETE FROM blog_comments";
$query .= " WHERE blogs_comments_id=$blogs_comments_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
/*** ***/
echo $this->ebDone();	
}
}
/*** ***/
public function approve_contents_query_admin($blogs_comments_id, $blogs_id_in_comments, $blogs_comment_details)
{
$blogs_comments_id = intval($blogs_comments_id);
$blogs_id_in_comments = intval($blogs_id_in_comments);
$blogs_comment_details = $_POST['blogs_comment_details'];
$blogs_comment_details_2nd = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$blogs_comment_details);
$query = "UPDATE blog_comments SET blogs_comment_details='$blogs_comment_details_2nd', blogs_comment_status='OK'";
$query .= " WHERE blogs_comments_id=$blogs_comments_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
$queryTwo = "SELECT blogs_username FROM blog_comments WHERE blogs_comments_id=$blogs_comments_id";
$resultTwo = eBConDb::eBgetInstance()->eBgetConection()->query($queryTwo);
$resultTwoInfo = mysqli_fetch_array($resultTwo);
$blogs_username = $resultTwoInfo['blogs_username'];
/*** ***/
$queryThree = "SELECT email FROM excessusers WHERE username='$blogs_username'";
$resultThree = eBConDb::eBgetInstance()->eBgetConection()->query($queryThree);
$resultThreeInfo = mysqli_fetch_array($resultThree);
$blog_comment_email = $resultThreeInfo['email'];
/*** ***/
$to = $blog_comment_email;
$from = adminEmail;
/*** ***/
$subject = "Your comment approved";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>Your comment approved</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>Hi, $blogs_username your comment approved</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outContentsLink."/contents/details/$blogs_id_in_comments/";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>View the comment</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
if($result)
{
echo $this->ebDone();
}
//
$this->massMailSendForBlogComment($blogs_username, $blogs_id_in_comments);
}
/*
#####################
Blog Mass eMail for Comments
#####################
*/
public function massMailForBlogComment($blogs_id_in_comments){
/*** eMail to Users ***/
$queryCheckForEmail = "SELECT email FROM excessusers";
$queryCheckForEmail .= " JOIN blog_comments ON blog_comments.blogs_username=  excessusers.username";
$queryCheckForEmail .= " WHERE blog_comments.blogs_id_in_comments=$blogs_id_in_comments AND blog_comments.blogs_comment_status='OK'";
$resultCheckForEmail = eBConDb::eBgetInstance()->eBgetConection()->query($queryCheckForEmail);

while($rows = $resultCheckForEmail->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

public function massMailSendForBlogComment($blogs_username, $blogs_id_in_comments){

/*** eMail to Users ***/
$arr_email = $this->massMailForBlogComment($blogs_id_in_comments);
if( $arr_email >= 1){
foreach($arr_email as $val): extract($val);
$iTo[]=$email;
endforeach;
}

/*** eMail from ***/
/*** 
$from = contactEmail;
OR
$from = adminEmail; 
***/
$from = adminEmail;
$subject = $blogs_username." also comment where you comment";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** $headers .= "Cc: ".CCEmail." \r\n"; ***/
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>Hi, $subject</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outContentsLink."/contents/details/$blogs_id_in_comments/";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>View the comment</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
for($i =0; $i<=count($iTo)-1; $i++)
{
mail($iTo[$i], $subject, $message, $headers);
}
}
/*** ***/
public function read_all_contents_query_admin()
{
$query = "SELECT * FROM";
$query .= " blog_comments";
$query .= " where blogs_comment_status='NO' order by blogs_comments_id desc";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

/*** ***/
public function submit_contents_query_mini_merchant($blogs_id_in_comments,$blogs_comment_details)
{
$blogs_id_in_comments = intval($blogs_id_in_comments);
$blogs_username = $_SESSION['username'];
$blogs_comment_date = date("r");

$blogs_comment_details = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$blogs_comment_details);

eBConDb::eBgetInstance()->eBgetConection()->query("insert into blog_comments set blogs_id_in_comments=$blogs_id_in_comments, blogs_username='$blogs_username', blogs_comment_details='$blogs_comment_details', blogs_comment_date='$blogs_comment_date', blogs_comment_status='OK'");
/*** ***/
echo $this->ebDone();
}
/*** ***/
public function submit_contents_query_visitor($blogs_id_in_comments,$blogs_comment_details)
{
$blogs_id_in_comments = intval($blogs_id_in_comments);
$blogs_comment_date = date("r");
$blogs_username = $_SESSION['username'];
$blogs_comment_details = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$blogs_comment_details);

eBConDb::eBgetInstance()->eBgetConection()->query("insert into blog_comments set blogs_id_in_comments=$blogs_id_in_comments, blogs_username='$blogs_username', blogs_comment_details='$blogs_comment_details', blogs_comment_date='$blogs_comment_date', blogs_comment_status='NO'");
/*** ***/
$queryThree = "SELECT email FROM excessusers WHERE username='$blogs_username'";
$resultThree = eBConDb::eBgetInstance()->eBgetConection()->query($queryThree);
$resultThreeInfo = mysqli_fetch_array($resultThree);
$blog_comment_email = $resultThreeInfo['email'];

/*** ***/
$to = adminEmail;
$from = $blog_comment_email;
/*** ***/
$subject = "$blogs_username left a comment";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$blogs_username left a comment</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>$blogs_username left a comment on $blogs_comment_date</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outContentsLink."/contents-approve-query.php";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>Review the comment</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
mail($to, $subject, $message, $headers);
/*** ***/
echo $this->ebDone();
}
/*** ***/
/*** ***/
public function read_contents_query_to_submit_another_one($contentsid)
{
$items_id = intval($contentsid);
$query = "SELECT * FROM";
$query .= " blog_comments";
$query .= " where blogs_id_in_comments=$items_id order by blogs_comments_id desc LIMIT 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

/*** ***/
public function count_total_like($contentsid)
{
$blogs_id_in_like = intval($contentsid);
$query = "SELECT COUNT(blogs_id_in_blog_like) as totalPostLikes FROM";
$query .= " blog_like";
$query .= " where blogs_id_in_blog_like=$blogs_id_in_like";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function add_for_like($contents_id_for_like)
{
if(isset($_REQUEST['add_for_like']))
{
extract($_REQUEST);
$contents_id_for_like = intval($_POST["contents_id_for_like"]);
$usernameLiker = $_SESSION["username"];
$blogs_like_date = date("r");


$queryCheck = "SELECT * FROM blog_like WHERE blogs_id_in_blog_like=$contents_id_for_like AND blogs_username='$usernameLiker'";
$resultCheck = eBConDb::eBgetInstance()->eBgetConection()->query($queryCheck);
$num_result = $resultCheck->num_rows;


if($num_result == 0)
{
	$query = "INSERT INTO blog_like SET blogs_id_in_blog_like=$contents_id_for_like, blogs_username='$usernameLiker', blogs_like_date='$blogs_like_date'";
$entryResult = eBConDb::eBgetInstance()->eBgetConection()->query($query);

	$this->massMailForBlogLike($usernameLiker, $contents_id_for_like);
}
	
}
}
/*
#####################
Blog Mass eMail Like
#####################
*/
public function massMailForBlog($contents_id_for_like){
/*** eMail to Users ***/
$queryCheckForEmail = "SELECT email FROM excessusers";
$queryCheckForEmail .= " JOIN blog_like ON blog_like.blogs_username =  excessusers.username";
$queryCheckForEmail .= " WHERE blog_like.blogs_id_in_blog_like=$contents_id_for_like";
$resultCheckForEmail = eBConDb::eBgetInstance()->eBgetConection()->query($queryCheckForEmail);

while($rows = $resultCheckForEmail->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

public function massMailForBlogLike($usernameLiker, $contents_id_for_like){

/*** eMail to Users ***/
$arr_email = $this->massMailForBlog($contents_id_for_like);
if( $arr_email >= 1){
foreach($arr_email as $val): extract($val);
$iTo[]=$email;
endforeach;
}

/*** eMail from ***/
/*** 
$from = contactEmail;
OR
$from = adminEmail; 
***/
$from = adminEmail;
$subject = $usernameLiker." also like this link";
/*** ***/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
/*** $headers .= "From: $from \r\n"; ***/
$headers .= "Reply-To: $from \r\n";
/*** $headers .= "Cc: ".CCEmail." \r\n"; ***/
/*** ***/
$message ="<html>";
$message .="<head>";
$message .="<title>$subject</title>";
$message .="<meta charset='utf-8'>";
$message .="<meta name='viewport' content='width=device-width, initial-scale=1'>";
$message .="<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
$message .="<style type='text/css'>
/* CLIENT-SPECIFIC STYLES */
body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}
img{-ms-interpolation-mode: bicubic;}
/* RESET STYLES */
img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
table{border-collapse: collapse !important;}
body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}
/* iOS BLUE LINKS */
a[x-apple-data-detectors]
{
color: inherit !important;
text-decoration: none !important;
font-size: inherit !important;
font-family: inherit !important;
font-weight: inherit !important;
line-height: inherit !important;
}
/* MOBILE STYLES */
@media screen and (max-width: 525px)
{
/* ALLOWS FOR FLUID TABLES */
.wrapper
{
width: 100% !important;
max-width: 100% !important;
}
/* ADJUSTS LAYOUT OF LOGO IMAGE */
.logo img
{
margin: 0 auto !important;
}
/* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
.mobile-hide 
{
display: none !important;
}
.img-max 
{
max-width: 100% !important;
width: 100% !important;
height: auto !important;
}
/* FULL-WIDTH TABLES */
.responsive-table
{
width: 100% !important;
}
/* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
.padding
{
padding: 6px 3% 9px 3% !important;
}
.padding-meta
{
padding: 9px 3% 0px 3% !important;
text-align: center;
}
.padding-copy
{
padding: 9px 3% 9px 3% !important;
text-align: center;
}
.no-padding
{
padding: 0 !important;
}
.section-padding
{
padding: 9px 9px 9px 9px !important;
}
/* ADJUST BUTTONS ON MOBILE */
.mobile-button-container
{
margin: 0 auto;
width: 100% !important;
}
.mobile-button
{
padding: 9px !important;
border: 0 !important;
font-size: 16px !important;
display: block !important;
}
}
/* ANDROID CENTER FIX */
div[style*='margin: 16px 0;'] { margin: 0 !important; }
</style>";
$message .="</head>";
$message .="<body>";
$message .="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='wrapper'>";
//
$message .="<tr>";
$message .="<td>Hi, $subject</td>";
$message .="</tr>";
//
$message .="<tr bgcolor='#014693'>";
$message .="<td>";
$message .="<a href='";
$message .=outContentsLink."/contents/details/$contents_id_for_like/";
$message .="' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; border-radius: 3px; padding: 9px 9px; border: 1px solid #014693; display: block;'>View the link</a>";
$message .="</td>";
$message .="</tr>";
//
$message .="</table>";
$message .="</body>";
$message .="</html>";
/*** ***/
for($i =0; $i<=count($iTo)-1; $i++)
{
mail($iTo[$i], $subject, $message, $headers);
}
}
/*** ***/
public function count_like_now($contentsid)
{
$like_username = isset($_SESSION['username']);
$blogs_id_in_like = intval($contentsid);
$query = "SELECT COUNT(blogs_id_in_blog_like) AS likeNow FROM";
$query .= " blog_like";
$query .= " WHERE blogs_id_in_blog_like=$blogs_id_in_like AND blogs_username='$like_username'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
	
/*** ***/
public function count_total_contents($contentsid)
{
$blogs_id_in_comments = intval($contentsid);
$query = "SELECT COUNT(blogs_id_in_comments) as totalPostComments FROM";
$query .= " blog_comments";
$query .= " where blogs_id_in_comments=$blogs_id_in_comments and blogs_comment_status='OK' order by blogs_comments_id desc";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}


/*** ***/
public function read_all_contents_query($contentsid)
{
$blogs_id_in_comments = intval($contentsid);
$query = "SELECT * FROM";
$query .= " blog_comments";
$query .= " where blogs_id_in_comments=$blogs_id_in_comments and blogs_comment_status='OK' order by blogs_comments_id desc";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}

/*** ***/
public function edit_update_contents_item($contents_id,$username_contents,$contents_approved,$contents_category,$contents_sub_category,$contents_og_image_title,$contents_og_image_what_to_do,$contents_og_image_how_to_solve,$contents_affiliate_link, $contents_github_link,$contents_preview_link,$contents_video_link)
{
$contents_id = intval($contents_id);
$contents_approved = intval($contents_approved);
$contents_og_image_what_to_do_2nd = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$contents_og_image_what_to_do);
$contents_og_image_how_to_solve_2nd = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$contents_og_image_how_to_solve);
$query = "SELECT * FROM  blog_contents where contents_id=$contents_id and username_contents='$username_contents'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
/*** ***/
if($num_result == 1)
{
if(!empty($contents_approved))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_approved=0 where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_category))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_category='$contents_category' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_sub_category))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_sub_category='$contents_sub_category' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_og_image_title))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_og_image_title='$contents_og_image_title' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_og_image_what_to_do))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_og_image_what_to_do='$contents_og_image_what_to_do_2nd' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_og_image_how_to_solve))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_og_image_how_to_solve='$contents_og_image_how_to_solve_2nd' where contents_id=$contents_id and username_contents='$username_contents'");
}

/*** ***/
if(!empty($contents_affiliate_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_affiliate_link='$contents_affiliate_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_github_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_github_link='$contents_github_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(empty($contents_github_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_github_link='$contents_github_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_preview_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_preview_link='$contents_preview_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(empty($contents_preview_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_preview_link='$contents_preview_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(!empty($contents_video_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_video_link='$contents_video_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
if(empty($contents_video_link))
{
eBConDb::eBgetInstance()->eBgetConection()->query("update blog_contents set contents_video_link='$contents_video_link' where contents_id=$contents_id and username_contents='$username_contents'");
}
/*** ***/
echo $this->ebDone();
}
}
/*** ***/
public function edit_select_contents_category(){
$query = "SELECT * FROM ";
$query .= "blog_category";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function edit_select_contents_item($contents_id,$username_contents)
{
$contents_id = intval($contents_id);
$query = "SELECT * FROM blog_contents";
$query .= " WHERE contents_id =$contents_id and username_contents ='$username_contents'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function menu_sub_category_contents($cat)
{
$query = "SELECT * FROM blog_contents where blog_contents.contents_approved=1 and blog_contents.contents_category='$cat' GROUP BY blog_contents.contents_sub_category";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function menu_category_contents()
{

$query = "SELECT * FROM blog_contents where blog_contents.contents_approved=1 GROUP BY blog_contents.contents_category";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function search_in_contents()
{
/* Read to Edit */
if(isset($_REQUEST['search_contents']))
{
extract($_REQUEST);
$query = "SELECT * FROM blog_contents where blog_contents.contents_approved=1 AND blog_contents.contents_og_image_title LIKE '%".$_REQUEST['search_contents']."%'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function submit_contents_sub_category($contentCategory, $contentsSub_category)
{
$query_test = "SELECT * FROM  blog_sub_category WHERE contents_sub_category='$contentsSub_category' AND contents_category_in_blog_sub_category='$contentCategory'";

$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query_test);
$num_result = $testresult->num_rows;

if($num_result == 0)
{
$query = "INSERT INTO blog_sub_category SET contents_sub_category='$contentsSub_category', contents_category_in_blog_sub_category='$contentCategory'";
$entryResult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
if($entryResult)
{
/*** ***/
echo $this->ebDone();
}
else
{
/*** ***/
echo $this->ebNotDone();
}
}
else
{
/*** ***/
echo $this->ebNotDone();
}
}
/*** ***/
public function submit_contents_category($contents_category)
{
/*OK*/
$query_test = "SELECT * FROM  blog_category where contents_category='$contents_category'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query_test);
$num_result = $testresult->num_rows;
if($num_result == 0)
{
$query = "INSERT INTO blog_category set contents_category='$contents_category'";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
echo $this->ebDone();
}
else 
{
/*** ***/
echo $this->ebNotDone();
}
}
/*** ***/
public function select_contents_category(){
$query = "SELECT * FROM";
$query .= " blog_category";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
echo "<option value='".$rows['contents_category']."'>".ucfirst($this->visulString($rows['contents_category']))."</option>"; 
}
}
}

/*** ***/
public function submit_new_contents_item($contents_category, $contents_sub_category, $contents_og_image_title, $contents_og_image_what_to_do, $contents_og_image_how_to_solve, $contents_affiliate_link, $contents_github_link, $contents_preview_link, $contents_video_link)
{
$username = $_SESSION['username'];
$contents_date = date("r");

$contents_og_image_what_to_do_2nd = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$contents_og_image_what_to_do);
$contents_og_image_how_to_solve_2nd = mysqli_real_escape_string (eBConDb::eBgetInstance()->eBgetConection(),$contents_og_image_how_to_solve);

$query1 = "INSERT INTO blog_contents set username_contents='$username', contents_approved=0, contents_category='$contents_category', contents_sub_category='$contents_sub_category',contents_og_image_url='',contents_og_small_image_url='',contents_og_image_title='$contents_og_image_title', contents_og_image_what_to_do='$contents_og_image_what_to_do_2nd', contents_og_image_how_to_solve='$contents_og_image_how_to_solve_2nd', contents_affiliate_link='$contents_affiliate_link', contents_github_link='$contents_github_link', contents_preview_link='$contents_preview_link', contents_video_link='$contents_video_link', contents_date='$contents_date'";
eBConDb::eBgetInstance()->eBgetConection()->query($query1);
$blogs_id = eBConDb::eBgetInstance()->eBgetConection()->insert_id;
/* #### First entry for Comments #### */
$query2 = "INSERT INTO blog_comments SET blogs_id_in_comments=$blogs_id, blogs_username='$username', blogs_comment_details='Any Query?', blogs_comment_date='$contents_date', blogs_comment_status='OK'";
$result2 = eBConDb::eBgetInstance()->eBgetConection()->query($query2);
/*** ***/
if($result2)
{
/*** ***/
echo $this->ebDone();
}
}
/*** ***/
public function contents_view_items()
{
$username = $_SESSION['username'];
$query = "SELECT * FROM ";
$query .= "blog_contents ";
$query .= "where contents_approved <=2 and blog_contents.username_contents='$username' ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function updates_contents_image_url($contents_id,$contents_og_image_url)
{
/* Do not use target='_blank', it will not remove the image */
$contents_id = intval($contents_id);
$query = "update blog_contents set contents_approved=0, contents_og_image_url='$contents_og_image_url' where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
/*** ***/
echo $this->ebDone();
}
}
/*** ***/
public function updates_contents_small_image_url($contents_id,$contents_og_small_image_url)
{
/* Do not use target='_blank', it will not remove the image */
$contents_id = intval($contents_id);
$query = "update blog_contents set contents_approved=0, contents_og_small_image_url='$contents_og_small_image_url' where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
}
/*** ***/
public function select_image_from_contents()
{
/* Read to Edit */
if(isset($_REQUEST['upload_image']))
{
extract($_REQUEST);
$contents_id = intval($contents_id);
$query = "SELECT * FROM ";
$query .= "blog_contents  ";
$query .= "where blog_contents.contents_id=$contents_id ";
$query .= "limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
/* admin contents view */
public function admin_contents_view_items()
{
$query = "SELECT * FROM ";
$query .= "blog_contents where contents_approved =0 ORDER BY blog_contents.contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
/*** ***/
public function approve_contents_items($contents_id)
{
/*** ***/
$contents_id = intval($contents_id);
$contents_approved =1;
/* update bay_merchant_add_items */
$update_contents_add_items = "update blog_contents set contents_approved=$contents_approved where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($update_contents_add_items);
/*** ***/
}
/*** ***/
public function notSercicesApproved($contents_id, $contents_og_image_url) 
{
$contents_id = intval($contents_id);
$contents_og_image_url = str_replace(hostingName, docRoot, hypertext.$contents_og_image_url);
if(!empty($contents_og_image_url))
{
unlink($contents_og_image_url);
}
$query1 = "UPDATE blog_contents SET contents_approved=0, contents_og_image_url='', contents_og_small_image_url='' where contents_id=$contents_id";
eBConDb::eBgetInstance()->eBgetConection()->query($query1);
$result1 = eBConDb::eBgetInstance()->eBgetConection()->query($query1);
if($result1)
{
/*** ***/
echo $this->ebDone();
}
}
/*** ***/
public function notSercicesApproved_small($contents_id, $contents_og_small_image_url) 
{
$contents_og_small_image_url = str_replace(hostingName, docRoot, hypertext.$contents_og_small_image_url);
if(!empty($contents_og_small_image_url))
{
unlink($contents_og_small_image_url); 
}
}
/*** ***/
public function delete_contents_items($contents_id, $contents_og_image_url) 
{
$contents_id = intval($contents_id);
/*** you'll have to use the path on your server to delete the image, not the url. ***/ 
$contents_image_path = str_replace(hostingName, docRoot, hypertext.$contents_og_image_url);
if(!empty($contents_image_path))
{
unlink($contents_image_path);
}
$query = "UPDATE blog_contents SET contents_approved=3, contents_og_image_url='', contents_og_small_image_url='' where contents_id=$contents_id";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
echo $this->ebDone();
}
/*** ***/
public function delete_contents_small_items($contents_id, $contents_og_small_image_url) 
{
$contents_id = intval($contents_id);
/*** you'll have to use the path on your server to delete the image, not the url. ***/ 
$contents_small_image_path = str_replace(hostingName, docRoot, hypertext.$contents_og_small_image_url);
if(!empty($contents_small_image_path))
{
unlink($contents_small_image_path); 
}
}
//
public function read_contents_items_download_link_to_edit()
{
/* Read to Edit */
if(isset($_REQUEST['contents_github_link']))
{
extract($_REQUEST);
$contents_id = intval($_REQUEST['contents_id']);
$query = "SELECT * FROM ";
$query .= "blog_contents  ";
$query .= "where contents_id=$contents_id ";
$query .= "limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function update_contents_download_link($contents_id, $contents_github_link)
{
$contents_id = intval($contents_id);
$query = "update blog_contents set contents_approved=0, contents_github_link='$contents_github_link' where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
echo $this->ebDone();
}
/*** ***/
public function read_contents_items_video_link_to_edit()
{
/* Read to Edit */
if(isset($_REQUEST['contents_video_link']))
{
extract($_REQUEST);
$contents_id = intval($_REQUEST['contents_id']);
$query = "SELECT * FROM ";
$query .= "blog_contents  ";
$query .= "where contents_id=$contents_id ";
$query .= "limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function read_contents_items_preview_link_to_edit()
{
/* Read to Edit */
if(isset($_REQUEST['contents_preview_link']))
{
extract($_REQUEST);
$contents_id = intval($_REQUEST['contents_id']);
$query = "SELECT * FROM ";
$query .= "blog_contents  ";
$query .= "where contents_id=$contents_id ";
$query .= "limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
while($rows = $result->fetch_array())
{
$this->data[]=$rows;
}
return $this->data;
}
}
/*** ***/
public function update_contents_video_link($contents_id, $contents_video_link)
{
$contents_id = intval($contents_id);
$query = "update blog_contents set contents_approved=0, contents_video_link='$contents_video_link' where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
echo $this->ebDone();
}

/*** ***/
public function update_contents_preview_link($contents_id, $contents_preview_link)
{
$contents_id = intval($contents_id);
$query = "update blog_contents set contents_approved=0, contents_preview_link='$contents_preview_link' where contents_id=$contents_id";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
/*** ***/
echo $this->ebDone();
}
/*** ***/
public function blogs_curl()
{
$c = curl_init();
curl_setopt($c, CURLOPT_URL, "http://ebangali.com/out/soft/licensekey.php");
curl_setopt($c, CURLOPT_TIMEOUT, 30);
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$postfileds = 'server='.domain.'&license='.license;
curl_setopt($c, CURLOPT_POSTFIELDS, $postfileds);
$result = curl_exec($c);
if($result == "fail")
{
/*Fake License Do Nothing*/
}	
}
/*** ***/
public function blog_control(){
$this->eb_blog();
$this->blogs_curl();	
}
/*** ***/
private function eb_blog()
{
if(isset($_GET['id']))
{
$contentsid = intval($_GET['id']);
$contentsDetails = $this->item_details_contents($contentsid);
$contentsCategory = $contentsDetails['contents_category'];
$contentsSubCategory = $contentsDetails['contents_sub_category'];
$contentsGroup = $contentsDetails['username_contents'];
if(empty($_SESSION['omrusername'])){$_SESSION['omrusername'] = strtolower($contentsGroup); }
}
/**/
if(isset($_GET['articlewriter'])){
$articlewriter = strval($_GET['articlewriter']);
$contentsDetails = $this->item_details_articlewriter($articlewriter);
$contentsCategory = $contentsDetails['contents_category'];
$contentsSubCategory = $contentsDetails['contents_sub_category'];
$contentsGroup = $contentsDetails['username_contents'];
if(empty($_SESSION['omrusername'])){$_SESSION['omrusername'] = strtolower($contentsGroup); }
}
/* controling cart */
$view = empty($_GET['view']) ? 'index' : $_GET['view'];
$controller = 'shop';
/* switch to which view */
switch ($view){
case "index":
		
break;
/**/
case "category":
	
break;
/**/
case "subcategory":

break;

/**/
case "writer":

break;
/**/
case "details":

break;
/**/
case "solve":

break;
}
include (ebcontents.'/views/layouts/'.$controller.'.php');
}

/*** ***/
public function contents_carousel_all()
{
//$query = "select * from blog_contents where contents_approved=1 GROUP BY blog_contents.contents_category ORDER BY blog_contents.contents_id DESC LIMIT 15";
$query = "select * from blog_contents where contents_approved=1 ORDER BY blog_contents.contents_id DESC LIMIT 15";

$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_video()
{
$query = "select contents_category, contents_sub_category, contents_video_link from blog_contents where contents_approved=1 GROUP BY contents_category ORDER BY contents_id DESC LIMIT 16";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/
public function contentsForeCommerce()
{
$query = "select * from blog_contents where contents_approved=1 ORDER BY contents_id DESC LIMIT 3";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/** **/
public function rightBarAllCategory()
{
$query = "SELECT * FROM blog_contents WHERE contents_approved=1 GROUP BY contents_category ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/** **/
public function rightBarAllCategoryPost($contentsid)
{
$query = "SELECT * FROM blog_contents WHERE contents_approved=1 AND contents_id !=$contentsid  GROUP BY contents_category ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/** **/
public function rightBarAll()
{
$query = "SELECT * FROM blog_contents where contents_approved=1 ORDER BY contents_id DESC LIMIT 9";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

public function contentsLikeAll()
{
$userForBlog = $_SESSION['username'];
$queryLike = "SELECT * FROM blog_contents";
$queryLike .= " JOIN blog_like ON blog_contents.contents_id = blog_like.blogs_id_in_blog_like";
$queryLike .= " JOIN excessusers ON excessusers.username = blog_like.blogs_username";	
$queryLike .= " WHERE blog_contents.contents_approved=1 AND excessusers.username='$userForBlog' ORDER BY blog_contents.contents_id DESC";		 
$result = eBConDb::eBgetInstance()->eBgetConection()->query($queryLike);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/** PAGINATION **/
public function contentsPostAll()
{
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 10; 

$startpoint = ($page * $per_page) - $per_page;
//
$statement = "blog_contents where contents_approved=1 ORDER BY contents_id DESC"; 

$query = "SELECT * FROM {$statement} LIMIT {$startpoint}, {$per_page}";

$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/** PAGINATION **/
public function contentsPagination()
{
$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
if ($page <= 0) $page = 1;

$per_page = 10; 

$startpoint = ($page * $per_page) - $per_page;

$url='?';

$statement = "blog_contents where contents_approved=1 ORDER BY contents_id DESC"; 

$query = "SELECT COUNT(*) as `num` FROM {$statement}";
$row = mysqli_fetch_array(mysqli_query(eBConDb::eBgetInstance()->eBgetConection(),$query));

$total = $row['num'];
$adjacents = "2"; 

$prevlabel = "&lsaquo; Prev";
$nextlabel = "Next &rsaquo;";
$lastlabel = "Last &rsaquo;&rsaquo;";

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;

$prev = $page - 1;
$next = $page + 1;

$lastpage = ceil($total/$per_page);

$lpm1 = $lastpage - 1;

$pagination = "<div class='pager'>";
$pagination .= "<div class='pages'>";
if($lastpage > 1)
{   
$pagination .= "<ul class='pagination'>";
//$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";

if ($page > 1)
$pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";

if ($lastpage < 7 + ($adjacents * 2)){   
for ($counter = 1; $counter <= $lastpage; $counter++){
if ($counter == $page)
$pagination.= "<li class='active'><a>{$counter}</a></li>";
else
$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
}

} elseif($lastpage > 1 + ($adjacents * 2)){

if($page < 1 + ($adjacents * 2)) {

for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
if ($counter == $page)
$pagination.= "<li><a class='current'>{$counter}</a></li>";
else
$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
}
$pagination.= "<li class='dot'>...</li>";
$pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  

} elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
$pagination.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
if ($counter == $page)
$pagination.= "<li><a class='current'>{$counter}</a></li>";
else
$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
}
$pagination.= "<li class='dot'>..</li>";
$pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
$pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      

} else {

$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
$pagination.= "<li class='dot'>..</li>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
if ($counter == $page)
$pagination.= "<li><a class='current'>{$counter}</a></li>";
else
$pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
}
}
}

if ($page < $counter - 1) {
$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
}

$pagination.= "</ul>";
}
$pagination.= "</div>";
$pagination.= "</div>";
return $pagination;
}

/*** ***/
public function contents_list_menue()
{
$query = "select contents_id, contents_og_image_title from blog_contents where contents_approved=1 ORDER BY contents_id DESC LIMIT 16";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_thurmnail_subcategory($contentsCategory,$contentsSubCategory)
{
$query = "select * from blog_contents where contents_approved=1 and contents_category='$contentsCategory' and contents_sub_category='$contentsSubCategory' ORDER BY contents_id DESC";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_thurmnail_category($contentsCategory)
{
$query = "select * from blog_contents where contents_approved=1 and contents_category='$contentsCategory' ORDER BY contents_id DESC";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_thurmnail_group($contentsGroup)
{
$query = "select * from blog_contents where contents_approved=1 and username_contents='$contentsGroup' ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/
public function itemDetailsContents($contentsid)
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if($result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/
public function item_details_contents($contentsid)
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if ($result)
{
while ($row = $result->fetch_array()) 
{
return $row;
}
}
}

/*** ***/
public function item_details_articlewriter($articlewriter)
{
$articlewriter = strval($articlewriter);
$query = "select * from blog_contents where contents_approved=1 and username_contents='$articlewriter'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
if ($result)
{
while ($row = $result->fetch_array()) 
{
return $row;
}
}
}
/*** ***/
public function contents_detail_all_part($contentsid)
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_detail_how_to_do($contentsid)
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_detail_video($contentsid)
{
$contentsid = intval($contentsid);
$query = "select contents_video_link from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result= eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_download($contentsid)
{
$contentsid = intval($contentsid);
$query = "select contents_preview_link, contents_github_link from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}

/*** ***/
public function content_item_details_seo($contentsid)
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 and contents_id=$contentsid";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function content_item_details_seo_last()
{
$contentsid = intval($contentsid);
$query = "select * from blog_contents where contents_approved=1 order by contents_id DESC limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function last_item()
{
$query = "select * from blog_contents where contents_approved=1 ORDER BY contents_id DESC limit 1";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result == 1)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_mrss()
{
$query = "select * from blog_contents where contents_approved=1 ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/*** ***/
public function contents_mrss_video()
{
$query = "select contents_id, contents_category, contents_sub_category, contents_og_image_title, contents_og_image_what_to_do, contents_date, contents_video_link from blog_contents where contents_approved=1 ORDER BY contents_id DESC";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $result->num_rows;
if($num_result)
{
while($rows=$result->fetch_array())
{
$this->data[]=$rows;
}
}
return $this->data;
}
/* End */
}
?>