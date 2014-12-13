<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );

if($options['home_blog_post_count'] != '') {
$home_blog_post_count = $options['home_blog_post_count'];
} else { $home_blog_post_count = '8'; }

?>

<section class="main-grid-hp-infscroll">
<?php 
query_posts( array( 
'paged'=>$paged,
'posts_per_page' => $home_blog_post_count,
'post_type' => array( 'sounds', 'post' )
) ); 
?>

<?php if (have_posts()) : ?>

<?php
// get post entry loop
get_template_part( 'loop' , 'masonry'); ?>
<?php endif; ?>

</section><!--end shell left-->