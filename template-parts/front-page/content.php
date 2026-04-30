<?php
/**
 * Template part for displaying front page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */


$sortable_default  = [ 'why-us', 'blog', 'clients' ];
$sortable_elements = get_theme_mod(
	'zenvy_front_page_elements',
	$sortable_default
);

if ( $sortable_elements ) {
	foreach ( $sortable_elements as $element ) :
		switch ( $element ) :
			case 'blog':
				get_template_part( 'template-parts/front-page/content', 'news' );
				break;

			case 'featured':
				get_template_part( 'template-parts/front-page/content', 'featured' );
				break;

			case 'why-us':
				get_template_part( 'template-parts/front-page/content', 'why-us' );
				break;

			case 'clients':
				get_template_part( 'template-parts/front-page/content', 'clients' );
				break;
		endswitch;
	endforeach;
}
