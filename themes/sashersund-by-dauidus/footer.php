<?php
// load the theme options
$options = get_option( 'Blogphix_theme_settings' );
?>

</div><!--content wrap-->

<footer class="wraps-footer">
            <div class="footer-filler">
            <!-- start widget footer area -->
                    <div class="footer-widget-area-block">
                                <div class="footer-margin-blocks">
                                        <div class="footer-blocked-inside">
                                        <?php if ( is_sidebar_active('first_widget_footer') ) : ?>
                                            <div class="widget-third">  
                                                <div class="widget-area-footer">
                                                    <?php dynamic_sidebar('first_widget_footer'); ?>
                                                </div><!--end widget-area-footer -->
                                            </div><!--end onefourth-->
                                        
                                        <?php endif; ?>
                                        <?php if ( is_sidebar_active('second_widget_footer') ) : ?>
                                            <div class="widget-third">  
                                                <div class="widget-area-footer">
                                                    <?php dynamic_sidebar('second_widget_footer'); ?>
                                                </div><!--end widget-area-footer -->
                                            </div><!--end onefourth-->
                                        <?php endif; ?>
                                        
                                        <?php if ( is_sidebar_active('third_widget_footer') ) : ?>
                                            <div class="widget-third">  
                                                <div class="widget-area-footer">
                                                    <?php dynamic_sidebar('third_widget_footer'); ?>
                                                </div><!--end widget-area-footer -->
                                            </div><!--end onefourth-->  
                                        <?php endif; ?>
                                        
                                        
                                        <?php if ( is_sidebar_active('fourth_widget_footer') ) : ?>
                                            <div class="widget-third">  
                                                <div class="widget-area-footer">
                                                    <?php dynamic_sidebar('fourth_widget_footer'); ?>
                                                </div><!--end widget-area-footer -->
                                            </div><!--end onefourth-->  
                                        <?php endif; ?>
                                        
                                        </div>
                                        </div><!-- end of inner footer boxes -->
                                        </div><!-- end of footer widget area -->
                                        
                                        <div class="footershadow">
                                            <div class="topping-placement">
                                                <div class="totop-wrap">
                                                    <span id="toTop"></span>
                                            </div>
                                        </div>
                                            <div class="footerbox">
                                            
                                                    <div class="footerlinksleft">
                                                        <?php if($options['custom_footer_right'] != '') { ?>
                                                                <?php echo stripslashes($options['custom_footer_right']); ?> 
                                                                <?php } else { ?>
                                                                Copyright &copy; 2012-<?php echo date("Y") ?> s. asher sund
                                                            <?php } ?>
                                                    </div><!--end footer footerlinksleft-->
                                                    
                                                    <div class="footerlinksright">
                                                            <?php if($options['custom_footer_right'] != '') { ?>
                                                                <?php echo stripslashes($options['custom_footer_right']); ?> 
                                                                <?php } else { ?>
                                                                design by <a href="http://www.dauid.us" target="_blank">dauid.us</a>
                                                            <?php } ?>
                                                    </div><!--end footer footerlinksright-->
                                            </div><!--end footer box-->  
                        </div><!--END FOOTER WRAP SHELL AND SHELL-->
            </div>
</footer>
<?php 
//show tracking code for the footer
echo stripslashes($options['tracking_footer']); 
?>

<?php
//footer hook - don't remove
wp_footer(); ?>

</body>
</html>