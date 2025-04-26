<?php
$post_type = get_query_var( 'post_type' );
if ( $post_type == 'awards' ) {
    echo '<div class="listing-item-inner"><div class="list-col list-col-error">There is no Award found!</div></div>';
}
else if ( $post_type == 'insights' ) {
    echo '<div class="listing-item-inner"><div class="list-col list-col-error">There is no Insight found!</div></div>';
}
else if ( $post_type == 'works' ) {
    echo '<div class="listing-item-inner"><div class="list-col list-col-error">There is no Work found!</div></div>';
}
else if ( $post_type == 'accomplishments' ) {
    echo '<div class="listing-item-inner"><div class="list-col list-col-error">There is no Accomplishment found!</div></div>';
}
?>