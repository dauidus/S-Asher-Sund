<section class="mainsection">


            <div class="loop-wrap-archive">
                <?php // grab crumbs if you want them check admin first
                include_once get_template_directory() . '/includes/blog/crumbs.php'; 
                ?>
            <div class="main-grid-masonry">
                <ul class="home-blog-wraps">
                <?php
                while ( have_posts() ) : the_post();
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
				        the_advanced_excerpt('no_shortcode=0&use_words=1&length=30&exclude_tags=br,p&allowed_tags=iframe'); 
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
				    <?php the_time('F jS') ?>
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
                
                </div><!--ending wrap-->
                </ul>
                
                <?php
// include pagination
if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
                


        </div>
</section>