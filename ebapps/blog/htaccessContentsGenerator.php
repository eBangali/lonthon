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
$htaccess_out .= "# Rewrite for contents.php?view=category&id=1\n";
$htaccess_out .= "RewriteRule ^contents/([0-9a-zA-Z_-]+)/([0-9]+)/$ ./contents.php?view=$1&id=$2 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=wishlist\n";
$htaccess_out .= "RewriteRule ^contents/([0-9a-zA-Z_-]+)/$ ./contents.php?view=$1 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=solve&id=1&title=how-to-remove-background-of-an-image-using-clipping-path-in-photoshop\n";
$htaccess_out .= "RewriteRule ^contents/([0-9a-zA-Z_-]+)/([0-9]+)/([0-9a-zA-Z_-]+)/$ ./contents.php?view=$1&id=$2&title=$3 [NC,L]\n";
$htaccess_out .= "\n";
$htaccess_out .= "# Rewrite for contents.php?view=details&id=1&category=clipping-path&subcategory=simple-clipping-path\n";
$htaccess_out .= "RewriteRule ^contents/([0-9a-zA-Z_-]+)/([0-9]+)/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$ ./contents.php?view=$1&id=$2&category=$3&subcategory=$4 [NC,L]\n";
$filenamepath =  ebcontents."/.htaccess";
$fp = fopen($filenamepath,'w');
$write = fwrite($fp,$htaccess_out);
?>