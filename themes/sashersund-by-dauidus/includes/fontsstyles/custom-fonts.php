<?php 
$options = get_option( 'Blogphix_theme_settings' ); 
?>


<?php
/******************************************
* Generates Link To Google Font
******************************************/
?>

<?php $fonts = array('Arial','Georgia','Lucida Sans Unicode','Times New Roman','Verdana'); ?>

<?php if($options['primary_font'] !== 'default') { ?>

<?php if (!empty($options['primary_font']) && !in_array($options['primary_font'], $fonts)) { ?>

<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $options['primary_font']); ?>' rel='stylesheet' type='text/css' />

<?php array_push($fonts, $options['primary_font']); ?>



<?php } } else { ?>





<?php } ?>






<?php $fonts = array('Arial','Georgia','Lucida Sans Unicode','Times New Roman','Verdana'); ?>

<?php if($options['nav_font'] !== 'default') { ?>

<?php if (!empty($options['nav_font']) && !in_array($options['nav_font'], $fonts)) { ?>

<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $options['nav_font']); ?>' rel='stylesheet' type='text/css' />

<?php array_push($fonts, $options['nav_font']);?>



<?php } } else { } ?>


<?php $fonts = array('Arial','Georgia','Lucida Sans Unicode','Times New Roman','Verdana'); ?>

<?php if($options['heading_font'] !== 'default') { ?>

<?php if (!empty($options['heading_font']) && !in_array($options['heading_font'], $fonts)) { ?>

<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $options['heading_font']); ?>' rel='stylesheet' type='text/css' />

<?php array_push($fonts, $options['heading_font']); ?>



<?php } } else { } ?>



<?php $fonts = array('Arial','Georgia','Lucida Sans Unicode','Times New Roman','Verdana'); ?>

<?php if($options['sidebar_font'] !== 'default') { ?>

<?php if (!empty($options['sidebar_font']) && !in_array($options['sidebar_font'], $fonts)) { ?>

<link href='http://fonts.googleapis.com/css?family=<?php echo str_replace(' ', '+', $options['sidebar_font']); ?>' rel='stylesheet' type='text/css' />

<?php array_push($fonts, $options['sidebar_font']); ?>



<?php } } else { } ?>





<?php
/******************************************
* Outputs CSS To Header
******************************************/
?>

<style type="text/css">


<?php if($options['primary_font'] !== 'default') { ?>

body, body p, #submit, #comment, .related-post-content h4, .related-post-content h4 a, .relatedpost-heading h2, .menu-title, .footer-blocked-inside .search_input, .search_input, .info_recent_widgets { <?php if (!empty($options['primary_font'])) { echo 'font-family: ' . $options['primary_font']; } ?> !important; }


<?php } ?>


<?php if($options['nav_font'] !== 'default') { ?>
.sf-menu-primary, .sf-menu-primary a { <?php if (!empty($options['nav_font'])) { echo 'font-family: ' . $options['nav_font']; } ?> !important; }


<?php } ?>




<?php if($options['nav_sub_font'] !== 'default') { ?>
.sf-menu-primary ul li, .sf-menu-primary ul li a { <?php if (!empty($options['nav_sub_font'])) { echo 'font-family: ' . $options['nav_sub_font']; } ?>!important; }


<?php } ?>



<?php if($options['heading_font'] !== 'default') { ?>
h1, h2, h3, h4, h5, h6, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span,  .number-heading, .archive-heading, .date-wrapping, .tags-span, .post-text-grip-quote p, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 span a, h2 span a, h3 span a, h4 span a, h5 span a, h6 span a, .crumbs, .crumbs a

{ <?php if (!empty($options['heading_font'])) { echo 'font-family: ' . $options['heading_font']; } ?>!important; }



<?php } ?>












<?php if($options['sidebar_font'] !== 'default') { ?>

h4.widget-title-sidebar, ul.tabs li a, .number-heading

{ <?php if (!empty($options['sidebar_font'])) { echo 'font-family: ' . $options['sidebar_font']; } ?> !important; }

<?php } ?>



<?php if($options['sidebar_font_size']) { ?>

h4.widget-title-sidebar, ul.tabs li a { font-size: <?php echo $options['sidebar_font_size']; ?> !important; }

<?php } ?>


<?php if($options['footer_font'] !== 'default') { ?>

h6.widget-title-footer

{ <?php if (!empty($options['footer_font'])) { echo 'font-family: ' . $options['footer_font']; } ?> !important; }

<?php } ?>



<?php  if($options['nav_weight']) { ?>

.sf-menu-secondary li a, .sf-menu-secondary a, .sf-menu-secondary a:hover, .sf-menu-secondary .current-menu-item a, .sf-menu-secondary .sfHover, .sf-menu-primary li a, .sf-menu-primary a, .sf-menu-primary a:hover, .sf-menu-primary .current-menu-item a, .sf-menu-primary .sfHover  { font-weight: <?php echo $options['nav_weight']; ?> !important; }


<?php } ?>



<?php  if($options['nav_weight_sub']) { ?>

ul.sf-menu-secondary ul li:first-child, ul.sf-menu-secondary ul li:last-child, ul.sf-menu-secondary ul li, .sf-menu-secondary ul li a, .sf-menu-secondary ul li a:hover, ul.sf-menu-secondary ul li.current-menu-item a, ul.sf-menu-primary ul li:first-child, ul.sf-menu-primary ul li:last-child, ul.sf-menu-primary ul li, .sf-menu-primary ul li a, .sf-menu-primary ul li a:hover, ul.sf-menu-primary ul li.current-menu-item a

  { font-weight: <?php echo $options['nav_weight_sub']; ?> !important; }


<?php } ?>















<?php  if($options['nav_weight_sidebar_heading']) { ?>

h4.widget-title-sidebar, h4.widget-title-sidebar a, h4.widget-title-sidebar a:hover  { font-weight: <?php echo $options['nav_weight_sidebar_heading']; ?> !important; }


<?php } ?>







<?php  if($options['nav_weight_footer_heading']) { ?>

h6.widget-title-footer, h6.widget-title-footer a, h6.widget-title-footer a:hover  { font-weight: <?php echo $options['nav_weight_footer_heading']; ?> !important; }


<?php } ?>



<?php  if($options['nav_weight_body_heading']) { ?>

h1, h2, h3, h4, h5, h6,
h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, .commentcount, .post_info_left, .headings,

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
h1 span a, h2 span a, h3 span a, h4 span a, h5 span a, h6 span a, .commentcount a, .post_info_left a, .headings a

 { font-weight: <?php echo $options['nav_weight_body_heading']; ?> !important; }


<?php } ?>




<?php  if($options['index_heading_font_weight']) { ?>
.textbannerindex h1 , .textbannerindex h1 a, .textbannerindex h1 a:hover  { font-weight: <?php echo $options['index_heading_font_weight']; ?> !important; }


<?php } ?>





<?php if($options['index_heading_font_size']) { ?>

.textbannerindex h1 , .textbannerindex h1 a, .textbannerindex h1 a:hover { font-size: <?php echo $options['index_heading_font_size']; ?> !important; }

<?php } ?>




</style>
<?php ?>