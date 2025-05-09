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
        <section class="listing-page listing-insights">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 col-xl-8 px-4 px-xl-0">
                        <div class="listing-inner d-flex flex-row flex-wrap justify-content-between">
                            <div class="listing-header w-100">
                                <div class="text-editor">
                                    <h2 class="font-RedHatDisplay fw-medium text-uppercase">Insights</h2>
                                </div>
                            </div>
                            <div class="listing-body w-100">
                                <div class="listing-body-inner">
                                <?php
                                $i = 1;
                                if( have_posts() ) {
                                    while( have_posts() ) {
                                        the_post();
                                        set_query_var( 'loop_index', $i );
                                        get_template_part( 'template-parts/archive-template', 'insights' );
                                        $i++;
                                    }
                                }
                                else {
                                    set_query_var( 'post_type', get_post_type() );
                                    get_template_part( 'template-parts/archive-template', 'none' );
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
