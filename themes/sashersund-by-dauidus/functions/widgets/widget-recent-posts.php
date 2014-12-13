<?php
/******************************************
/* Recent Posts Widget
******************************************/
class Blogphix_recent_posts extends WP_Widget {
    /** constructor */
    function Blogphix_recent_posts() {
        parent::WP_Widget(false, $name = 'Blogphix - Recent Posts w/ Thumbnails');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $number = apply_filters('widget_title', $instance['number']);
        $offset = apply_filters('widget_title', $instance['offset']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
							<ul class="widget-recent-posts clearfix">
							<?php
								global $post;
								$tmp_post = $post;
								$args = array( 'numberposts' => $number, 'offset'=> $offset );
								$myposts = get_posts( $args );
								$count=0;
								foreach( $myposts as $post ) : setup_postdata($post);
								$count++;
								?>
                               
                                <?php if ( has_post_thumbnail() ) {  ?>
									
                                    
                                   
										
										
                                        
							    <li class="widget_recent_colored">
							    
                                        
                                        
                                        
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('small-thumbnail');?>
                                        </a>

                                       
                                        
                                		<?php echo ( better_excerpt('15','','','plain','no'));  ?>
                                        
                                        <br/>
                                        <a href="<?php the_permalink(); ?>">
                                        read more
                                        </a>

									</li>
                                    
                                    <?php } else { ?>
                                    
							    <li class="widget_recent_colored">
							    
                                        
                                        
                                        
                                        
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('small-thumbnail');?>
                                        </a>

                                        
                                        
                                
                                        
                                		<?php echo ( better_excerpt('15','','','plain','no'));  ?>
										
                                        
                                        <br/>
                                        <a href="<?php the_permalink(); ?>">
                                        read more
                                        </a>
                                      
									</li>
                                    
                                    
                                    
							<?php } ?>
							
								<?php endforeach; ?>
                                
								<?php $post = $tmp_post; ?>
							</ul>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = strip_tags($new_instance['number']);
	$instance['offset'] = strip_tags($new_instance['offset']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        $number = esc_attr($instance['number']);
        $offset = esc_attr($instance['offset']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'text_domain'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number to Show:', 'text_domain'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Offset (the number of posts to skip):', 'text_domain'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" type="text" value="<?php echo $offset; ?>" />
        </p>
        <?php 
    }


} // class Blogphix_recent_posts
// register Recent Posts widget
add_action('widgets_init', create_function('', 'return register_widget("Blogphix_recent_posts");'));	
?>