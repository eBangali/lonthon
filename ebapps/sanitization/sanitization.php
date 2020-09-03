<?php 
namespace ebapps\sanitization;
/*****************************************************************************
############################### GNU General Public License ###################
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
#############################################################################
*****************************************************************************/
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;

class formSanitization extends dbconfig
{
public function test_input($data)
{
/* never use this here $data = strip_tags($data, "<ol><li>"); */
$data = trim($data);
$data = htmlspecialchars($data);
$data = json_encode($data);
/* if your use addslashes you have to use stripslashes to print */
$data = addslashes($data);
return $data;
}
/*** ***/
public function validEmail($email)
{
/*** Check the formatting is correct ***/
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
return FALSE;
}
/***  Next check the domain is real. ***/
$eMailDomain = explode("@", $email, 2);
return checkdnsrr($eMailDomain[1]);
}

public function testArea($data)
{
$data = trim($data);
$data = strip_tags($data, "<p><ul><ol><li><strong><b><i><em>");
$data = htmlspecialchars($data);
$data = urlencode($data);
$data = json_encode($data);
/* if your use addslashes you have to use stripslashes to print */
$data = addslashes($data);
return $data;
}

/*** ***/
}
?>
