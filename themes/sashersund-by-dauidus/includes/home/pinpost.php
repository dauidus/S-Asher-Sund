<?php
global $post;
$args = array(
'post_type' =>'hp_highlights',
'numberposts' => -1,
'orderby' => 'ASC'
);
$highlights_posts = get_posts($args);
?>

<?php if($highlights_posts) { ?>
    
<?php foreach($highlights_posts as $post) : setup_postdata($post);
//get highlight URL
$hp_highlights_url = get_post_meta($post->ID, 'Blogphix_hp_highlights_url', TRUE);
//get post thumbnail
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'home-custom-posts');

    ?>
    
<li><!--start of list item-->
<article class="singlepost-masonry">
<div class="post-pads">
    

    <?php if ( has_post_thumbnail() ) { ?>
  
			<div class="singleblogimg-masonry">
			<div class="shadow-imgs">
<a href="<?php if($hp_highlights_url != '') { ?><?php echo $hp_highlights_url; ?><?php } else { ?><?php the_title(); ?><?php } ?>" >
<img src="<?php echo $thumbnail[0]; ?>" alt="" width="225" height="130" class="img-styled-opac"/>
</a>
	        </div>
			</div>
  
        <?php } ?>

        
        <div class="heading-blog-grip-masonry">
                
   	 <h2><span><a href="<?php if($hp_highlights_url != '') { ?><?php echo $hp_highlights_url; ?><?php } else { ?><?php the_title(); ?><?php } ?>" ><?php the_title(' '); ?></a></span></h2>
      
        </div>
   			<div class="date-span-post">
			<?php the_time('F jS, Y') ?>
			</div>

   
<div class="post-text-grip-cp">
        <?php the_content(); ?>
</div>        
        
</div>
</article>
</li>
    <?php endforeach;  ?> 
        
<?php } wp_reset_postdata(); ?>