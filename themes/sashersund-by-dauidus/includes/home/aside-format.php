<?php if( has_post_thumbnail() ) { 
?>
<div class="singleblogimg-masonry">
<a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>">
          <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="260" height="130" class="img-styled-opac" />
</a>
</div><!--end single img-->

<?php } ?>


