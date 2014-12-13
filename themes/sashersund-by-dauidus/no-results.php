<section class="mainsection">
    <article class="mainarticle">
        <div class="article-wrap">
            <aside class="mainshell-sidebar">
                <div class="inner-grid-center">
                    <div class="inner-grid-shadow">
                        <?php if ( is_sidebar_active('blog_widget_sidebar') ) : ?>
                            <div class="sidebar">
                                <?php dynamic_sidebar('blog_widget_sidebar'); ?>
                            </div><!--end sidebar-->
                        <?php endif; ?>
                    </div>
                </div>
        </aside>
        
        <div class="singlepost-full">
            <div class="inner-grid-center">
                <div class="inner-grid-shadow">
                    <div class="post-text-grip" style="font-size:14px; color:#757575">
                    No relevant posts were found based on the criteria you specified. Please try searching another keyword or phrase.
                    </div>
                </div>
            </div>
        </div>
        
        </div><!--end article wrap-->
    </article>
</section>