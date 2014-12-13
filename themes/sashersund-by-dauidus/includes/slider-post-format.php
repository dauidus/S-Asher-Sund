<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

<?php
	global $data; //get theme options
	//get custom post type === > Slides
	global $post;
	$args = array(
	'post_type' =>'slides',
	'numberposts' => -1,
	'order' => 'DESC'
	);
	
	$slides = get_posts($args);
?>





<?php if($slides) { ?>

<div class="flexslider">
<ul class="slides">

<?php
	foreach($slides as $post) : setup_postdata($post);
	
	
	//image
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'slider-full', TRUE);
	$slides_description = get_post_meta($post->ID, 'Blogphix_slides_description', TRUE);
	$slides_heading = get_post_meta($post->ID, 'Blogphix_slides_heading', TRUE);
	$slideslink = get_post_meta($post->ID, 'Blogphix_slides_url', TRUE);

?>

<li>

			
			<?php if ( has_post_thumbnail() ) { ?>
						<div class="white-img-bg-slide">
						<?php if(!empty($slideslink)) { ?>
						<a href="<?php echo $slideslink ?>" title="<?php the_title(); ?>" ><img src="<?php echo $featured_image[0]; ?>" width="<?php echo $featured_image[1]; ?>" height="<?php echo $featured_image[2]; ?>" alt=""/></a>
						<?php } else { ?> 
						
						<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" width="<?php echo $featured_image[1]; ?>" height="<?php echo $featured_image[2]; ?>" />
						</div>
			<?php } ?>
			
			
			<?php } ?><!--additional-->
			
			<?php if($slides_description !='') { ?>
				<div class="flex-caption">
					<div class="flex-caption-pads">  
										<p><?php echo $slides_description; ?></p>
						</div>
					</div><!-- /caption -->
			<?php } ?>
							

</li>

<?php  endforeach; ?>
</ul>
</div>

<?php } ?>
