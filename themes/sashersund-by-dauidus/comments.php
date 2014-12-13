<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!'); if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments', 'Blogphix' ); ?>.</p>
<?php
return; } ?>

<!-- You can start editing here. -->
<div id="comments_wrap" class="startcomments">
<?php if ( have_comments() ) : ?>
<div class="commentcount">
    <span class="commentcount-bg">
        <?php comments_number( 'No Comments On This Topic', '1 Comment On This Topic', '% Comments On This Topic' ); ?>
    </span>
</div><!--end commentcount -->

<ol class="commentlist">
<?php wp_list_comments('callback=better_comments'); ?>
</ol>
<div class="navigation">
    <div class="alignleft"><?php previous_comments_link() ?></div>
    <div class="alignright"><?php next_comments_link() ?></div>
</div>
<br />

<?php else : ?>

<?php if ('open' == $post->comment_status) : ?><!-- If comments are open, but there are no comments. -->

<?php else : ?>
<?php if (!is_page) { ?><!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed', 'Blogphix' ); ?>.</p>
<?php } ?>

<?php endif; ?>
<?php endif; ?>
</div> <!-- end #comments_wrap -->
<?php if ('open' == $post->comment_status) : ?>
<?php comment_form(); ?>
<?php endif; ?>
</div> 