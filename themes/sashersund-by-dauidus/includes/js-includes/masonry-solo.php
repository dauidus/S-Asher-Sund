<script> 
jQuery(function($) {
    $(window).load(function() {
        $('.main-grid-masonry').masonry({
            columnWidth: 285,
            isResizable: true,
            itemSelector: 'div.masonryme',
            isAnimated: true,
            isFitWidth: true,
            animationOptions: { //add animations if you want
                duration: 900,
                easing: 'easeInOutExpo'
            }
        });
    });
}); 
</script>

