<script>
jQuery(function($) {
	$(document).ready(function() {
		$(function() {
			var $container = $('.main-grid-masonry');
			$container.imagesLoaded(function() {
				$container.masonry({
					columnWidth: 285,
					isResizable: true,
					itemSelector: 'div.masonryme',
					isAnimated: true,
					isAnimatedFromBottom: true,
					isFitWidth: true,
					animationOptions: { //add animations if you want
						duration: 750,
						easing: 'easeInOutExpo'
					}
				});
			});
		}); //end function var call
		
		$(function() {
			var $container = $('.main-grid-masonry');
			$container.infinitescroll({
			
				navSelector: '.pagination-wrap',
				// selector for the paged navigation 
				
				nextSelector: '.pagination-load-more a',
				// selector for the NEXT link (to page 2)
				
				itemSelector: '#infiniteme .masonryme',
				// selector for all items you'll retrieve
				
				behavior: 'twitter',
				
				
				loading: {
					finished: undefined,
					finishedMsg: 'Finished',
					img: '<?php echo get_template_directory_uri(); ?>/images/loader.gif', 
					msg: null,
					msgText: '',
					selector: null,
					speed: 'fast',
					start: undefined
					
				}
			}, //end infinite
			// trigger Masonry as a callback

			function(newElements) {
				// hide new items while they are loading
				var $newElems = $(newElements).css({
					opacity: 0
				});
				// ensure that images load before adding to masonry layout
				$newElems.imagesLoaded(function() {
					// show elems now they're ready
					$newElems.animate({
						opacity: 1
					});
					$container.masonry('appended', $newElems, true);
				});
				//start additional callbacks here
				$("a[rel^='prettyPhoto']").prettyPhoto({
					animation_speed: 'normal',
					/* fast/slow/normal */
					slideshow: false,
					/* false OR interval time in ms */
					autoplay_slideshow: false,
					/* true/false */
					opacity: 0.4,
					/* Value between 0 and 1 */
					show_title: false,
					/* true/false */
					allow_resize: true,
					/* Resize the photos bigger than viewport. true/false */
					default_width: 300,
					default_height: 144,
					counter_separator_label: '/',
					/* The separator for the gallery counter 1 "of" 2 */
					theme: 'pp_default',
					/* light_rounded / dark_rounded / light_square / dark_square / facebook */
					hideflash: false,
					/* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
					wmode: 'opaque',
					/* Set the flash wmode attribute */
					autoplay: true,
					/* Automatically start videos: True/False */
					modal: false,
					/* If set to true, only the close button will close the window */
					overlay_gallery: false,
					/* If set to true, a gallery will overlay the fullscreen image on mouse over */
					keyboard_shortcuts: true,
					/* Set to false if you open forms inside prettyPhoto */
					changepicturecallback: function() {},
					/* Called everytime an item is shown/changed */
					callback: function() {} /* Called when prettyPhoto is closed */
				});
				
                $(".singleblogimg-masonry-video, .singleblogimg-masonry-video").fitVids();

				
				
				
				//end prettyphoto call
				$('.prettyphoto-plus, .viewpost-plus').css({
					opacity: "0"
				});
				//end opacity hovers callback
				//start of image hover opacity call
				$('.singleblogimg-masonry-portfolio, .singleblogimg-masonry, .singleblogimg-masonry-aside, .related-post-image').mouseover(function() {
					$(this).find('.img-styled-opac').stop().animate({
						opacity: "0.85"
					}, 200);
				}).mouseout(function() {
					$(this).find('.img-styled-opac').stop().animate({
						opacity: "1"
					}, 200);
				});
				//end of hover opacity on images callback
				//hide div buttons for enlarge and link
				$('.singleblogimg-masonry-portfolio').mouseover(function() {
					$(this).find('.prettyphoto-plus').stop(true).delay(350).animate({
						opacity: "1"
					}, 500);
				}).mouseout(function() {
					$(this).find('.prettyphoto-plus').stop(true).animate({
						opacity: "0.0"
					}, 200);
				});
				$('.singleblogimg-masonry-portfolio').mouseover(function() {
					$(this).find('.viewpost-plus').stop(true).delay(350).animate({
						opacity: "1"
					}, 500);
				}).mouseout(function() {
					$(this).find('.viewpost-plus').stop(true).animate({
						opacity: "0.0"
					}, 200);
				});
				//end of show and hide div link items on hover callback
				//ending of callback
			});
		});
		//close jquery
	});
});

</script>

