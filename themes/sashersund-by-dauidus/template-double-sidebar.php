<?php //unused template ?>

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
    include_once get_template_directory() . '/includes/heading-pages-full.php';
} ?>




<aside class="mainshell-sidebar">
<div class="inner-grid-center">
<div class="inner-grid-shadow">


<?php if ( is_sidebar_active('blog_widget_sidebar') ) : ?>
<div class="sidebar">
<?php dynamic_sidebar('blog_widget_sidebar'); ?>
</div><!--end sidebar-->
<?php endif; ?>

</div>
</div>
</aside>




<div class="sidebar-left">
	<div class="inner-grid-center">
		<div class="inner-grid-shadow">

	
            <div class="sidebar-left-info">

                <?php if ( is_sidebar_active('homepage_left_widget_sidebar') ) : ?>
                	<?php dynamic_sidebar('homepage_left_widget_sidebar'); ?>
                <?php endif; ?>
                
                <?php if ( is_sidebar_active('aboutpage_left_widget_sidebar') ) : ?>
                	<?php dynamic_sidebar('aboutpage_left_widget_sidebar'); ?>
                <?php endif; ?>
	           		   
			</div>
		</div>	        
	</div>
</div><!--end sidebar-->


<?php
if (have_posts()) :
    while ( have_posts() ) : the_post();
?>


<!--SINGLE POST START-->
<div class="responsive-double">
<div class="singlepost-double">
<div class="inner-grid-center">
<div class="inner-grid-shadow">






            <div class="post-text-grip">
            <?php the_content(); ?>
            </div>



            <div class="page-guide">
            <?php comments_template(); ?>
            </div>


</div>

<?php endwhile; ?>
<?php endif; ?>


</div>
</div>
</div>

</div><!--end article wrap-->

</article>
</section>
<?php get_footer(); ?>