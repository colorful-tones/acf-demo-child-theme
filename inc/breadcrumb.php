<?php
/**
 * Add to your child theme's functions.php or include file
 */
function get_car_breadcrumb($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    // Get manufacturer terms hierarchically
    $manufacturer_terms = get_the_terms($post_id, 'manufacturer');
    
    if (!$manufacturer_terms || is_wp_error($manufacturer_terms)) {
        return '';
    }
    
    // Build hierarchical array of terms
    $term_hierarchy = array();
    foreach ($manufacturer_terms as $term) {
        if ($term->parent == 0) {
            $term_hierarchy[$term->term_id] = array(
                'name' => $term->name,
                'slug' => $term->slug,
                'children' => array()
            );
        } else {
            $parent_id = $term->parent;
            if (isset($term_hierarchy[$parent_id])) {
                $term_hierarchy[$parent_id]['children'][] = array(
                    'name' => $term->name,
                    'slug' => $term->slug
                );
            }
        }
    }
    
    // Build breadcrumb HTML
    $breadcrumb = '<nav class="car-breadcrumb" aria-label="Car manufacturer navigation">';
    $breadcrumb .= '<ol class="breadcrumb-list">';
    
    // Add home link
    $breadcrumb .= sprintf(
        '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
        esc_url(home_url('/')),
        esc_html__('Home', 'your-theme-text-domain')
    );
    
    // Add archive link
    $post_type = get_post_type($post_id);
    $post_type_obj = get_post_type_object($post_type);
    if ($post_type_obj) {
        $breadcrumb .= sprintf(
            '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
            esc_url(get_post_type_archive_link($post_type)),
            esc_html($post_type_obj->labels->name)
        );
    }
    
    // Add manufacturer terms
    foreach ($term_hierarchy as $parent) {
        // Add parent manufacturer
        $breadcrumb .= sprintf(
            '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
            esc_url(get_term_link($parent['slug'], 'manufacturer')),
            esc_html($parent['name'])
        );
        
        // Add child manufacturers/models
        foreach ($parent['children'] as $child) {
            $breadcrumb .= sprintf(
                '<li class="breadcrumb-item"><a href="%s">%s</a></li>',
                esc_url(get_term_link($child['slug'], 'manufacturer')),
                esc_html($child['name'])
            );
        }
    }
    
    // Add current car name
    $breadcrumb .= sprintf(
        '<li class="breadcrumb-item current-item">%s</li>',
        esc_html(get_the_title($post_id))
    );
    
    $breadcrumb .= '</ol>';
    $breadcrumb .= '</nav>';
    
    return $breadcrumb;
}

/**
 * Display the breadcrumb
 */
function display_car_breadcrumb() {
    echo get_car_breadcrumb();
}