<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2.
 * Applicable for BB version greater than 2.2 and UABB version 1.14.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Icon List Module
 */

FLBuilder::register_module(
	'UABBIconListModule',
	array(
		'columns' => array(
			'title'    => __( 'List Element', 'uabb' ),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'list_items' => array(
							'type'         => 'form',
							'label'        => __( 'List Item', 'uabb' ),
							'form'         => 'list-icon_list_item_form',
							'preview_text' => 'title',
							'multiple'     => true,
						),
					),
				),
			),
		),
		'icons'   => array(
			'title'    => __( 'Image / Icon', 'uabb' ),
			'sections' => array(
				'type_general' => array(
					'title'  => __( 'Image / Icon', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'image_type' => array(
							'type'    => 'select',
							'label'   => __( 'Image Type', 'uabb' ),
							'default' => 'none',
							'options' => array(
								'none'  => __( 'None', 'uabb' ), // Removed args 'Image type.',.
								'icon'  => __( 'Icon', 'uabb' ),
								'photo' => __( 'Photo', 'uabb' ),
							),
							'class'   => 'class_image_type',
							'toggle'  => array(
								'icon'  => array(
									'fields'   => array( 'icon_text_spacing' ),
									'sections' => array( 'icon_basic', 'icon_style', 'icon_colors' ),
								),
								'photo' => array(
									'fields'   => array( 'icon_text_spacing' ),
									'sections' => array( 'img_basic', 'img_style' ),
								),
							),
						),
					),
				),
				'icon_basic'   => array(
					'title'  => __( 'Icon Basics', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'icon'      => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'uabb' ),
							'show_remove' => true,
						),
						'icon_size' => array(
							'type'        => 'unit',
							'label'       => __( 'Size', 'uabb' ),
							'placeholder' => '30',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-icon-wrap .uabb-icon i:before',
								'property'  => 'font-size',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'img_basic'    => array(
					'title'  => __( 'Image Basics', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'photo_source' => array(
							'type'    => 'select',
							'label'   => __( 'Photo Source', 'uabb' ),
							'default' => 'library',
							'options' => array(
								'library' => __( 'Media Library', 'uabb' ),
								'url'     => __( 'URL', 'uabb' ),
							),
							'toggle'  => array(
								'library' => array(
									'fields' => array( 'photo' ),
								),
								'url'     => array(
									'fields' => array( 'photo_url' ),
								),
							),
						),
						'photo'        => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', 'uabb' ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
						),
						'photo_url'    => array(
							'type'        => 'text',
							'label'       => __( 'Photo URL', 'uabb' ),
							'placeholder' => 'http://www.example.com/my-photo.jpg',
						),
						'img_size'     => array(
							'type'        => 'unit',
							'label'       => __( 'Size', 'uabb' ),
							'placeholder' => '50',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-image .uabb-photo-img',
								'property'  => 'width',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),

				/* Icon Style Section */
				'icon_style'   => array(
					'title'  => __( 'Style', 'uabb' ),
					'fields' => array(
						/* Icon Style */
						'icon_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Icon Background Style', 'uabb' ),
							'default' => 'simple',
							'options' => array(
								'simple' => __( 'Simple', 'uabb' ),
								'circle' => __( 'Circle Background', 'uabb' ),
								'square' => __( 'Square Background', 'uabb' ),
								'custom' => __( 'Design your own', 'uabb' ),
							),
							'toggle'  => array(
								'simple' => array(
									'fields' => array(),
								),
								'circle' => array(
									'fields' => array( 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d' ),
								),
								'square' => array(
									'fields' => array( 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d' ),
								),
								'custom' => array(
									'fields' => array( 'icon_border_style', 'icon_bg_color', 'icon_bg_hover_color', 'icon_three_d', 'icon_bg_size', 'icon_bg_border_radius' ),
								),
							),
							'trigger' => array(
								'custom' => array(
									'fields' => array( 'icon_border_style' ),
								),
							),
						),

						/* Icon Background SIze */
						'icon_bg_size'          => array(
							'type'        => 'unit',
							'label'       => __( 'Background Size', 'uabb' ),
							'placeholder' => '10',
							'help'        => __( 'Spacing between Icon & Background edge', 'uabb' ),
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),

						/* Border Style and Radius for Icon */
						'icon_border_style'     => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', 'uabb' ),
							'default' => 'none',
							'help'    => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', 'uabb' ),
							'options' => array(
								'none'   => __( 'None', 'uabb' ),
								'solid'  => __( 'Solid', 'uabb' ),
								'dashed' => __( 'Dashed', 'uabb' ),
								'dotted' => __( 'Dotted', 'uabb' ),
								'double' => __( 'Double', 'uabb' ),
							),
							'toggle'  => array(
								'solid'  => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'dashed' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'dotted' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
								'double' => array(
									'fields' => array( 'icon_border_width', 'icon_border_color', 'icon_border_hover_color' ),
								),
							),
						),
						'icon_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', 'uabb' ),
							'placeholder' => '1',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'icon_bg_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', 'uabb' ),
							'placeholder' => '0',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),

				/* Image Style Section */
				'img_style'    => array(
					'title'  => 'Style',
					'fields' => array(
						/* Image Style */
						'image_style'          => array(
							'type'    => 'select',
							'label'   => __( 'Image Style', 'uabb' ),
							'default' => 'simple',
							'help'    => __( 'Circle and Square style will crop your image in 1:1 ratio', 'uabb' ),
							'options' => array(
								'simple' => __( 'Simple', 'uabb' ),
								'circle' => __( 'Circle', 'uabb' ),
								'square' => __( 'Square', 'uabb' ),
								'custom' => __( 'Design your own', 'uabb' ),
							),
							'toggle'  => array(
								'simple' => array(
									'fields' => array(),
								),
								'circle' => array(
									'fields' => array(),
								),
								'square' => array(
									'fields' => array(),
								),
								'custom' => array(
									'sections' => array( 'img_colors' ),
									'fields'   => array( 'img_bg_size', 'img_border_style', 'img_border_width', 'img_bg_border_radius' ),
								),
							),
							'trigger' => array(
								'custom' => array(
									'fields' => array( 'img_border_style' ),
								),

							),
						),

						/* Image Background Size */
						'img_bg_size'          => array(
							'type'        => 'unit',
							'label'       => __( 'Background Size', 'uabb' ),
							'placeholder' => '0',
							'help'        => __( 'Spacing between Image edge & Background edge', 'uabb' ),
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),

						/* Border Style and Radius for Image */
						'img_border_style'     => array(
							'type'    => 'select',
							'label'   => __( 'Border Style', 'uabb' ),
							'default' => 'none',
							'help'    => __( 'The type of border to use. Double borders must have a width of at least 3px to render properly.', 'uabb' ),
							'options' => array(
								'none'   => __( 'None', 'uabb' ),
								'solid'  => __( 'Solid', 'uabb' ),
								'dashed' => __( 'Dashed', 'uabb' ),
								'dotted' => __( 'Dotted', 'uabb' ),
								'double' => __( 'Double', 'uabb' ),
							),
							'toggle'  => array(
								'solid'  => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'dashed' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'dotted' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
								'double' => array(
									'fields' => array( 'img_border_width', 'img_border_radius', 'img_border_color', 'img_border_hover_color' ),
								),
							),

						),
						'img_border_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Border Width', 'uabb' ),
							'placeholder' => '1',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),

						),
						'img_bg_border_radius' => array(
							'type'        => 'unit',
							'label'       => __( 'Border Radius', 'uabb' ),
							'placeholder' => '0',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				/* Icon Colors */
				'icon_colors'  => array( // Section.
					'title'  => __( 'Colors', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.

						/* Style Options */

						/* Icon Color */
						'icon_color'              => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-icon-wrap .uabb-icon i:before',
								'property'  => 'color',
								'important' => true,
							),
						),
						'icon_hover_color'        => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),

						/* Background Color Dependent on Icon Style **/
						'icon_bg_color'           => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_bg_hover_color'     => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),

						/* Border Color Dependent on Border Style for ICon */
						'icon_border_color'       => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Border Color', 'uabb' ),
							'default'     => '',
							'show_alpha'  => true,
							'show_reset'  => true,
						),
						'icon_border_hover_color' => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Border Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
						),

						/* Gradient Color Option */
						'icon_three_d'            => array(
							'type'    => 'select',
							'label'   => __( 'Gradient', 'uabb' ),
							'default' => '0',
							'options' => array(
								'0' => __( 'No', 'uabb' ),
								'1' => __( 'Yes', 'uabb' ),
							),
						),
					),
				),

				/* Image Colors */
				'img_colors'   => array( // Section.
					'title'  => __( 'Colors', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						/* Background Color Dependent on Icon Style **/
						'img_bg_color'           => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'img_bg_hover_color'     => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						/* Border Color Dependent on Border Style for Image */
						'img_border_color'       => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Border Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'img_border_hover_color' => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Border Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
			),
		),
		'style'   => array( // Tab.
			'title'    => __( 'Typography', 'uabb' ), // Tab title.
			'sections' => array( // Tab Sections.
				'typography' => array(
					'title'  => __( 'Typography', 'uabb' ),
					'fields' => array(
						'typography_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Tag', 'uabb' ),
							'default' => 'h3',
							'options' => array(
								'h1'   => __( 'H1', 'uabb' ),
								'h2'   => __( 'H2', 'uabb' ),
								'h3'   => __( 'H3', 'uabb' ),
								'h4'   => __( 'H4', 'uabb' ),
								'h5'   => __( 'H5', 'uabb' ),
								'h6'   => __( 'H6', 'uabb' ),
								'div'  => __( 'Div', 'uabb' ),
								'p'    => __( 'p', 'uabb' ),
								'span' => __( 'span', 'uabb' ),
							),
						),
						'font_typo'                => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-list-icon-text-heading',
								'important' => true,
							),
						),
						'typography_color'         => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-list-icon .uabb-list-icon-text .uabb-list-icon-text-heading',
								'property'  => 'color',
								'important' => true,
							),
						),
					),
				),
				'structure'  => array( // Section.
					'title'  => __( 'Structure', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'icon_struc_align'  => array(
							'type'    => 'select',
							'label'   => __( 'Icons Structure', 'uabb' ),
							'default' => 'vertical',
							'options' => array(
								'horizontal' => __( 'Horizontal', 'uabb' ),
								'vertical'   => __( 'Vertical', 'uabb' ),
							),
							'width'   => '70px',
						),
						'align'             => array(
							'type'    => 'select',
							'label'   => __( 'Alignment', 'uabb' ),
							'default' => 'flex-start',
							'options' => array(
								'center'     => __( 'Center', 'uabb' ),
								'flex-start' => __( 'Left', 'uabb' ),
								'flex-end'   => __( 'Right', 'uabb' ),
							),
						),
						'spacing'           => array(
							'type'        => 'unit',
							'label'       => __( 'Space Between Two List Elements', 'uabb' ),
							'placeholder' => '10',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-list-icon-wrap:not(:last-child)',
								'property'  => 'margin-bottom',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'icon_text_spacing' => array(
							'type'        => 'unit',
							'label'       => __( 'Space Between Icon & Text', 'uabb' ),
							'placeholder' => '10',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				'mobile'     => array( // Section.
					'title'  => __( 'Mobile', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'mobile_spacing' => array(
							'type'        => 'unit',
							'label'       => __( 'Space Between Two List Elements', 'uabb' ),
							'placeholder' => '10',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'     => array(
								'type' => 'none',
							),
						),
					),
				),
			),
		),
	)
);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form(
	'list-icon_list_item_form',
	array(
		'title' => __( 'Add List Item', 'uabb' ),
		'tabs'  => array(
			'general' => array( // Tab.
				'title'    => __( 'General', 'uabb' ), // Tab title.
				'sections' => array( // Tab Sections.
					'general' => array( // Section.
						'title'  => '', // Section Title.
						'fields' => array( // Section Fields.
							'title' => array(
								'type'        => 'text',
								'label'       => __( 'Title', 'uabb' ),
								'connections' => array( 'string', 'html' ),
							),
						),
					),
				),
			),
		),
	)
);
