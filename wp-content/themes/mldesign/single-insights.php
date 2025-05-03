<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MLDesign
 */

get_header();
?>
    <main class="site-main" id="primary">

        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/single-template', get_post_type() );

        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
<?php
get_footer();
