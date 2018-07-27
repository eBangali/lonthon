<?php
namespace ebapps\login;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;

class themeSet extends dbconfig
{
/*** ***/ 
public function ThemeName($file)
{
$searchfor = 'Theme Name:';
/*** get the file contents, assuming the file to be readable (and exist) ***/  
$contents = file_get_contents($file);
/*** escape special characters in the query ***/
$pattern = preg_quote($searchfor, '/');
/*** finalise the regular expression, matching the whole line ***/
$pattern = "/^.*$pattern.*\$/m";
/*** search, and store all matching occurences in $matches ***/
if(preg_match_all($pattern, $contents, $matches)){
$Name = implode("\n", $matches[0]);
return ltrim(str_replace("Theme Name:","",$Name));
}
}
/*** ***/
public function ThemeURI($file)
{
$searchfor = 'Theme URI:';
/*** get the file contents, assuming the file to be readable (and exist) ***/
$contents = file_get_contents($file);
/*** escape special characters in the query ***/
$pattern = preg_quote($searchfor, '/');
/*** finalise the regular expression, matching the whole line ***/
$pattern = "/^.*$pattern.*\$/m";
/*** search, and store all matching occurences in $matches ***/
if(preg_match_all($pattern, $contents, $matches)){
$url = implode("\n", $matches[0]);
$urlTheme = ltrim(str_replace("Theme URI:","",$url));
return $urlTheme.'screenshot.png';
}
}
/*** ***/
public function ThemeAuthor($file)
{
$searchfor = 'Author:';
/*** get the file contents, assuming the file to be readable (and exist) ***/
$contents = file_get_contents($file);
/*** escape special characters in the query ***/
$pattern = preg_quote($searchfor, '/');
/*** finalise the regular expression, matching the whole line ***/
$pattern = "/^.*$pattern.*\$/m";
/*** search, and store all matching occurences in $matches ***/
if(preg_match_all($pattern, $contents, $matches)){
$Author = implode("\n", $matches[0]);
return ltrim(str_replace("Author:","",$Author));
}
}
/*** ***/
public function ThemeDescription($file)
{
$searchfor = 'Description:';
/*** get the file contents, assuming the file to be readable (and exist) ***/
$contents = file_get_contents($file);
/*** escape special characters in the query ***/
$pattern = preg_quote($searchfor, '/');
/*** finalise the regular expression, matching the whole line ***/
$pattern = "/^.*$pattern.*\$/m";
/*** search, and store all matching occurences in $matches ***/
if(preg_match_all($pattern, $contents, $matches)){
$des = implode("\n", $matches[0]);
return ltrim(str_replace("Description:","",$des));
}
}
/*** ***/
public function ThemeVersion($file)
{
$searchfor = 'Version:';
/*** get the file contents, assuming the file to be readable (and exist) ***/
$contents = file_get_contents($file);
/*** escape special characters in the query ***/
$pattern = preg_quote($searchfor, '/');
/*** finalise the regular expression, matching the whole line ***/
$pattern = "/^.*$pattern.*\$/m";
/*** search, and store all matching occurences in $matches ***/
if(preg_match_all($pattern, $contents, $matches)){
$version = implode("\n", $matches[0]);
return ltrim(str_replace("Version:","",$version));
}
}
/*** ***/
}
?>