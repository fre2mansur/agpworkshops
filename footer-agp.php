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
            <div class="<?php echo esc_attr( $container ); ?> justify-content-center justify-content-md-start">
                <ul class="nav flex-row">
                    <li class="nav-item"><a class="nav-link" href="">Terms</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Privacy</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                </ul>
                <div class="flex-row ml-md-auto">
                   Follow US &#160;&#160;&mdash;&mdash;&#160;&#160;
                   <span class="social">
                   <a href=""><i class="fa fa-facebook"></i></a>
                   <a href=""><i class="fa fa-instagram"></i></a>
                   <a href=""><i class="fa fa-linkedin"></i></a> 
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

