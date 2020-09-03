<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
$htaccess_out  = "RewriteEngine on\n";
$htaccess_out .= "ErrorDocument 404 /error.php\n";
$htaccess_out .= "<IfModule mod_expires.c>\n";
$htaccess_out .= "ExpiresActive On\n";
$htaccess_out .= "ExpiresByType image/jpg 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType image/jpeg 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType image/gif 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType image/png 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType text/css 'access plus 1 year'\n";
$htaccess_out .= "ExpiresByType text/html 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType application/pdf 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType text/x-javascript 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType application/javascript 'access plus 1 week'\n";
$htaccess_out .= "ExpiresByType image/x-icon 'access plus 1 week'\n";
$htaccess_out .= "ExpiresDefault 'access plus 1 week'\n";
$htaccess_out .= "</IfModule>\n";
$filenamepath =  eb."/.htaccess";
$file = fopen($filenamepath,'r');
if ($file === false)
{
// Do Nothing
}
if (fwrite($file, $htaccess_out))
{ 
// Do Nothing      
}
?>