<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php get_header(); ?>


<section class="mainsection">
        <article class="mainarticle">
            <div class="article-wrap">

            <div class="sidebar-left">
                    <div class="inner-grid-center">
                            <div class="inner-grid-shadow">
                                <div class="sidebar-left-info">

                                    <?php if ( is_sidebar_active('blog_left_widget_sidebar') ) : ?>
                                    <?php dynamic_sidebar('blog_left_widget_sidebar'); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                    </div>
            </div><!--end sidebar-->

<?php
//disable breadcrumbs if option is checked
if ($options['disable_breadcrumbs'] != true) {
    include_once get_template_directory() . '/includes/heading-pages.php';
} ?>

            <!--SINGLE POST START-->
            <div class="singlepost-full">
                <div class="inner-grid-center">
                    <div class="inner-grid-shadow">
        
                        <div class="post-text-grip">
                        <?php the_content(); ?>
                        </div>
        
                    </div>
                </div>
            </div>
            
            </div><!--end article wrap-->
        </article>
</section>
<?php get_footer(); ?>