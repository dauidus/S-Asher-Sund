<?php

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'Blogphix_';

$Blogphix_meta_boxes = array();


// meta box ===> Slides
$Blogphix_meta_boxes[] = array(
    'id' => 'slides_meta',
    'title' => __('Slide Options','Blogphix'),
    'pages' => array('slides'),

    'fields' => array(
        array(
            'name' => __('Slide Description','Blogphix'),
            'desc' => __('Enter a description for your slider if you wish to have one. HTML code is allowed here.','Blogphix'),
            'id' => $prefix . 'slides_description',
            'type' => 'textarea',
            'std' => ''
        ),
        array(
            'name' => __('Slide image URL','Blogphix'),
            'desc' => __('Enter a URL here if you wish to have this slide image link to something on the web.','Blogphix'),
            'id' => $prefix . 'slides_url',
            'type' => 'textarea',
            'std' => ''
        ),




    ));

// meta box ==> HP Highlights Description
$Blogphix_meta_boxes[] = array(
    'id' => 'hp_highlights_url',
    'title' => 'Description',
    'pages' => array('hp_highlights'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'URL for title/image',
            'desc' => 'Enter your custom URL since this post type does <em>not</em> create a page inside the loop automatically. (The idea behind this was linking a profile about yourself, a special post or website link you want to share via the homepage front and center for your vistitors).',
            'id' => $prefix . 'hp_highlights_url',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);


// meta box ==> Blog Videos small masonry
$Blogphix_meta_boxes[] = array(
    'id' => 'blog_meta_video_masonry',
    'title' => 'Video embed code',
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Video embed code. (595px minimum requirement).',
            'desc' => 'Enter any YouTube, Vimeo, blip.tv, kickstarter or viddler embed code here. For a nice responsive fit, please use a minimum width of 595px. The theme will take care of the rest for you.',
            'id' => $prefix . 'blog_video_masonry',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);


// meta box ==> Blog Quote post
$Blogphix_meta_boxes[] = array(
    'id' => 'blog_meta_quote',
    'title' => 'Custom excerpt',
    'pages' => array('post'),
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Custom excerpt',
            'desc' => 'This replaces the homepage & blog page standard excerpts when browsing in archives pages as well as your homepage. This is also used to display a mini quote when using the <em>"Quote format"</em> post type.',
            'id' => $prefix . 'blog_quote',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);

/********************* END DEFINITION OF META BOXES ***********************/

/********************* META FOREACH ***********************/
foreach ($Blogphix_meta_boxes as $meta_box) {
    new Blogphix_meta_box($meta_box);
}
/********************* META FOREACH END ***********************/

?>