<?php

/**
 * Template part for displaying footer menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

wp_nav_menu(
	[
		'theme_location'  => 'footer-menu',
		'menu_class'      => 'menu-wrapper',
		'container_class' => 'menu-top-menu-container footer-menu',
		'items_wrap'      => '<ul id="footer-menu-list" class="%2$s">%3$s</ul>',
		'fallback_cb'     => 'zenvy_menu_fallback',
		'depth'           => 1,
	]
);
