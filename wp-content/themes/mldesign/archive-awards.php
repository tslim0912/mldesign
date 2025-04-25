<?php
/**
 * The template for displaying archive pages - Awards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MLDesign
 */

get_header();
?>
    <main class="site-main" id="primary">
        <section class="listing-page listing-awards">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 col-xl-9 px-4 px-md-0">
                        <div class="listing-inner d-flex flex-row flex-wrap justify-content-between">
                            <div class="listing-header">
                                <h2 class="font-RedHatDisplay fw-medium text-uppercase">Awards</h2>
                            </div>
                            <div class="listing-body">
                                <div class="listing-body-inner">
                                <?php
                                $i = 1;
                                if( have_posts() ) {
                                    while( have_posts() ) {
                                        the_post();
                                        set_query_var( 'loop_index', $i );
                                        get_template_part( 'template-parts/archive-template', 'awards' );
                                        $i++;
                                    }
                                }
                                else {
                                    get_template_part( 'template-parts/archive-template', 'awards-none' );
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
?>
