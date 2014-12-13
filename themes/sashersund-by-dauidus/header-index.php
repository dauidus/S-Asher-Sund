<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title><?php if (is_home()){ bloginfo('name'); }else{ bloginfo('name'); echo ':'; wp_title(''); }?></title>
<meta name="description" content="<?php bloginfo('html_type'); ?>">
<meta name="author" content="">

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=0.47, maximum-scale=1, user-scalable=no"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="<?php echo $options['custom_favicon']; ?>">
<!-- CSS -->
<link rel="stylesheet"type="text/css" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />
<link rel="stylesheet"type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/parallax.css" media="screen" />

<?php //include custom background and colors
include_once get_template_directory() . '/includes/fontsstyles/custom-style.php'; ?>
<?php //includes custom fonts
include_once get_template_directory() . '/includes/fontsstyles/custom-fonts.php'; ?>

<?php
//run script for threaded comments
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<!--[if lt IE 9]>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php //show tracking code for the header
echo stripslashes($options['tracking_header']);
?>
<!-- WP Head -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); //start all pages body?>>

	<div id="header-index">
		<div id="parallax-container">
			<div id="parallax-viewport">
				<!-- parallax layers -->
		        <div class="parallax-layer parallax-1"><!-- person silouhette --></div>
		        <div class="parallax-layer parallax-2"><!-- large left tree --></div>
		        <div class="parallax-layer parallax-3"><!-- small left tree --></div>
		        <div class="parallax-layer parallax-4"><!-- large right tree --></div>
		        <div class="parallax-layer parallax-shadow-top"><!-- shadows --></div>
		        <div class="parallax-layer parallax-shadow-bottom"><!-- shadows --></div>
		        <div class="parallax-layer parallax-5">
		        	FIELD NOTES
		        </div>
		        <div class="parallax-layer parallax-6">
		        	<span>(</span>POST<span>-</span>APOCALYPSE<span>)</span>
		        </div>
		        <div class="parallax-layer parallax-7">
		        	S. Asher Sund
		        </div>
			</div>
		</div>
	</div>		

    <header class="top-stay">
    	
   
	        <div class="top-push-index">
	            <div class="nav-wrapped-up">
	                <nav class="navbar_primary cl-effect-21"><!-- start nav area -->
		                <?php wp_nav_menu( array(
		                'sort_column' => 'menu_order',
		                'menu_class' => 'sf-menu-primary',
		                'theme_location' => 'primary-menu',
		                'fallback_cb' => 'primary_menu',
		                ));
		                ?>	
		                <?php get_search_form(); ?>	
	                </nav><!--end navbar primary-->
	            </div>
	        </div>

        
    </header><!-- end wrapper for contents top -->

<div id="content"><!-- start of full width wrapping -->
                
                  
<?php if($options['disable_socials_sidebar'] != false ) { ?>

<div class="socials-bump">
<div class="social-wrapper">
<!-- get the social icons -->
<?php
include_once get_template_directory() . '/includes/socials.php';
?>
</div>
</div>


<?php } else {} ?>


