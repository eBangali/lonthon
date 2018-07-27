<?php include_once (ebblog.'/blog.php'); ?>
<?php include_once (ebformkeys.'/valideForm.php'); ?>
<?php $formKey = new ebapps\formkeys\valideForm(); ?>
<?php
/* Initialize valitation */
$error = 0;
$formKey_error = "";
$search_contents_error = "";
?>
<?php
/* Data Sanitization */
include_once(ebsanitization.'/sanitization.php'); 
$sanitization = new ebapps\sanitization\formSanitization();
?>

<?php
if(isset($_REQUEST['submit_search_contents']))
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
$formKey_error = "Sorry the server is currently too busy please try again later.";
$error = 1;
}
}

/* search_contents */
if (empty($_REQUEST["search_contents"]))
{
$search_contents_error = "Keyword required";
$error =1;
} 
/* valitation search_contents  */
elseif (! preg_match("/^([A-Za-z ]+){2,48}$/",$search_contents))
{
$search_contents_error = "Keyword required only letters are allowed";
$error =1;
}
else 
{
$search_contents = $sanitization -> test_input($_POST["search_contents"]);
}
?>
<?php } ?>
<div class='col-lg-7 col-md-5 col-sm-5 col-xs-3 hidden-xs category-search-form'>
<div class='search-box'>
<form id='search_mini_form' method='post'>
<select name='cat' id='cat' class='cate-dropdown hidden-sm hidden-md'>
<option value=''>All Categories</option>
<?php
$category = new ebapps\blog\blog();
$category ->menu_category_contents();
?>
<?php if($category->data >= 1) { ?>
<?php foreach($category->data as $catval): extract($catval); ?>
<?php if (!empty($contents_category)){ ?>
<option value='<?php echo $contents_category; ?>'><?php echo $category->visulString($contents_category); ?></option>
<?php } ?>
<?php endforeach; } ?>
</select>

<!-- Autocomplete End code -->
<input id='search' type='text' name='search_contents' value='' class='searchbox' required />
<input type='hidden' name='form_key' value='<?php echo $formKey->outputKey(); ?>'>
<button type='submit' name='submit_search_contents' title='Search' class='search-btn-bg' id='submit-button'><span>Search</span></button>
</form>
</div>
</div>
<div class='col-lg-3 col-md-4 col-sm-4 col-xs-12 card_wishlist_area'>
<div class='mm-toggle-wrap'>
<div class='mm-toggle'><i class='fa fa-align-justify'></i><span class='mm-label'>Menu</span> </div>
</div>

<!-- mgk wishlist -->
<div class='mgk-wishlist'><a title='My Wishlist' href='<?php echo outContentsLink; ?>/contents/wishlist/'><i class='fa fa-heart'></i><span class='title-wishlist hidden-xs'>Wishlist</span></a></div>
</div>