<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<section class="main-grid-hp-infscroll">
<?php 
query_posts( array( 
'post_type' => 'sounds',
'paged'=>$paged
) ); 
?>

<?php if (have_posts()) : ?>

<?php
// get post entry loop
get_template_part( 'loop' , 'masonrysounds'); ?>
<?php endif; ?>

</section><!--end shell left-->