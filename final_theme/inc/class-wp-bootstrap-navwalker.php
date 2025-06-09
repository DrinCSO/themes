<?php
/**
 * WP_Bootstrap_Navwalker class.
 * Source: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    private $current_item;
    private $dropdown_menu_alignment_values = [
        'dropdown-menu-start',
        'dropdown-menu-end',
        'dropdown-menu-sm-start',
        'dropdown-menu-sm-end',
        'dropdown-menu-md-start',
        'dropdown-menu-md-end',
        'dropdown-menu-lg-start',
        'dropdown-menu-lg-end',
        'dropdown-menu-xl-start',
        'dropdown-menu-xl-end',
        'dropdown-menu-xxl-start',
        'dropdown-menu-xxl-end',
    ];

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $dropdown_menu_class[] = '';
        foreach($this->current_item->classes as $class) {
            if(in_array($class, $this->dropdown_menu_alignment_values)) {
                $dropdown_menu_class[] = $class;
            }
        }
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . implode(' ', $dropdown_menu_class) . " depth_$depth\">\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $this->current_item = $item;

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = 'nav-item nav-item-' . $item->ID;

        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }

        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }

        $class_names = join(' ', array_filter($classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts['class'] = ($args->walker->has_children) ? 'nav-link dropdown-toggle' : 'nav-link';

        if ($args->walker->has_children) {
            $atts['id']           = 'menu-item-dropdown-' . $item->ID;
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
            $atts['role'] = 'button';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output  = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }

    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args = array(), &$output = '' ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}
