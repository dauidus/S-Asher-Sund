<?php /* Template Name: Contact Page */ ?>

<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php get_header(); ?>


<section class="mainsection">
<article class="mainarticle">
<div class="article-wrap">


<aside class="mainshell-sidebar">
<div class="inner-grid-center">
<div class="inner-grid-shadow">


<?php if ( is_sidebar_active('contact_widget_sidebar') ) : ?>
<div class="sidebar">
<?php dynamic_sidebar('contact_widget_sidebar'); ?>
</div><!--end sidebar-->
<?php endif; ?>

</div>
</div>
</aside>


<div class="responsive-wrapper">

<?php
//disable breadcrumbs if option is checked
if ($options['disable_breadcrumbs'] != true) {
    include_once get_template_directory() . '/includes/heading-pages-sidebars.php';
} ?>

<?php
if (have_posts()) :
    while ( have_posts() ) : the_post();
?>

<!--SINGLE POST START-->
<div class="singlepost-full">
<div class="inner-grid-center">
<div class="inner-grid-shadow">

            <div class="post-text-grip">
            <?php the_content(); ?>
            </div>

</div>

<?php endwhile; ?>
<?php endif; ?>

</div>
</div>

</div><!--end responsive wrapper-->
</div><!--end article wrap-->
</article>
</section>
<?php get_footer(); ?>