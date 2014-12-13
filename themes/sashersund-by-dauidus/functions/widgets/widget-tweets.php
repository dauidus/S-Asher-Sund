<?php
/******************************************
/* Recent Posts Widget
******************************************/
class Blogphix_latest_tweets extends WP_Widget {
/** constructor */
function Blogphix_latest_tweets() {
parent::WP_Widget(false, $name = 'Blogphix - Latest Tweets');	
}


function form( $instance )
{
$defaults = array( 
'title' => 'Lastest Tweets',
'username' => 'envato',
'limit' => 1
);

$instance = wp_parse_args( (array) $instance, $defaults ); ?>

<p>
<label>
Title:<br />
<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</label>
</p>

<p>
<label>
Twitter username :<br />
<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
</label>
</p>       

<p>
<label>
How many tweets showing?
<select id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>">

<?php for( $i = 1; $i <= 8; $i++ ) : $selected = ( $instance['limit'] == $i ) ? ' selected="selected"' : '' ?>
<option value="<?php echo $i ?>"<?php echo $selected ?>><?php echo $i ?></option>
<?php endfor ?>

</select>
</label>
</p>


<?php
}

function widget( $args, $instance )
{
extract( $args );

$title = apply_filters('widget_title', $instance['title'] );

echo $before_widget;
echo $before_title . $title . $after_title;

echo '<div class="list-tweets' . '-' . $this->number . '"></div>';

$replies = 'true';

		//script
echo "<script type=\"text/javascript\">
jQuery(function($){
$('#" . $this->id_base . '-' . $this->number . ' .list-tweets-' . $this->number . "').tweetable({
listClass: 'tweets-widget-$this->number',
username: '$instance[username]', 
limit: $instance[limit], 
replies: $replies
});
});
</script>";
		
		echo $after_widget;
	}                     

function update( $new_instance, $old_instance ) 
{
$instance = $old_instance;
$instance['title'] = strip_tags( $new_instance['title'] );
$instance['username'] = strip_tags( $new_instance['username'] );
$instance['limit'] = strip_tags( $new_instance['limit'] );
$instance['replies'] = strip_tags( $new_instance['replies'] );

return $instance;
}



} // class Blogphix_latest_tweets
add_action('widgets_init', create_function('', 'return register_widget("Blogphix_latest_tweets");'));	
?>