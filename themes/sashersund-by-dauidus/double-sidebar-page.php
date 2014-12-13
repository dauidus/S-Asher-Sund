<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php get_header(); ?>
<section class="mainsection">
    <?php
//disable breadcrumbs if option is checked
if ($options['disable_breadcrumbs'] != true) {
    include_once get_template_directory() . '/includes/heading-pages.php';
} ?>

    <article class="mainarticle">
                <div class="article-wrap">
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

<?php
if (have_posts()) :
    while ( have_posts() ) : the_post();
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post');
//get blog video meta
$blog_video_masonry = get_post_meta($post->ID, 'Blogphix_blog_video_masonry', TRUE);
?>

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

<!--SINGLE POST START-->
<div class="singlepost">
            <div class="inner-grid-center">
                    <div class="inner-grid-shadow">

                    <?php //checking to see if video post field is being used
if($blog_video_masonry !='') {
?>

                    <div class="singleblogimg-masonry-video">
                        <?php echo $blog_video_masonry; ?>
                    </div><!--end single img-->

                    <?php } else { ?>
                    <?php if( has_post_thumbnail() ) {
        //this checks to see if the post has a thumbnail
?>
                    <div class="singleblogimg">
                        <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>"  width="416" height="auto" class="styled-none" />
                    </div><!--end single img-->
                    <?php } ?>
                    <?php } ?>


                    <div class="post-details">
                        <div class="tags-container-cell-first">
                            <span class="tags-span">By</span>
                            <br/>
                            <?php the_author_posts_link(); ?>
                        </div>
                        <div class="tags-container-cell">
                            <span class="tags-span">Date</span>
                            <br/>
                            <?php the_time('M, jS') ?>
                        </div>
                        <div class="tags-container-cell">
                            <span class="tags-span">Category</span>
                            <br/>
                            <?php the_category('<br/>') ?>
                        </div>
                        <div class="tags-container-cell">
                            <span class="tags-span">Tag</span>
                            <br/>
                            <?php the_tags('' ,'<br/>') ?>
                        </div>
                        <div class="tags-container-cell">
                            <span class="tags-span">Comments</span>
                            <br/>
                            <?php comments_popup_link( __( '0 Comments' , 'text_domain'), __( '1 Comment', 'text_domain' ), __( '% Comments', 'text_domain' ) ) ?>
                        </div>
                    </div><!-- end post details -->

                    <div class="post-text-grip">
                    <?php the_content(); ?>
                    </div>

                    <?php   // check if the related posts are disabled
if ($options['disable_related_posts'] != true) {
    include_once get_template_directory() . '/includes/blog/related-posts.php';
} ?>

                    <div class="page-guide">
                    <?php comments_template(); ?>
                    </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div><!--end article wrap-->
    </article>
</section>
<?php get_footer(); ?>