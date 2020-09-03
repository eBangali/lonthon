<?php include_once (ebblog.'/blog.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$blogs_comment_details_error = "*";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>
<?php
if (isset($_REQUEST['contents_submit_query']))
{
extract($_REQUEST);

/* Form Key*/
if(isset($_REQUEST["form_key"]))
{
$form_key = preg_replace('#[^a-zA-Z0-9]#i','',$_POST["form_key"]);
if($formKey->read_and_check_formkey($form_key) == true)
{

}
else
{
$formKey_error = "<b class='text-warning'>Sorry the server is currently too busy please try again later.</b>";
$error = 1;
}
}

/* blogs_comment_details */
if (empty($_REQUEST["blogs_comment_details"]))
{
$soft_copy_support_query_error = "Query required";
$error =1;
}
elseif (! preg_match("/^([a-zA-Z0-9\<\,\>\.\?\/\|\'\"\!\@\#\(\)\-\_\=\+\ ]{3,1000})/",$blogs_comment_details))
{
$blogs_comment_details_error = "<b class='text-warning'>Whitespace, single or double quotes, certain special characters are not allowed.</b>";
$error =1;
}
else
{
$blogs_comment_details = $sanitization -> testArea($_POST["blogs_comment_details"]);
}

/* Submition form */
if($error ==0)
{
extract($_REQUEST);
$user = new ebapps\blog\blog();
$user->submit_contents_query_visitor($blogs_id_in_comments,$blogs_comment_details);
}
}
?>
<?php
$obj = new ebapps\blog\blog();
$obj->read_contents_query_to_submit_another_one($contentsid);
if($obj->data > 0)
{
foreach($obj->data as $val)
{
extract($val);
$queryMe ="<form method='post'>"; 
$queryMe .="<fieldset class='group-select'>";
$queryMe .="<legend><b>Query</b></legend>";
$queryMe .="<input type='hidden' name='form_key' value='";
$queryMe .= $formKey->outputKey(); 
$queryMe .="'>";
$queryMe .="$formKey_error"; 
$queryMe .="<input type='hidden' name='blogs_id_in_comments' value='$blogs_id_in_comments' />"; 
$queryMe .="Query Description: $blogs_comment_details_error <textarea class='form-control' name='blogs_comment_details' rows='6' required placeholder='Please use  Google Drive, WeTransfer, Dropbox to link a file. Certain special characters are not allowed.' id='HowToDo'></textarea>";    
$queryMe .="<div class='buttons-set'><button type='submit' name='contents_submit_query' title='Ask' class='button submit'><span> Ask </span> </button></div>"; 
$queryMe .="</fieldset>";
$queryMe .="</form>";
echo $queryMe;  
}
}
?>

