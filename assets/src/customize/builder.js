( function( $, wp_customize ) {
	const $document = $( document );

	const CustomizeBuilder = function( options, id ) {
		const Builder = {
			id,
			controlId: '',
			cols: 12,
			cellHeight: 45,
			items: [],
			container: null,
			ready: false,
			devices: { desktop: 'Desktop', mobile: 'Mobile/Tablet' },
			activePanel: 'desktop',
			panels: {},
			activeRow: 'main',
			draggingItem: null,
			getTemplate: _.memoize(
				function() {
					const control = this;
					let compiled,
						/*
                         * Underscore's default ERB-style templates are incompatible with PHP
                         * when asp_tags is enabled, so WordPress uses Mustache-inspired templating syntax.
                         *
                         * @see trac ticket #22344.
                         */
						options = {
							evaluate: /<#([\s\S]+?)#>/g,
							interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
							escape: /\{\{([^\}]+?)\}\}(?!\})/g,
							variable: 'data',
						};

					return function( data, id, data_variable_name ) {
						if ( _.isUndefined( id ) ) {
							id = 'tmpl-customize-control-' + control.type;
						}
						if ( ! _.isUndefined( data_variable_name ) && _.isString( data_variable_name ) ) {
							options.variable = data_variable_name;
						} else {
							options.variable = 'data';
						}
						compiled = _.template( $( '#' + id ).html(), null, options );
						return compiled( data );
					};
				},
			),

			drag_drop() {
				const that = this;

				$( '.zenvy-device-panel', that.container ).each(
					function() {
						const panel = $( this );
						const device = panel.data( 'device' );
						const sortable_ids = [];
						that.panels[ device ] = {};
						$( '.col-items', panel ).each(
							function( index ) {
								const data_name = $( this ).attr( 'data-id' ) || '';
								let id;
								if ( ! data_name ) {
									id = '_sid_' + device + index;
								} else {
									id = '_sid_' + device + '-' + data_name;
								}
								$( this ).attr( 'id', id );
								sortable_ids[ index ] = '#' + id;
							},
						);
						$( '.col-items, .zenvy-available-items', panel ).each( function() {
							$( this ).droppable().sortable( {
								placeholder: 'sortable-placeholder grid-stack-item',
								connectWith: '.col-items',
								update() {
									that.save();
								},
							} );
						} );
					},
				);
			},
			addPanel( device ) {
				const that = this;
				const template = that.getTemplate();
				const template_id = 'tmpl-zenvy-panel';
				if ( $( '#' + template_id ).length == 0 ) {
					return;
				}
				if ( ! _.isObject( options.rows ) ) {
					options.rows = {};
				}
				if ( ! _.isObject( options.cols ) ) {
					options.cols = {};
				}
				const html = template(
					{
						device,
						id: options.id,
						rows: options.rows,
						cols: options.cols,
					},
					template_id,
				);
				return '<div class="zenvy-device-panel zenvy-vertical-panel zenvy-panel-' + device + '" data-device="' + device + '">' + html + '</div>';
			},
			addDevicePanels() {
				const that = this;
				_.each(
					that.devices,
					function( device_name, device ) {
						const panelHTML = that.addPanel( device );
						$( '.zenvy-devices-switcher', that.container ).append( '<a href="#" class="switch-to switch-to-' + device + '" data-device="' + device + '">' + device_name + '</a>' );
						$( '.zenvy-body', that.container ).append( panelHTML );
					},
				);
			},
			addItem( node ) {
				const that = this;
				const template = that.getTemplate();
				const template_id = 'tmpl-zenvy-item';
				if ( $( '#' + template_id ).length == 0 ) {
					return;
				}
				const html = template( node, template_id );
				return $( html );
			},
			addAvailableItems() {
				const that = this;

				_.each(
					that.devices,
					function( device_name, device ) {
						const $itemWrapper = $( '<div class="zenvy-available-items" data-device="' + device + '"></div>' );
						$( '.zenvy-panel-' + device, that.container ).append( $itemWrapper );

						_.each(
							that.items,
							function( node ) {
								let _d = true;
								if ( ! _.isUndefined( node.devices ) && ! _.isEmpty( node.devices ) ) {
									if ( _.isString( node.devices ) ) {
										if ( node.devices != device ) {
											_d = false;
										}
									} else {
										let _has_d = false;
										_.each(
											node.devices,
											function( _v ) {
												if ( device == _v ) {
													_has_d = true;
												}
											},
										);
										if ( ! _has_d ) {
											_d = false;
										}
									}
								}

								if ( _d ) {
									const item = that.addItem( node );
									$itemWrapper.append( item );
								}
							},
						);
					},
				);
			},
			switchToDevice( device, toggle_button ) {
				const that = this;
				const numberDevices = _.size( that.devices );
				if ( numberDevices > 1 ) {
					$( '.zenvy-devices-switcher a', that.container ).removeClass( 'zenvy-tab-active' );
					$( '.zenvy-devices-switcher .switch-to-' + device, that.container ).addClass( 'zenvy-tab-active' );
					$( '.zenvy-device-panel', that.container ).addClass( 'zenvy-panel-hide' );
					$( '.zenvy-device-panel.zenvy-panel-' + device, that.container ).removeClass( 'zenvy-panel-hide' );
					that.activePanel = device;
				} else {
					$( '.zenvy-devices-switcher a', that.container ).addClass( 'zenvy-tab-active' );
				}

				if ( _.isUndefined( toggle_button ) || toggle_button ) {
					if ( device == 'desktop' ) {
						$( '#customize-footer-actions .preview-desktop' ).trigger( 'click' );
					} else if ( device == 'mobile' ) {
						$( '#customize-footer-actions .preview-mobile' ).trigger( 'click' );
					}
					/*                 else if ( device == 'all' ) {
                        wp_customize.section( 'zenvy-menu-icon-sidebar-section' ).focus();
                    }*/
				}
			},
			addNewWidget( device, row_id, col_id, node, index ) {
				const that = this;
				let panel, row, col;
				panel = that.container.find(
					'.zenvy-device-panel.zenvy-panel-' + device,
				);

				row = $( '.zenvy-row.zenvy-row-' + row_id, panel );
				col = $( '.col-items.' + col_id, row );

				const $item = $( '.zenvy-available-items .grid-stack-item[data-id="' + node.id + '"]', panel );

				col.append( $item );
			},
			addExistingRowsItems() {
				const that = this;

				let data = wp_customize.control( that.controlId ).setting._value;
				if ( ! _.isObject( data ) ) {
					if ( data ) {
						data = JSON.parse( data );
					} else {
						data = {};
					}
				}
				_.each(
					that.panels,
					function( $rows, device ) {
						let device_data = {};
						if ( _.isObject( data[ device ] ) ) {
							device_data = data[ device ];
						}

						_.each( device_data, function( cols, row_id ) {
							if ( ! _.isUndefined( cols ) ) {
								_.each( cols, function( items, col_id ) {
									_.each( items, function( node, index ) {
										that.addNewWidget( device, row_id, col_id, node, index );
									} );
								} );
							}
						} );
					},
				);

				that.ready = true;
			},
			focus() {
				this.container.on(
					'click',
					'.zenvy-item-setting, .zenvy-item-name, .item-tooltip',
					function( e ) {
						e.preventDefault();
						const section = $( this ).data( 'section' ) || '';
						const control = $( this ).attr( 'data-control' ) || '';
						let did = false;
						if ( control ) {
							if ( ! _.isUndefined( wp_customize.control( control ) ) ) {
								wp_customize.control( control ).focus();
								did = true;
							}
						}
						if ( ! did ) {
							if ( section && ! _.isUndefined( wp_customize.section( section ) ) ) {
								wp_customize.section( section ).focus();
								did = true;
							}
						}
					},
				);

				// Focus rows
				this.container.on(
					'click',
					'.zenvy-row-settings',
					function( e ) {
						e.preventDefault();
						const id = $( this ).attr( 'data-id' ) || '';

						const section = options.id + '_' + id;
						if ( ! _.isUndefined( wp_customize.section( section ) ) ) {
							wp_customize.section( section ).focus();
						}
					},
				);
			},
			remove() {
				const that = this;
				$document.on(
					'click',
					'.zenvy-device-panel .zenvy-item-remove',
					function( e ) {
						e.preventDefault();
						const item = $( this ).closest( '.grid-stack-item' );
						const panel = item.closest( '.zenvy-device-panel' );
						item.removeAttr( 'style' );
						$( '.zenvy-available-items', panel ).append( item );
						that.save();
					},
				);
			},
			encodeValue( value ) {
				return encodeURI( JSON.stringify( value ) );
			},
			decodeValue( value ) {
				return JSON.parse( decodeURI( value ) );
			},

			save() {
				const that = this;
				if ( ! that.ready ) {
					return;
				}

				const data = {};

				_.each( that.devices, function( device_label, device ) {
					data[ device ] = {};
					const devicePanel = $( '.zenvy-panel-' + device, that.container );
					$( '.zenvy-row', devicePanel ).each( function() {
						const row = $( this );
						const row_id = row.attr( 'data-row-id' ) || false;
						const rowData = { };
						if ( row_id ) {
							$( '.col-items', row ).each( function() {
								const col = $( this );
								const col_id = col.attr( 'data-id' ) || false;
								if ( col_id ) {
									const colData = _.map(
										$( ' > .grid-stack-item', col ),
										function( el ) {
											el = $( el );
											return {
												id: el.data( 'id' ) || '',
											};
										},
									);
									rowData[ col_id ] = colData;
								}
							} );

							data[ device ][ row_id ] = rowData;
						}
					} );
				} );

				wp_customize.control( that.controlId ).setting.set( that.encodeValue( data ) );
			},

			showPanel() {
				this.container.removeClass( 'zenvy-builder--hide' ).addClass( 'zenvy-builder-show' );
				setTimeout(
					function() {
						$( '#customize-preview' ).addClass( 'cb--preview-panel-show' );
					},
					100,
				);
			},
			hidePanel() {
				this.container.removeClass( 'zenvy-builder-show' );
				cwp_hide_item_panel( this.container.find( '.zenvy-available-items' ) );
				$( '#customize-preview' ).removeClass( 'cb--preview-panel-show' ).removeAttr( 'style' );
			},
			togglePanel() {
				const that = this;
				wp_customize.state( 'expandedPanel' ).bind(
					function( paneVisible ) {
						if ( wp_customize.panel( options.panel ).expanded() ) {
							$document.trigger( 'zenvy_panel_builder_open', [ options.panel ] );
							top._current_builder_panel = id;
							that.showPanel();
						} else {
							that.hidePanel();
						}
					},
				);

				that.container.on(
					'click',
					'.zenvy-panel-close',
					function( e ) {
						e.preventDefault();
						that.container.toggleClass( 'zenvy-builder--hide' );
						if ( that.container.hasClass( 'zenvy-builder--hide' ) ) {
							$( '#customize-preview' ).removeClass( 'cb--preview-panel-show' );
						} else {
							$( '#customize-preview' ).addClass( 'cb--preview-panel-show' );
						}
					},
				);
			},
			panelLayoutCSS() {
				let sidebarWidth = $( '#customize-controls' ).width();
				if ( ! wp_customize.state( 'paneVisible' ).get() ) {
					sidebarWidth = 0;
				}
				this.container.find( '.zenvy-inner' ).css( { 'margin-left': sidebarWidth } );
			},
			init( controlId, items, devices ) {
				const that = this;

				const template = that.getTemplate();
				const template_id = 'tmpl-zenvy-builder-panel';
				const html = template( options, template_id );
				that.container = $( html );
				$( 'body .wp-full-overlay' ).append( that.container );
				that.controlId = controlId;
				that.items = items;
				that.devices = devices;

				if ( options.section ) {
					wp_customize.section( options.section ).container.addClass( 'zenvy-hide' );
				}

				that.addDevicePanels();
				that.switchToDevice( that.activePanel );
				that.addAvailableItems();
				that.switchToDevice( that.activePanel );
				that.drag_drop();
				that.focus();
				that.remove();
				that.addExistingRowsItems();

				if ( wp_customize.panel( options.panel ).expanded() ) {
					that.showPanel();
				} else {
					that.hidePanel();
				}

				wp_customize.previewedDevice.bind(
					function( newDevice ) {
						if ( newDevice === 'desktop' ) {
							that.switchToDevice( 'desktop', false );
						} else {
							that.switchToDevice( 'mobile', false );
						}
					},
				);

				that.togglePanel();
				if ( wp_customize.state( 'paneVisible' ).get() ) {
					that.panelLayoutCSS();
				}
				wp_customize.state( 'paneVisible' ).bind(
					function() {
						that.panelLayoutCSS();
					},
				);

				$( window ).resize(
					_.throttle(
						function() {
							that.panelLayoutCSS();
						},
						100,
					),
				);

				// Switch panel
				that.container.on(
					'click',
					'.zenvy-devices-switcher a.switch-to',
					function( e ) {
						e.preventDefault();
						const device = $( this ).data( 'device' );
						that.switchToDevice( device );
						$( '.zenvy-body' ).find( '.zenvy-available-items' ).each(
							function() {
								cwp_hide_item_panel( $( this ) );
							},
						);
					},
				);
				$document.trigger( 'zenvy_builder_panel_loaded', [ id, that ] );
			},
		};

		Builder.init( options.control_id, options.items, options.devices );
		return Builder;
	};

	wp_customize.bind(
		'ready',
		function( e, b ) {
			_.each(
				Zenvy_Customizer_Builder.builders,
				function( opts, id ) {
					new CustomizeBuilder( opts, id );
				},
			);

			wp_customize.bind(
				'pane-contents-reflowed',
				function() {
					setTimeout(
						function() {
							if ( $( '#sub-accordion-panel-widgets .no-widget-areas-rendered-notice .footer_moved_widgets_text' ).length ) {

							} else {
								$( '#sub-accordion-panel-widgets .no-widget-areas-rendered-notice' ).append( '<p class="footer_moved_widgets_text">' + Zenvy_Customizer_Builder.footer_moved_widgets_text + '</p>' );
							}
						},
						1000,
					);
				},
			);

			// When focus section
			wp_customize.state( 'expandedSection' ).bind(
				function( section ) {
					$( '.zenvy-device-panel .grid-stack-item' ).removeClass( 'item-active' );
					$( '.zenvy-row' ).removeClass( 'row-active' );
					if ( section ) {
						$( '.zenvy-row[data-id="' + section.id + '"]' ).addClass( 'row-active' );
						$( '.zenvy-device-panel .grid-stack-item.for-s-' + section.id ).addClass( 'item-active' );
					}
				},
			);
		},
	);

	// Focus
	$document.on(
		'click',
		'.focus-section',
		function( e ) {
			e.preventDefault();
			let id = $( this ).attr( 'data-id' ) || '';
			if ( ! id ) {
				id = $( this ).attr( 'href' ) || '';
				id = id.replace( '#', '' );
			}

			if ( id ) {
				if ( wp_customize.section( id ) ) {
					wp_customize.section( id ).focus();
				}
			}
		},
	);

	$document.on(
		'click',
		'.focus-control',
		function( e ) {
			e.preventDefault();
			let id = $( this ).attr( 'data-id' ) || '';
			if ( ! id ) {
				id = $( this ).attr( 'href' ) || '';
				id = id.replace( '#', '' );
			}
			if ( id ) {
				if ( wp_customize.control( id ) ) {
					wp_customize.control( id ).focus();
				}
			}
		},
	);

	$document.on(
		'click',
		'.focus-panel',
		function( e ) {
			e.preventDefault();
			let id = $( this ).attr( 'data-id' ) || '';
			if ( ! id ) {
				id = $( this ).attr( 'href' ) || '';
				id = id.replace( '#', '' );
			}
			if ( id ) {
				if ( wp_customize.panel( id ) ) {
					wp_customize.panel( id ).focus();
				}
			}
		},
	);

	const encodeValue = function( value ) {
		return encodeURI( JSON.stringify( value ) );
	};

	$document.on(
		'mouseover',
		'.zenvy-row .grid-stack-item',
		function( e ) {
			e.preventDefault();
			const item = $( this );
			const nameW = $( '.zenvy-item-remove', item ).outerWidth() + $( '.zenvy-item-setting', item ).outerWidth();
			const itemW = $( '.grid-stack-item-content', item ).innerWidth();
			if ( nameW > itemW - 50 ) {
				item.addClass( 'show-tooltip' );
			}
		},
	);

	$document.on(
		'mouseleave',
		'.zenvy-row .grid-stack-item',
		function( e ) {
			e.preventDefault();
			$( this ).removeClass( 'show-tooltip' );
		},
	);

	/*Add a Item*/
	$document.on(
		'click',
		'.zenvy-add-new-item',
		function( e ) {
			e.preventDefault();
			let this_add_new = $( this ),
				this_item_wrap = this_add_new.next( '.zenvy-available-items' );
			if ( ! this_item_wrap.length ) {
				this_item_wrap = this_add_new.closest( '.zenvy-sidebar' ).next( '.zenvy-available-items' );
			}
			if ( this_item_wrap.length ) {
				this_item_wrap.toggleClass( 'zenvy-show-items' );
				$( 'body' ).toggleClass( 'zenvy-body-overlay' );
				this_add_new.toggleClass( 'zenvy-hide-items' );
			}
		},
	);
	function cwp_hide_item_panel( this_item_wrap ) {
		let this_add_new = this_item_wrap.prev( '.zenvy-add-new-item' );
		if ( ! this_add_new.length ) {
			this_add_new = this_add_new.prev( '.zenvy-sidebar' ).find( '.zenvy-add-new-item' );
		}
		if ( this_item_wrap.length ) {
			this_item_wrap.removeClass( 'zenvy-show-items' );
			$( 'body' ).removeClass( 'zenvy-body-overlay' );
			this_add_new.removeClass( 'zenvy-hide-items' );
		}
	}
	$document.on(
		'click',
		'.zenvy-close-item-panel',
		function( e ) {
			e.preventDefault();
			const this_close_item_panel = $( this ),
				this_item_wrap = this_close_item_panel.closest( '.zenvy-available-items' );

			cwp_hide_item_panel( this_item_wrap );
		},
	);
}( jQuery, wp.customize || null ) );
