<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
$htaccess_out  = "RewriteEngine on\n";
$htaccess_out .= "ErrorDocument 404 /error.php\n";
/*** This will redirece all www.ebangali.com/ to https://ebangali.com/ ***/
/*
$htaccess_out .= "RewriteCond %{HTTPS} on\n";
$htaccess_out .= "RewriteCond %{HTTP_HOST} ^www\.(.*)$ [NC]\n";
$htaccess_out .= "RewriteRule ^(.*)$ https://%1/$1 [R=301,L]\n";
*/
/*** This will redirece all ebangali.com/ to https://www.ebangali.com/ ***/
/*
$htaccess_out .= "RewriteCond %{HTTPS} on\n";
$htaccess_out .= "RewriteCond %{HTTP_HOST} !^www\.(.*)$ [NC]\n";
$htaccess_out .= "RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]\n";
*/
$htaccess_out .= "<IfModule mod_headers.c>\n";
$htaccess_out .= "RewriteCond '%{HTTP:Accept-encoding}' 'gzip'\n";
$htaccess_out .= "RewriteCond '%{REQUEST_FILENAME}\.gz' -s\n";
$htaccess_out .= "RewriteRule '^(.*)\.css' '$1\.css\.gz' [QSA]\n";
$htaccess_out .= "RewriteCond '%{HTTP:Accept-encoding}' 'gzip'\n";
$htaccess_out .= "RewriteCond '%{REQUEST_FILENAME}\.gz' -s\n";
$htaccess_out .= "RewriteRule '^(.*)\.js' '$1\.js\.gz' [QSA]\n";
$htaccess_out .= "RewriteRule '\.css\.gz$' '-' [T=text/css,E=no-gzip:1]\n";
$htaccess_out .= "RewriteRule '\.js\.gz$' '-' [T=text/javascript,E=no-gzip:1]\n";
$htaccess_out .= "<FilesMatch '(\.js\.gz|\.css\.gz)$'>\n";
$htaccess_out .= "Header append Content-Encoding gzip\n";
$htaccess_out .= "Header append Vary Accept-Encoding\n";
$htaccess_out .= "</FilesMatch>\n";
$htaccess_out .= "</IfModule>\n";

$htaccess_out .= "<IfModule mod_expires.c>\n";
$htaccess_out .= "ExpiresActive On\n";
$htaccess_out .= "ExpiresByType image/jpg 'access 1 year'\n";
$htaccess_out .= "ExpiresByType image/jpeg 'access 1 year'\n";
$htaccess_out .= "ExpiresByType image/gif 'access 1 year'\n";
$htaccess_out .= "ExpiresByType image/png 'access 1 year'\n";
$htaccess_out .= "ExpiresByType text/css 'access 1 month'\n";
$htaccess_out .= "ExpiresByType text/html 'access 1 month'\n";
$htaccess_out .= "ExpiresByType application/pdf 'access 1 month'\n";
$htaccess_out .= "ExpiresByType text/x-javascript 'access 1 month'\n";
$htaccess_out .= "ExpiresByType image/x-icon 'access 1 year'\n";
$htaccess_out .= "ExpiresDefault 'access 1 month'\n";
$htaccess_out .= "</IfModule>\n";

$filenamepath =  eb."/.htaccess";
$fp = fopen($filenamepath,'w');
$write = fwrite($fp,$htaccess_out);
?>