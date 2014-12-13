<?php /* Template Name: Archive list */ ?>

<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php get_header(); ?>

<section class="mainsection">

<article class="mainarticle">
    <div class="article-wrap">
    
<?php
//disable breadcrumbs if option is checked
if ($options['disable_breadcrumbs'] != true) {
include_once get_template_directory() . '/includes/heading-pages-sidebars.php';
} ?>

    
            <aside class="mainshell-sidebar">
                <div class="inner-grid-center">
                    <div class="inner-grid-shadow">
                    
                    <?php if ( is_sidebar_active('archive_widget_sidebar') ) : ?>
                        <div class="sidebar">
                            <?php dynamic_sidebar('archive_widget_sidebar'); ?>
                        </div><!--end sidebar-->
                    <?php endif; ?>
                    
                    </div>
                </div>
            </aside>


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
                    
                    
                    <div class="post-text-grip-archives">
                        <h2>All current posts on this site:</h2>
                            <ul>
                                <?php wp_get_archives('type=alpha'); ?>
                            </ul>          
                    
                    </div>
        
                    
                    <div class="post-text-grip-archives">
                        <h2>Categories:</h2>
                            <ul>
                                <?php wp_list_categories('orderby=name&show_count=1&title_li='); ?> 
                            </ul>
                    
                    </div>
                    
                    
                    <div class="post-text-grip-archives">
                        <h2>Site pages:</h2>
                            <ul>
                                  <?php wp_list_pages('sort_column=menu_order&title_li='); ?>
                            </ul>          
                    </div>
                
        </div>
    </div>
</div><!--end article wrap-->

<?php endwhile; ?>
<?php endif; ?>


</article>
</section>
<?php get_footer(); ?>