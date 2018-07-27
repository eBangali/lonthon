<?php
$this->ebmysqli->query("INSERT INTO `blog_category` (`contents_category_id`, `contents_category`) VALUES
(1, 'Multipurpose-Blog'),
(2, 'Portfolio-Website'),
(3, 'eCommerce-Website')");

$this->ebmysqli->query("INSERT INTO `blog_sub_category` (`contents_sub_category_id`, `contents_sub_category`, `contents_category_in_blog_sub_category`) VALUES
(1, 'Lonthon', 'Multipurpose-Blog'),
(2, 'Zamzam', 'Portfolio-Website'),
(3, 'Digonto', 'Portfolio-Website'),
(4, 'Osman', 'eCommerce-Website'),
(5, 'Afrin', 'eCommerce-Website')");
?>