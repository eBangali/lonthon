<?php
namespace ebapps\dbconnection;
/*
-------------------------------------------------------------------- 
The eBangali License, Stable Version 1.00
Copyright(c) 2016 eBangali.com All rights reserved.
-------------------------------------------------------------------- 

Redistribution and use in source and binary forms, with or without
modification, is permitted provided that the following conditions
are met:

1. Redistributions of source code must retain the above copyright
notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in
the documentation and/or other materials provided with the
distribution.

3. The name "eBangali" must not be used to endorse or promote products
derived from this software without prior written permission. For
written permission, please contact eBangali.com.

4. Products derived from this software may not be called "eBangali", nor
may "eBangali" appear in their name, without prior written permission
from eBangali.com.

5. The eBangali Group may publish revised and/or new versions of the
license from time to time. Each version will be given a
distinguishing version number.
Once covered code has been published under a particular version
of the license, you may always continue to use it under the terms
of that version. You may also choose to use such covered code
under the terms of any subsequent version of the license
published by the eBangali Group. No one other than the eBangali Group has
the right to modify the terms applicable to covered code created
under this License.

6. Redistributions of any form whatsoever must retain the following
acknowledgment:

THIS SOFTWARE IS PROVIDED BY THE PHP DEVELOPMENT TEAM "AS IS" AND 
ANY EXPRESSED OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A 
PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE PHP
DEVELOPMENT TEAM OR ITS CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES 
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR 
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,
STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
OF THE POSSIBILITY OF SUCH DAMAGE.

*/
abstract class dbconfig
{
protected $ebmysqli;
/* Single Connection */
private static $_dbinstance;
/*** ***/
public $eBusername;
protected $eBpassword;
protected $activeEmail;
public $fullname;
protected $activeMobile;
protected $membertype;
protected $memberlevel;
protected $addressverified;
public $data;
/* Member level
admin = 13
merchant = 8
premier = 7
plus = 6
basic = 5
intro = 4
manager = 3
salseman = 2
staff = 2
online = 1
blocked = 0
*/
/*DB Connection*/
public function __construct() {
if (!isset(self::$_dbinstance))
{
$this->ebmysqli = new \mysqli(EB_HOSTNAME,EB_DB_USERNAME,EB_DB_PASSWORD,EB_DATABASE);
if(mysqli_connect_errno())
{
die("Connection to ".EB_DATABASE." failed");
exit();
}
$this->businessSetting();
}
}
/*** Magic method clone is empty to prevent duplication of connection ***/
private function __clone() 
{
exit();
}

/*** ***/
private function checkTablesToCreate()
{
include_once(ebbd.'/htaccessGenerator.php');
/* For Bangla
$this->ebmysqli -> query("SET character_set_client = 'utf8mb4', character_set_connection = 'utf8mb4', character_set_database = 'utf8mb4', character_set_results = 'utf8mb4', character_set_server = 'utf8mb4', character_set_system ='utf8', collation_connection ='utf8mb4_unicode_ci', collation_database ='utf8mb4_unicode_ci', collation_server ='utf8mb4_unicode_ci'");
*/
/*** ***/

/* ######## eBangali CMS Default ######## */

$this->ebmysqli->query("CREATE TABLE IF NOT EXISTS `excessusers` (
`userid` int(64) NOT NULL AUTO_INCREMENT,
`username` varchar(160) NOT NULL,
`password` varchar(160) NOT NULL,
`email` varchar(160) NOT NULL,
`hash` varchar(160) NOT NULL,
`active` int(1) NOT NULL DEFAULT '0',
`full_name` varchar(160) NOT NULL,
`mobile` varchar(160) NOT NULL,
`mobilehash` varchar(160) NOT NULL,
`mobileactive` int(1) NOT NULL DEFAULT '0',
`signup_date` varchar(160) NOT NULL,
`account_type` varchar(160) NOT NULL,
`member_level` int(1) NOT NULL,
`position_names` varchar(160) NOT NULL,
`user_ip` varchar(160) NOT NULL,
`address_line_1` varchar(255) NOT NULL,
`address_line_2` varchar(255) NOT NULL,
`city_town` varchar(160) NOT NULL,
`state_province_region` varchar(160) NOT NULL,
`postal_code` varchar(160) NOT NULL,
`country` varchar(160) NOT NULL,
`address_verification_codes` int(24) NOT NULL,
`address_verified` int(1) NOT NULL,
`omrusername` varchar(160) NOT NULL,
`facebook_link` varchar(255) NOT NULL,
`twitter_link` varchar(255) NOT NULL,
`google_plus_link` varchar(255) NOT NULL,
`github_link` varchar(255) NOT NULL,
`linkedin_link` varchar(255) NOT NULL,
`pinterest_link` varchar(255) NOT NULL,
`youtube_link` varchar(255) NOT NULL,
`profile_picture_link` varchar(255) NOT NULL,
`cover_photo_link` varchar(255) NOT NULL,
PRIMARY KEY (`userid`),
UNIQUE KEY `username` (`username`),
UNIQUE KEY `email` (`email`),
UNIQUE KEY `mobile` (`mobile`),
KEY `account_type` (`account_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");

$this->ebmysqli->query("CREATE TABLE IF NOT EXISTS `fromkey` (
`fromkeyid` int(64) NOT NULL AUTO_INCREMENT,  
`requestip` varchar(160) NOT NULL,
`domain` varchar(160) NOT NULL,
`fromkey` varchar(160) NOT NULL,
`fromkeystatus` varchar(2) NOT NULL,
PRIMARY KEY (`fromkeyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");

$this->ebmysqli->query("CREATE TABLE IF NOT EXISTS `excess_admin_business_details` (
`business_details_id` int(64) NOT NULL AUTO_INCREMENT,
`business_username` varchar(160) NOT NULL,
`business_name` varchar(160) NOT NULL,
`business_full_address` varchar(255) NOT NULL,
`business_paypal_id` varchar(160) NOT NULL,
`business_bd_bkash_id` varchar(160) NOT NULL,
`business_geolocation_longitude` varchar(160) NOT NULL,
`business_geolocation_latitude` varchar(160) NOT NULL,
`cash_on_delivery_distance_meter` int(11) NOT NULL,
`business_logo_link` varchar(255) NOT NULL,
`business_cover_photo_link` varchar(255) NOT NULL,
PRIMARY KEY (`business_details_id`),
UNIQUE KEY `business_username` (`business_username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");


$this->ebmysqli->query("CREATE TABLE IF NOT EXISTS `country_and_zone` (
`bay_dhl_country_zone_id` int(11) NOT NULL AUTO_INCREMENT,
`country_name` varchar(160) NOT NULL,
`dhl_country_zone` int(4) NOT NULL,
PRIMARY KEY (`bay_dhl_country_zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");


/* Default DHL shipment ZONE from Bangladesh to WorldWide. If your are using this script out of Bangladesh. Change these from dhl_express_rate_guide_bd_en_2017. Your DHL shipment ZONE is totaly different. */

$this->ebmysqli->query("INSERT INTO `country_and_zone` (`bay_dhl_country_zone_id`, `country_name`, `dhl_country_zone`) VALUES
(1, 'Afghanistan', 8),
(2, 'Albania', 7),
(3, 'Algeria', 8),
(4, 'American Samoa ', 8),
(5, 'Andorra', 7),
(6, 'Angola', 8),
(7, 'Anguilla', 8),
(8, 'Antigua', 8),
(9, 'Argentina', 8),
(10, 'Armenia', 7),
(11, 'Aruba', 8),
(12, 'Australia', 4),
(13, 'Austria', 5),
(14, 'Azerbaijan', 8),
(15, 'Bahamas', 8),
(16, 'Bahrain', 2),
(17, 'Bangladesh', 0),
(18, 'Barbados', 8),
(19, 'Belarus', 7),
(20, 'Belgium', 5),
(21, 'Belize', 8),
(22, 'Benin', 8),
(23, 'Bermuda', 8),
(24, 'Bhutan', 2),
(25, 'Bolivia', 8),
(26, 'Bonaire', 8),
(27, 'Bosnia and Herzegovina', 7),
(28, 'Botswana', 8),
(29, 'Brazil', 8),
(30, 'Brunei', 3),
(31, 'Bulgaria', 5),
(32, 'Burkina Faso', 8),
(33, 'Burundi', 8),
(34, 'Cambodia', 3),
(35, 'Cameroon', 8),
(36, 'Canada', 6),
(37, 'Canary Islands, The', 8),
(38, 'Cape Verde', 8),
(39, 'Cayman Islands', 8),
(40, 'Central African Republic', 8),
(41, 'Chad', 8),
(42, 'Chile', 8),
(43, 'China, People’s Republic', 3),
(44, 'Colombia', 8),
(45, 'Comoros', 8),
(46, 'Congo', 8),
(47, 'Congo, Democratic Rep. of ', 8),
(48, 'Cook Islands', 8),
(49, 'Costa Rica', 8),
(50, 'Cote d’Ivoire', 8),
(51, 'Croatia', 5),
(52, 'Cuba', 8),
(53, 'Curacao', 8),
(54, 'Cyprus', 5),
(55, 'Czech Republic, The', 5),
(56, 'Denmark', 5),
(57, 'Djibouti', 8),
(58, 'Dominica', 8),
(59, 'Dominican Republic', 8),
(60, 'Ecuador', 8),
(61, 'Egypt', 8),
(62, 'El Salvador', 8),
(63, 'Eritrea ', 8),
(64, 'Estonia', 5),
(65, 'Ethiopia', 8),
(66, 'Falkland Islands', 8),
(67, 'Faroe Islands', 7),
(68, 'Fiji', 8),
(69, 'Finland', 5),
(70, 'France', 5),
(71, 'French Guyana', 8),
(72, 'Gabon', 8),
(73, 'Gambia', 8),
(74, 'Georgia', 7),
(75, 'Germany', 5),
(76, 'Ghana', 8),
(77, 'Gibraltar', 7),
(78, 'Greece', 5),
(79, 'Greenland', 7),
(80, 'Grenada', 8),
(81, 'Guadeloupe', 8),
(82, 'Guam', 8),
(83, 'Guatemala', 8),
(84, 'Guernsey', 7),
(85, 'Guinea Republic', 8),
(86, 'Guinea-Bissau', 8),
(87, 'Guinea-Equatorial  Guyana (British)', 8),
(88, 'Haiti', 8),
(89, 'Honduras', 8),
(90, 'Hong Kong', 1),
(91, 'Hungary', 5),
(92, 'Iceland', 7),
(93, 'India', 1),
(94, 'Indonesia', 3),
(95, 'Iran, Islamic Rep. of', 8),
(96, 'Iraq', 8),
(97, 'Ireland, Rep. of', 5),
(98, 'Israel', 7),
(99, 'Italy', 5),
(100, 'Jamaica', 8),
(101, 'Japan', 4),
(102, 'Jersey', 7),
(103, 'Jordan', 2),
(104, 'Kazakhstan', 8),
(105, 'Kenya', 8),
(106, 'Kiribati', 8),
(107, 'Korea, D.P.R. of (North)', 8),
(108, 'Korea, Rep. of (South)', 3),
(109, 'Kosovo', 8),
(110, 'Kuwait', 2),
(111, 'Kyrgyzstan', 8),
(112, 'Lao P.D.R.', 3),
(113, 'Latvia', 5),
(114, 'Lebanon', 8),
(115, 'Lesotho', 8),
(116, 'Liberia', 8),
(117, 'Libya', 8),
(118, 'Liechtenstein', 5),
(119, 'Lithuania', 5),
(120, 'Luxembourg', 5),
(121, 'Macau', 3),
(122, 'Macedonia, Rep. of', 7),
(123, 'Madagascar', 8),
(124, 'Malawi', 8),
(125, 'Malaysia', 3),
(126, 'Maldives', 2),
(127, 'Mali', 8),
(128, 'Malta', 5),
(129, 'Marshall Islands', 8),
(130, 'Martinique', 8),
(131, 'Mauritania', 8),
(132, 'Mauritius', 8),
(133, 'Mayotte', 8),
(134, 'Mexico', 6),
(135, 'Micronesia, Fed. States of', 8),
(136, 'Moldova, Rep. of', 8),
(137, 'Monaco', 5),
(138, 'Mongolia', 3),
(139, 'Montenegro, Rep. of', 8),
(140, 'Montserrat', 8),
(141, 'Morocco', 8),
(142, 'Mozambique', 8),
(143, 'Myanmar', 8),
(144, 'Namibia', 8),
(145, 'Nauru, Rep. of', 8),
(146, 'Nepal', 3),
(147, 'Netherlands, The', 5),
(148, 'Nevis', 8),
(149, 'New Caledonia', 8),
(150, 'New Zealand', 4),
(151, 'Nicaragua', 8),
(152, 'Niger', 8),
(153, 'Nigeria', 8),
(154, 'Niue', 8),
(155, 'Northern Mariana Islands', 8),
(156, 'Norway', 7),
(157, 'Oman', 2),
(158, 'Pakistan', 3),
(159, 'Palau', 8),
(160, 'Panama', 8),
(161, 'Papua New Guinea', 8),
(162, 'Paraguay', 8),
(163, 'Peru', 3),
(164, 'Philippines, The', 5),
(165, 'Poland', 5),

(166, 'Portugal', 8),
(167, 'Puerto Rico', 8),
(168, 'Qatar', 2),
(169, 'Reunion, Island of', 8),
(170, 'Romania', 5),
(171, 'Russian Federation, The', 7),
(172, 'Rwanda', 8),
(173, 'Samoa', 8),
(174, 'San Marino', 8),
(175, 'Sao Tome & Principe', 8),
(176, 'Saudi Arabia', 1),
(177, 'Senegal', 8),
(178, 'Serbia, Rep. of', 8),
(179, 'Seychelles', 8),
(180, 'Sierra Leone', 8),
(181, 'Singapore', 1),
(182, 'Slovakia', 5),
(183, 'Slovenia', 5),
(184, 'Solomon Islands', 8),
(185, 'Somalia', 8),
(186, 'Somaliland, Rep. of (North Somalia)', 8),
(187, 'South Africa', 8),
(188, 'South Sudan', 8),
(189, 'Spain', 5),
(190, 'Sri Lanka', 3),
(191, 'Barthelemy', 8),
(192, 'St. Eustatius', 8),
(193, 'St. Helena', 8),
(194, 'St. Kitts', 8),
(195, 'St. Lucia', 8),
(196, 'St. Maarten', 8),
(197, 'St. Vincent', 8),
(198, 'Sudan', 8),
(199, 'Suriname', 8),
(200, 'Swaziland', 8),
(201, 'Sweden', 5),
(202, 'Switzerland', 5),
(203, 'Syria', 8),

(204, 'Tahiti', 8),
(205, 'Taiwan', 3),
(206, 'Tajikistan', 8),
(207, 'Tanzania', 8),
(208, 'Thailand', 1),
(209, 'Timor-Leste', 8),
(210, 'Togo', 8),
(211, 'Tonga', 8),
(212, 'Trinidad and Tobago', 8),
(213, 'Tunisia', 8),
(214, 'Turkey', 5),
(215, 'Turks and Caicos Islands', 8),
(216, 'Tuvalu', 8),
(217, 'Uganda', 8),
(218, 'Ukraine', 7),
(219, 'United Arab Emirates ', 1),
(220, 'United Kingdom', 5),
(221, 'United States of America', 6),
(222, 'Uruguay', 8),
(223, 'Uzbekistan', 8),
(224, 'Vanuatu', 8),
(225, 'Vatican City ', 8),
(226, 'Venezuela', 8),
(227, 'Vietnam ', 3),
(228, 'Virgin Islands (British)', 8),
(229, 'Virgin Islands (US)', 8),
(230, 'Yemen, Rep. of', 8),
(231, 'Zambia', 8),
(232, 'Zimbabwe', 8)");

/* End of Creating Tables */
}
/*** ***/
protected function ebDone()
{
if(isset($_POST)){ unset($_POST);}
if(isset($_GET)){ unset($_GET);}
return "<pre><b>Done</b></pre>";
}

/*** ***/
protected function ebNotDone()
{
if(isset($_POST)){ unset($_POST);}
if(isset($_GET)){ unset($_GET);}
return "<pre><b>Sorry Not Done</b></pre>";
}

/*** ***/
public function posVisulString($string)
{
// Make alphanumeric (removes all other characters)
$string = preg_replace("/[^a-zA-Z0-9\-\/]/", "", $string);
// Clean up multiple dashes to whitespaces
$string = preg_replace("/[\s-]+/", " ", $string);
return $string;
}

/*** ***/
public function visulString($string)
{
// Make alphanumeric (removes all other characters)
$string = preg_replace("/[^a-zA-Z0-9\-\/]/", "", $string);
// Convert -s to 's
$string = str_replace("-s", "'s", $string);
// Convert Only T' to T-
$string = str_replace("T'", "T-", $string);
// Clean up multiple dashes to whitespaces
$string = preg_replace("/[\s-]+/", " ", $string);
return $string;
}
/*** ***/
public function seoUrl($string)
{
/** Lower case everything ***/
$string = strtolower($string);
/*** Make alphanumeric (removes all other characters) ***/
$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
/*** Clean up multiple dashes or whitespaces ***/
$string = preg_replace("/[\s-]+/", " ", $string);
/*** Convert whitespaces and underscore to dash ***/
$string = preg_replace("/[\s_]/", "-", $string);
return $string;
}

/*** ***/
private function adminSetting()
{
/*** ***/
$queryExcessusers = "SELECT account_type, member_level FROM  excessusers WHERE account_type='admin' AND member_level=13";
$returnExcessuser = $this->ebmysqli->query($queryExcessusers);
$resultCountExcessuser = $returnExcessuser->num_rows;
if($resultCountExcessuser == 0)
{
include_once (ebaccess.'/admin-register.php');
}

}

/*** ***/
private function businessSetting()
{
$this->checkTablesToCreate();
/*** ***/
$queryExcessusers = "SELECT username, active, account_type, member_level FROM  excessusers WHERE account_type='admin' AND member_level=13";
$returnExcessuser = $this->ebmysqli->query($queryExcessusers);
$resultCountExcessuser = $returnExcessuser->num_rows;
$rowExcessuser = mysqli_fetch_array($returnExcessuser);
$adminUser = $rowExcessuser['username'];
$adminEmailVerified = $rowExcessuser['active'];
//
if(empty($adminUser))
{
$this->adminSetting();
}
//
if(isset($adminUser) and $adminEmailVerified ==1)
{
$queryBusiness = "SELECT business_paypal_id FROM  excess_admin_business_details WHERE business_username='$adminUser'";
$returnBusiness = $this->ebmysqli->query($queryBusiness);
$rowBusiness = mysqli_fetch_array($returnBusiness);
$businessPaypal = $rowBusiness['business_paypal_id'];
//
if(empty($businessPaypal))
{
include_once (ebaccess.'/access-admin-merchant-first-time-set-up.php');
}
}
//
$this->isLogin();
}
/** **/
private function isLogin()
{
if(isset($this->eBusername) and isset($this->eBpassword))
{
$check = $this -> ebmysqli -> query("SELECT username, password, active, full_name, mobileactive, account_type, member_level, address_verified FROM excessusers WHERE username='".$this->eBusername."' and password='".$this->eBpassword."'");
$userinfo = mysqli_fetch_array($check);
if ($check -> num_rows == 1)
{
$this->eBusername = $_SESSION['username'] = $userinfo['username'];
$this->eBpassword = $_SESSION['password'] = $userinfo['password'];
$this->activeEmail = $_SESSION['activeEmail'] = $userinfo['active'];
$this->fullname = $_SESSION['fullname'] = $userinfo['full_name'];
$this->activeMobil = $_SESSION['activeMobile'] = $userinfo['mobileactive'];
$this->membertype = $_SESSION['membertype'] = $userinfo['account_type'];
$this->memberlevel = $_SESSION['memberlevel'] = $userinfo['member_level'];
$this->addressverified = $_SESSION['addressverified'] = $userinfo['address_verified'];
}
}
}
/*** ***/
}
?>