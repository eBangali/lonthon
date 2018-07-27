<?php
$this->ebmysqli->query("INSERT INTO `blog_category` (`contents_category_id`, `contents_category`) VALUES
(1, 'Handbags-and-Accessories'),
(2, 'Jewelry-and-Watches'),
(3, 'Men-s'),
(4, 'Women-s')");

$this->ebmysqli->query("INSERT INTO `blog_sub_category` (`contents_sub_category_id`, `contents_sub_category`, `contents_category_in_blog_sub_category`) VALUES
(1, 'Women-s-Handbags', 'Handbags-and-Accessories'),
(2, 'Fine-Jewelry', 'Jewelry-and-Watches'),
(3, 'Watches', 'Jewelry-and-Watches'),
(4, 'T-shirt', 'Men-s'),
(5, 'Sweaters', 'Men-s'),
(6, 'T-shirt', 'Women-s'),
(7, 'Sweaters', 'Women-s')");
?>