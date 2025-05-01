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
<section class="page-intro <?php echo $unique_class;?>" id="introduction">
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

$about = get_field('philosophy');
$about_field_object = get_field_object('philosophy');
$field_key_about = $about_field_object['key']; 
$clean_field_key_about = str_replace('field_', '', $field_key_about);
$unique_class_about = 'section-'.$clean_field_key_about.'-'.$page_id;
?>
<section class="<?php echo $unique_class_about;?>" id="our-philosophy">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-philosophy">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-between align-items-md-start flex-md-row-reverse">
                    <div class="col-12 col-md-6 px-4 ps-md-0 col-left mb-4 mb-md-0 ps-md-4">
                        <div class="text-editor">
                            <h2 class="text-white mb-5"><strong>ABOUT</strong> US</h2>
                        <?php
                        $column_right = $about['right_column'];
                        $philosophy_about = $column_right['about_us'];
                        echo $philosophy_about;
                        ?>
                        </div>
                        <div class="divider"></div>
                        <div class="text-editor">
                            <h2 class="text-white mb-5"><strong>OUR</strong> PHILOSOPHY</h2>
                        </div>
                        <div class="accordion philosophy-accordion" id="philosophy-accordion">
                        <?php
                        $accordions = $about['right_column']['our_philosophy'];
                        $i = 1;
                        foreach( $accordions as $item ) {
                            $index = str_pad( $i, 2, "0", STR_PAD_LEFT);
                        ?>
                            <div class="accordion-item bg-transparent">
                                <h2 class="accordion-header text-white">
                                    <button class="accordion-button collapsed bg-transparent px-0 py-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index;?>" aria-expanded="true" aria-controls="collapse<?php echo $index;?>"><?php echo $item['tab_title'];?></button>
                                </h2>
                                <div id="collapse<?php echo $index;?>" class="accordion-collapse collapse text-white" data-bs-parent="#philosophy-accordion">
                                    <div class="accordion-body px-4 pt-0 pb-4"><?php echo $item['tab_content'];?></div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 px-4 col-right pe-ms-4 h-md-100">
                    <?php
                    if( !empty($about['left_column']['background_image']) ) { 
                        $abg = $about['left_column']['background_image'];
                    }
                    else {
                        $abg = mldesign_fallback_image_url();
                    }
                    if( !empty($about['left_column']['background_image_mobile']) ) {
                        $abg_mobile = $about['left_column']['background_image_mobile'];
                    }
                    else {
                        $abg_mobile - $abg;
                    }
                    ?>
                        <div class="text-editor-bg">
                            <picture>
                                <source srcset="<?php echo $abg;?>" media="(min-width: 768px) and (orientation: landscape)">
                                <img src="<?php echo $abg_mobile;?>" class="img-fluid w-100 h-100"/>
                            </picture>
                        </div>
                    <?php
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$director = get_field('director');
$director_field_object = get_field_object('director');
$field_key_director = $director_field_object['key']; 
$clean_field_key_director = str_replace('field_', '', $field_key_director);
$unique_class_director = 'section-'.$clean_field_key_director.'-'.$page_id;
$director_title = $director['title'];
$director_position = $director['position'];
$director_words = $director['words'];
$director_image = $director['image'];
?>
<section class="<?php echo $unique_class_director;?>" id="director">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-director">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-between align-items-md-start">
                    <div class="col-12 col-md-6 col-xl-5 px-4 ps-xl-0 col-left mb-4 mb-md-0 d-flex flex-column justify-content-md-between h-auto h-md-100">
                        <?php if( $director_title || $director_position ) {
                            echo '<div class="text-editor">';
                            if( $director_title ) { echo '<h2 class="text-white mb-0">'.$director_title.'</h2>'; }
                            if( $director_position ) { echo '<p class="director-position mb-0">'.$director_position.'</p>'; }
                            echo '</div>';
                        } ?>
                        <?php if($director_words) { echo '<div class="text-editor mb-4 mb-md-0"><p class="text-grey mb-4 mb-md-0">'.$director_words.'</p></div>'; }?>
                    </div>
                    <div class="col-12 col-md-6 px-4 pe-xl-0 col-right">
                        <?php if( $director_image ) { echo '<div class="text-editor-bg"><img src="'.$director_image.'" class="img-fluid w-100 h-100"/></div>'; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$services = get_field('our_services');
$services_field_object = get_field_object('our_services');
$field_key_services = $services_field_object['key']; 
$clean_field_key_services = str_replace('field_', '', $field_key_services);
$unique_class_services = 'section-'.$clean_field_key_services.'-'.$page_id;
$service_title = $services['title'];
$service_content = $services['content'];
$service_image = $services['image'];
$service_cta = $services['call_to_action'];
?>
<section class="<?php echo $unique_class_services;?>" id="our-services">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-services">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 col-md-6 px-4 ps-xl-0 col-left mb-4 mb-md-0">
                    <?php if( $service_title ) {
                        echo '<div class="text-editor">'.$service_title.'</div>';
                    } ?>
                    </div>
                    <div class="col-12 col-md-6 px-4 pe-md-0 col-right">
                    <?php if( $service_content ) {
                        echo '<div class="text-editor">'.$service_content.'</div>';
                    } ?>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-end flex-md-row-reverse">
                <?php
                if( $service_image ) {
                ?>
                    <div class="col-12 col-md-9 px-4 px-xl-0">
                        <div class="img-wrapper"><img src="<?php echo $service_image['url'];?>" class="img-fluid w-100"/></div>
                    </div>
                <?php
                }
                if( $service_cta ) {
                    $slink_url = $service_cta['url'];
                    $slink_title = $service_cta['title'];
                    $slink_target = $service_cta['target'] ? $service_cta['target'] : '_self';
                ?>
                    <div class="col-12 col-md-3 px-4 ps-xl-0">
                        <div class="btn-wrapper">
                            <a class="btn btn-outline text-white p-0" href="<?php echo esc_url( $slink_url ); ?>" target="<?php echo esc_attr( $slink_target ); ?>"><?php echo esc_html( $slink_title ); ?></a>
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