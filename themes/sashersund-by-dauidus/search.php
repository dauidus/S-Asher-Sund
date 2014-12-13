<?php get_header(); ?>

<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );

if($options['archive_blog_post_count'] != '') {
$archive_blog_post_count = $options['archive_blog_post_count'];
} else { $archive_blog_post_count = '8'; }

query_posts( $query_string . "&posts_per_page=$archive_blog_post_count" );

?>

<section class="main-grid-hp-infscroll">

<?php if (have_posts()) { ?>


<?php
// get post entry loop
get_template_part( 'loop' , 'masonry'); ?>		

<?php } else { 

include_once get_template_directory() . '/no-results.php';

}?>

</section><!--end shell left-->

<?php get_footer(); ?>


