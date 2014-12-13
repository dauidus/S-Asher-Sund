<div class="share-this-show">
<?php
            //include facebook social on posts if option is checked
            if ($options['disable_social_facebook'] != false) {
            include_once get_template_directory() . '/includes/facebook-social.php';
            }
            
            //include twitter social on posts if option is checked
            if ($options['disable_social_twitter'] != false) {
            include_once get_template_directory() . '/includes/twitter-social.php';
            }
                        
            //include googleplusone social on posts if option is checked
            if ($options['disable_social_googleplus'] != false) {
            include_once get_template_directory() . '/includes/google-plus-one-social.php';
            }


?>
</div>