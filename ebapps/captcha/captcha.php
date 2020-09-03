<?php
namespace ebapps\captcha;
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
/*** ***/
class captchaClass extends dbconfig
{
/*** ***/
public function captchaFun()
{
$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = ''; 
for ($i = 0; $i < 5; $i++)
{
$randomString .= $chars[rand(0, strlen($chars)-1)];
}     
$_SESSION['captcha'] = $randomString;	
return $randomString;
}

}

?>