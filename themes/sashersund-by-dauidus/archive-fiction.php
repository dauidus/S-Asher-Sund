<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' ); 
?>
<?php get_header(); ?>

<section class="main-grid-hp-infscroll">
<?php 
query_posts( array( 'category__and' => array( '19,18,7' ) ) ); 
?>



<div class="secondary-inner-full">
<div class="secondary-page-wrap-full">
<h1><span class="current">Fiction</span></h1>
    <!--share this-->
    <div class="share-this-post">
    <?php include_once get_template_directory() . '/includes/social/share-this.php'; ?>
    </div>
    <!--end share-->
</div>
</div><!--end crumbs-->

<div class="clear"></div>

<div class="main-grid-masonry">
<ul class="home-blog-wraps">

    <div class="masonryme">
        <?php //if custom post portfolio ajax is being used
        include_once get_template_directory() . '/includes/home/pinpost.php'; 
        ?>
    </div>

<?php
while ( have_posts() ) : the_post(); // begin the Loop 
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


</section><!--end shell left-->

</div><!-- end that content id inside header - for homepage only -->
<?php get_footer(); ?>