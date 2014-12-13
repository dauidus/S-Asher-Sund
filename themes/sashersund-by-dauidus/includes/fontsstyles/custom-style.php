<?php  $options = get_option( 'Blogphix_theme_settings' ); ?>

<style type="text/css">
<?php  if($options['header_color']) { ?>
html { background-color: <?php echo $options['header_color']; ?> !important; } 

<?php  } if($options['portfolio_hover_color_circle']) { ?>
.image_label_text { background-color: <?php echo $options['portfolio_hover_color_circle']; ?> !important; }

<?php } if($options['portfolio_hover_color']) { ?>
.showme-hover { background-color: <?php echo $options['portfolio_hover_color']; ?> !important; }

<?php }
if($options['disable_hoverlinks'] != false ) { 
        echo '.prettyphoto-plus, .viewpost-plus { display:none!important; }'
?>

<?php } if($options['blog_hover_color']) { ?>
#submit, .button-theme, .button-theme:active,.button-theme.active, .button-theme:hover,.button-theme:focus, #submit:active,#submit.active, #submit:hover
 { background-color: <?php echo $options['blog_hover_color']; ?> !important; 
   border-color: <?php echo $options['blog_hover_color']; ?> !important; 
 }

<?php } if($options['header_color']) { ?>
html  { background-color: <?php echo $options['header_color']; ?> !important; }

<?php } if($options['custom_body_pattern']) { ?>
html  { background-image: url("<?php echo $options['custom_body_pattern']; ?>") !important; }

<?php } if($options['preset_pattern'] != 'none') { ?>
html { background-image: url('<?php echo get_template_directory_uri(); ?>/images/patterns/<?php echo $options['preset_pattern']; ?>.png'); }

<?php  } if($options['header_top_color']) { ?>
.shell_sidebar_wrap { background-color: <?php echo $options['header_top_color']; ?> !important; }


<?php } if($options['custom_body_top_pattern']) { ?>
.shell_sidebar_wrap  { background-image: url("<?php echo $options['custom_body_top_pattern']; ?>") !important; }

<?php } if($options['header_footer_color']) { ?>
.footer-widget-area-block{ background-color: <?php echo $options['header_footer_color']; ?> !important; }

<?php } if($options['custom_body_footer_pattern']) { ?>
.footer-widget-area-block  { background-image: url("<?php echo $options['custom_body_footer_pattern']; ?>") !important; }

<?php } if($options['header_footer_base_color']) { ?>
.footer-shadow-wrapper{ background-color: <?php echo $options['header_footer_base_color']; ?> !important; }

<?php } if($options['slider_arrows']) { ?>
.flex-next, .flex-prev { display: <?php echo $options['slider_arrows']; ?> !important; }

<?php } if($options['sidebar_bg_color']) { ?>
.mainshell-sidebar, .sidebar-bottom  { background-color: <?php echo $options['sidebar_bg_color']; ?> !important; }

<?php } if($options['nav_bg_color']) { ?>
ul.sf-menu-primary ul, ul.sf-menu-primary ul li ul { background-color: <?php echo $options['nav_bg_color'];?> !important; }

<?php } if($options['na_bg_colored_link']) { ?>
.sf-menu-primary ul li a, .sf-menu-primary ul li a:hover, ul.sf-menu-primary .current-menu-item ul li a, ul.sf-menu-primary .current-menu-item ul li a:hover, ul.sf-menu-primary ul li.current-menu-item a:hover, ul.sf-menu-primary ul li.current-menu-item a { color: <?php echo $options['na_bg_colored_link']; ?> !important; }

<?php  } if($options['navbar_bg_color_unlimited_subnav']) { ?>
ul.sf-menu-secondary ul li:first-child, ul.sf-menu-secondary ul li:last-child, ul.sf-menu-secondary ul li, .sf-menu-secondary ul li a  { background-color: <?php echo $options['navbar_bg_color_unlimited_subnav']; ?> !important; }

<?php } if($options['navbar_unlimited_hover_nav']) { ?>
.sf-menu-secondary ul li:hover, .sf-menu-primary ul li:hover  { background-color: <?php echo $options['navbar_unlimited_hover_nav']; ?> !important; }

<?php } if($options['repeat_bg_img']) { ?>
html {background-repeat:<?php echo $options['repeat_bg_img']; ?> !important;  }

<?php } if($options['links_color']) { ?>
#content a { color: <?php echo $options['links_color']; ?> !important; }

<?php } if($options['links_hover_color']) { ?>
#content a:hover { color: <?php echo $options['links_hover_color']; ?> !important; }

<?php } if($options['nav_font_size']) { ?>
.sf-menu-secondary a, .sf-menu-secondary a:hover, .sf-menu-secondary .sfHover  { font-size: <?php echo $options['nav_font_size']; ?> !important; }

<?php } if($options['sub_nav_font_size']) { ?>
ul.sf-menu-secondary ul li:first-child, ul.sf-menu-secondary ul li:last-child, ul.sf-menu-secondary ul li, .sf-menu-secondary ul li a, .sf-menu-secondary ul li a:hover, ul.sf-menu-secondary ul li.current-menu-item a { font-size: <?php echo $options['sub_nav_font_size']; ?> !important; }

<?php } if($options['body_content_color']) { ?>
body, p { color: <?php echo $options['body_content_color']; ?> !important; }

<?php  } if($options['sidebar_content_color']) { ?>
.sidebar, .sidebar .widget_recent_colored p, .sidebar .textwidget, .sidebar p { color: <?php echo $options['sidebar_content_color']; ?> !important; }

<?php  } if($options['sidebar_content_link_color']) { ?>
.sidebar a{ color: <?php echo $options['sidebar_content_link_color']; ?> !important; }

<?php } if($options['sidebar_content_link_hover_color']) { ?>
.sidebar a:hover { color: <?php echo $options['sidebar_content_link_hover_color']; ?> !important; }

<?php  } if($options['primary_heading_link_color']) { ?>
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{ color: <?php echo $options['primary_heading_link_color']; ?> !important; }

<?php  } if($options['primary_heading_link_hover_color']) { ?>
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover{ color: <?php echo $options['primary_heading_link_hover_color']; ?> !important; }

<?php } if($options['links_color_footer']) { ?>
.footershell a, .footershadow a { color: <?php echo $options['links_color_footer']; ?> !important; }

<?php } if($options['links_hover_color_footer']) { ?>
.footershell a:hover, .footershadow a:hover { color: <?php echo $options['links_hover_color_footer']; ?> !important; }

<?php  } if($options['links_color_navtop']) { ?>
ul.sf-menu-primary .current-menu-item ul li a:hover,
.sf-menu-primary ul li a:hover

 { background-color: <?php echo $options['links_color_navtop']; ?> !important; }

<?php  } if($options['color_topnav_lines']) { ?>
.sf-menu-primary .current-menu-item a,
.sf-menu-primary a:hover { color: <?php echo $options['color_topnav_lines']; ?> ;
   border-color: <?php echo $options['color_topnav_lines']; ?> !important; }

<?php  } if($options['links_color_hover_navtop']) { ?>
.sf-menu-secondary a:hover, .sf-menu-primary a:hover { color: <?php echo $options['links_color_hover_navtop']; ?> !important; }

<?php  } if($options['sidebar_heading_color']) { ?>
h4.widget-title-sidebar, h4.widget-title-sidebar a, h4.widget-title-sidebar a:hover,  ul.tabs li a { color: <?php echo $options['sidebar_heading_color']; ?> !important; }

<?php } if($options['footer_heading_color']) { ?>
h6.widget-title-footer, h6.widget-title-footer a, h6.widget-title-footer a:hover { color: <?php echo $options['footer_heading_color']; ?> !important; }

<?php } ?>
</style>