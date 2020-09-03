$(window).on('load', function(){
$('.products-grid').masonry(
{
columnWidth: '.item',
itemSelector: '.item'
}	
);
});