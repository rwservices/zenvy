<?php
/**
 * Template part for displaying footer social
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenvy
 */

$zenvy_social_icons = get_theme_mod(
	'zenvy_social_icons',
	[
		[
			'network' => 'facebook',
			'icon'    => '',
			'link'    => '#',
		],
		[
			'network' => 'twitter',
			'icon'    => '',
			'link'    => '#',
		],
	]
);

if ( $zenvy_social_icons ) :
	$zenvy_link_open   = get_theme_mod(
		'zenvy_footer_social_icon_link_open',
		''
	);
	$zenvy_link_target = ( $zenvy_link_open && array_key_exists( 'desktop', $zenvy_link_open ) ) ? '_blank' : '_self';
	?>

	<div class="footer-social-container">
		<ul class="footer-social-wrap d-flex align-items-center">

			<?php
			foreach ( $zenvy_social_icons as $zenvy_social ) :
				$zenvy_network = ( '' !== $zenvy_social['network'] ) ? $zenvy_social['network'] : 'facebook';
				$zenvy_icon    = ( '' !== $zenvy_social['icon'] ) ? $zenvy_social['icon'] : 'fab fa-' . $zenvy_network;
				?>
				<li>
					<a href="<?php echo esc_url( $zenvy_social['link'] ); ?>" target="<?php echo esc_attr( $zenvy_link_target ); ?>">
						<?php Zenvy_Font_Awesome_Icons::get_icon( 'ui', $zenvy_icon ); ?>
					</a>
				</li>
			<?php endforeach; ?>

		</ul><!-- .social-icons -->
	</div>

	

	<?php

endif;

?>
