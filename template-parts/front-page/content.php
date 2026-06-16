<?php
/**
 * Template part for displaying front page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_sortable_default  = [ 'featured-section', 'explore-categories', 'latest-posts' ];
$zenvy_sortable_elements = get_theme_mod(
	'zenvy_front_page_elements',
	$zenvy_sortable_default
);

if ( $zenvy_sortable_elements ) {
	foreach ( $zenvy_sortable_elements as $zenvy_element ) :
		switch ( $zenvy_element ) :
			case 'featured-section':
				get_template_part( 'template-parts/front-page/content', 'featured' );
				break;

			case 'explore-categories':
				get_template_part( 'template-parts/front-page/content', 'explore-categories' );
				break;
			
			case 'latest-posts':
				get_template_part( 'template-parts/front-page/content', 'latest-posts' );
				break;

			case 'quote-section':
				get_template_part( 'template-parts/front-page/content', 'quote' );
				break;

			case 'trending-posts':
				get_template_part( 'template-parts/front-page/content', 'trending-posts' );
				break;

			case 'youtube-promotion':
				get_template_part( 'template-parts/front-page/content', 'youtube-promotion' );
				break;

			case 'shop-section':
				if ( class_exists( 'WooCommerce' ) ) {
					get_template_part( 'template-parts/front-page/content', 'shop-section' );
				}
				break;

		endswitch;
	endforeach;
}
