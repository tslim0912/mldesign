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

?>



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
?>
<section class="<?php echo $unique_class_insights;?>" id="insights">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-insights">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 mb-4 mb-md-0">
                        <div class="text-editor <?php echo $about_alignments;?>">
                            <?php echo $about_title;?>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 mb-4 mb-md-0">
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