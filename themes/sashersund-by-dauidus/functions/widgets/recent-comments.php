<?php
/******************************************
/* Recent Comments Widget
******************************************/

class Blogphix_comments extends WP_Widget {
    /** constructor */
    function Blogphix_comments() {
        parent::WP_Widget(false, $name = 'Blogphix - Comments');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $number = apply_filters('widget_title', $instance['number']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						<?php recent_comments($number); ?>
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        $number = esc_attr($instance['number']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'text_domain'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number to Show:', 'text_domain'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
        </p>
        <?php 
    }


} // class Blogphix_comments

// recent comments with gravatars
function recent_comments($no_comments = 4, $comment_len = 65) {
	global $wpdb;
	
	if( $no_comments == '' ) { $no_comments = 4; }
	
	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments";
	$comments = $wpdb->get_results($request);
	echo '<ul class="no-bullets">';
	if ($comments) {
	
		foreach ($comments as $comment) {
			ob_start();
			?>	
				<li class="side-comment-wrap clearfix">
					<div class="side-avatar"><?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?></div>
					<a class="author" href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo Blogphix_get_author($comment); ?></a>
					on <a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>"><?php echo get_the_title( $comment->comment_post_ID );?></a> ~
					<span class="side-comment-content"><?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?></span>
				</li>
			<?php
			ob_end_flush();
		}
	} else {
		echo '<li>'.__('No comments', 'banago').'';
	}
	echo '</ul>';
}	

// get author for recent comments
function Blogphix_get_author($comment) {
	$author = "";
	if ( empty($comment->comment_author) )
		$author = __('Anonymous', 'banago');
	else
		$author = $comment->comment_author;
	return $author;
}


// register Recent Comments widget
add_action('widgets_init', create_function('', 'return register_widget("Blogphix_comments");'));
?>