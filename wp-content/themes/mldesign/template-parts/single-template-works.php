<?php
$post_ID = get_the_ID();
$post_title = get_the_title();
$post_date = get_the_date();
$args = array(
    'post_type' => 'works',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => 3,
    'post__not_in' => array($post_ID),
);
?>
<section class="listing-page listing-works pb-0">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 col-xl-8 px-4 px-md-0">
                    <div class="d-flex flex-wrap single-row single-row-works">
                        <?php
                        if( has_post_thumbnail() ) {
                            echo '<div class="ins-thumbnail post-thumbnail mb-4"><img src="'.get_the_post_thumbnail_url().'" class="img-fluid w-100 h-100"/></div>';
                        }
                        ?>
                        <div class="ins-content">
                            <div class="text-editor mb-0">
                                <h2 class="single-post-title text-white text-uppercase fw-medium mb-2"><?php echo $post_title;?></h2>
                                <p class="single-post-date mb-0"><?php echo $post_date;?></p>
                            </div>
                            <div class="divider"></div>
                        </div>
                        <div class="ins-content">
                            <?php the_content();?>
                        </div>
                    </div>
                    <?php
                    $related = new WP_Query($args);
                    if( $related->have_posts() ) {
                        $i=1;
                    ?>
                    <div class="d-flex flex-wrap single-row single-row-related">
                        <div class="single-related-posts single-related-works">
                        <?php
                        while( $related->have_posts() ) {
                            $related->the_post();
                            set_query_var( 'loop_index', $i );
                            get_template_part('template-parts/archive-template', 'works');
                        }
                        wp_reset_postdata();
                        ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>