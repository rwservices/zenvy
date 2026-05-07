<?php

/**
 * Template part for displaying Search Icon
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

// Placeholder
$placeholder = get_theme_mod(
    'zenvy_header_search_icon_placeholder',
    esc_html__('Search...', 'blogin-aarambha')
);
?>
<div class="header-search-icon-wrap header-search-section d-flex">
    <a href="javascript:void(0)" class="search-toggle">
    </a>
    <div class="search-section">
        <form action="<?php echo esc_url(home_url('/')); ?>" class="search-form">
            <input type="search" class="search-field" name='s' placeholder="<?php echo esc_attr($placeholder); ?>" value="<?php echo esc_attr(get_search_query()); ?>">
            <input class="search-submit" value="Search" type="submit">
        </form>
        <span class="search-arrow"></span>
    </div>
</div><!-- .header-search-section -->