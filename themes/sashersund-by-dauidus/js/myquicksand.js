// JavaScript Document

jQuery(function($){
$(document).ready(function() {
  // get the action filter option item on page load
  var $filterType = $('#filterOptions li.active a').attr('class');

  // get and assign the ourHolder element to the
  // $holder varible for use later
  var $holder = $('ul.ourHolder-full');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();
  
  // attempt to call Quicksand when a filter option
  // item is clicked
  $('#filterOptions li a').click(function(e) {
    // reset the active class on all the buttons
    $('#filterOptions li').removeClass('active');


    // assign the class of the clicked filter option
    // element to our $filterType variable
    var $filterType = $(this).attr('class');
    $(this).parent().addClass('active');
    if ($filterType == 'all') {
      // assign all li items to the $filteredData var when
      // the 'All' filter option is clicked
      var $filteredData = $data.find('li');
    }
    else {
      // find all li elements that have our required $filterType
      // values for the data-type element
      var $filteredData = $data.find('li[data-type=' + $filterType + ']');
    }

    // call quicksand and assign transition parameters
    $holder.quicksand($filteredData, 

	  {
	
    duration: 750,
    easing: 'easeInOutExpo',
	
 		 }, 
 		 
function() { // callback functions here
		 
		 
$(document).ready(function(){
    $.ajaxSetup({cache:false});
    $(".homepage-portfolio-wrapper a").click(function(){
     
	    $("#post").fadeOut(600);
    
        var post_url = $(this).attr("href");
        var post_id = $(this).attr("rel");
       
		
        $("#post").fadeIn(600).load(post_url);
        
		window.location.hash = post_id;

return false;
    });
});



$('.port-img-wrap').mouseover(function(){
    $(this).find('.img-styled-opac-home').stop().animate({opacity: "0.50"}, 200);                  
}).mouseout(function(){
    $(this).find('.img-styled-opac-home').stop().animate({opacity: "1"}, 200);
	});


			
$('.homepage-portfolio-wrapper a').click(function() {
$('body,html').animate({scrollTop:180},200, 'swing');


});	

			 

$('.homepage-portfolio-wrapper a').click(function() {
$('#canvasloader-container').stop(true, true).delay(0).fadeIn(200);
$('#canvasloader-container').delay(2000).fadeOut(200);


});	

	

$('.homepage-portfolio-wrapper a').click(function() { //when we click the portfolio items

        if($('#toggle-slice').hasClass('closed')){ //check for the active class
        
		$('#toggle-slice').removeClass('closed');
        $('#toggle-slice').addClass('open');
        $('#toggle-slice').delay(2000).slideToggle(400, 'easeOutQuart'); //toggle the content div based on class
         
        
        } else  {
        
		$('#toggle-slice').delay(0).slideToggle(200, 'swing');
		$('#toggle-slice').delay(2000).slideToggle(400, 'easeOutQuart'); //toggle the content div based on class
		$('#toggle-slice').removeClass('open');


        }
        
        

});

	
	
	
    return false;
	
  });
  
  
  
  
  
  
  
 
  
});
});
});