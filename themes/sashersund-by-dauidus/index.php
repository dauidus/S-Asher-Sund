<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' ); 
?>
<?php get_header(index); ?>
<?php //include homepage masonry infinite scroll page
include_once get_template_directory() . '/includes/blog/blog-masonry.php'; 
?>
</div><!-- end that content id inside header - for homepage only -->
<?php get_footer(index); ?>