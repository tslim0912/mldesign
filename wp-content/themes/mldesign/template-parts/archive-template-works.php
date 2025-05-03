<?php
$i = get_query_var( 'loop_index' );
$index = str_pad( $i, 2, '0', STR_PAD_LEFT );
$post_id = get_the_ID();
$post_title = get_the_title();
$terms = get_the_terms($post_id, 'work-types');
$first_term = 'NULL';
if (!empty($terms) && !is_wp_error($terms)) {
    $first_term = $terms[0];
}
$location = get_field('location');
$permlink = get_permalink();
?>
<div class="listing-item listing-item-<?php echo $index;?>">
    <div class="listing-item-inner d-flex flex-column">
        <div class="list-col list-col-meta">
        <?php
            echo '<a href="'.$permlink.'" class="list-link text-decoration-none"><h5 class="text-white mb-3 mb-md-0">'.$post_title.'</h5></a>';
            echo '<div class="d-flex justify-content-start align-items-start gap-1 gap-md-2">';
                echo '<span class="lost-cat">'.$first_term->name.'</span>';
                echo '<span class="list-text-divider mx-1 mx-md-0">|</span>';
                echo '<span class="list-location">'.$location.'</span>';
            echo '</div>';
        ?>
        </div>
        <div class="list-col list-col-body d-flex flex-column">
            <div class="list-thumbnail">
            <?php    
                echo '<a href="'.$permlink.'" class="list-link text-decoration-none">';
                if( has_post_thumbnail() ) {
                    echo '<img src="'.get_the_post_thumbnail_url().'" class="img-fluid w-100 h-100"/>';
                }
                echo '</a>';
            ?>
            </div>
        </div>
    </div>
</div>