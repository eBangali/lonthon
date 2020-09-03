<?php
namespace ebapps\formkeys;
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
include_once(ebbd.'/eBConDb.php');
use ebapps\dbconnection\eBConDb;

class valideForm extends dbconfig
{
private function generateKey()
{
$uniqid = uniqid(mt_rand(), true);
$shah_1 = sha1(salt_1.$uniqid.salt_2);
$shah_2 = sha1($shah_1);
return $shah_2;
}

public function outputKey()
{
$ip = $_SERVER['REMOTE_ADDR'];
$domain = $_SERVER['SERVER_NAME'];
$fromkey = $this->generateKey();


$query = "INSERT INTO fromkey set requestip='$ip', domain='$domain', fromkey='$fromkey', fromkeystatus='NO'";
$result = eBConDb::eBgetInstance()->eBgetConection()->query($query);
return $fromkey;
}

/*** ***/
public function read_and_check_formkey($form_key)
{
$dom = domain;
$query = "SELECT fromkey FROM fromkey where domain='$dom' and fromkey='$form_key' and fromkeystatus='NO'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query);
$num_result = $testresult->num_rows;
if($num_result == 1)
{
$query2nd = "UPDATE fromkey SET fromkeystatus = 'OK' WHERE fromkey = '$form_key'";
$testresult = eBConDb::eBgetInstance()->eBgetConection()->query($query2nd);

$query3 = "DELETE FROM fromkey WHERE fromkey = '$form_key' and fromkeystatus = 'NO'";
$testresult3 = eBConDb::eBgetInstance()->eBgetConection()->query($query3);
return true;
}
}
/*** ***/
}
?>