    jQuery(function($) {
        
	

        
        $(document).ready(function() {
            jQuery(function($) {
                $('.sticky-sidebar, .social-wrapper').sticky({
                    topSpacing: 90,
                    stopper:    ".wraps-footer"
                });
                $('.top-push-index, .top-push').sticky({
                    topSpacing: 10,
                    stopper:    ".wraps-footer"
                });
            });
            jQuery(function($) {
                $(".singleblogimg-masonry-video, .singleblogimg-masonry-video").fitVids();
            });
            jQuery(function($) {
                $('.singleblogimg-masonry-portfolio, .singleblogimg-masonry, .singleblogimg-masonry-aside, .related-post-image').mouseover(function() {
                    $(this).find('.img-styled-opac, .img-lazyload, .attachment-related-posts').stop().animate({
                        opacity: "0.90"
                    }, 200);
                }).mouseout(function() {
                    $(this).find('.img-styled-opac, .img-lazyload, .attachment-related-posts').stop().animate({
                        opacity: "1"
                    }, 200);
                });
            });
            jQuery(function($) {
                            $(window).scroll(function() {
                    if ($(this).scrollTop() != 0) {
                        $('#toTop').fadeIn();
                    } else {
                        $('#toTop').fadeOut();
                    }
                });

                $('#toTop').click(function() {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                });
            });
            jQuery(function($) {
                $('.singleblogimg-masonry-portfolio, .singleblogimg-masonry, .singleblogimg-masonry-aside').mouseover(function() {
                    $(this).find('.prettyphoto-plus').stop(true).delay(350).animate({
                        opacity: "1"
                    }, 500);
                }).mouseout(function() {
                    $(this).find('.prettyphoto-plus').stop(true).animate({
                        opacity: "0.0"
                    }, 200);
                });
            });
            jQuery(function($) {
                $('.singleblogimg-masonry-portfolio, .singleblogimg-masonry, .singleblogimg-masonry-aside').mouseover(function() {
                    $(this).find('.viewpost-plus').stop(true).delay(350).animate({
                        opacity: "1"
                    }, 500);
                }).mouseout(function() {
                    $(this).find('.viewpost-plus').stop(true).animate({
                        opacity: "0.0"
                    }, 200);
                });
            }); /*start of the guts for jquery*/
            jQuery(function($) {
                $(function() {
                    $("select").uniform();
                });
            }); /* being mobile javascript */
                       jQuery(function($) {
                $('.pagination-span a').click(function() {
                    $('.pagination-span-load').fadeIn(200).delay(50).fadeOut(200);
                    });
            }); /*start of the guts for jquery*/
           
            jQuery(function($) {
                $('.sf-menu-primary').mobileMenu({
                    defaultText: "Navigation"
                });
            }); /*ending this js file now */
        });
    });
