<?php
class MLD_Custom_Nav_Walker extends Walker_Nav_Menu {

    private $total_items = 0;
    private $current_item = 0;

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Access total_items from $args
        if ($this->total_items === 0 && isset($args->total_items)) {
            $this->total_items = $args->total_items; // Get the total items count from args
        }

        // Calculate the middle index
        $middle_index = floor($this->total_items / 2);

        // Insert "Home" link in the middle item
        if ($this->current_item == $middle_index) {
            $site_logo = get_theme_mod('custom_logo');
            $site_logo_url = wp_get_attachment_image_url($site_logo, 'full');
            $output .= '<li class="nav-item site-logo"><a href="' . home_url() . '" class="nav-link navbar-brand"><span class="d-none">Home</span><img src="'.$site_logo_url.'" class="img-fluid w-100"/></a></li>';
        }

        // Output the regular menu item
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'nav-item';

        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = [];
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';
        $atts['class']  = 'nav-link';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= " $attr=\"$value\"";
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $output .= "<a$attributes>$title</a>";

        // Increment current item counter
        $this->current_item++;
    }

    // End the element output.
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}
