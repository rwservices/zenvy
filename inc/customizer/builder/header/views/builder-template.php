<?php
/**
 * Add Header Builder Template
 *
 * @package Zenvy
 */

/*
----------------------------------------------------------------------
// Exit if accessed directly
-------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<script type="text/html" id="tmpl-zenvy-builder-panel">
	<div class="zenvy-customize-builder">
		<div class="zenvy-inner">
			<div class="zenvy-header">
				<div class="zenvy-devices-switcher">
				</div>
				<div class="zenvy-actions">
					<a class="button button-secondary zenvy-panel-close" href="#">
						<span class="close-text"><?php esc_html_e( 'Close', 'zenvy' ); ?></span>
						<span class="panel-name-text">{{ data.title }}</span>
					</a>
				</div>
			</div>
			<div class="zenvy-body"></div>
		</div>
	</div>
</script>

<script type="text/html" id="tmpl-zenvy-panel">
	<div class="zenvy-rows">
		<# if ( ! _.isUndefined( data.rows.top ) ) { #>
		<div class="zenvy-row-top zenvy-row" data-row-id ="top" data-cols="{{ data.cols.top }}" data-id="{{ data.id }}_top">
			<div class="zenvy-row-inner">
				<# for ( let i = 0; i < data.cols.top; i++ ) { #>
				<div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
				<# } #>
			</div>
			<a class="zenvy-row-settings" title="{{ data.rows.top }}" data-id="top" href="#"></a>
		</div>
		<#  } #>

		<# if ( ! _.isUndefined( data.rows.main ) ) { #>
		<div class="zenvy-row-main zenvy-row" data-row-id ="main" data-cols="{{ data.cols.main }}" data-id="{{ data.id }}_main">
			<div class="zenvy-row-inner">
				<# for ( let i = 0; i < data.cols.main; i++ ) { #>
				<div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
				<# } #>
			</div>
			<a class="zenvy-row-settings" title="{{ data.rows.main }}" data-id="main" href="#"></a>
		</div>
		<#  } #>

		<# if ( ! _.isUndefined( data.rows.bottom ) ) { #>
		<div class="zenvy-row-bottom zenvy-row" data-row-id ="bottom" data-cols="{{ data.cols.bottom }}" data-id="{{ data.id }}_bottom">
			<div class="zenvy-row-inner">
				<# for ( let i = 0; i < data.cols.bottom; i++ ) { #>
				<div class="col-items-wrapper"><div data-id="col-{{ i }}" class="col-items col-{{ i }} d-flex justify-content-center"></div></div>
				<# } #>
			</div>
			<a class="zenvy-row-settings" title="{{ data.rows.bottom }}" data-id="bottom" href="#"></a>
		</div>
		<#  } #>
	</div>
</script>

<script type="text/html" id="tmpl-zenvy-item">
	<div class="grid-stack-item item-from-list for-s-{{ data.section }}"
		title="{{ data.name }}"
		data-id="{{ data.id }}"
		data-section="{{ data.section }}"
	>
		<div class="item-tooltip" data-section="{{ data.section }}">{{ data.name }}</div>
		<div class="grid-stack-item-content">
			<div class="zenvy-customizer-builder-item-desc">
				<h3 class="zenvy-item-name" data-section="{{ data.section }}">{{ data.name }}</h3>
				<# if ( data.desc ) { #>
				<span class="zenvy-customizer-builder-item-desc">{{ data.desc }}</span>
				<# } #>
			</div>
			<span class="zenvy-item-remove zenvy-icon"></span>
			<span class="zenvy-item-setting zenvy-icon" data-section="{{ data.section }}"></span>
		</div>
	</div>
</script>
