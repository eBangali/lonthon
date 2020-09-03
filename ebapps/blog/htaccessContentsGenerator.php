<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php
$htaccess_out  = "# NC makes the rule non case sensitive\n";
$htaccess_out .= "# L makes this the last rule that this specific condition will match\n";
$htaccess_out .= "# $ in the regular expression makes the matching stop so that 'customblah' will not work\n";
$htaccess_out .= "\n";
$htaccess_out .= "Options +FollowSymlinks\n";
$htaccess_out .= "RewriteEngine On\n";
$htaccess_out .= "Options -MultiViews\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php\n";
$htaccess_out .= "RewriteRule ^contents/$ ./contents.php [L,NC]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/$ ./contents.php?view=$1 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/$ ./contents.php?view=$1&id=$2 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123&title=abc-Abc\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/([0-9a-zA-Z-]+)/$ ./contents.php?view=$1&id=$2&title=$3 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123&category=abc-Abc-123&subcategory=abc-Abc-123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/$ ./contents.php?view=$1&id=$2&category=$3&subcategory=$4 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123&category=abc-Abc-123&subcategory=abc-Abc-123&omr=abc-123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/([0-9a-z-]+)/$ ./contents.php?view=$1&id=$2&category=$3&subcategory=$4&omr=$5 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123&category=abc-Abc-123&subcategoryone=abc-Abc-123&subcategortwo=abc-Abc-123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/$ ./contents.php?view=$1&id=$2&category=$3&subcategoryone=$4&subcategortwo=$5 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&username_contents=abc-Abc-123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9a-zA-Z-]+)/$ ./contents.php?view=$1&username_contents=$2 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=abc-Abc&id=123&category=abc-Abc-123&subcategoryone=abc-Abc-123&subcategortwo=abc-Abc-123&subcategorythree=abc-Abc-123\n";
$htaccess_out .= "RewriteRule ^contents/([a-zA-Z-]+)/([0-9]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/([0-9a-zA-Z-]+)/$ ./contents.php?view=$1&id=$2&category=$3&subcategoryone=$4&subcategortwo=$5&subcategorythree=$6 [NC,L]\n";
$htaccess_out .= "\n";

$filenamepath =  ebcontents."/.htaccess";
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