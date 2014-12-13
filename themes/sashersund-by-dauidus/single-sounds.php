<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php get_header(); ?>


<section class="mainsection">


<article class="mainarticle">
<div class="article-wrap">

                    
        <div class="responsive-sidebar-wrapper">
        
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
                    
        </div><!--responsive sidebar wrapper-->


<?php
if (have_posts()) :
while ( have_posts() ) : the_post();
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post', TRUE);
//get blog video meta
$blog_video_masonry = get_post_meta($post->ID, 'Blogphix_blog_video_masonry', TRUE);

?>

<div class="sticky-responsive">

    <div class="sticky-wrap">
    <div class="sticky-sidebar">
    <div class="inner-grid-center">
    
    
        <div class="post-details">
        
                <div class="date-wrapping">
                <span class="large-number-date">
                <?php the_time('M j, Y') ?>
                </span>
                </div>
        
                <!-- <div class="tags-container-cell">
                <span class="tags-span">Author</span>
                <?php the_author_posts_link(); ?>
                </div> -->
        
                <div class="categories-container-cell">
                <span class="tags-span">Posted Under:</span>
                <a href="<?php bloginfo('url'); ?>/sounds">Spoken Word</a>
                </div>
        
                <div class="tags-container-cell">	
                <span class="tags-span">Tags:</span>
                <?php the_tags('') ?>
                </div>
        
                <div class="comments-container-cell">
                <span class="tags-span">Comments:</span>
                To leave a comment, visit my <a href="https://soundcloud.com/s-asher-sund" target="_blank">SoundCloud</a> page.
                </div>
    
        </div><!-- end post details -->   
        
        
    </div>
    </div>
    </div>
</div><!--sticky sidebar wrap-->

<div class="responsive-wrapper">
<?php       
//disable breadcrumbs if option is checked
if ($options['disable_breadcrumbs'] != true) {
include_once get_template_directory() . '/includes/heading-pages.php';
} ?>
<!--SINGLE POST START-->
<div class="singlepost">


<div class="inner-grid-center">
<div class="inner-grid-shadow">

<?php  $image_name = 'feature-image-2';  // checks for available image
if (MultiPostThumbnails::has_post_thumbnail('post', $image_name)) { ?>

    <div class="slider-gallery">
    <ul class="bxslider">
    
    <?php if( has_post_thumbnail() ) {
    //this checks to see if the post has a thumbnail
    ?>
        <li>
        <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>"  width="416px" height="280px" class="styled-none" />
        </li>
    
    <?php } ?>
    
    <?php    
    if (class_exists('MultiPostThumbnails')) {   ?>                  
    <?php  $image_name = 'feature-image-2';  // checks for available image
    if (MultiPostThumbnails::has_post_thumbnail('post', $image_name)) { ?>
    
        <li>
        
        <?php  $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', $image_name, $post->ID );  // use the MultiPostThumbnails to get the image ID
        // Use wp_get_attachment_image instead of standard MultiPostThumbnails to be able to tweak attributes
        $image = wp_get_attachment_image( $image_id, 'single-post', TRUE, $attr );                     
        echo $image;
        }                           
        $i++; ?>
        
        </li>
    <?php   }; // end if MultiPostThumbnails ?>
    
    <?php    
    if (class_exists('MultiPostThumbnails')) {   ?>                  
    <?php  $image_name = 'feature-image-3';  // checks for available image
    if (MultiPostThumbnails::has_post_thumbnail('post', $image_name)) { ?>
    
        <li>
        
        <?php  $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', $image_name, $post->ID );  // use the MultiPostThumbnails to get the image ID
        // Use wp_get_attachment_image instead of standard MultiPostThumbnails to be able to tweak attributes
        $image = wp_get_attachment_image( $image_id, 'single-post', TRUE, $attr );                     
        echo $image;
        }                           
        $i++; ?>
        
        </li>
    
    <?php   }; // end if MultiPostThumbnails ?>
    
    <?php    
    if (class_exists('MultiPostThumbnails')) {   ?>                  
    <?php  $image_name = 'feature-image-4';  // checks for available image
    if (MultiPostThumbnails::has_post_thumbnail('post', $image_name)) { ?>
    
        <li>
        <?php  $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', $image_name, $post->ID );  // use the MultiPostThumbnails to get the image ID
        // Use wp_get_attachment_image instead of standard MultiPostThumbnails to be able to tweak attributes
        $image = wp_get_attachment_image( $image_id, 'single-post', TRUE, $attr );                     
        echo $image;
        }                           
        $i++; ?>
        </li>
        
    <?php   }; // end if MultiPostThumbnails ?>
    
    <?php    
    if (class_exists('MultiPostThumbnails')) {   ?>                  
    <?php  $image_name = 'feature-image-5';  // checks for available image
    if (MultiPostThumbnails::has_post_thumbnail('post', $image_name)) { ?>
    
    <li>
        <?php  $image_id = MultiPostThumbnails::get_post_thumbnail_id( 'post', $image_name, $post->ID );  // use the MultiPostThumbnails to get the image ID
        // Use wp_get_attachment_image instead of standard MultiPostThumbnails to be able to tweak attributes
        $image = wp_get_attachment_image( $image_id, 'single-post', TRUE, $attr );                     
        echo $image;
        }                           
        $i++; ?>
    </li>
    
    <?php   }; // end if MultiPostThumbnails ?>
    </ul>
    </div>
<?php } else {  ?>
    

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
			           		<img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>"  width="416px" height="280px" class="styled-none" />
			</div><!--end single img-->
			
			<?php } ?>
			<?php } ?>
	
			<?php } ?>

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
</div>
</div>

</div><!--responsive wrapper-->





<?php endwhile; ?>
<?php endif; ?>         




</div><!--end article wrap-->
</article>
</section>
<?php get_footer(); ?>




