<?php
namespace ebapps\upload;
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
/*
Use MAX_FILE_SIZE in your form but don't trust it.
Check it again in your application
*/
/* 500 KB expressed = 500000 bytes */
/* 900 KB expressed = 900000 bytes */
/* 1500 KB expressed = 15000000 bytes */
include_once(ebbd.'/dbconfig.php');
use ebapps\dbconnection\dbconfig;
/*** ***/
class uploadimage extends dbconfig
{	
public $max_file_size = 500000;
/*
####### VVI Never use for .php #############
$allowed_mime_types =array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');
$allowed_extensions = array('png', 'gif', 'jpg', 'jpeg');
------------------ or ------------------------
$allowed_mime_types =array('image/jpg', 'image/jpeg');
$allowed_extensions = array('jpg', 'jpeg');
*/
/* public $allowed_mime_types =array('image/png', 'image/gif', 'image/jpg', 'image/jpeg'); */
public $allowed_mime_types = array('image/png', 'image/jpg', 'image/jpeg');
public $allowed_extensions = array('png', 'jpg', 'jpeg');

public $check_is_image = true;
public $check_for_php = true;
/*** ***/
public function file_upload_error($error_integer) 
{
$upload_errors = array(
/* http://php.net/manual/en/features.file-upload.errors.php */
UPLOAD_ERR_OK 			=> "<div class='well'><b>No errors.</b</div>",
UPLOAD_ERR_INI_SIZE  	=> "<div class='well'><b>Larger than filesize.</b></div>",
UPLOAD_ERR_FORM_SIZE 	=> "<div class='well'><b>Larger than MAX FILE SIZE.</b></div>",
UPLOAD_ERR_PARTIAL 		=> "<div class='well'><b>Partial upload.</b></div>",
UPLOAD_ERR_NO_FILE 		=> "<div class='well'><b>No file.</b></div>",
UPLOAD_ERR_NO_TMP_DIR   => "<div class='well'><b>No temporary directory.</b></div>",
UPLOAD_ERR_CANT_WRITE   => "<div class='well'><b>Can't write to disk.</b></div>",
UPLOAD_ERR_EXTENSION 	=> "<div class='well'><b>File upload stopped by extension.</b></div>"
);
return $upload_errors[$error_integer];
}
/*** ***/
public function sanitize_file_name($filename) 
{
$filename = preg_replace("/([^A-Za-z0-9_\-\.]|[\.]{2})/", "", $filename);
$filename = basename($filename);
return $filename;
}
/*** ***/
public function file_permissions($file)
{
$numeric_perms = fileperms($file);
$octal_perms = sprintf('%o', $numeric_perms);
return substr($octal_perms, -4);
}
/*** ***/
public function file_extension($file)
{
$path_parts = pathinfo($file);
return $path_parts['extension'];
}

public function file_contains_php($file) {
$contents = file_get_contents($file);
$position = strpos($contents, '<?php');
return $position !== false;
}
//
public function upload_file($field_name) 
{
global $upload_path, $max_file_size, $allowed_mime_types, $allowed_extensions, $check_is_image, $check_for_php;
if(isset($_FILES[$field_name])) 
{
$uniq_id = uniqid(mt_rand());
$file_name = $this->sanitize_file_name(date('Y-m-d').'-'.$uniq_id.'-'.$_FILES[$field_name]['name']);
$file_extension = $this->file_extension($file_name);
$file_type = $_FILES[$field_name]['type'];
$tmp_file = $_FILES[$field_name]['tmp_name'];
$error = $_FILES[$field_name]['error'];
$file_size = intval($_FILES[$field_name]['size']);
$username = $_SESSION['ebusername'];
$year = date('Y');
$month = date('m');
$day = date('d');
$store_path_a = eb."/ebcontents";
if(!is_dir($store_path_a))
{ 
mkdir($store_path_a,0755);
}
$store_path_b = $store_path_a."/"."uploads";
if(!is_dir($store_path_b))
{ 
mkdir($store_path_b,0755);
}
$store_path_1 = $store_path_b."/".$username;
if(!is_dir($store_path_1))
{ 
mkdir($store_path_1,0755);
}
/**/
$store_path_app = $store_path_1."/"."blog";
if(!is_dir($store_path_app))
{ 
mkdir($store_path_app,0755);
}
/**/
$store_path_2 = $store_path_app."/".$year;
if(!is_dir($store_path_2))
{ 
mkdir($store_path_2,0755);
}
/**/



$store_path_3 = $store_path_2."/".$month;
if(!is_dir($store_path_3))
{ 
mkdir($store_path_3,0755);
}
$store_path_4 = $store_path_3."/".$day;
if(!is_dir($store_path_4))
{ 
mkdir($store_path_4,0755);
}
$upload_path = $store_path_4;
$file_path = $upload_path.'/'. $file_name;
/*** ***/
list($width, $height) = getimagesize($tmp_file);
/*** ***/
if($error > 0) 
{
echo "<div class='well'><b>Error: Other.</b></div>" . $this->file_upload_error($error);
} 
elseif(!is_uploaded_file($tmp_file)) 
{
echo "<div class='well'><b>Error: Does not reference a recently uploaded file.</b></div>";	
} 
elseif($file_size > $this->max_file_size) 
{
echo "<div class='well'><b>Error: File size is too big.</b></div>";
} 
elseif(!in_array($file_type, $this->allowed_mime_types))
{
echo "<div class='well'><b>Error: Not an allowed mime type.</b></div>";
}
elseif(!in_array($file_extension, $this->allowed_extensions))
{
echo "<div class='well'><b>Error: Not an allowed file extension.</b></div>";
}
elseif($check_is_image && (getimagesize($tmp_file) === false))
{
echo "<div class='well'><b>Error: Not a valid image file.</b></div>";
}
elseif($check_for_php && $this->file_contains_php($tmp_file))
{
echo "<div class='well'><b>Error: File contains PHP code.</b></div>";
}
elseif(file_exists($file_path))
{
echo "<div class='well'><b>Error: A file with that name already exists in target location.</b></div>";
}
//
elseif($width !==1024 )
{
echo "<div class='well'><b>Error: Image Width is $width Required Width 1024px.</b></div>";
}
elseif($height !==717)
{
echo "<div class='well'><b>Error: Image Height is $height Required Height 717px.</b></div>";
}
/*** ***/
else 
{
$tmp_filesize = filesize($tmp_file);
if(move_uploaded_file($tmp_file, $file_path)) 
{
if(chmod($file_path, 0644)) 
{
$file_permissions = $this->file_permissions($file_path);
return $file_path;
}
else
{
echo "<div class='well'><b>Error: Execute permissions could not be removed.</b></div>";
}
}

}
}
}
//
public function upload_file_small($field_name)
{
global $upload_path, $max_file_size, $allowed_mime_types, $allowed_extensions, $check_is_image, $check_for_php;
if(isset($_FILES[$field_name])) 
{
$uniq_id = uniqid(mt_rand());
$file_name = $this->sanitize_file_name(date('Y-m-d').'-'.$uniq_id.'-'.$_FILES[$field_name]['name']);
$file_extension = $this->file_extension($file_name);
$file_type = $_FILES[$field_name]['type'];
$tmp_file = $_FILES[$field_name]['tmp_name'];
$error = $_FILES[$field_name]['error'];
$file_size = intval($_FILES[$field_name]['size']);
$username = $_SESSION['ebusername'];
$year = date('Y');
$month = date('m');
$day = date('d');
$store_path_a = eb."/ebcontents";
if(!is_dir($store_path_a))
{ 
mkdir($store_path_a,0755);
}
$store_path_b = $store_path_a."/"."uploads";
if(!is_dir($store_path_b))
{ 
mkdir($store_path_b,0755);
}
$store_path_1 = $store_path_b."/".$username;
if(!is_dir($store_path_1))
{ 
mkdir($store_path_1,0755);
}
/**/
$store_path_app = $store_path_1."/"."blog";
if(!is_dir($store_path_app))
{ 
mkdir($store_path_app,0755);
}
/**/
$store_path_2 = $store_path_app."/".$year;
if(!is_dir($store_path_2))
{ 
mkdir($store_path_2,0755);
}
/**/
$store_path_3 = $store_path_2."/".$month;
if(!is_dir($store_path_3))
{ 
mkdir($store_path_3,0755);
}

$store_path_4 = $store_path_3."/".$day;
if(!is_dir($store_path_4))
{ 
mkdir($store_path_4,0755);
}

$store_path_5 = $store_path_4."/"."small";
if(!is_dir($store_path_5))
{ 
mkdir($store_path_5,0755);
}

$upload_path = $store_path_5;

$file_path_small = $upload_path.'/'. $file_name;
/*** ***/
list($width, $height) = getimagesize($tmp_file);
/*** ***/
if($error > 0) 
{
echo "Error: " . $this->file_upload_error($error);
} 
elseif(!is_uploaded_file($tmp_file)) 
{
echo "<div class='well'><b>Error: Does not reference a recently uploaded file.</b></div>";	
} 
elseif($file_size > $this->max_file_size) 
{
echo "<div class='well'><b>Error: File size is too big.</b></div>";
} 
elseif(!in_array($file_type, $this->allowed_mime_types)) 
{



echo "<div class='well'><b>Error: Not an allowed mime type.</b></div>";
} 
elseif(!in_array($file_extension, $this->allowed_extensions)) 
{
echo "<div class='well'><b>Error: Not an allowed file extension.</b></div>";
} 
elseif($check_is_image && (getimagesize($tmp_file) === false))
{
echo "<div class='well'><b>Error: Not a valid image file.</b></div>";
}
elseif($check_for_php && $this->file_contains_php($tmp_file))
{
echo "<div class='well'><b>Error: File contains PHP code.</b></div>";
}
elseif(file_exists($file_path_small))
{
echo "<div class='well'><b>Error: A file with that name already exists in target location.</b></div>";
}

/*** ***/
else 
{
/* Success!*/
$tmp_filesize = filesize($tmp_file);
$filename = $tmp_file;
$percent = 0.5;
list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height * $percent;
$image_p = imagecreatetruecolor($new_width, $new_height);
/*** ***/
if($file_type=='image/jpeg')
{
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagejpeg($image_p, $file_path_small, 72);
return $file_path_small;
}

if($file_type=='image/png')
{
$image = imagecreatefrompng($filename);
imagecopyresized($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagepng($image_p, $file_path_small, 9);
return $file_path_small; 
}
}
}
}

/*** ***/
}
?>
