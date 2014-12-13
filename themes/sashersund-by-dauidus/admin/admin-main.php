<?php
 function Blogphix_settings_init(){ register_setting( 'Blogphix_settings', 'Blogphix_theme_settings' ); } function Blogphix_scripts() { wp_enqueue_script('jquery'); wp_enqueue_script( 'media-upload '); wp_enqueue_script( 'thickbox' ); wp_enqueue_script( 'theme-admin', get_template_directory_uri()."/admin/js/admin.js", false, "1.0"); wp_enqueue_script( 'bbq', get_template_directory_uri(). '/admin/js/jquery.ba-bbq.min.js'); wp_enqueue_script( 'mfields-colorpicker', get_template_directory_uri(). '/admin/color-picker/colorpicker.js', array( 'jquery' ), true ); wp_enqueue_script( 'jqueryforms', get_template_directory_uri(). '/admin/js/jquery.uniform.min.js', array( 'jquery' ), true ); } function Blogphix_style() { wp_enqueue_style('thickbox'); wp_enqueue_style('admin-style', get_template_directory_uri('stylesheet_directory') . '/admin/admin-style.css' ); wp_enqueue_style('mfields-colorpicker', get_template_directory_uri('stylesheet_directory') . '/admin/color-picker/colorpicker.css' ); } function Blogphix_echo_scripts() { ?>

<!-- JS For Media Uploader -->
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){
// Media Uploader
window.formfield = '';

jQuery('.upload_image_button').live('click', function() {
window.formfield = jQuery('.upload_field',jQuery(this).parent());
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
return false;
});

window.original_send_to_editor = window.send_to_editor;
window.send_to_editor = function(html) {
if (window.formfield) {
imgurl = jQuery('img',html).attr('src');
window.formfield.val(imgurl);
tb_remove();
}
else {
window.original_send_to_editor(html);
}
window.formfield = '';
window.imagefield = false;
}

});
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#saveme").click(function(){
jQuery(".submit_save_icon").fadeIn();
window.setTimeout(function(){
$(".submit_save_icon").fadeOut();
}, 100);
});
});
</script>
<?php
} if (isset($_GET['page']) && $_GET['page'] == 'Blogphix-settings') { add_action('admin_print_scripts', 'Blogphix_scripts'); add_action('admin_print_styles', 'Blogphix_style'); add_action('admin_head', 'Blogphix_echo_scripts'); } function Blogphix_add_settings_page() { add_theme_page( __( 'Blogphix', 'text_domain' ), __( 'Theme Options' , 'text_domain'), 'manage_options', 'Blogphix-settings', 'Blogphix_theme_settings_page' ); } add_action( 'admin_init', 'Blogphix_settings_init' ); add_action( 'admin_menu', 'Blogphix_add_settings_page' ); $slide_type = array ("slide", "fade"); $slider_arrows = array("show", "none"); $slide_animation = array ("vertical" , "horizontal"); $slider_hover = array("true", "false"); $nav_shadow = array("default", "none"); $slider_easing = array('default', "jswing", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInSince", "easeOutSine", "easeInOutSine", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBack", "easeOutBack", "easeInOutBack", "easeInBounce", "easeOutBounce", "easeInOutBounce"); $fonts = array('default','Arial','Georgia','Lucida Sans Unicode','Times New Roman','Verdana', 'ABeeZee', 'Abel', 'Aclonica', 'Allan','Allerta','Allerta Stencil','Amaranth','Annie Use Your Telescope','Anonymous Pro','Anton', 'Arbutus Slab', 'Architects Daughter','Arimo','Artifika','Arvo', 'Asap', 'Astloch', 'Average Sans', 'Bangers','Bentham','Berkshire Swash', 'Bevan','Bigshot One', 'Bitter', 'Brawler', 'Bree Serif','Buda', 'Buenard', 'Cabin', 'Cabin Condensed', 'Cabin Sketch','Calligraffitti','Candal','Cantarell', 'Capriola', 'Cardo','Carter One','Caudex','Cedarville Cursive', 'Chivo', 'Cherry Cream Soda','Chewy','Coda','Coming Soon','Copse','Corben','Cousine','Covered By Your Grace','Crafty Girls','Crimson Text','Crushed','Cuprum','Damion','Dancing Script','Dawning of a New Day','Didact Gothic','Droid Sans','Droid Sans Mono','Droid Serif','EB Garamond','Expletus Sans', 'Fenix', 'Fontdiner Swanky','Francois','Geo','Goudy Bookletter','Gruppo', 'Headland One', 'Holtwood One SC','Homemade Apple','IM Fell','Inconsolata','Indie Flower','Irish Grover', 'Istok Web', 'Josefin Sans','Josefin Slab','Judson','Jura','Just Another Hand','Just Me Again Down Here','Kameron','Kenia','Kranky','Kreon','Kristi','La Belle Aurore','Lato','League Script','Lekton','Limelight','Lobster','Lobster Two','Lora','Luckiest Guy','Maiden Orange','Mako','Maven pro','Meddon','MedievalSharp','Megrim','Merriweather','Metrophobic','Michroma','Miltonian','Molengo','Monofett','Mountains of Christmas','Muli','Neucha','Neutron','News Cycle','Nixie One','Nobile', 'Noticia Text', 'Nova', 'Nunito','OFL Sorts Mill Goudy TT','Old Standard', 'Oleo Script', 'Open Sans', 'Open Sans Condensed', 'Orbitron','Oswald','Over the Rainbow', 'Port Lligat Slab', 'PT Sans', 'PT Sans Narrow', 'PT Serif','Pacifico','Paytone One','Permanent Marker','Philosopher','Play','Playfair Display','Podkova','Puritan', 'Quando', 'Quattrocento','Quattrocento Sans','Radley','Raleway','Redressed','Reenie Beanie','Rock Salt','Rokkitt','Ruslan Display', 'Salsa', 'Sanchez', 'Schoolbell','Shadows Into Light','Shanti','Sigmar One', 'Signika', 'Signika Negative', 'Six Caps','Slackey','Smythe','Sniglet', 'Sofia', 'Special Elite','Sue Ellen Francisco','Sunshiney','Swanky and Moo Moo','Syncopate','Tangerine','Tenor','Terminal Dosis Light','The Girl next Door', 'Tienne', 'Tinos', 'Trocchi', 'Trykker', 'Ubunto','Ultra','UnifrakturCook','UnifrakturMaguntia','Unkempt','VT323','Vibur','Vollkorn','Waiting For The Sunrise','Wallpoet','Walter Turncoat','Wire One','Yanone Kaffeesatz','Zeyada'); $blog_options = array ("2column", "full-width", "normal"); $nav_sizes = array("default", "6px", "8px", "9px", "10px", "11px", "12px", "13px", "14px", "15px", "16px", "17px", "18px", "19px", "20px", "21px", "22px", "23px", "24px", "25px", "26px", "27px", "28px", "29px", "30px", "31px", "32px", "33px", "34px", "35px", "36px", "37px", "38px", "39px", "40px", "41px", "42px", "43px", "44px", "45px", "46px", "47px", "48px", "49px", "50px", "56px", "60px", "66px", "70px", "86px", "90px", "96px" ); $image_atts = array ('no-repeat', 'repeat'); $nav_weight = array ('default', 'normal', 'bold' ); $nav_float = array ('default', 'left', 'center', 'right' ); $patternchoices = array ("none","angled-fabric", "bullseyes", "clear-artsy-grid","clear-mini-cross", "clear-slash-regular", "clear-slash-small","clear-standard-cross", "cubed","dark-grip","dark-noise", "dark-wood", "double-stripes","fans", "faux-linen", "fence","fibers","gray-fabric","gray-jean","grid-noise","grid-white-faded","hard-lines", "heavy-static", "leaf", "lined-dark", "lined-paper","linen","medium-wood","mini-squares","navy-fabric","noise-large", "noise-light","pinstripe","plaid","retina-wood", "ruffles", "shattered","smooth-grunge","squares","tan-grunge", "tech-grid", "thick-horizontal-lines", "weave","white-tiles","whitey" ); $nav_color_options = array ("dark", "light"); $list_pages = get_pages('hide_empty=0');$wp_pages = array(); foreach ($list_pages as $pagg) {$wp_pages[$pagg->ID] = htmlspecialchars($pagg->post_title);$wp_pages_ids[] = $pagg->ID;} array_unshift($wp_pages, "Choose A Page"); function Blogphix_theme_settings_page() { global $patternchoices, $color_skins, $fonts, $slider_effects, $slider_hover, $nav_sizes, $slider_easing, $image_atts, $nav_weight, $nav_float, $nav_shadow, $slide_animation, $slider_arrows, $slide_type, $blog_options, $nav_color_options ; if ( ! isset( $_REQUEST['updated'] ) ) $_REQUEST['updated'] = false; ?>

<form method="post" action="options.php"  >
<?php
settings_fields( 'Blogphix_settings' ); $options = get_option( 'Blogphix_theme_settings' ); ?>

<div class="submit_save_icon">
Options Saved!
</div>
<div class="wrap molly-options">
<div class="molly-header">
<?php echo "Blogphix theme options" ?>
<div class="uheading">
<?php echo "version 1.2" ?>
</div>
<!-- Save Options -->
<div class="save-right">
<input type="submit"  class="button-secondary" id="saveme" value="<?php _e( 'Save Options' , 'text_domain'); ?>" />
</div>
<!-- end molly-save-options -->
</div>
<!--
BEGIN DEFINING TABS FOR ADMIN SIDEBAR
-->

<div id="molly-wrapper" class="clearfix">

<div id="wrap-left">
<ul class="tabs">
<li><div class="img_general"></div><a href="#tab1"><?php _e( 'Startup Options' , 'text_domain'); ?></a></li>
<li><div class="img_homepage"></div><a href="#tab2"><?php _e( 'Index/Blog Features' , 'text_domain'); ?></a></li>
<li><div class="img_colors"></div><a href="#tab9"><?php _e( 'Custom Styling', 'text_domain' ); ?></a></li>
<li><div class="img_typography"></div><a href="#tab4"><?php _e( 'Typography' , 'text_domain'); ?></a></li>
<li><div class="img_social"></div><a href="#tab7"><?php _e( 'Social Networks' , 'text_domain'); ?></a></li>
<li><div class="img_tracking"></div><a href="#tab8"><?php _e( 'Footer Options', 'text_domain' ); ?></a></li>

</ul>
</div>
<!-- end wrap-left -->

<div id="wrap-right">
<div class="tab_container">

<!-- main settings -->
<div id="tab1" class="tab_content">
<ul>





<li><h4><?php _e( 'Custom Logo' , 'text_domain'); ?></h4>
<div class="molly_left_admin"><input id="Blogphix_theme_settings[custom_logo]" class="regular-text-normal upload_field" type="text" size="36" name="Blogphix_theme_settings[custom_logo]" value="<?php esc_attr_e( $options['custom_logo'] ); ?>" />
<br /> <input class="button-secondary upload_image_button" type="button" value="Upload Image" /></div>
<label class="description" for="Blogphix_theme_settings[custom_logo]"><?php _e( 'Upload or type in the URL for the main logo. When using the upload button choose your image then click insert to post' , 'text_domain' ); ?></label>
<div class="molly_left_admin">
<?php if($options['custom_logo'] !='') { ?>
<div id="logo-preview">
<img src="<?php echo $options['custom_logo']; ?>" alt="logo" />
</div>
<!-- end logo-preview -->
<?php } ?>
</div>
</li>

<li><h4><?php _e( 'Favicon image' , 'text_domain'); ?></h4>
<div class="molly_left_admin"><input id="Blogphix_theme_settings[custom_favicon]" class="regular-text-normal upload_field" type="text" size="36" name="Blogphix_theme_settings[custom_favicon]" value="<?php esc_attr_e( $options['custom_favicon'] ); ?>" />
<br /> <input class="button-secondary upload_image_button" type="button" value="Upload Image" /></div>

<label class="description" for="Blogphix_theme_settings[custom_favicon]"><?php _e( 'Upload or enter the URL of your .ico favicon file. This is the small image you see in the browser tab window. Make sure you choose insert into post when done.' , 'text_domain' ); ?></label>

<div class="molly_left_admin">
<?php if($options['custom_favicon'] !='') { ?>
<div id="logo-preview">
<img src="<?php echo $options['custom_favicon']; ?>" alt="favicon" />
</div>
<!-- end logo-preview -->
<?php } ?>
</div>
</li>




<li><h4><?php _e( 'Header Analytics Tracking Code' , 'text_domain'); ?></h4>
<textarea id="Blogphix_theme_settings[tracking_header]" class="regular-text" rows="5" cols="36"  name="Blogphix_theme_settings[tracking_header]"><?php esc_attr_e( $options['tracking_header'] ); ?>		</textarea>
<label class="description" for="Blogphix_theme_settings[tracking_header]"><div class="molly_info_text"><?php _e( 'Enter your analytics tracking code to insert it in the head tag of your site' , 'text_domain'); ?></div></label>

</li>
</ul>
</div>
<!-- END main settings -->

<!-- homepage -->
<div id="tab2" class="tab_content">
<ul>

<li>
<div class="admin_descrip">
<?php echo 'If you are using the option below to crop your own image heights for the post details page, you will 99.9% of the time need this plugin to regenerate the thumbnail quality/sizes after uploading or changing this feature. Use this plugin if any of your images/thumbnails/etc are looking odd/skewed. <br/><br/> <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">Regen Thumbnails Plugin</a>' ?>
</div>


</li>



<li>
<div id="itoggle8">
<h4><?php _e( 'Use WP image cropping (height) when uploading your images?', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[enable_large_heights]" name="Blogphix_theme_settings[enable_large_heights]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['enable_large_heights'] ); ?> />

<label class="description" for="Blogphix_theme_settings[enable_large_heights]"><div class="molly_info_text"><?php _e( 'Enable/Disable your images from being cropped on post detail pages. If you prefer to set your own height and upload your images disable this feature.' , 'text_domain'); ?></div></label>
</div>
</li>


<li>
<div id="itoggle8">
<h4><?php _e( 'Disable/Enable on hover image buttons for Lightbox & Link', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_hoverlinks]" name="Blogphix_theme_settings[disable_hoverlinks]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['disable_hoverlinks'] ); ?> />

<label class="description" for="Blogphix_theme_settings[disable_hoverlinks]"><div class="molly_info_text"><?php _e( 'Disable/Enable the button links for lightbox and url inside the images when hovering.' , 'text_domain'); ?></div></label>
</div>
</li>


<li>
<div class="admin_descrip">
<?php echo 'To disable infinite scroll and show all posts, please enter -1 in the options box. Important to keep in mind: Infinite scroll will only work if you enter a number <em>lower</em> than the total amount of posts.' ?>
</div>


</li>

<li><h4><?php _e( '(Homepage) Posts Showing before infinite scroll is triggered?', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[home_blog_post_count]" class="regular-text-small" type="text" name="Blogphix_theme_settings[home_blog_post_count]" value="<?php esc_attr_e( $options['home_blog_post_count'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[home_blog_post_count]"><div class="molly_info_text"><?php _e( 'Enter the number of latest blog posts you want to show. <em>This is for your homepage only</em>.' , 'text_domain'); ?></div></label>
</li>

<li>
<div class="admin_descrip">
<?php echo 'Choose the amount of posts to show on archive, category and search results to show pages. Using -1 will show all of your posts on a single page for each section.' ?>
</div>

</li>

<li><h4><?php _e( 'Archives post count per page?', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[archive_blog_post_count]" class="regular-text-small" type="text" name="Blogphix_theme_settings[archive_blog_post_count]" value="<?php esc_attr_e( $options['archive_blog_post_count'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[archive_blog_post_count]"><div class="molly_info_text"><?php _e( 'Enter the number of latest blog posts you want to show. <em>This is for your archive/search results/categories masonry layout only.</em>' , 'text_domain'); ?></div></label>
</li>

<li>

<div id="itoggle7">
<h4><?php _e( 'Show/hide Related Posts', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_related_posts]" name="Blogphix_theme_settings[disable_related_posts]" type="checkbox" class="itoggle7"  value="1" <?php checked( '1', $options['disable_related_posts'] ); ?> />

<label class="description" for="Blogphix_theme_settings[disable_related_posts]"><div class="molly_info_text"><?php _e( 'Choose to show or hide your blog pages related posts section. These are the 4 images showing after a post description.', 'text_domain' ); ?></div></label>
</div>

</li>
<li><h4><?php _e( 'Related Posts Heading' , 'text_domain'); ?></h4>
<textarea id="Blogphix_theme_settings[related_posts_tagline]" class="regular-text" name="Blogphix_theme_settings[related_posts_tagline]" rows="5" cols="36"><?php esc_attr_e( $options['related_posts_tagline'] ); ?></textarea>
<label class="description" for="Blogphix_theme_settings[related_posts_tagline]"><div class="molly_info_text"><?php _e( 'Change your text heading when related posts are being shown.', 'text_domain' ); ?></div></label>
</li>

<li><h4><?php _e( 'Excerpt Length' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[blog_excerpt_length]" class="regular-text-small" type="text" name="Blogphix_theme_settings[blog_excerpt_length]" value="<?php esc_attr_e( $options['blog_excerpt_length'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[blog_excerpt_length]"><div class="molly_info_text"><?php _e( 'Enter a character length for the blog posts excerpts<small>~ Default is 60.</small>', 'text_domain' ); ?></div></label>
</li>

</ul>
</div>
<!-- end home -->


<div id="tab4" class="tab_content">
<ul>
<li>
<div class="admin_descrip">
<?php echo 'Please keep in mind when choosing google fonts and their font weights: If the font does <em>not</em> offer the style you have selected it will look a little weird. This is not an error or options failure, the google font simply does not have the weight, size or decoration you are looking for.' ?>
</div>

</li>

<li>
<h4><?php _e( 'Primary Font', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[primary_font]">
<?php foreach ($fonts as $option) { ?>
<option <?php if ($options['primary_font'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[primary_font]"><?php _e( 'Primary font across all theme templates and body copy. This will only change the center column font.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Body Heading Font style', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[heading_font]">
<?php foreach ($fonts as $option) { ?>
<option <?php if ($options['heading_font'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[heading_font]"><?php _e( 'Changing this will swap out all of your heading fonts with the google font you choose - H1, H2, H3 tags & etc' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Body heading font weight', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[nav_weight_body_heading]" >
<?php foreach ($nav_weight as $option) { ?>
<option <?php if ($options['nav_weight_body_heading'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[nav_weight_body_heading]"><?php _e( 'Body copy heading font weight. If the google font you chose supports bold font then changing this will do just that.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Navigation Font', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[nav_font]">
<?php foreach ($fonts as $option) { ?>
<option <?php if ($options['nav_font'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[nav_font]"><?php _e( 'Choose a google web font for the top level navigation elements.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Navigation (top level only) font weight', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[nav_weight]" >
<?php foreach ($nav_weight as $option) { ?>
<option <?php if ($options['nav_weight'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[nav_weight]"><?php _e( 'Top level font weight (bold or normal) for the first level. (parent level).' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Sidebar heading Font style', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[sidebar_font]">
<?php foreach ($fonts as $option) { ?>
<option <?php if ($options['sidebar_font'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[sidebar_font]"><?php _e( 'This allows you to change the sidebar font style to any of the google web fonts in the list.' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Sidebar Heading Color' , 'text_domain' ); ?></h4>

<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_sidebar_heading_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_sidebar_heading_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_sidebar_heading_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_sidebar_heading_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>
<input id="Blogphix_theme_settings[sidebar_heading_color]" class="regular-text-small cp_sidebar_heading_color" type="text" name="Blogphix_theme_settings[sidebar_heading_color]" value="<?php esc_attr_e( $options['sidebar_heading_color'] ); ?>" />
<div id="cp_preview_sidebar_heading_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['sidebar_heading_color'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[sidebar_heading_color]"><?php _e( 'This option controls the sidebar font heading color. This does not effect other headings across the theme.' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Sidebar heading font size', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[sidebar_font_size]" >
<?php foreach ($nav_sizes as $option) { ?>
<option <?php if ($options['sidebar_font_size'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[sidebar_font_size]"><?php _e( 'Font too small? Too large? Change it with this option. This will only change the dont size on the navbar.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Sidebar heading font weight', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[nav_weight_sidebar_heading]" >
<?php foreach ($nav_weight as $option) { ?>
<option <?php if ($options['nav_weight_sidebar_heading'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[nav_weight_sidebar_heading]"><?php _e( 'Sidebar heading font weight. If the google font you chose supports the bold style then changing this will do so.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'Footer heading Font style', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[footer_font]">
<?php foreach ($fonts as $option) { ?>
<option <?php if ($options['footer_font'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[footer_font]"><?php _e( 'This controls your footer headings and which google font to show for them' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Footer heading font weight', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[nav_weight_footer_heading]" >
<?php foreach ($nav_weight as $option) { ?>
<option <?php if ($options['nav_weight_footer_heading'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>

<label class="description" for="Blogphix_theme_settings[nav_weight_footer_heading]"><?php _e( 'Footer heading font weight. If the google font offers a bold style then this will change that.' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Footer Heading Color' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_footer_heading_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_footer_heading_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_footer_heading_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_footer_heading_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[footer_heading_color]" class="regular-text-small cp_footer_heading_color" type="text" name="Blogphix_theme_settings[footer_heading_color]" value="<?php esc_attr_e( $options['footer_heading_color'] ); ?>" />
<div id="cp_preview_footer_heading_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['footer_heading_color'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[footer_heading_color]"><?php _e( 'Choose a color for your footer headings.' , 'text_domain'); ?></label>

</li>
</ul>
</div>
<!--end typography tab-->

<!-- Social -->
<div id="tab7" class="tab_content">
<ul>
<li>
<div id="itoggle10">
<h4><?php _e( 'Enable Facebook button on posts', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_social_facebook]" name="Blogphix_theme_settings[disable_social_facebook]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['disable_social_facebook'] ); ?> />

<label class="description" for="Blogphix_theme_settings[disable_social_facebook]"><div class="molly_info_text"><?php _e( 'Show Facebook social share button on each single page post.' , 'text_domain'); ?></div></label>
</div>
</li>

<li>
<div id="itoggle10">
<h4><?php _e( 'Enable Twitter button on posts', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_social_twitter]" name="Blogphix_theme_settings[disable_social_twitter]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['disable_social_twitter'] ); ?> />
<label class="description" for="Blogphix_theme_settings[disable_social_twitter]"><div class="molly_info_text"><?php _e( 'Show Twitter social share button on each single page post.' , 'text_domain'); ?></div></label>
</div>
</li>

<li>
<div id="itoggle10">
<h4><?php _e( 'Enable Google Plus button on posts', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_social_googleplus]" name="Blogphix_theme_settings[disable_social_googleplus]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['disable_social_googleplus'] ); ?> />

<label class="description" for="Blogphix_theme_settings[disable_social_googleplus]"><div class="molly_info_text"><?php _e( 'Show GooglePlus social share button on each single page post.' , 'text_domain'); ?></div></label>
</div>
</li>

<li>
<div id="itoggle10">
<h4><?php _e( 'Enable/Disable Social sidebar', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[disable_socials_sidebar]" name="Blogphix_theme_settings[disable_socials_sidebar]" type="checkbox" class="itoggle10" value="1" <?php checked( '1', $options['disable_socials_sidebar'] ); ?> />

<label class="description" for="Blogphix_theme_settings[disable_socials_sidebar]"><div class="molly_info_text"><?php _e( 'Get rid of the sidebar that displays the social links on each page to the far right. This is here in case you want to keep your info in the admin area as well as remove the extra white space for padding when not in use.' , 'text_domain'); ?></div></label>

</div>
</li>

<li><h4><?php _e( 'Pinterest URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[pinterest]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[pinterest]" value="<?php esc_attr_e( $options['pinterest'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[pinterest]"><div class="molly_info_text"><?php _e( 'Enter your Pinterest URL.' , 'text_domain'); ?></div></label>

</li>

<li><h4><?php _e( 'Twitter URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[twitter]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[twitter]"><div class="molly_info_text"><?php _e( 'Enter your Twitter URL.' , 'text_domain'); ?></div></label>

</li>

<li><h4><?php _e( 'Facebook URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[facebook]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[facebook]"><div class="molly_info_text"><?php _e( 'Enter your Facebook URL.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Linkedin URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[linkedin]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[linkedin]" value="<?php esc_attr_e( $options['linkedin'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[linkedin]"><div class="molly_info_text"><?php _e( 'Enter your Linkedin URL.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Rss URL', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[rss]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[rss]" value="<?php esc_attr_e( $options['rss'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[rss]"><div class="molly_info_text"><?php _e( 'Enter your RSS URL.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Google Plus URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[googleplus]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[googleplus]" value="<?php esc_attr_e( $options['googleplus'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[googleplus]"><div class="molly_info_text"><?php _e( 'Enter your Google Plus URL.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Flickr URL' , 'text_domain'); ?></h4>
<input id="Blogphix_theme_settings[flickr]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[flickr]" value="<?php esc_attr_e( $options['flickr'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[flickr]"><div class="molly_info_text"><?php _e( 'Enter your Flickr URL.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Dribbble URL', 'text_domain' ); ?></h4>
<input id="Blogphix_theme_settings[dribbble]" class="regular-text-normal" type="text" name="Blogphix_theme_settings[dribbble]" value="<?php esc_attr_e( $options['dribbble'] ); ?>" />
<label class="description" for="Blogphix_theme_settings[dribbble]"><div class="molly_info_text"><?php _e( 'Enter your Dribbble URL.', 'text_domain' ); ?></div></label>
</li>

</ul>
</div>
<!-- END end social tab-->


<!-- tracking tab-->
<div id="tab8" class="tab_content">
<ul>
<li><h4><?php _e( 'Footer Left Custom HTML/Text' , 'text_domain'); ?></h4>
<textarea id="Blogphix_theme_settings[custom_footer_left]" class="regular-text" rows="5" cols="36" name="Blogphix_theme_settings[custom_footer_left]"><?php esc_attr_e( $options['custom_footer_left'] ); ?></textarea>
<label class="description" for="Blogphix_theme_settings[custom_footer_left]" ><div class="molly_info_text"><?php _e( 'This will be displayed on the left side of the footer.' , 'text_domain'); ?></div></label>
</li>

<li><h4><?php _e( 'Footer right side/Copyright area HTML/Text' , 'text_domain'); ?></h4>
<textarea id="Blogphix_theme_settings[custom_footer_right]" class="regular-text" rows="5" cols="36" name="Blogphix_theme_settings[custom_footer_right]"><?php esc_attr_e( $options['custom_footer_right'] ); ?></textarea>
<label class="description" for="Blogphix_theme_settings[custom_footer_right]" ><div class="molly_info_text"><?php _e( 'This will be displayed on the right side of the footer. HTML is allowed. If left blank copyright notice will show and a link to your homepage.' , 'text_domain'); ?></div></label>
</li>
<li><h4><?php _e( 'Footer Analytics Tracking Code' , 'text_domain'); ?></h4>
<textarea id="Blogphix_theme_settings[tracking_footer]" class="regular-text" rows="5" cols="36"  name="Blogphix_theme_settings[tracking_footer]"><?php esc_attr_e( $options['tracking_footer'] ); ?></textarea>
<label class="description" for="Blogphix_theme_settings[tracking_footer]"><div class="molly_info_text"><?php _e( 'Enter your analytics tracking code to insert it in the footer of your site right before the end body tag', 'text_domain' ); ?></div></label>
</li>
</ul>
</div>
<!-- end tracking -->

<!-- main settings -->
<div id="tab9" class="tab_content">
<ul>


<li>
<h4><?php _e( 'Choose a preset pattern', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[preset_pattern]" >
<?php foreach ($patternchoices as $option) { ?>
<option <?php if ($options['preset_pattern'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[preset_pattern]"><?php _e( 'Choose from one of 40+ preset patterns created for you to add a nice touch to your themes background. You can also go to styles->and use the custom uploader if you wish to make your own custom pattern.' , 'text_domain'); ?></label>

</li>



<li>
<h4><?php _e( 'HTML Background Color' , 'text_domain'); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_header_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_header_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_header_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_header_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[header_color]" class="regular-text-small cp_header_color" type="text" name="Blogphix_theme_settings[header_color]" value="<?php esc_attr_e( $options['header_color'] ); ?>" />
<div id="cp_preview_header_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['header_color'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[header_color]"><?php _e( 'Change the background color of your entire website. This will create the canvas for your design.' , 'text_domain'); ?></label>
</li>

<li>
<h4><?php _e( 'HTML Background Image or Pattern' , 'text_domain'); ?></h4>
<div class="molly_left_admin"><input id="Blogphix_theme_settings[custom_body_pattern]" class="regular-text-normal upload_field" type="text" size="36" name="Blogphix_theme_settings[custom_body_pattern]" value="<?php esc_attr_e( $options['custom_body_pattern'] ); ?>" />
<br /> <input class="button-secondary upload_image_button" type="button" value="Upload Image" /></div>
<label class="description" for="Blogphix_theme_settings[custom_body_pattern]"><?php _e( 'Upload your custom image or pattern for the body background.' , 'text_domain' ); ?></label>
<div class="molly_left_admin">
<?php if($options['custom_body_pattern'] !='') { ?>
<div id="logo-preview">
<img src="<?php echo $options['custom_body_pattern']; ?>" alt="logo" />
</div>
<!-- end logo-preview -->
<?php } ?>
</div>
</li>

<li>
<h4><?php _e( 'Repeat Image or use Full size?', 'text_domain' ); ?></h4>
<select name="Blogphix_theme_settings[repeat_bg_img]">
<?php foreach ($image_atts as $option) { ?>
<option <?php if ($options['repeat_bg_img'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>
<label class="description" for="Blogphix_theme_settings[repeat_bg_img]"><?php _e( 'Do you want your pattern to repeat? If so, (use repeat option). Are you using a full size image and want it to be fixed and stay put? If so, (use no-repeat option).' , 'text_domain'); ?></label>
</li>


<li>
<h4><?php _e( 'Theme wide buttons color' , 'text_domain'); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_blog_hover_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_blog_hover_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_blog_hover_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_blog_hover_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[blog_hover_color]" class="regular-text-small cp_blog_hover_color" type="text" name="Blogphix_theme_settings[blog_hover_color]" value="<?php esc_attr_e( $options['blog_hover_color'] ); ?>" />
<div id="cp_preview_blog_hover_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['blog_hover_color'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[blog_hover_color]"><?php _e( 'This will change all buttons on any page that you have not created. Such as the forms submit button, comments post button and so on.' , 'text_domain'); ?></label>
</li>


<li>

<h4><?php _e( 'Navbar top menu hover and line color' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_color_topnav_lines').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_color_topnav_lines').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_color_topnav_lines div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_color_topnav_lines').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[color_topnav_lines]" class="regular-text-small cp_color_topnav_lines" type="text" name="Blogphix_theme_settings[color_topnav_lines]" value="<?php esc_attr_e( $options['color_topnav_lines'] ); ?>" />

<div id="cp_preview_color_topnav_lines" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['color_topnav_lines'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[color_topnav_lines]"><?php _e( 'Choose a color to change the link color for the entire navigation menu.' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Navbar sub menu elements hover Color' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_links_color_navtop').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_links_color_navtop').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_links_color_navtop div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_links_color_navtop').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>
<input id="Blogphix_theme_settings[links_color_navtop]" class="regular-text-small cp_links_color_navtop" type="text" name="Blogphix_theme_settings[links_color_navtop]" value="<?php esc_attr_e( $options['links_color_navtop'] ); ?>" />

<div id="cp_preview_links_color_navtop" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['links_color_navtop'] ); ?>;"></div>

</div>

<label class="description" for="Blogphix_theme_settings[links_color_navtop]"><?php _e( 'Choose a color to change the link color for the entire navigation menu.' , 'text_domain'); ?></label>

</li>



<li>
<h4><?php _e( 'Nav dropdown background color' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_nav_bg_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_nav_bg_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_nav_bg_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_nav_bg_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>
<input id="Blogphix_theme_settings[nav_bg_color]" class="regular-text-small cp_nav_bg_color" type="text" name="Blogphix_theme_settings[nav_bg_color]" value="<?php esc_attr_e( $options['nav_bg_color'] ); ?>" />

<div id="cp_preview_nav_bg_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['nav_bg_color'] ); ?>;"></div>

</div>

<label class="description" for="Blogphix_theme_settings[nav_bg_color]"><?php _e( 'Change the color of your navigation dropdown background.' , 'text_domain'); ?></label>

</li>


<li>
<h4><?php _e( 'Font color for nav dropdown links' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_na_bg_colored_link').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_na_bg_colored_link').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_na_bg_colored_link div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_na_bg_colored_link').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>
<input id="Blogphix_theme_settings[na_bg_colored_link]" class="regular-text-small cp_na_bg_colored_link" type="text" name="Blogphix_theme_settings[na_bg_colored_link]" value="<?php esc_attr_e( $options['na_bg_colored_link'] ); ?>" />

<div id="cp_preview_na_bg_colored_link" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['na_bg_colored_link'] ); ?>;"></div>

</div>

<label class="description" for="Blogphix_theme_settings[na_bg_colored_link]"><?php _e( 'Select a color for your menu dropdown links. Default is gray with white on selected.' , 'text_domain'); ?></label>

</li>



<li>
<h4><?php _e( 'Body Link Color' , 'text_domain' ); ?></h4>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_links_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_links_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_links_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_links_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[links_color]" class="regular-text-small cp_links_color" type="text" name="Blogphix_theme_settings[links_color]" value="<?php esc_attr_e( $options['links_color'] ); ?>" />

<div id="cp_preview_links_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['links_color'] ); ?>;"></div>

</div>

<label class="description" for="Blogphix_theme_settings[links_color]"><?php _e( 'Changes the color of the body copy links when creating a url or page link.' , 'text_domain'); ?></label>

</li>

<li>
<h4><?php _e( 'Body Link Hover Color' , 'text_domain' ); ?></h4>

<script type="text/javascript">
jQuery(document).ready(function($) {
$('.cp_links_hover_color').ColorPicker({
onSubmit: function(hsb, hex, rgb) {
$('.cp_links_hover_color').val('#'+hex);
},
onBeforeShow: function () {
$(this).ColorPickerSetColor(this.value);
return false;
},
onChange: function (hsb, hex, rgb) {
$('#cp_preview_links_hover_color div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
$('#cp_preview_links_hover_color').prev('input').attr('value', '#'+hex);
}
})
.bind('keyup', function(){
$(this).ColorPickerSetColor(this.value);
});
});
</script>

<input id="Blogphix_theme_settings[links_hover_color]" class="regular-text-small cp_links_hover_color" type="text" name="Blogphix_theme_settings[links_hover_color]" value="<?php esc_attr_e( $options['links_hover_color'] ); ?>" />
<div id="cp_preview_links_hover_color" class="color-preview">
<div style="background-color: <?php esc_attr_e( $options['links_hover_color'] ); ?>;"></div>
</div>
<label class="description" for="Blogphix_theme_settings[links_hover_color]"><?php _e( 'Color to be shown when hovering over the links inside the body copy' , 'text_domain'); ?></label>
</li>
</ul>
</div>
<!--end main tab-->










</div><!-- end tab_container -->
</div><!-- end wrap-right -->
</div><!-- end molly-wrapper -->
<!-- Save Options -->
<div id="molly-save-options-footer">
<div id="toTop">
TOP &uarr;
</div>
</div>
<!-- end molly-save-options -->
</form>
</div><!-- end wrap -->

<?php
} function Blogphix_options_validate( $input ) { global $select_options, $radio_options; if ( ! isset( $input['option1'] ) ) $input['option1'] = null; $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 ); $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] ); if ( ! isset( $input['radioinput'] ) ) $input['radioinput'] = null; if ( ! array_key_exists( $input['radioinput'], $radio_options ) ) $input['radioinput'] = null; $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] ); return $input; } ?>