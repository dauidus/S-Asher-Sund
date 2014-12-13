<?php if( has_post_thumbnail() ) { 
//this checks to see if the post has a thumbnail
?>
<div class="singleblogimg-masonry">
<a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>">
          <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="260" height="130" class="img-styled-opac" />
</a>
</div><!--end single img-->

<?php } ?>


<div class="heading-blog-grip-masonry">
<h2><span><a href="<?php the_permalink(' ') ?>"<?php post_class(); ?> title="<?php the_title(); ?>"><?php the_title(); ?></a></span></h2>
</div>

<div class="post-text-grip">

<?php if($blog_quote !='') { 
echo $blog_quote;  } else { 
echo ( better_excerpt('35','','','plain','no')); 
} ?> 
