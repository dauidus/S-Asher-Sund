<?php
//get options
$options = get_option( 'Blogphix_theme_settings' );



remove_all_filters('the_excerpt');


// add post types to subscribe2 plugin
function my_post_types($types) {
    $types[] = 'poetry';
    $types[] = 'fiction';
    $types[] = 'sounds';
    $types[] = 'lyrics';
    $types[] = 'posts';
    return $types;
}
add_filter('s2_post_types', 'my_post_types');



// custom post type icons
pti_set_post_type_icon( 'sounds', 'headphones' );
pti_set_post_type_icon( 'lyrics', 'music' );
pti_set_post_type_icon( 'poetry', 'bookmark' );
pti_set_post_type_icon( 'fiction', 'eye-open' );


// fix soundcloud width craziness
function sashersund_content_width() {
	if ( is_post_type_archive( 'sounds' ) || is_home() || is_archive() || is_search() || is_tag() ) {
		global $content_width;
		$content_width = 225;
	}
	if ( is_singular( 'sounds' ) ) {
		global $content_width;
		$content_width = 225;
	}
}
add_action( 'template_redirect', 'sashersund_content_width' );


function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}


// Add Another theme support
add_theme_support( 'automatic-feed-links');
add_theme_support( 'custom-header');
add_editor_style('custom-editor-style.css');
add_theme_support( 'custom-background');
add_theme_support( 'post-formats', array( 'image' ) );

//require admin pages
require_once ('admin/admin-main.php');

// require main functions
require_once ('functions/pagination.php');
require_once ('functions/better-excerpts.php');
require_once ('functions/better-comments.php');
require_once ('functions/breadcrumbs.php');

// require shortcodes
require_once('functions/shortcodes/shortcodes.php');

// require metaboxes
require_once ('functions/meta/meta-box-class.php');
require_once ('functions/meta/meta-box-usage.php');

// require custom widgets
require_once ('functions/widgets/widget-flickr.php');
require_once ('functions/widgets/widget-tweets.php');
require_once ('functions/widgets/widget-recent-comments.php');
require_once ('functions/widgets/widget-recent-posts.php');



// Load JavaScript files required by ALL pages in theme the correct way for 3.3
function ff_scripts() {

//load jquery library within wordpress
wp_enqueue_script('jquery');

//load all scripts needed by all pages
wp_enqueue_script('twittertweets', get_template_directory_uri() . '/js/twitter-tweets.js', array('jquery'), '1.0', true);
wp_enqueue_script('mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', array('jquery'), '1.0', true);
wp_enqueue_script('uniform', get_template_directory_uri() . '/js/jquery.uniform.min.js', array('jquery'), '1.0', true);
wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing-1.3.pack.js', array('jquery'), '1.3', true);
wp_enqueue_script('superfishmenu', get_template_directory_uri() . '/js/superfishmenu.js', array('jquery'), '1.0', true);
wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/hoverintent.js', array('jquery'), '1.0', true);
wp_enqueue_script('html5modernizr', get_template_directory_uri() . '/js/modernizr-1.7.min.js', array('jquery'), '1.0', false);
wp_enqueue_script('fitvidsresponsive', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true);
wp_enqueue_script('stickysidebar', get_template_directory_uri() . '/js/jquery.jsticky.min.js', array('jquery'), '1.0', true);
wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
wp_enqueue_script('hp-masonry', get_template_directory_uri() . '/includes/js-includes/masonry-infinite-slider.js', array('jquery'), '1.0', false);


wp_enqueue_script('masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array('jquery'), '1.3', true);

//require JS for the homepage
if(is_front_page()) :

wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '3.1', true);
wp_enqueue_script('myprettyPhoto', get_template_directory_uri() . '/js/myprettyphoto.js', array('jquery'), '1.0', true);
wp_enqueue_script('parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array('jquery'), '1.0', false);

//we dont need mymasonry here because we load it seperately for the homepage admin panel features
endif;

if(is_single()) :
wp_enqueue_script('bxsliderresponsive', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0', true);

endif;



if(is_category() || is_archive() || is_tax() || is_search() || is_tag() ) :
wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array('jquery'), '3.1', true);
wp_enqueue_script('myprettyPhoto', get_template_directory_uri() . '/js/myprettyphoto.js', array('jquery'), '1.0', true);

endif;//end archive call



//grab specifics based on admin options panel

if(is_front_page() ) :

if($options['home_blog_post_count'] != '-1') {

} else {
//if -1 IS in the option
wp_enqueue_script('hp-masonry', get_template_directory_uri() . '/includes/js-includes/masonry-solo-slider.js', array('jquery'), '1.0', true);

} endif; //end if  



if(is_category() || is_archive() || is_tax() || is_search() || is_tag() ) :
wp_enqueue_script('archive-masonry', get_template_directory_uri() . '/includes/js-includes/masonry-solo.js', array('jquery'), '1.0', true);

endif; 



if(is_single()) : 
wp_enqueue_script('slider-posts', get_template_directory_uri() . '/includes/js-includes/gallery-slider.js', array('jquery'), '1.0', true);

endif;




}//end all jQuery calls for each page as they load

add_action('wp_enqueue_scripts', 'ff_scripts');
//end loading jquery for all theme functions





// Dummy up theme support.
//add_theme_support( 'post-thumbnails' );

// Add the posts and pages columns filter. They can both use the same function.
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'tcb_add_post_thumbnail_column', 5);

// Add the column
function tcb_add_post_thumbnail_column($cols){
$cols['tcb_post_thumb'] = __('Featured', 'text_domain');
return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);
add_action('manage_pages_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id){
switch($col){
case 'tcb_post_thumb':
if( function_exists('the_post_thumbnail') )
echo the_post_thumbnail( 'admin-list-thumb' );
else
echo 'Not supported in theme';
break;
}
}


// Support for Thumbnails and post types //
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
//size of image for admin preview thumbs
add_image_size( 'admin-list-thumb', 100, 300, false );
//image sizes and thumbnails
add_image_size( 'full-size',  9999, 9999, true );
// add_image_size( 'small-thumbnail',  48, 48, true ); //widget area thumbs
// add_image_size( 'large-size-thumbnail',  225, 120, true ); //widget area thumbs
// add_image_size( 'widget-thumbnail', 100, 64, true );
// add_image_size( 'recent-work-small', 115, 100, true ); //more portfolio images carousel on details page
// add_image_size( 'recent-work', 225, 130, true );
// add_image_size( 'gallery-image', 225, 280, true );
add_image_size( 'blog_thumb',  225, 130, true );
// add_image_size( 'author-image', 300, 9999, true ); //author image post template
add_image_size( 'single-post', 275, 280, true ); //single blog post images and video
// add_image_size( 'single-post-large', 275, 280, true ); //single blog post images and video
// add_image_size( 'single-archive',510, 220, true ); //single blog post archives
add_image_size( 'single-post-masonry', 225, 130, true ); //single blog post masonry
// add_image_size( 'aside-post-masonry', 225, 225, true ); //single blog post masonry
add_image_size( 'related-posts', 178, 80, true );
// add_image_size( 'large', 960, 9999, true );


}//end thumbnail support



// Define additional featured images
require_once('functions/multi-post-thumbnails.php'); // more featured images per post. Gallery format purposes & more control

/*
if (class_exists('MultiPostThumbnails')) {
new MultiPostThumbnails(array(
'label' => 'Second Gallery Image',
'id' => 'feature-image-2',
'post_type' => 'post'
)
);
new MultiPostThumbnails(array(
'label' => 'Third Gallery Image',
'id' => 'feature-image-3',
'post_type' => 'post'
)
);
new MultiPostThumbnails(array(
'label' => 'Fourth Gallery Image',
'id' => 'feature-image-4',
'post_type' => 'post'
)
);
new MultiPostThumbnails(array(
'label' => 'Fifth Gallery Image',
'id' => 'feature-image-5',
'post_type' => 'post'
)
);

};
*/

//custom excerpt length
function new_excerpt_length($length) { return 190; }
add_filter('excerpt_length', 'new_excerpt_length');

//Support for WordPress 3.0's custom menus //
add_action( 'init', 'register_my_menus' );

//Register area for custom menu //
function register_my_menus() {
register_nav_menus(
array(
'primary-menu' => __( 'Primary Menu', 'text_domain' ),
)
);
}

// menu fallback
function primary_menu() {
require_once get_template_directory() . '/includes/primary-menu.php';
}



//add custom post types
/*
add_action( 'init', 'create_post_types' );

function create_post_types() {


// Define Post Type For Homepage Highlights
register_post_type( 'hp_highlights',
array(
'labels' => array(
'name' => _x( 'Custom Post', 'post type general name' , 'text_domain'), // Tip: _x('') is used for localization
'singular_name' => _x( 'HP Highlight', 'post type singular name' , 'text_domain'),
'add_new' => _x( 'Add New', 'HP Highlight' , 'text_domain'),
'add_new_item' => __( 'Add New HP Highlight' , 'text_domain'),
'edit_item' => __( 'Edit HP Highlight' , 'text_domain'),
'new_item' => __( 'New HP Highlight' , 'text_domain'),
'view_item' => __( 'View HP Highlight', 'text_domain' ),
'search_items' => __( 'Search HP Highlights' , 'text_domain'),
'not_found' =>  __( 'No HP Highlights found' , 'text_domain'),
'not_found_in_trash' => __( 'No HP Highlights found in Trash' , 'text_domain'),
'parent_item_colon' => ''
),

'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'query_var' => true,
'exclude_from_search' => true,
'show_in_nav_menus' => false,
'supports' => array('title','thumbnail','editor'),
'rewrite' => true,
'capability_type' => 'post',
'hierarchical' => false,
'menu_icon' => get_template_directory_uri() .'/admin/images/icon-custompost.png',
'menu_position' => null,
));

//slider post type
register_post_type( 'Slides',
array(
'labels' => array(
'name' => __( 'Homepage Slider', 'Blogphix' ),
'singular_name' => __( 'Slides', 'Blogphix' ),
'add_new' => _x( 'Add New', 'Slides', 'Blogphix' ),
'add_new_item' => __( 'Add New Slides', 'Blogphix' ),
'edit_item' => __( 'Edit Slides', 'Blogphix' ),
'new_item' => __( 'New Slides', 'Blogphix' ),
'view_item' => __( 'View Slides', 'Blogphix' ),
'search_items' => __( 'Search Slides', 'Blogphix' ),
'not_found' =>  __( 'No Slides found', 'Blogphix' ),
'not_found_in_trash' => __( 'No Slides found in Trash', 'Blogphix' ),
'parent_item_colon' => ''

),
'public' => true,
'exclude_from_search' => true,
'supports' => array('title','thumbnail'),
'query_var' => true,
'menu_icon' => get_template_directory_uri() .'/admin/images/icon-pictures.png',
'rewrite' => array( 'slug' => 'slides' )));

}
*/



// Register Widgets
if ( function_exists('register_sidebar') ) {

// Home Sidebar left side
register_sidebar(array(
'name' => 'Homepage (left) Widget',
'id' => 'homepage_left_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar-left">',
'after_title' => '</h4>',
));


// About Page Sidebar Left Side
register_sidebar(array(
'name' => 'About Page (left) Widget',
'id' => 'aboutpage_left_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar-left">',
'after_title' => '</h4>',
));


// Blog Sidebar
register_sidebar(array(
'name' => 'Blog (right) Widget Sidebar',
'id' => 'blog_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar">',
'after_title' => '</h4>',
));


// Blog Sidebar left side
register_sidebar(array(
'name' => 'Blog (left) Widget Sidebar',
'id' => 'blog_left_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar-left">',
'after_title' => '</h4>',
));


// Footer Area 1
register_sidebar(array(
'name' => 'First Widget Footer',
'id' => 'first_widget_footer',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h6 class="widget-title-footer">',
'after_title' => '</h6>',
));

// Footer Area 2
register_sidebar(array(
'name' => 'Second Widget Footer',
'id' => 'second_widget_footer',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h6 class="widget-title-footer">',
'after_title' => '</h6>',
));

// Footer Area 3
register_sidebar(array(
'name' => 'Third Widget Footer',
'id' => 'third_widget_footer',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h6 class="widget-title-footer">',
'after_title' => '</h6>',
));



// Footer Area 4
register_sidebar(array(
'name' => 'Fourth Widget Footer',
'id' => 'fourth_widget_footer',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h6 class="widget-title-footer">',
'after_title' => '</h6>',
));



// Archive Sidebar
register_sidebar(array(
'name' => 'Archive page Widget Sidebar',
'id' => 'archive_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar">',
'after_title' => '</h4>',
));

// Contact Sidebar
register_sidebar(array(
'name' => 'Contact page Widget Sidebar',
'id' => 'contact_widget_sidebar',
'before_widget' => '<div id="%1$s" class="widget-container %2$s ">',
'after_widget' => "</div>",
'before_title' => '<h4 class="widget-title-sidebar">',
'after_title' => '</h4>',
));



} // end theme_widgets_init

// get scripts
if ( !is_admin() ) {
add_action('wp_enqueue_scripts','Blogphix_scripts_function');
function Blogphix_scripts_function() {

//get options outside of function
global $options;
}}



// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){ global $wp_registered_sidebars; $widgetcolums = wp_get_sidebars_widgets();
if ($widgetcolums[$index]) return true;
return false; }

// set number of posts per page for taxonomy pages
$option_posts_per_page = get_option( 'posts_per_page' ); add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() { add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}

function my_option_posts_per_page( $value ) {
global $option_posts_per_page;
//get options outside of function
global $options;

//get posts per page option from admin
if($options['portfolio_posts_per_page'] != '') {
$portfolio_posts_per_page = $options['portfolio_posts_per_page'];
} else { $portfolio_posts_per_page = '-1'; }

if ( is_tax() ) {
return $portfolio_posts_per_page;
} else {
return $option_posts_per_page;
}
}

// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) { $wp_rewrite->flush_rules();
}

// end of functions & ending code now
?>