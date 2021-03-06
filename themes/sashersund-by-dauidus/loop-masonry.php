<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php
if (is_home()) {
	
} else { 
	// grab crumbs if you want them check admin first
	include_once get_template_directory() . '/includes/blog/crumbs.php'; 
	print '<div class="clear"></div>';
} ?>

<div class="main-grid-masonry">
<ul class="home-blog-wraps">

<?php if (is_home() ) {
	if ( is_sidebar_active('homepage_left_widget_sidebar') ) : ?>
    <div class="masonryme">

        <aside class="homepage-sidebar-left">
            <div class="inner-grid-center">
                <div class="inner-grid-shadow">
                        <div class="sidebar">
                            <?php dynamic_sidebar('homepage_left_widget_sidebar'); ?>
                        </div><!--end sidebar-->
                </div>
            </div>
        </aside>

    </div>
	<?php endif; 
} else {
} ?>




    <div class="masonryme">
        <?php //if custom post portfolio ajax is being used
        include_once get_template_directory() . '/includes/home/pinpost.php'; 
        ?>
    </div>
    
    
    <?php if(is_home() ) { ?>

		<div class="masonryme">
	    	<div class="flexslider">
	    		<?php putRevSlider("homepage") ?>
	    		
		        <!-- BLOGPHIX default slides (custom post type)
		        <?php //if custom post portfolio ajax is being used
		        // include_once get_template_directory() . '/includes/slider-post-format.php'; 
		        ?> -->
		        
	    	</div>
	    </div>
	
	<?php } else {	
	} ?>
    
    

    <?php if ( is_sidebar_active('homepage_right_widget_sidebar') ) : ?>
    <div class="masonryme">

        <aside class="homepage-sidebar-right">
            <div class="inner-grid-center">
                <div class="inner-grid-shadow">
                        <div class="sidebar">
                            <?php dynamic_sidebar('homepage_right_widget_sidebar'); ?>
                        </div><!--end sidebar-->
                </div>
            </div>
        </aside>

    </div>
<?php endif; ?>



<?php
if (have_posts()) :
while (have_posts()) : the_post(); // begin the Loop 
//gather special types for normal posts
$posts = get_posts($args);
//get thumbnail for post
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-masonry');
$thumbnailaside = wp_get_attachment_image_src(get_post_thumbnail_id(), 'aside-post-masonry');
//get blog video meta
$blog_video_masonry = get_post_meta($post->ID, 'Blogphix_blog_video_masonry', TRUE);
//grab blog quotes meta 
$blog_quote = get_post_meta($post->ID, 'Blogphix_blog_quote', TRUE);
$blog_quote_img = get_post_meta($post->ID, 'Blogphix_blog_quote_img', TRUE);
//get thumbnail for gallery posts
$thumbnail_gallery = wp_get_attachment_image_src(get_post_thumbnail_id(), 'gallery-image');
//get full-sized image for gallery posts
$full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
?>

<!-- start of section for each -->
<li id="infiniteme"><div class="masonryme">
<article class="singlepost-masonry">
<div class="post-pads">



<!-- if post format image is used -->

    <?php if ( has_post_thumbnail() ) { 
    
    	if ( $thumbnail[0] == ( get_site_url() . '/wp-content/uploads/2013/11/filler-225x130.jpg' ) ) { ?>
									
			<?php } else { ?>
				
				<div class="singleblogimg-masonry">
			        <div class="shadow-imgs">
			            <a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>">
			                <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="225" height="130" class="img-styled-opac" />
			            </a>
			        </div>
			        
			        
			        <a href="<?php the_permalink(); ?>"<?php post_class(); ?>>				
			            <div class="viewpost-plus"></div>
			        </a>
			
			    </div><!--end single img-->
				
			<?php } ?>

    <div class="heading-blog-grip-masonry">
        <h2><span><a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
    </div>
    
    <div class="date-span-post">
        <?php the_time('F jS, Y') ?>
    </div>
    
    <div class="post-text-grip">
        <?php if($blog_quote !='') { 
        echo $blog_quote;  } else { 
        the_advanced_excerpt('no_shortcode=0&use_words=1&length=30&exclude_tags=br&allowed_tags=iframe'); 
    } ?> 
    
    <div class="category-snip">
        <?php the_category(', '); ?>			
    </div>
</div>

<?php } else { ?>



<!-- if post format standard is used -->

<div class="heading-blog-grip-masonry">
    <h2><span><a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
</div>

<div class="date-span-post">
    <?php the_time('F jS Y') ?>
</div>

<div class="post-text-grip">
    <?php if($blog_quote !='') { 
    echo $blog_quote;  } else { 
    the_advanced_excerpt('no_shortcode=0&use_words=1&length=30&exclude_tags=br,p&allowed_tags=iframe'); 
} ?> 

<div class="category-snip">
    <?php the_category(', '); ?>			
</div>

<?php } ?>


<!-- this sections it off -->
</div>
</article>
</div><!--end masonryme -->
</li>
<?php endwhile; ?>
<?php endif; ?>
<?php  wp_reset_postdata(); ?>
</ul>


</div>

<div class="pagination-wrap">
    <div class="pagination-load-more">
        
        <span class="pagination-span">
        <?php next_posts_link('Scroll for More') ?>
        </span>
        
        <span class="pagination-span-load">
        </span>

        
    </div>
</div>