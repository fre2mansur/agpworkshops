<div class="wrap">
<?php settings_errors(); 

    function agp_social_options(){
         
        
    }
        function agp_facebook_link(){
            $facebook = esc_attr(get_option('facebook'));
            echo '<input class="regular-text" type="url" name="facebook" value="'.$facebook.'" placeholder=" "  />';
    }

    function agp_insta_link(){
        $insta = esc_attr(get_option('instagram'));
        echo '<input class="regular-text" type="url" name="instagram" value="'.$insta.'" placeholder=" "  />';
    }

    function agp_linkedin_link(){
    $linkedin = esc_attr(get_option('linkedin'));
    echo '<input class="regular-text" type="url" name="linkedin" value="'.$linkedin.'" placeholder=" "  />';
    }

    function agp_twitter_link(){
    $twitter = esc_attr(get_option('twitter'));
    echo '<input class="regular-text" type="url" name="twitter" value="'.$twitter.'" placeholder=" "  />';
    }
    
    function agp_google_analytics_link(){
        $googleanalytics = get_option('googleanalytics');
        echo '<textarea name="googleanalytics" rows="8" >'.$googleanalytics.'</textarea>';
    }
    function agp_pixel_analytics_link(){
        $pixelanalytics = get_option('pixelanalytics');
        echo '<textarea name="pixelanalytics" rows="8" >'.$pixelanalytics.'</textarea>';
    }


?>

<form method="post" action="options.php">
    <?php settings_fields('agp-settings-group'); ?>
    <?php do_settings_sections('agp_settings'); ?> <!-- name of the page where the section belongs -->
    <?php submit_button() ?>

    
</form>
<!-- How to create a custom link of option in other pages
 <button class="button button-primary" 
 onclick="location.href='<?php print get_option( 'facebook'); ?>'" type="button">
        Facebook
</button> -->
<style>
    textarea{
        width:80% !important;
    }
</style>
</div>



