<?php
namespace ebapps\upload;
/************************************************************
#############################################################
################## eBangali.com Apps ########################
#############################################################
*************************************************************/
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
public $allowed_mime_types =array('image/jpg', 'image/jpeg');
public $allowed_extensions = array('jpg', 'jpeg');

public $check_is_image = true;
public $check_for_php = true;
/*** ***/
public function file_upload_error($error_integer) 
{
$upload_errors = array(
/* http://php.net/manual/en/features.file-upload.errors.php */
UPLOAD_ERR_OK 			=> "<pre>No errors.</pre>",
UPLOAD_ERR_INI_SIZE  	=> "<pre>Larger than upload_max_filesize.</pre>",
UPLOAD_ERR_FORM_SIZE 	=> "<pre>Larger than form MAX_FILE_SIZE.</pre>",
UPLOAD_ERR_PARTIAL 		=> "<pre>Partial upload.</pre>",
UPLOAD_ERR_NO_FILE 		=> "<pre>No file.</pre>",
UPLOAD_ERR_NO_TMP_DIR   => "<pre>No temporary directory.</pre>",
UPLOAD_ERR_CANT_WRITE   => "<pre>Can't write to disk.</pre>",
UPLOAD_ERR_EXTENSION 	=> "<pre>File upload stopped by extension.</pre>"
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
$username = $_SESSION['username'];
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
$store_path_app = $store_path_1."/"."lonthon";
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
echo "<pre>Error: Does not reference a recently uploaded file.</pre>";	
} 
elseif($file_size > $this->max_file_size) 
{
echo "<pre>Error: File size is too big.</pre>";
} 
elseif(!in_array($file_type, $this->allowed_mime_types)) 
{
echo "<pre>Error: Not an allowed mime type.</pre>";
} 
elseif(!in_array($file_extension, $this->allowed_extensions)) 
{
echo "<pre>Error: Not an allowed file extension.</pre>";
} 
elseif($check_is_image && (getimagesize($tmp_file) === false))
{
echo "<pre>Error: Not a valid image file.</pre>";
}
elseif($check_for_php && $this->file_contains_php($tmp_file))
{
echo "<pre>Error: File contains PHP code.</pre>";
}
elseif(file_exists($file_path_small))
{
echo "<pre>Error: A file with that name already exists in target location.</pre>";
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
$username = $_SESSION['username'];
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
$store_path_app = $store_path_1."/"."lonthon";
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
echo "Error: " . $this->file_upload_error($error);
} 
elseif(!is_uploaded_file($tmp_file)) 
{
echo "<pre>Error: Does not reference a recently uploaded file.</pre>";	
} 
elseif($file_size > $this->max_file_size) 
{
echo "<pre>Error: File size is too big.</pre>";
} 
elseif(!in_array($file_type, $this->allowed_mime_types))
{
echo "<pre>Error: Not an allowed mime type.</pre>";
}
elseif(!in_array($file_extension, $this->allowed_extensions))
{
echo "<pre>Error: Not an allowed file extension.</pre>";
}
elseif($check_is_image && (getimagesize($tmp_file) === false))
{
echo "<pre>Error: Not a valid image file.</pre>";
}
elseif($check_for_php && $this->file_contains_php($tmp_file))
{
echo "<pre>Error: File contains PHP code.</pre>";
}
elseif(file_exists($file_path))
{
echo "<pre>Error: A file with that name already exists in target location.</pre>";
}
//
elseif($width !==1366 )
{
echo "<pre>Error: Image Width is $width Required Width 1366px.</pre>";
}
elseif($height !==956)
{
echo "<pre>Error: Image Height is $height Required Height 956px.</pre>";
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
echo "<pre>Error: Execute permissions could not be removed.</pre>";
}
}

}
}
}
/*** ***/
}
?>
