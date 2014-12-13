jQuery(function($) {
    $('.main-grid-masonry').masonry({
        columnWidth: 285,
        isResizable: true,
        itemSelector: 'div.masonryme',
        isAnimated: true,
        isAnimatedFromBottom: true,
        isFitWidth: true,
        animationOptions: { //add animations if you want
            duration: 900,
            easing: 'easeInOutExpo'
        }
    });
});
