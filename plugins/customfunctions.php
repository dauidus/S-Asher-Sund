<?php
/*
Plugin Name: Dauidus Custom Functions
Description: Custom functions by dauidus.
Version: 1.0
Author: Dave Winter
*/


// custom hacks and mods by dauidus

function remove_first_image ($content) {
if (!is_page() && !is_feed() && !is_feed() && !is_home()) {
$content = preg_replace("/<img[^>]+\>/i", "", $content, 1);
} return $content;
}
add_filter('the_content', 'remove_first_image');

?>