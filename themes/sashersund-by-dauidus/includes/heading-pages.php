<div class="secondary-inner">
<div class="secondary-page-wrap">
        <?php $post = $posts[0]; ?>
        <?php if (is_category()) { ?>
        <h1><span><?php _e('Archive for', 'text_domain'); ?> '<?php echo single_cat_title(); ?>'</span></h1>
        <?php } elseif (is_day()) { ?>
        <h1><span><?php _e('Archive for' , 'text_domain'); ?> <?php the_time('F jS, Y'); ?></span></h1>
        <?php } elseif (is_month()) { ?>
        <h1><span><?php _e('Archive for' , 'text_domain'); ?> <?php the_time('F, Y'); ?></span></h1>
        <?php } elseif (is_year()) { ?>
        <h1><span><?php _e('Archive for the year' , 'text_domain'); ?> <?php the_time('Y'); ?></span></h1>
        <?php } elseif (is_author()) { ?>
        <?php if(isset($_GET['author_name'])) : $curauth = get_user_by('slug', $author_name);else : $curauth = get_userdata(intval($author)); endif; ?>
        <h1><span><?php _e('Posts By', 'text_domain'); ?> <?php echo $curauth->nickname; ?></span></h1>
        <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h1><span>Archives</span></h1>
        <?php } elseif (is_tag()) { ?>
        <h1><span><?php _e('Tag Archives:', 'text_domain' ); ?> <?php echo single_tag_title('', true); ?></span></h1>
        <?php } elseif (is_404()) { ?>
        <h1><span>404 Error</span></h1>
        <?php } elseif (is_tax()) { ?>
        <h1><span><?php single_cat_title(); ?></span></h1>
        <?php } elseif (is_search()) { ?>
        <h1><span><?php _e('Search Results', 'text_domain'); ?></span></h1>
        <?php } else { ?>
        <h1><span><?php the_title(); ?></span></h1>
        <?php } ?>

    <!--share this-->
    <div class="share-this-post">
    <?php include_once get_template_directory() . '/includes/social/share-this.php'; ?>
    </div>
    <!--end share-->
</div>
</div><!--wrap-->