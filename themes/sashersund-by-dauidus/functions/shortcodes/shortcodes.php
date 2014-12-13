<?php
/******************************************
/* Shortcodes
******************************************/


/*add alert shortcode*/
function alert_box($atts, $content = null) {
   return '<div class="s-alert">' . do_shortcode($content) . '</div>';
}
add_shortcode('alert', 'alert_box');

/*add error shortcode*/
function error_box($atts, $content = null) {
   return '<div class="s-error">' . do_shortcode($content) . '</div>';
}
add_shortcode('error', 'error_box');

/*add success shortcode*/
function success_box($atts, $content = null) {
   return '<div class="s-success">' . do_shortcode($content) . '</div>';
}
add_shortcode('success', 'success_box');

/*add info shortcode*/
function info_box($atts, $content = null) {
   return '<div class="s-info">' . do_shortcode($content) . '</div>';
}
add_shortcode('info', 'info_box');


/* ------- highlights --------*/
function highlight_shortcode( $atts, $content = null )
{
	extract( shortcode_atts(
	array(
      'color' => 'yellow', 'green', 'purple', 'red', 'pink'
      ),
	  $atts ) );

      return '<span class="text-highlight highlight-' . $color . '">' . $content . '</span>';

}
add_shortcode('highlight', 'highlight_shortcode');





/*add button */
function square_button($atts, $content = null) 

{

   return '<span class="button">' . do_shortcode($content) . '</span>';
}
add_shortcode('button', 'square_button');




/*add button */
function square_buttonred($atts, $content = null) 

{

   return '<span class="button-red">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonred', 'square_buttonred');



/*add button */
function square_buttontheme($atts, $content = null) 

{

   return '<span class="button-theme">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttontheme', 'square_buttontheme');







/*add button */
function square_buttonblue($atts, $content = null) 

{

   return '<span class="button-blue">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonblue', 'square_buttonblue');


/*add button */
function square_buttonyellow($atts, $content = null) 

{

   return '<span class="button-yellow">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonyellow', 'square_buttonyellow');



/*add button */
function square_buttonpink($atts, $content = null) 

{

   return '<span class="button-pink">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonpink', 'square_buttonpink');








/*add button */
function square_buttongreen($atts, $content = null) 

{

   return '<span class="button-green">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttongreen', 'square_buttongreen');




/*add button */
function square_buttonteal($atts, $content = null) 

{

   return '<span class="button-teal">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonteal', 'square_buttonteal');





/*add button */
function square_buttonpurple($atts, $content = null) 

{

   return '<span class="button-purple">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonpurple', 'square_buttonpurple');






/*add button */
function square_buttonorange($atts, $content = null) 

{

   return '<span class="button-orange">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonorange', 'square_buttonorange');



/*add button */
function square_buttonblack($atts, $content = null) 

{

   return '<span class="button-black">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttonblack', 'square_buttonblack');


/*add button */
function square_buttongrey($atts, $content = null) 

{

   return '<span class="button-grey">' . do_shortcode($content) . '</span>';
}
add_shortcode('buttongrey', 'square_buttongrey');




























/*add button */
function half_content($atts, $content = null) {
   return '<div class="s-one-half">' . do_shortcode($content) . '</div>';
}
add_shortcode('half', 'half_content');



/*add button */
function third_content($atts, $content = null) {
   return '<div class="s-one-third">' . do_shortcode($content) . '</div>';
}
add_shortcode('third', 'third_content');



/*add button */
function fourth_content($atts, $content = null) {
   return '<div class="s-one-fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('fourth', 'fourth_content');



/*add button */
function fifth_content($atts, $content = null) {
   return '<div class="s-one-fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('fifth', 'fifth_content');



/*add button */
function sixth_content($atts, $content = null) {
   return '<div class="s-one-sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('sixth', 'sixth_content');




/* ------- Break --------*/
function line_break_shortcode() {
   return '<br />';
}

add_shortcode( 'br', 'line_break_shortcode' );



/* ------- clear --------*/
function clear_shortcode() {
   return '<div class="clear"></div>';
}

add_shortcode( 'clear', 'clear_shortcode' );


/*shortcode filters - alow shortcodes in widgets*/
add_filter('the_content', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');
?>