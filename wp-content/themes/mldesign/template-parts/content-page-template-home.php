<?php
$page_id = get_the_ID();
$page_title = get_the_title();

$intro = get_field('introduction');
$intro_field_object = get_field_object('introduction');
$field_key = $intro_field_object['key']; 
$clean_field_key = str_replace('field_', '', $field_key);
$unique_class = 'section-'.$clean_field_key.'-'.$page_id;
if( $intro['background_image'] ) {
    $bg_intro = $intro['background_image']['url'];
}
else {
    $bg_intro = mldesign_fallback_image_url();
}
if( $intro['background_image_mobile'] ) {
    $bg_intro_mobile = $intro['background_image_mobile']['url'];
}
else {
    $bg_intro_mobile = $bg_intro;
}
$backdrop = 'backdrop';
if( $intro['simple_parallax'] ) {
    $backdrop .= ' parallax-image';
}
$caption_alignment = $intro['caption_alignment'];
$caption_alignment_mobile = $intro['caption_alignment_mobile'];
$row_alignments = $caption_alignment_mobile.' '.$caption_alignment;
$text_alignment = $intro['text_alignment'];
$text_alignment_mobile = $intro['text_alignment_mobile'];
$caption_alignments = $text_alignment_mobile.' '.$text_alignment;
$intro_content = $intro['content'];
?>
<section class="<?php echo $unique_class;?>" id="introduction">
    <style type="text/css">
        .<?php echo $unique_class;?> .backdrop {
            background-image: url(<?php echo $bg_intro;?>);
        }
        @media (max-width: 1199px) and (orientation: portrait) {
            .<?php echo $unique_class;?> .backdrop {
                background-image: url(<?php echo $bg_intro_mobile;?>);
            }
        }
    </style>
    <div class="<?php echo $backdrop;?>"></div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0">
                <div class="d-flex flex-wrap intro-caption-row <?php echo $row_alignments;?> align-items-start align-items-md-center">
                    <div class="intro-caption <?php echo $caption_alignments;?> px-4">
                        <?php echo $intro_content;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

$about = get_field('about');
$about_field_object = get_field_object('about');
$field_key_about = $about_field_object['key']; 
$clean_field_key_about = str_replace('field_', '', $field_key_about);
$unique_class_about = 'section-'.$clean_field_key_about.'-'.$page_id;
$column_1 = $about['column_1'];
$column_2 = $about['column_2'];
$column_image = $about['column_image'];
$column_link = $about['column_link'];
?>
<section class="<?php echo $unique_class_about;?>" id="about">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-about">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 col-md-6 px-4 ps-md-0 col-left mb-4 mb-md-0">
                        <div class="text-editor">
                        <?php echo $column_1;?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 px-4 pe-md-0 col-right">
                        <div class="text-editor">
                        <?php echo $column_2;?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-end flex-md-row-reverse">
                <?php
                if( $column_image ) {
                ?>
                    <div class="col-12 col-md-9 px-4 px-md-0">
                        <div class="img-wrapper"><img src="<?php echo $column_image['url'];?>" class="img-fluid w-100"/></div>
                    </div>
                <?php
                }
                if( $column_link ) {
                    $link_url = $column_link['url'];
                    $link_title = $column_link['title'];
                    $link_target = $column_link['target'] ? $column_link['target'] : '_self';
                ?>
                    <div class="col-12 col-md-3 px-4 ps-md-0">
                        <div class="btn-wrapper">
                            <a class="btn btn-outline text-white p-0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
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

<?php
$project = get_field('featured_project');
$project_field_object = get_field_object('featured_project');
$field_key_project = $project_field_object['key']; 
$clean_field_key_project = str_replace('field_', '', $field_key_project);
$unique_class_project = 'section-'.$clean_field_key_project.'-'.$page_id;
$project_ta = $project['text_alignmnet'];
$project_ta_mobile = $project['text_alignmnet_mobile'];
$project_alignments = $project_ta_mobile.' '.$project_ta;
$project_title = $project['section_title'];
$project_divider = $project['divider'];
?>
<section class="<?php echo $unique_class_project;?>" id="featured-project">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-insights">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="text-editor <?php echo $project_alignments;?>">
                            <?php echo $project_title;?>
                        </div>
                        <?php
                        if( $project_divider ) {
                            echo mldesign_divider();
                        }
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                    <?php
                    $ppp = $project['posts_per_page'];
                    $read_more = $project['read_more'];
                    $p_args = array(
                        'post_type' => 'projects',
                        'post_status' => 'publish',
                        'posts_per_page' => $ppp,
                        'orderby' => 'date',
                        'order' => 'desc',
                    );
                    $project = new WP_Query($p_args);
                    if( $project->have_posts() ) {
                    ?>
                        <div class="featured-project-wrapper">
                            <div class="swiper featured-project-swiper" id="featured-project-swiper">
                                <div class="swiper-wrapper">
                                <?php while( $project->have_posts() ) {
                                    $project->the_post();
                                    $project_title = get_the_title();
                                    $project_location = get_field('location');
                                    $project_url = get_permalink();
                                    if( has_post_thumbnail() ) {
                                        $project_thumbnail = get_the_post_thumbnail_url();
                                    }
                                    else {
                                        $project_thumbnail = mldesign_fallback_image_url();
                                    }
                                    echo '<div class="swiper-slide project-item"><div class="project-item-inner"><div class="project-meta mb-4"><h5 class="project-title fw-regular text-white text-uppercase mb-2"><a href="'.$project_url.'" class="project_link">'.$project_title.'</a></h5><p class="project-location text-grey">'.$project_location.'</p></div><div class="project-thumbnail post-thumbnail"><a href="'.$project_url.'" class="project_link"><img src="'.$project_thumbnail.'" class="img-fluid w-100"/></a></div></div></div>';
                                } 
                                wp_reset_postdata();
                                ?>
                                </div>
                                <div class="fp-bottom d-flex flex-row justify-content-between mt-4 mt-md-5">
                                    <div class="feature-project-pagination"></div>
                                    <?php if( $read_more ) {
                                        echo '<div class="btn-wrapper"><a href="'.$read_more['url'].'"><span>'.$read_more['title'].'</span></a></div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    else {
                        echo '<p class="fw-light text-white">There is no <strong class="fw-medium">Featured Project</strong> at the moment!</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$legacy = get_field('legacy');
$legacy_field_object = get_field_object('legacy');
$field_key_legacy = $legacy_field_object['key']; 
$clean_field_key_legacy = str_replace('field_', '', $field_key_legacy);
$unique_class_legacy = 'section-'.$clean_field_key_legacy.'-'.$page_id;
$legacy_ta = $legacy['text_alignment'];
$legacy_ta_mobile = $legacy['text_alignment_mobile'];
$legacy_alignments = $legacy_ta_mobile.' '.$legacy_ta;
$legacy_title = $legacy['section_title'];
$legacy_divider = $legacy['divider'];
?>
<section class="<?php echo $unique_class_legacy;?>" id="legacy">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-insights">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="text-editor <?php echo $legacy_alignments;?>">
                            <?php echo $legacy_title;?>
                        </div>
                        <?php
                        if( $legacy_divider ) {
                            echo mldesign_divider();
                        }
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 mb-4 mb-md-0">
                        <div class="global-map" id="global-map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$working = get_field('working');
$working_field_object = get_field_object('working');
$field_key_working = $working_field_object['key']; 
$clean_field_key_working = str_replace('field_', '', $field_key_working);
$unique_class_working = 'section-'.$clean_field_key_working.'-'.$page_id;
$working_ta = $working['text_alignment'];
$working_ta_mobile = $working['text_alignment_mobile'];
$working_alignments = $working_ta_mobile.' '.$working_ta;
$working_title = $working['section_title'];
$working_divider = $working['divider'];
?>
<section class="<?php echo $unique_class_working;?>" id="working">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-insights">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="text-editor <?php echo $working_alignments;?>">
                            <?php echo $working_title;?>
                        </div>
                        <?php
                        if( $working_divider ) {
                            echo mldesign_divider();
                        }
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="working-iframe">
                        <?php
                        if( $working['video_thumbnail'] ) {
                            if( $working['video_link'] ) {
                                $fancybox_link = $working['video_link'];
                            }
                            else {
                                $fancybox_link = $working['video_thumbnail']['url'];
                            }
                            echo '<a href="'.$fancybox_link.'" class="fancybox">';
                            echo '<img src="'.$working['video_thumbnail']['url'].'" class="img-fluid w-100"/>';
                            echo '</a>';
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$insights = get_field('insights');
$insights_field_object = get_field_object('insights');
$field_key_insights = $insights_field_object['key']; 
$clean_field_key_insights = str_replace('field_', '', $field_key_insights);
$unique_class_insights = 'section-'.$clean_field_key_insights.'-'.$page_id;
$insight_ta = $insights['text_alignment'];
$insight_ta_mobile = $insights['text_alignment_mobile'];
$about_alignments = $insight_ta_mobile.' '.$insight_ta;
$about_title = $insights['section_title'];
$orderby = $insights['sort_by'];
$order = $insights['order'];
$insights_cta = $insights['call_to_action'];
$insights_divider = $insights['divider'];
?>
<section class="<?php echo $unique_class_insights;?>" id="insights">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-insights">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="text-editor <?php echo $about_alignments;?>">
                            <?php echo $about_title;?>
                        </div>
                        <?php
                        if( $insights_divider ) {
                            echo mldesign_divider();
                        }
                        ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 px-4 mb-4 mb-md-0">
                        <div class="listing-insights">
                            <div class="listing-body">
                                <div class="listing-body-inner">
                                <?php
                                $insights_args = array(
                                    'post_type' => 'insights',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 3,
                                    'orderby' => $orderby,
                                    'order' => $order,
                                );
                                $insights = new WP_Query($insights_args);
                                if( $insights->have_posts() ) {
                                    $i = 1;
                                    while( $insights->have_posts() ) {
                                        $insights->the_post();
                                        set_query_var( 'loop_index', $i );
                                        get_template_part( 'template-parts/archive-template', 'insights' );
                                        $i++;
                                    }
                                    wp_reset_postdata();
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if( $insights_cta ) {
                    $insights_url = $insights_cta['url'];
                    $insights_title = $insights_cta['title'];
                    $insights_target = $insights_cta['target'] ? $column_link['target'] : '_self';
                ?>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 mb-4 mb-md-0">
                        <div class="btn-wrapper text-center">
                            <a class="btn btn-outline text-white p-0" href="<?php echo esc_url( $insights_url ); ?>" target="<?php echo esc_attr( $insights_target ); ?>"><?php echo esc_html( $insights_title ); ?></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>