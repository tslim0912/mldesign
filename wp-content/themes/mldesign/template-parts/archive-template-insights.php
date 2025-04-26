<?php
$i = get_query_var( 'loop_index' );
$index = str_pad( $i, 2, '0', STR_PAD_LEFT );
$post_id = get_the_ID();
$post_title = get_the_title();
$display_title = get_field('display_title');
$date = get_the_date();
$post_date = date('d.m.Y', strtotime($date));
$excerpt = get_field('excerpt');
$permlink = get_permalink();
$listing_setting = get_field('listing_setting');
$classes = '';
$has_overlay = $listing_setting['thumbnail_overlay'];
if( $has_overlay ) {
    $overlay_style = $listing_setting['overlay_style'];
    if( $overlay_style == 'radial-gradient' ) {
        $classes .= ' overlay-radial';
    }
    else {
        $classes .= ' overlay-linear';
    }
}
?>
<div class="listing-item listing-item-<?php echo $index;?>">
    <div class="listing-item-inner d-flex flex-column">
        <div class="list-col list-col-date"><?php echo $post_date;?></div>
        <div class="list-col list-col-body d-flex flex-column">
            <div class="list-thumbnail">
            <?php    
                echo '<a href="'.$permlink.'" class="list-link'.$classes.'">';
                if( has_post_thumbnail() ) {
                    echo '<img src="'.get_the_post_thumbnail_url().'" class="img-fluid w-100 h-100"/>';
                }
                echo '</a>';
            ?>
            </div>
            <div class="list-content">
                <div class="list-content-row d-flex flex-wrap">
                <?php
                echo '<a href="'.$permlink.'" class="list-link">';
                    echo '<p>';
                    if( $display_title ) { echo '<span class="fw-medium text-uppercase">'.$post_title.': </span>'; }
                    echo $excerpt.'</p>';  
                echo '</a>';
                ?>
                </div>
            </div>
        </div>
    </div>
</div>