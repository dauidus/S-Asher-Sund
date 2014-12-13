<?php
$category = get_the_category(); //get first current category ID
$this_post = $post->ID; // get ID of current post
$posts = get_posts( array(
	'post_type' => array('poetry','fiction','lyrics','post'),
	'numberposts' => '3',
	'orderby' => 'rand',
	'exclude' => ''. $this_post .''
) );
?>

<?php if($posts) { ?>
<div id="related-posts" class="clearfix">

	<?php if($options['related_posts_tagline'] !='') { ?>
	<div class="relatedpost-wrap">	
		<div class="relatedpost-heading">	
			<?php if($options['related_posts_tagline'] !='') { ?><h2><?php echo ($options['related_posts_tagline']) ?></h2><?php } ?>
		</div><!--end related post heading bg-->
	</div>
	
	<?php } ?>

<?php
foreach($posts as $post) {
?>

<div class="related-pads">
	<?php // check if post has a thumbnail14
	if ( has_post_thumbnail() ) { ?>
	<div class="related-post-image">
	    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"  class="img-styled-opac" width="178" height="80"><?php the_post_thumbnail('related-posts');  ?></a>
	</div>
	
	<?php } else { ?>
	<div class="related-post-image">
		<div class="no_image"></div>
	</div>
	<?php } ?>
	
<div class="related-post-content">
		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		<?php the_title(); ?>
		</a>
		<br/>
		<?php the_time('F j, Y') ?>

	</div>
</div><!--end related wrap--> 

<?php } //end for each ?>

</div><!-- END related-posts -->
<?php } wp_reset_postdata(); ?>
