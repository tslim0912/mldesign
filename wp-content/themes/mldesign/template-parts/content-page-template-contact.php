<?php
$contact = get_field('contact');
$contact_field_object = get_field_object('contact');
$field_key_contact = $contact_field_object['key']; 
$clean_field_key_contact = str_replace('field_', '', $field_key_contact);
$unique_class_contact = 'section-'.$clean_field_key_contact.'-'.$page_id;
$column_1 = $contact['column_1'];
$column_2 = $contact['column_2'];
$form_shortcode = $contact['form_shortcode'];
?>
<section class="<?php echo $unique_class_contact;?>" id="contact">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-8 px-0 d-flex flex-column flex-section-row flex-row-contact">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-md-start">
                    <div class="col-12 col-md-6 px-4 mb-4 mb-md-0">
                        <div class="text-editor">
                            <?php echo $column_1;?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 px-4 ">
                        <?php if( $column_2) { ?>
                        <div class="text-editor">
                            <?php echo $column_2;?>
                        </div>
                        <?php } 
                        if( $form_shortcode ) {
                            echo do_shortcode($form_shortcode);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>