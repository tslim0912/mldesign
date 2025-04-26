<?php
$i = get_query_var( 'loop_index' );
$index = str_pad( $i, 2, '0', STR_PAD_LEFT );
$post_id = get_the_ID();
$post_title = get_the_title();
$post_award = get_field('award_level', $post_id);
$terms = get_the_terms( $post_id, 'award-year' );
$post_year = '';
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $term = $terms[0];
    $post_year = $term->name;
}
?>
<div class="listing-item listing-item-<?php echo $index;?>">
    <div class="listing-item-inner">
        <div class="list-col list-col-index"><?php echo $index;?></div>
        <div class="list-col list-col-title text-uppercase"><?php echo $post_title;?></div>
        <div class="list-col list-col-award text-uppercase"><?php echo $post_award;?></div>
        <div class="list-col list-col-year"><?php echo $post_year;?></div>
    </div>
</div>