<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MLDesign
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-xl-9 px-4 px-md-0">
                    <div class="footer-columns">
                    <?php 
                    if ( is_active_sidebar( 'footer-columns' ) ) : 
                        dynamic_sidebar( 'footer-columns' );
                    endif; 
                    ?>
                    </div>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
