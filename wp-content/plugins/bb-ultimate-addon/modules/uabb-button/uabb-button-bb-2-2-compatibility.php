<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2.
 * Applicable for BB version greater than 2.2 and UABB version 1.14.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Button Module
 */

FLBuilder::register_module(
	'UABBButtonModule',
	array(
		'general'             => array(
			'title'    => __( 'General', 'uabb' ),
			'sections' => array(
				'general'          => array(
					'title'  => '',
					'fields' => array(
						'text' => array(
							'type'        => 'text',
							'label'       => __( 'Text', 'uabb' ),
							'default'     => __( 'Click Here', 'uabb' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-creative-button-text',
							),
							'connections' => array( 'string', 'html' ),
						),

					),
				),
				'link'             => array(
					'title'  => __( 'Link', 'uabb' ),
					'fields' => array(
						'link' => array(
							'type'          => 'link',
							'label'         => __( 'Link', 'uabb' ),
							'placeholder'   => 'http://www.example.com',
							'default'       => '#',
							'show_target'   => true,
							'show_nofollow' => true,
							'preview'       => array(
								'type' => 'none',
							),
							'connections'   => array( 'url' ),
						),
					),
				),
				'btn_html_element' => array(
					'title'  => __( 'HTML Element', 'uabb' ),
					'fields' => array(
						'custom_class' => array(
							'type'    => 'text',
							'label'   => __( 'Custom Class', 'uabb' ),
							'default' => '',
							'preview' => array(
								'type' => 'none',
							),
						),
					),
				),
			),
		),
		'style'               => array(
			'title'    => __( 'Style', 'uabb' ),
			'sections' => array(
				'style'      => array(
					'title'  => __( 'Style', 'uabb' ),
					'fields' => array(
						'style'                      => array(
							'type'    => 'select',
							'label'   => __( 'Style', 'uabb' ),
							'default' => 'default',
							'class'   => 'creative_button_styles',
							'options' => array(
								'default'     => __( 'Default', 'uabb' ),
								'flat'        => __( 'Flat', 'uabb' ),
								'gradient'    => __( 'Gradient', 'uabb' ),
								'transparent' => __( 'Transparent', 'uabb' ),
								'threed'      => __( '3D', 'uabb' ),
							),
							'toggle'  => array(
								'default'     => array(
									'fields' => array( 'button_padding_dimension', 'button_border', 'border_hover_color' ),
								),
								'transparent' => array(
									'fields' => array( 'border_radius' ),
								),
								'gradient'    => array(
									'fields' => array( 'button_border' ),
								),
								'flat'        => array(
									'fields' => array( 'border_radius' ),
								),
							),
						),
						'border_size'                => array(
							'type'        => 'unit',
							'label'       => __( 'Border Size', 'uabb' ),
							'description' => 'px',
							'maxlength'   => '3',
							'size'        => '5',
							'placeholder' => '2',
						),
						'transparent_button_options' => array(
							'type'    => 'select',
							'label'   => __( 'Hover Styles', 'uabb' ),
							'default' => 'transparent-fade',
							'options' => array(
								'none'                    => __( 'None', 'uabb' ),
								'transparent-fade'        => __( 'Fade Background', 'uabb' ),
								'transparent-fill-top'    => __( 'Fill Background From Top', 'uabb' ),
								'transparent-fill-bottom' => __( 'Fill Background From Bottom', 'uabb' ),
								'transparent-fill-left'   => __( 'Fill Background From Left', 'uabb' ),
								'transparent-fill-right'  => __( 'Fill Background From Right', 'uabb' ),
								'transparent-fill-center' => __( 'Fill Background Vertical', 'uabb' ),
								'transparent-fill-diagonal' => __( 'Fill Background Diagonal', 'uabb' ),
								'transparent-fill-horizontal' => __( 'Fill Background Horizontal', 'uabb' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'threed_button_options'      => array(
							'type'    => 'select',
							'label'   => __( 'Hover Styles', 'uabb' ),
							'default' => 'threed_down',
							'options' => array(
								'threed_down'    => __( 'Move Down', 'uabb' ),
								'threed_up'      => __( 'Move Up', 'uabb' ),
								'threed_left'    => __( 'Move Left', 'uabb' ),
								'threed_right'   => __( 'Move Right', 'uabb' ),
								'animate_top'    => __( 'Animate Top', 'uabb' ),
								'animate_bottom' => __( 'Animate Bottom', 'uabb' ),
							),
						),
						'flat_button_options'        => array(
							'type'    => 'select',
							'label'   => __( 'Hover Styles', 'uabb' ),
							'default' => 'none',
							'options' => array(
								'none'                => __( 'None', 'uabb' ),
								'animate_to_left'     => __( 'Appear Icon From Right', 'uabb' ),
								'animate_to_right'    => __( 'Appear Icon From Left', 'uabb' ),
								'animate_from_top'    => __( 'Appear Icon From Top', 'uabb' ),
								'animate_from_bottom' => __( 'Appear Icon From Bottom', 'uabb' ),
							),
						),
					),
				),
				'icon'       => array(
					'title'  => __( 'Icons', 'uabb' ),
					'fields' => array(
						'icon_type'     => array(
							'type'    => 'select',
							'label'   => __( 'Image Type', 'uabb' ),
							'default' => 'icon',
							'options' => array(
								'none'  => __( 'None', 'uabb' ),
								'icon'  => __( 'Icon', 'uabb' ),
								'photo' => __( 'Photo', 'uabb' ),
							),
							'toggle'  => array(
								'icon'  => array(
									'fields' => array( 'icon', 'icon_position' ),
								),
								'photo' => array(
									'fields' => array( 'photo', 'img_width' ),
								),
							),
						),
						'icon'          => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'uabb' ),
							'show_remove' => true,
						),
						'photo'         => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', 'uabb' ),
							'show_remove' => true,
						),
						'img_width'     => array(
							'type'        => 'unit',
							'label'       => __( 'Photo Width', 'uabb' ),
							'placeholder' => '20',
							'default'     => '20',
							'description' => 'px',
							'size'        => '8',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-button .uabb-btn-img',
								'property' => 'width',
								'unit'     => 'px',
							),
						),
						'icon_position' => array(
							'type'    => 'select',
							'label'   => __( 'Icon Position', 'uabb' ),
							'default' => 'after',
							'options' => array(
								'before' => __( 'Before Text', 'uabb' ),
								'after'  => __( 'After Text', 'uabb' ),
							),
						),
					),
				),
				'colors'     => array(
					'title'  => __( 'Colors', 'uabb' ),
					'fields' => array(
						'text_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a *, .uabb-creative-button-wrap a.uabb-button *',
								'property' => 'color',
							),
						),
						'text_hover_color'   => array(
							'type'        => 'color',
							'label'       => __( 'Text Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'button_gradient'    => array(
							'type'    => 'uabb-gradient',
							'label'   => __( 'Gradient', 'uabb' ),
							'default' => array(
								'color_one' => '',
								'color_two' => '',
								'direction' => 'left_right',
								'angle'     => '0',
							),
						),
						'bg_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.uabb-creative-button-wrap a.uabb-creative-flat-btn,.uabb-creative-button-wrap a.uabb-creative-default-btn',
										'property' => 'background',
									),
									array(
										'selector' => '.uabb-creative-button-wrap a.uabb-creative-transparent-btn',
										'property' => 'border-color',
									),
								),
							),
						),
						'bg_hover_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'border_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Border Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
						),
						'hover_attribute'    => array(
							'type'    => 'select',
							'label'   => __( 'Apply Hover Color To', 'uabb' ),
							'default' => 'bg',
							'options' => array(
								'border' => __( 'Border', 'uabb' ),
								'bg'     => __( 'Background', 'uabb' ),
							),
							'width'   => '75px',
						),
					),
				),
				'formatting' => array(
					'title'  => __( 'Structure', 'uabb' ),
					'fields' => array(
						'width'                    => array(
							'type'    => 'select',
							'label'   => __( 'Width', 'uabb' ),
							'default' => 'auto',
							'options' => array(
								'auto'   => _x( 'Auto', 'Width.', 'uabb' ),
								'full'   => __( 'Full Width', 'uabb' ),
								'custom' => __( 'Custom', 'uabb' ),
							),
							'toggle'  => array(
								'auto'   => array(
									'fields' => array( 'align', 'mob_align' ),
								),
								'full'   => array(
									'fields' => array(),
								),
								'custom' => array(
									'fields' => array( 'align', 'mob_align', 'custom_width', 'custom_height', 'padding_top_bottom', 'padding_left_right' ),
								),
							),
						),
						'button_padding_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'uabb' ),
							'slider'     => true,
							'units'      => array( 'px' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-creative-button-wrap a',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'button_border'            => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'uabb' ),
							'slider'  => true,
							'units'   => array( 'px' ),
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.uabb-creative-button-wrap a',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'custom_width'             => array(
							'type'      => 'unit',
							'label'     => __( 'Custom Width', 'uabb' ),
							'default'   => '200',
							'maxlength' => '3',
							'size'      => '4',
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'units'     => array(
								'px',
								'vw',
								'%',
							),
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'width',
								'unit'     => 'px',
							),
						),
						'custom_height'            => array(
							'type'      => 'unit',
							'label'     => __( 'Custom Height', 'uabb' ),
							'default'   => '45',
							'maxlength' => '3',
							'size'      => '4',
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'units'     => array(
								'px',
								'vw',
								'%',
							),
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'min-height',
								'unit'     => 'px',
							),
						),
						'padding_top_bottom'       => array(
							'type'        => 'unit',
							'label'       => __( 'Padding Top/Bottom', 'uabb' ),
							'placeholder' => '0',
							'maxlength'   => '3',
							'size'        => '4',
							'units'       => array(
								'px',
								'vw',
								'%',
							),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 1,
								),
							),
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.uabb-creative-button-wrap a',
										'property' => 'padding-top',
										'unit'     => 'px',
									),
									array(
										'selector' => '.uabb-creative-button-wrap a',
										'property' => 'padding-bottom',
										'unit'     => 'px',
									),
								),
							),
						),
						'padding_left_right'       => array(
							'type'        => 'unit',
							'label'       => __( 'Padding Left/Right', 'uabb' ),
							'placeholder' => '0',
							'maxlength'   => '3',
							'size'        => '4',
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 1,
								),
							),
							'units'       => array(
								'px',
								'vw',
								'%',
							),
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.uabb-creative-button-wrap a',
										'property' => 'padding-left',
										'unit'     => 'px',
									),
									array(
										'selector' => '.uabb-creative-button-wrap a',
										'property' => 'padding-right',
										'unit'     => 'px',
									),
								),
							),
						),
						'border_radius'            => array(
							'type'        => 'unit',
							'label'       => __( 'Round Corners', 'uabb' ),
							'maxlength'   => '3',
							'size'        => '4',
							'description' => 'px',
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'border-radius',
								'unit'     => 'px',
							),
						),
						'new_align'                => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'uabb' ),
							'default' => 'center',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap',
								'property' => 'text-align',
							),
						),
						'tab_align'                => array(
							'type'    => 'align',
							'label'   => __( 'Tablet Alignment', 'uabb' ),
							'preview' => array(
								'type' => 'none',
							),
						),
						'mob_align'                => array(
							'type'    => 'align',
							'label'   => __( 'Mobile Alignment', 'uabb' ),
							'default' => 'center',
							'preview' => array(
								'type' => 'none',
							),
						),
					),
				),
			),
		),
		'creative_typography' => array(
			'title'    => __( 'Typography', 'uabb' ),
			'sections' => array(
				'typography' => array(
					'title'  => __( 'Button Settings', 'uabb' ),
					'fields' => array(
						'button_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button',
							),
						),
					),
				),
			),
		),
	)
);
