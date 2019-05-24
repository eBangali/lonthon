<?php
namespace ebapps\dbconnection;
include_once(ebbd.'/eBConDb.php');
use ebapps\dbconnection\eBConDb;

class dbconfig extends eBConDb
{
public $AdminUserIsSet;
public $eBusername;
public $eBpassword;
public $activeEmail;
public $fullname;
public $activeMobile;
public $membertype;
public $memberlevel;
public $addressverified;
public $omrusername;
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
/*** ***/
public function __construct()
{
$this->businessSetting();
}
/*** ***/
private function checkTablesToCreate()
{
include_once(ebbd.'/htaccessGenerator.php');

/* ######## eBangali CMS Default ######## */
eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `excessusers` (
`userid` int(11) NOT NULL AUTO_INCREMENT,
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
`address_verification_codes` int(11) NOT NULL,
`address_verified` int(1) NOT NULL,
`omrusername` varchar(160) NOT NULL,
`branch_name` varchar(160) NOT NULL,
`facebook_link` varchar(255) NOT NULL,
`twitter_link` varchar(255) NOT NULL,
`github_link` varchar(255) NOT NULL,
`linkedin_link` varchar(255) NOT NULL,
`pinterest_link` varchar(255) NOT NULL,
`youtube_link` varchar(255) NOT NULL,
`instagram_link` varchar(255) NOT NULL,
`profile_picture_link` varchar(255) NOT NULL,
`cover_photo_link` varchar(255) NOT NULL,
PRIMARY KEY (`userid`),
UNIQUE KEY `username` (`username`),
UNIQUE KEY `email` (`email`),
UNIQUE KEY `mobile` (`mobile`),
KEY `account_type` (`account_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `userpower` (
`userpowerid` int(11) NOT NULL AUTO_INCREMENT,
`userpower_level_names` varchar(8) NOT NULL,
`userpower_level_power` int(1) NOT NULL,
`userpower_position` varchar(64) NOT NULL,
PRIMARY KEY (`userpowerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");


eBConDb::eBgetInstance()->eBgetConection()->query("INSERT INTO `userpower` (`userpowerid`, `userpower_level_names`, `userpower_level_power`, `userpower_position`) VALUES
(1, 'merchant', 8, 'Senior Project Lead'),
(2, 'merchant', 8, 'Merchant'),
(3, 'premier', 7, 'Premier'),
(4, 'plus', 6, 'Plus'),
(5, 'basic', 5, 'Basic'),
(6, 'intro', 4, 'Intro'),
(7, 'manager', 3, 'Project Lead'),
(8, 'salseman', 2, 'Senior Software Engineer'),
(9, 'salseman', 2, 'Team Lead'),
(10, 'salseman', 2, 'CMO'),
(11, 'salseman', 2, 'CTO'),
(12, 'salseman', 2, 'OMR'),
(13, 'salseman', 2, 'Salseman'),
(14, 'staff', 2, 'Staff'),
(15, 'online', 1, 'Online'),
(16, 'online', 1, 'UI UX Designer'),
(17, 'online', 1, 'Graphic Designer'),
(18, 'blocked', 0, 'Blocked')");

eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `fromkey` (
`fromkeyid` int(11) NOT NULL AUTO_INCREMENT,  
`requestip` varchar(160) NOT NULL,
`domain` varchar(160) NOT NULL,
`fromkey` varchar(160) NOT NULL,
`fromkeystatus` varchar(2) NOT NULL,
PRIMARY KEY (`fromkeyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `excess_admin_business_details` (
`business_details_id` int(11) NOT NULL AUTO_INCREMENT,
`business_username` varchar(160) NOT NULL,
`business_name` varchar(160) NOT NULL,
`business_full_address` varchar(255) NOT NULL,
`business_paypal_id` varchar(160) NOT NULL,
`business_bd_bkash_id` varchar(160) NOT NULL,
`stripe_secret_key` varchar(160) NOT NULL,
`stripe_publishable_key` varchar(160) NOT NULL,
`business_geolocation_longitude` varchar(160) NOT NULL,
`business_geolocation_latitude` varchar(160) NOT NULL,
`cash_on_delivery_distance_meter` int(11) NOT NULL,
`business_logo_link` varchar(255) NOT NULL,
`business_cover_photo_link` varchar(255) NOT NULL,
PRIMARY KEY (`business_details_id`),
UNIQUE KEY `business_username` (`business_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");


eBConDb::eBgetInstance()->eBgetConection()->query("CREATE TABLE IF NOT EXISTS `country_and_zone` (
`bay_dhl_country_zone_id` int(11) NOT NULL AUTO_INCREMENT,
`country_name` varchar(160) NOT NULL,
`dhl_country_zone` int(4) NOT NULL,
`country_code` int(8) NOT NULL,
PRIMARY KEY (`bay_dhl_country_zone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

eBConDb::eBgetInstance()->eBgetConection()->query("INSERT INTO `country_and_zone` (`bay_dhl_country_zone_id`, `country_name`, `dhl_country_zone`, `country_code`) VALUES
(1, 'Afghanistan', 7, 93),
(2, 'Albania', 6, 355),
(3, 'Algeria', 7, 213),
(4, 'American Samoa', 7, 1684),
(5, 'Andorra', 6, 376),
(6, 'Angola', 7, 244),
(7, 'Anguilla', 7, 1264),
(8, 'Antigua', 7, 1268),
(9, 'Argentina', 7, 54),
(10, 'Armenia', 7, 374),
(11, 'Aruba', 7, 297),
(12, 'Australia', 3, 61),
(13, 'Austria', 4, 43),
(14, 'Azerbaijan', 7, 994),
(15, 'Bahamas', 7, 1242),
(16, 'Bahrain', 1, 973),
(17, 'Bangladesh', 0, 880),
(18, 'Barbados', 7, 1246),
(19, 'Belarus', 6, 375),
(20, 'Belgium', 4, 32),
(21, 'Belize', 7, 501),
(22, 'Benin', 7, 229),
(23, 'Bermuda', 7, 1441),
(24, 'Bhutan', 2, 975),
(25, 'Bolivia', 7, 591),
(26, 'Bonaire', 7, 599),
(27, 'Bosnia and Herzegovina', 6, 387),
(28, 'Botswana', 7, 267),
(29, 'Brazil', 7, 55),
(30, 'Brunei', 2, 673),
(31, 'Bulgaria', 4, 359),
(32, 'Burkina Faso', 7, 226),
(33, 'Burundi', 7, 257),
(34, 'Cambodia', 2, 855),
(35, 'Cameroon', 7, 237),
(36, 'Canada', 5, 1),
(37, 'Cape Verde', 7, 238),
(38, 'Cayman Islands', 7, 1345),
(39, 'Central African Republic', 7, 236),
(40, 'Chad', 7, 235),
(41, 'Chile', 2, 56),
(42, 'Colombia', 7, 57),
(43, 'Comoros', 7, 269),
(44, 'Cook Islands', 7, 682),
(45, 'Costa Rica', 7, 506),
(46, 'Cuba', 7, 53),
(47, 'Croatia', 4, 385),
(48, 'Curacao', 7, 599),
(49, 'Cyprus', 4, 357),
(50, 'Czech Republic', 4, 420),
(51, 'Democratic Republic of the Congo', 7, 243),
(52, 'Denmark', 4, 45),
(53, 'Djibouti', 7, 253),
(54, 'Dominica', 7, 17),
(55, 'Dominican Republic', 7, 18),
(56, 'Ecuador', 7, 593),
(57, 'Egypt', 7, 20),
(58, 'El Salvador', 7, 503),
(59, 'Eritrea ', 7, 291),
(60, 'Estonia', 4, 372),
(61, 'Ethiopia', 7, 251),
(62, 'Falkland Islands', 7, 500),
(63, 'Faroe Islands', 6, 298),
(64, 'Fiji', 7, 679),
(65, 'Finland', 4, 358),
(66, 'France', 4, 33),
(67, 'French Polynesia', 7, 689),
(68, 'Gabon', 7, 241),
(69, 'Gambia', 7, 220),
(70, 'Georgia', 6, 995),
(71, 'Germany', 4, 49),
(72, 'Ghana', 7, 233),
(73, 'Gibraltar', 6, 350),
(74, 'Greece', 4, 30),
(75, 'Greenland', 6, 299),
(76, 'Guadeloupe', 7, 590),
(77, 'Guam', 7, 1671),
(78, 'Guatemala', 7, 502),
(79, 'Guernsey', 6, 1481),
(80, 'Guinea Republic', 7, 224),
(81, 'Guinea Bissau', 7, 245),
(82, 'Guinea Ecuatorial', 7, 240),
(83, 'Guyana', 7, 592),
(84, 'Haiti', 7, 509),
(85, 'Honduras', 7, 504),
(86, 'Hong Kong', 1, 852),
(87, 'Hungary', 4, 36),
(88, 'Iceland', 6, 354),
(89, 'India', 1, 91),
(90, 'Indonesia', 2, 62),
(91, 'Iran', 7, 98),
(92, 'Iraq', 7, 964),
(93, 'Ireland', 4, 353),
(94, 'Israel', 6, 972),
(95, 'Italy', 4, 39),
(96, 'Jamaica', 7, 1876),
(97, 'Japan', 3, 81),
(98, 'Jersey', 6, 44),
(99, 'Jordan', 1, 962),
(100, 'Kazakhstan', 7, 7),
(101, 'Kenya', 7, 254),
(102, 'Kiribati', 7, 686),
(103, 'Kosovo', 7, 383),
(104, 'Kuwait', 1, 965),
(105, 'Kyrgyzstan', 7, 996),
(106, 'Laos', 2, 856),
(107, 'Latvia', 4, 371),
(108, 'Lebanon', 7, 961),
(109, 'Lesotho', 7, 266),
(110, 'Liberia', 7, 231),
(111, 'Libya', 7, 218),
(112, 'Liechtenstein', 4, 423),
(113, 'Lithuania', 4, 370),
(114, 'Luxembourg', 4, 352),
(115, 'Macau', 2, 853),
(116, 'Macedonia', 6, 389),
(117, 'Madagascar', 7, 261),
(118, 'Malawi', 7, 265),
(119, 'Malaysia', 2, 60),
(120, 'Maldives', 2, 960),
(121, 'Mali', 7, 223),
(122, 'Malta', 4, 356),
(123, 'Marshall Islands', 7, 692),
(124, 'Martinique', 7, 596),
(125, 'Mauritania', 7, 222),
(126, 'Mauritius', 7, 230),
(127, 'Mayotte', 7, 262),
(128, 'Mexico', 5, 52),
(129, 'Micronesia', 7, 691),
(130, 'Moldova', 7, 373),
(131, 'Monaco', 4, 377),
(132, 'Mongolia', 2, 976),
(133, 'Montenegro', 7, 382),
(134, 'Montserrat', 7, 1664),
(135, 'Morocco', 7, 212),
(136, 'Mozambique', 7, 258),
(137, 'Myanmar', 7, 95),
(138, 'Namibia', 7, 264),
(139, 'Nauru', 7, 674),
(140, 'Nepal', 2, 977),
(141, 'Netherlands Antilles', 7, 599),
(142, 'Netherlands', 4, 31),
(143, 'Nevis', 7, 1869),
(144, 'New Caledonia', 7, 687),
(145, 'New Zealand', 3, 64),
(146, 'Nicaragua', 7, 505),
(147, 'Niger', 7, 227),
(148, 'Nigeria', 7, 234),
(149, 'Niue', 7, 683),
(150, 'North Korea', 7, 850),
(151, 'Norway', 6, 47),
(152, 'Oman', 1, 968),
(153, 'Pakistan', 2, 92),
(154, 'Palau', 7, 680),
(155, 'Panama', 7, 507),
(156, 'Papua New Guinea', 7, 675),
(157, 'Paraguay', 7, 595),
(158, 'Peru', 7, 51),
(159, 'Philippines', 2, 63),
(160, 'Poland', 4, 48),
(161, 'Portugal', 4, 351),
(162, 'Puerto Rico', 4, 1787),
(163, 'Qatar', 1, 974),
(164, 'Reunion', 7, 262),
(165, 'Romania', 4, 40),
(166, 'Russia', 6, 7),
(167, 'Rwanda', 7, 250),
(168, 'Saint Helena', 7, 290),
(169, 'Saipan', 7, 1670),
(170, 'Samoa', 7, 685),
(171, 'San Marino', 7, 378),
(172, 'Sao Tome and Principe', 7, 239),
(173, 'Saudi Arabia', 1, 966),
(174, 'Senegal', 7, 221),
(175, 'Serbia', 7, 381),
(176, 'Seychelles', 7, 248),
(177, 'Sierra Leone', 7, 232),
(178, 'Singapore', 1, 65),
(179, 'Slovakia', 4, 421),
(180, 'Slovenia', 4, 386),
(181, 'Solomon Islands', 7, 677),
(182, 'Somalia', 7, 252),
(183, 'Somaliland,', 7, 252),
(184, 'South Africa', 7, 27),
(185, 'South Korea', 2, 82),
(186, 'South Sudan', 7, 211),
(187, 'Spain', 4, 34),
(188, 'Sri Lanka', 2, 94),
(189, 'Saint Barthelemy', 7, 590),
(190, 'Sint Eustatius', 7, 5993),
(191, 'Saint Kitts', 7, 1869),
(192, 'Saint Lucia', 7, 1758),
(193, 'Sint Maarten', 7, 1721),
(194, 'Saint Vincent', 7, 1784),
(195, 'Sudan', 7, 249),
(196, 'Suriname', 7, 597),
(197, 'Swaziland', 7, 268),
(198, 'Sweden', 4, 46),
(199, 'Switzerland', 4, 41),
(200, 'Syria', 7, 963),
(201, 'Tahiti', 7, 689),
(202, 'Taiwan', 2, 886),
(203, 'Tajikistan', 7, 992),
(204, 'Tanzania', 7, 255),
(205, 'Thailand', 1, 66),
(206, 'Timor leste', 7, 670),
(207, 'Togo', 7, 228),
(208, 'Tonga', 7, 676),
(209, 'Trinidad and Tobago', 7, 1868),
(210, 'Tunisia', 7, 216),
(211, 'Turkey', 4, 90),
(212, 'Turkmenistan', 7, 993),
(213, 'Turks and Caicos Islands', 7, 1649),
(214, 'Tuvalu', 7, 688),
(215, 'Uganda', 7, 256),
(216, 'Ukraine', 6, 380),
(217, 'United Arab Emirates', 1, 971),
(218, 'United Kingdom', 4, 44),
(219, 'United States', 5, 1),
(220, 'Uruguay', 7, 598),
(221, 'Uzbekistan', 7, 998),
(222, 'Vanuatu', 7, 678),
(223, 'Vatican City', 4, 379),
(224, 'Venezuela', 7, 58),
(225, 'Vietnam', 2, 84),
(226, 'Virgin islands UK', 7, 1284),
(227, 'Virgin islands US', 7, 1340),
(228, 'Yemen', 7, 967),
(229, 'Yugoslavia', 7, 38),
(230, 'Zaire', 7, 243),
(231, 'Zambia', 7, 260),
(232, 'Zimbabwe', 7, 263)");

/* End of Creating Tables */
}
/*** ***/
protected function ebDone()
{
return "<pre><b>Done</b></pre>";
}

/*** ***/
protected function ebNotDone()
{
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
private function businessSetting()
{
$this->checkTablesToCreate();
/*** ***/
$queryExcessusers = "SELECT username, active, account_type, member_level FROM  excessusers WHERE account_type='admin' AND member_level=13";
$returnExcessuser = eBConDb::eBgetInstance()->eBgetConection()->query($queryExcessusers);
$resultCountExcessuser = $returnExcessuser->num_rows;
$rowExcessuser = mysqli_fetch_array($returnExcessuser);
$adminUser = $rowExcessuser['username'];
if(!empty($adminUser)){$this->AdminUserIsSet = $adminUser;}
$adminEmailVerified = $rowExcessuser['active'];
//
if(isset($adminUser) and $adminEmailVerified ==1)
{
$queryBusiness = "SELECT business_paypal_id FROM  excess_admin_business_details WHERE business_username='$adminUser'";
$returnBusiness = eBConDb::eBgetInstance()->eBgetConection()->query($queryBusiness);
$rowBusiness = mysqli_fetch_array($returnBusiness);
$businessPaypal = $rowBusiness['business_paypal_id'];
//
if(empty($businessPaypal))
{
include_once (ebaccess.'/access-admin-merchant-first-time-set-up.php');
}
}
//
}

/*** ***/
}
?>