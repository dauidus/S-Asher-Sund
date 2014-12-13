





<li><!--start of list item-->
<article class="singlepost-masonry">
<div class="post-pads">

<?php //checking to see if video post field is being used
if($blog_video_masonry !='') {
?>
  <div class="singleblogimg-masonry">
      <?php echo $blog_video_masonry; ?>
  </div><!--end single img-->
<?php } else { ?>

<?php if( has_post_thumbnail() ) {
//this checks to see if the post has a thumbnail
?>
<div class="singleblogimg-masonry">
<a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>">
          <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="260" height="130" class="img-styled-opac" />
</a>
</div><!--end single img-->
<?php } ?>
<?php } ?>
<?php if($blog_quote_img !='') { ?>
<div class="post-text-grip-quote">
<?php echo $blog_quote_img;  ?>
</div>

<?php } else { ?>
<div class="heading-blog-grip-masonry">
<h2><span><a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
</div>

<div class="post-text-grip">
<?php if($blog_quote !='') { 
echo $blog_quote;  } else { 
echo ( better_excerpt('16','','','plain','no')); 
} ?> 
</div>
<?php	} ?>


</article>

</li>
<?php  wp_reset_postdata(); ?>