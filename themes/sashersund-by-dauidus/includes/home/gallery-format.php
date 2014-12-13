<div class="singleblogimg-masonry-portfolio">

<a href="<?php the_permalink(); ?>"<?php post_class(); ?>><img src="<?php echo $thumbnail_gallery[0]; ?>" alt="<?php the_title(); ?>" width="260" height="320"  class="img-styled-opac"/></a>

</div>

<div class="post-text-grip-portfolio">

<div class="heading-blog-grip-masonry">
<h2><span><a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
</div>


<?php if ($portfolio_description !='') {  ?>
	<?php echo($portfolio_description); ?>
<?php }  ?>
</div>




