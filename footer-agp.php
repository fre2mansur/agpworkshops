<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="footer">
    
        <div class="footer-top navbar">
            <div class="<?php echo esc_attr( $container ); ?>">
            <?php 
                wp_nav_menu(
                array(
                    'theme_location'  => 'footer',
                    'container_class' => '',
                    'menu_class'      => 'nav flex-row', //Ul class
                    'menu_id'         => 'footer-menu',
                    'fallback_cb'     => '',
                    'walker'          => new understrap_WP_Bootstrap_Navwalker(),
                ) 
                );
            ?>
                <div class="flex-row ml-md-auto">
                   Follow US &#160;&#160;&mdash;&mdash;&#160;&#160;
                   <span class="social">
                    <?php if(get_option('facebook')) { ?>
                        <a target="_blank" href="<?php echo get_option('facebook'); ?>"><i class="fa fa-facebook"></i></a>
                    <?php } if(get_option('twitter')) { ?>
                        <a target="_blank" href="<?php echo get_option('twitter'); ?>"><i class="fa fa-twitter"></i></a>
                    <?php } if(get_option('instagram')) {?>
                        <a target="_blank" href="<?php echo get_option('instagram'); ?>"><i class="fa fa-instagram"></i></a>
                    <?php } if(get_option('linkedin')) {?>
                        <a target="_blank"href="<?php echo get_option('linkedin'); ?>"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="<?php echo esc_attr( $container ); ?>">
                <p class="copy m-0">&copy; <?php echo date('Y')?> <?php echo bloginfo();?> | All rights Reserved</p>
            </div>
        </div>

</div><!-- footer-->



<?php wp_footer(); ?>
</body>
</html>

