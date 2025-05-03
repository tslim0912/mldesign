<?php
/*
 * Template name: MLD - Works
 *
 *
 *
*/

$post_type = 'works';
get_header();
?>
    <main class="site-main" id="primary">
        <section class="listing-page listing-works">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-11 col-xl-8 px-4 px-md-0">
                        <div class="listing-inner d-flex flex-row flex-wrap justify-content-between">
                            <div class="listing-header w-100 d-flex flex-column flex-md-row flex-wrap flex-md-nowrap align-items-start justify-content-start justify-content-md-between mb-0 mb-md-3 gap-0 gap-md-4 gap-xl-5">
                                <div class="text-editor">
                                    <h2 class="archive-title archive-title-work d-inline-block font-RedHatDisplay fw-medium text-uppercase mb-0">OUR <strong>WORKS</strong></h2>
                                </div>
                                <ul class="nav filter-list filter-works d-flex flex-1 justify-content-start justify-content-md-end align-items-start w-100 w-md-auto mb-4 mb-xl-0">
                                    <li class="filter-item">
                                        <button type="button" class="btn btn-box filter-btn<?php if( !isset($_GET['type']) ) { echo ' active'; };?>" data-filter="all"><span>All</span></button>
                                    </li>
                                <?php 
                                $terms = get_terms([
                                    'taxonomy'   => 'work-types',
                                    'hide_empty' => false,
                                ]);
                                foreach($terms as $term) {
                                    $filter_active = isset($_GET['type']) && $_GET['type'] == $term->slug ? ' active' : '';
                                    echo '<li class="filter-item filter-item-'.$term->slug.'"><button type="button" class="btn btn-box filter-btn'.$filter_active.'" data-filter="'.$term->slug.'"><span>'.$term->name.'</span></button></li>';
                                } ?>
                                </ul>
                            </div>
                            <div class="listing-body w-100 mb-4 mb-xl-5" data-post-type="<?php echo $post_type;?>">
                                <div class="loading"><span class="loader"></span></div>
                                <div class="listing-body-inner">
                                <?php
                                $filter = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
                                $paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
                                $args = array(
                                    'post_type' => 'works',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 1,
                                    'paged' => $paged,
                                    'orderby' => 'date',
                                    'order' => 'desc',
                                );
                                if(!empty($filter) && $filter !== 'all') {
                                    $args['tax_query'] = [
                                        [
                                            'taxonomy' => 'work-types',
                                            'field'    => 'slug',
                                            'terms'    => $filter,
                                        ]
                                    ];
                                }
                                $works = new WP_Query($args);
                                $i = 1;
                                if( $works->have_posts() ) {
                                    while( $works->have_posts() ) {
                                        $works->the_post();
                                        set_query_var( 'loop_index', $i );
                                        get_template_part( 'template-parts/archive-template', 'works' );
                                        $i++;
                                    }
                                    wp_reset_postdata();
                                }
                                else {
                                    set_query_var( 'post_type', $post_type );
                                    get_template_part( 'template-parts/archive-template', 'none' );
                                }
                                ?>
                                </div>
                            </div>
                            <div class="listing-pagination">
                            <?php
                            $big = 999999999;

                            $pagination = paginate_links([
                                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format'    => '',
                                'current'   => $paged,
                                'total'     => $works->max_num_pages,
                                'type'      => 'array',
                                'prev_text' => '<span class="mld-arrow arrow-prev"></span>',
                                'next_text' => '<span class="mld-arrow arrow-next"></span>',
                            ]);

                            if (!empty($pagination)) {
                                echo '<div class="archive-pagination">';
                                foreach ($pagination as $link) {
                                    $dom = new DOMDocument();
                                    @$dom->loadHTML($link);
                                    $anchor = $dom->getElementsByTagName('a')->item(0);
                            
                                    if ($anchor) {
                                        $class = $anchor->getAttribute('class');
                                        $text = trim($anchor->nodeValue);
                            
                                        // Determine target page number
                                        if (strpos($class, 'next') !== false) {
                                            $page = $paged + 1;
                                        } elseif (strpos($class, 'prev') !== false) {
                                            $page = max(1, $paged - 1);
                                        } elseif (is_numeric($text)) {
                                            $page = (int)$text;
                                        } else {
                                            $page = 1; // fallback
                                        }
                            
                                        echo '<a href="javascript:void(0);" class="' . esc_attr($class) . '" data-paged="' . esc_attr($page) . '">' . esc_html($text) . '</a>';
                                    } else {
                                        echo $link; // fallback for span.current
                                    }
                                }
                                echo '</div>';
                            }
                            ?>
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