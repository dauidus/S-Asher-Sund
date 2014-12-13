<?php
function better_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>" class="commentpost clearfix">
<div class="entire_post_wrap">

<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', 'text_domain') ?></em>
<br />
<?php endif; ?>

<div class="postcontentreply">
    <div class="comment-paragraph-wrap">	
            <div class="wrap-me-comment">
         
            <div class="box_comments_wrap">
                <?php echo get_avatar($comment, $size='48' );  ?>
            </div>                
           
            <span class="says">
                <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
            </span>
            <br />

            <span class="says_date">
                on <?php printf(get_comment_date('M jS')) ?> at <?php printf(get_comment_time()) ?>
            </span>
            
            </div>
            <br />
        
            <span class="comment-text">
                <?php comment_text() ?>
            </span>
        </div>	  
</div><!-- END postcontentreply -->

        <div class="reply_text">
            <?php edit_comment_link(__('(Edit)', 'text_domain'),'  ','')  ?>  
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])))?>&rarr; 
        </div>
</div><!-- END comment -->

</div><!--end entire post wrap--> 
<?php } ?>