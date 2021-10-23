<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2.
 * Applicable for BB version greater than 2.2 and UABB version 1.14.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Advanced Tabs Module
 */

FLBuilder::register_module(
	'AdvancedTabsModule',
	array(
		'items'      => array(
			'title'    => __( 'Tab Items', 'uabb' ),
			'sections' => array(
				'preset_section' => array(
					'title'  => __( 'Presets', 'uabb' ),
					'fields' => array(
						'preset_select' => array(
							'type'    => 'select',
							'label'   => __( 'Preset', 'uabb' ),
							'help'    => __( 'Before changing presets, save the content you added to the module. Otherwise, your content will be overwritten with the default one.', 'uabb' ),
							'default' => 'none',
							'class'   => 'uabb-preset-select multiple',
							'options' => array(
								'none'     => __( 'Default', 'uabb' ),
								'preset-1' => __( 'Preset 1', 'uabb' ),
								'preset-2' => __( 'Preset 2', 'uabb' ),
								'preset-3' => __( 'Preset 3', 'uabb' ),
								'preset-4' => __( 'Preset 4', 'uabb' ),
								'preset-5' => __( 'Preset 5', 'uabb' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
					),
				),
				'general'        => array(
					'title'  => '',
					'fields' => array(
						'items' => array(
							'type'         => 'form',
							'label'        => __( 'Item', 'uabb' ),
							'form'         => 'uabb_tab_items_form', // ID from registered form below.
							'preview_text' => 'label', // Name of a field to use for the preview text.
							'multiple'     => true,
							'default'      => array(
								array(
									'label'      => 'Tab One',
									'tab_icon'   => 'ua-icon ua-icon-icon-3-mail-envelope-closed2',
									'ct_content' => __( 'This is tab content. Click to edit this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'uabb' ),
								),
								array(
									'label'      => 'Tab Two',
									'tab_icon'   => 'ua-icon ua-icon-cog',
									'ct_content' => __( 'This is tab content. Click to edit this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'uabb' ),
								),
								array(
									'label'      => 'Tab Three',
									'tab_icon'   => 'ua-icon ua-icon-globe2',
									'ct_content' => __( 'This is tab content. Click to edit this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'uabb' ),
								),
							),
						),
					),
				),
			),
		),
		'style'      => array(
			'title'    => __( 'Tab', 'uabb' ),
			'sections' => array(
				'general'            => array(
					'title'  => '',
					'fields' => array(
						'tab_layout'            => array(
							'type'    => 'select',
							'label'   => __( 'Tab Layout', 'uabb' ),
							'default' => 'horizontal',
							'options' => array(
								'horizontal' => __( 'Horizontal', 'uabb' ),
								'vertical'   => __( 'Vertical', 'uabb' ),
							),
							'toggle'  => array(
								'horizontal' => array(
									'fields' => array( 'tab_style_width' ),
								),
								'vertical'   => array(
									'fields'   => array( 'tab_border', 'tab_position' ),
									'sections' => array( 'label_border' ),
								),
							),
							'preview' => array(
								'type' => 'refresh',
							),
						),
						'tab_position'          => array(
							'type'    => 'select',
							'label'   => __( 'Tab Position', 'uabb' ),
							'default' => 'left',
							'options' => array(
								'left'  => __( 'Left', 'uabb' ),
								'right' => __( 'Right', 'uabb' ),
							),
							'preview' => array(
								'type' => 'refresh',
							),
						),
						'style'                 => array(
							'type'    => 'select',
							'label'   => __( 'Tab Appearance', 'uabb' ),
							'default' => 'bar',
							'help'    => __( 'Choose from the different tab styles', 'uabb' ),
							'options' => array(
								'simple'   => __( 'Simple', 'uabb' ),
								'bar'      => __( 'Bar', 'uabb' ),
								'iconfall' => __( 'Icon fall', 'uabb' ),
								'topline'  => __( 'Topline', 'uabb' ),
								'linebox'  => __( 'Line box', 'uabb' ),
							),
							'toggle'  => array(
								'simple'   => array(
									'fields' => array(
										'title_color',
										'title_hover_color',
										'title_active_color',
										'tab_padding_dimension',
									),
								),
								'bar'      => array(
									'fields'   => array(
										'title_color',
										'title_hover_color',
										'title_background_color',
										'title_background_color_opc',
										'title_background_hover_color',
										'title_background_hover_color_opc',
										'title_active_color',
										'title_active_background_color',
										'title_active_background_color_opc',
										'tab_padding_dimension',
									),
									'sections' => array( 'label_border' ),
								),
								'iconfall' => array(
									'fields'   => array(
										'title_color',
										'title_hover_color',
										'title_active_color',
									),
									'sections' => array( 'underline_settings' ),
								),
								'topline'  => array(
									'fields'   => array(
										'title_color',
										'title_hover_color',
										'title_background_color',
										'title_background_color_opc',
										'title_active_color',
										'title_active_background_color',
										'tab_padding_dimension',
									),
									'sections' => array( 'underline_settings' ),
								),
								'linebox'  => array(
									'fields' => array(
										'title_color',
										'title_active_color',
										'title_background_color',
										'title_active_background_color',
										'title_active_background_color_opc',
										'tab_padding_dimension',
									),
								),
							),
						),
						'tab_padding_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Tab Padding', 'uabb' ),
							'units'      => array( 'px' ),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '15',
									'medium'     => '',
									'responsive' => '',
								),
							),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'responsive'            => array(
							'type'    => 'select',
							'label'   => __( 'Responsive Mode for Tabs', 'uabb' ),
							'default' => 'accordion',
							'help'    => __( 'Display normal tab or convert them into accordion on responsive devices.', 'uabb' ),
							'options' => array(
								'tabs'      => __( 'Tabs', 'uabb' ),
								'accordion' => __( 'Accordion', 'uabb' ),
							),
							'toggle'  => array(
								'accordion' => array(
									'fields' => array( 'responsive_breakpoint', 'enable_first' ),
								),
							),
						),
						'responsive_breakpoint' => array(
							'type'        => 'unit',
							'label'       => __( 'Responsive Breakpoint', 'uabb' ),
							'placeholder' => $default_breakpoint,
							'size'        => '8',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'help'        => __( 'Enter breakpoint to change Tabs into Accordion', 'uabb' ),
						),
						'enable_first'          => array(
							'type'    => 'select',
							'label'   => __( 'Collapse All Tabs', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'uabb' ),
								'yes' => __( 'Yes', 'uabb' ),
							),
							'help'    => __( 'Choosing yes will collapse all tabs by default.', 'uabb' ),
						),
						'active_tab'            => array(
							'type'        => 'unit',
							'label'       => __( 'Active Tab Index', 'uabb' ),
							'default'     => '0',
							'placeholder' => __( '0', 'uabb' ),
							'size'        => '5',
							'help'        => __( 'Index of default active tab. Index starts from 0.', 'uabb' ),
						),
						'hori_tab_spacing'      => array(
							'type'      => 'unit',
							'label'     => __( 'Horizontal Spacing', 'uabb' ),
							'default'   => '5',
							'units'     => array( 'px' ),
							'maxlength' => '3',
							'size'      => '5',
							'slider'    => array(
								'%' => array(
									'min' => 0,
									'max' => 100,
								),
							),
						),
						'verti_tab_spacing'     => array(
							'type'      => 'unit',
							'label'     => __( 'Vertical Spacing', 'uabb' ),
							'units'     => array( 'px' ),
							'maxlength' => '3',
							'size'      => '5',
							'slider'    => array(
								'%' => array(
									'min' => 0,
									'max' => 100,
								),
							),
						),

					),
				),
				'icon_style'         => array(
					'title'  => __( 'Tab Icon', 'uabb' ),
					'fields' => array(
						'show_icon'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Icon', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'Disable', 'uabb' ),
								'yes' => __( 'Enable', 'uabb' ),
							),
						),
						'icon_position'     => array(
							'type'    => 'select',
							'label'   => __( 'Icon Position', 'uabb' ),
							'default' => 'left',
							'options' => array(
								'left'  => __( 'Left', 'uabb' ),
								'right' => __( 'Right', 'uabb' ),
								'top'   => __( 'Top', 'uabb' ),
							),
						),
						'icon_size'         => array(
							'type'        => 'unit',
							'label'       => __( 'Icon Size', 'uabb' ),
							'placeholder' => __( 'Inherit', 'uabb' ),
							'size'        => '8',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'help'        => __( 'If icon size is kept bank then title font size would be applied', 'uabb' ),
						),
						'icon_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Icon Color', 'uabb' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_hover_color'  => array(
							'type'        => 'color',
							'label'       => __( 'Icon Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type' => 'none',
							),
						),
						'icon_active_color' => array(
							'type'        => 'color',
							'label'       => __( 'Icon Active Color', 'uabb' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
				'tab_style'          => array(
					'title'  => __( 'Tab Style', 'uabb' ),
					'fields' => array(
						'tab_style'                        => array(
							'type'    => 'select',
							'label'   => __( 'Style', 'uabb' ),
							'default' => 'full',
							'help'    => __( 'Use Full if you want the Tabs to occupy complete width of container and Inline for auto width', 'uabb' ),
							'options' => array(
								'full'   => __( 'Full', 'uabb' ),
								'inline' => __( 'Inline', 'uabb' ),
							),
							'toggle'  => array(
								'inline' => array(
									'fields' => array( 'tab_style_align', 'tab_spacing' ),
								),
							),
						),
						'tab_style_align'                  => array(
							'type'       => 'align',
							'label'      => __( 'Align', 'uabb' ),
							'default'    => 'left',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '',
								'property'  => 'text-align',
								'important' => true,
							),
						),
						'tab_style_width'                  => array(
							'type'    => 'select',
							'label'   => __( 'Tab Width', 'uabb' ),
							'default' => 'auto',
							'help'    => __( 'To make the Tabs of equal width use Equal width option.', 'uabb' ),
							'options' => array(
								'auto'  => __( 'Auto', 'uabb' ),
								'equal' => __( 'Equal', 'uabb' ),
							),
						),
						'tab_focus_color'                  => array(
							'type'        => 'color',
							'label'       => __( 'Tab Focus Color', 'uabb' ),
							'default'     => '#5E9ED6',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'title_color'                      => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-tab-title',
								'property'  => 'color',
								'important' => true,
							),
						),
						'title_hover_color'                => array(
							'type'        => 'color',
							'label'       => __( 'Text Hover Color', 'uabb' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'title_active_color'               => array(
							'type'        => 'color',
							'label'       => __( 'Text Active Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-tab-current a .uabb-tab-title',
								'property'  => 'color',
								'important' => true,
							),
						),
						'title_background_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => 'f6f6f6',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-tabs .uabb-tabs-nav ul li',
								'property'  => 'background',
								'important' => true,
							),
						),
						'title_background_color_opc'       => array(
							'type'      => 'unit',
							'label'     => __( 'Opacity', 'uabb' ),
							'default'   => '',
							'units'     => array( '%' ),
							'maxlength' => '3',
							'size'      => '5',
							'slider'    => array(
								'%' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'title_background_hover_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'title_background_hover_color_opc' => array(
							'type'      => 'unit',
							'label'     => __( 'Opacity', 'uabb' ),
							'default'   => '',
							'units'     => array( '%' ),
							'maxlength' => '3',
							'size'      => '5',
							'slider'    => array(
								'%' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),

						'title_active_background_color'    => array(
							'type'        => 'color',
							'label'       => __( 'Active Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'refresh',
								'selector'  => '.uabb-tabs-style-bar > nav > ul li.uabb-tab-current a',
								'property'  => 'background-color',
								'important' => true,
							),
						),
						'title_active_background_color_opc' => array(
							'type'      => 'unit',
							'label'     => __( 'Opacity', 'uabb' ),
							'default'   => '',
							'units'     => array( '%' ),
							'maxlength' => '3',
							'size'      => '5',
							'slider'    => array(
								'%' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'description_color'                => array(
							'type'        => 'color',
							'label'       => __( 'Description Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-tabs .uabb-tab-link .uabb-tab-description',
								'property' => 'color',
							),
						),
						'description_active_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Description Active/Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-tabs .uabb-tab-nav .uabb-tab-current .uabb-tab-description',
								'property' => 'color',
							),
						),
						'tab_border'                       => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'uabb' ),
							'slider'  => true,
							'units'   => array( 'px' ),
							'default' => array(
								'style' => 'solid',
								'color' => '#000000',
								'width' => array(
									'top'    => '1',
									'right'  => '0',
									'bottom' => '1',
									'left'   => '1',
								),
							),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-tabs.uabb-tabs-layout-vertical > nav ul li.uabb-tab-current',
								'property' => 'border',
								'unit'     => 'px',
							),
						),
					),
				),
				'underline_settings' => array(
					'title'  => __( 'Highlight Border Style', 'uabb' ),
					'fields' => array(
						'line_position'          => array(
							'type'    => 'select',
							'label'   => __( 'Line Position', 'uabb' ),
							'default' => 'top',
							'options' => array(
								'top'    => __( 'Top', 'uabb' ),
								'bottom' => __( 'Bottom', 'uabb' ),
							),
						),
						'underline_border_size'  => array(
							'type'        => 'unit',
							'label'       => __( 'Border Thickness', 'uabb' ),
							'placeholder' => '6',
							'size'        => '8',
							'help'        => __( 'To change the Highlight border thickness use this options', 'uabb' ),
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'underline_border_color' => array(
							'type'        => 'color',
							'label'       => __( 'Border Color', 'uabb' ),
							'default'     => '',
							'connections' => array( 'color' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),

					),
				),
				'label_border'       => array(
					'title'  => __( 'Tab Spacing', 'uabb' ),
					'fields' => array(
						'tab_spacing'      => array(
							'type'    => 'select',
							'label'   => __( 'Tab Spacing', 'uabb' ),
							'default' => 'yes',
							'help'    => __( 'To manage the space between tabs use this setting', 'uabb' ),
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'tab_spacing_size' ),
								),
							),
						),
						'tab_spacing_size' => array(
							'type'        => 'unit',
							'label'       => __( 'Margin', 'uabb' ),
							'placeholder' => '10',
							'size'        => '8',
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
			),
		),
		'content'    => array(
			'title'    => __( 'Content', 'uabb' ),
			'sections' => array(
				'content_style' => array(
					'title'  => __( 'Content Style', 'uabb' ),
					'fields' => array(
						'content_padding_dimension'    => array(
							'type'       => 'dimension',
							'label'      => __( 'Padding', 'uabb' ),
							'units'      => array( 'px' ),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'responsive' => array(
								'placeholder' => array(
									'default'    => '25',
									'medium'     => '',
									'responsive' => '',
								),
							),
						),
						'content_alignment'            => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'uabb' ),
							'default' => 'left',
							'preview' => array(
								'type'      => 'css',
								'selector'  => '.uabb-content-wrap .section.uabb-content-current > .uabb-content',
								'property'  => 'text-align',
								'important' => true,
							),
						),
						'content_color'                => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-content-wrap .section.uabb-content-current > .uabb-content',
								'property'  => 'color',
								'important' => true,
							),
						),
						'content_background_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
							'preview'     => array(
								'type'      => 'css',
								'selector'  => '.uabb-content-wrap',
								'property'  => 'background',
								'important' => true,
							),

						),
						'content_background_color_opc' => array(
							'type'        => 'text',
							'label'       => __( 'Opacity', 'uabb' ),
							'default'     => '',
							'description' => '%',
							'maxlength'   => '3',
							'size'        => '5',
							'units'       => array( '%' ),
							'slider'      => array(
								'%' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				'border-styles' => array(
					'title'  => __( 'Content Border', 'uabb' ),
					'fields' => array(
						'content_border_param' => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'uabb' ),
							'responsive' => true,
							'default'    => array(
								'style' => 'solid',
								'color' => '',
								'width' => array(
									'top'    => '1',
									'right'  => '1',
									'bottom' => '1',
									'left'   => '1',
								),
							),
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-content-wrap .section.uabb-content-current > .uabb-content',
							),
						),
					),
				),
			),
		),
		'typography' => array( // Tab.
			'title'    => __( 'Typography', 'uabb' ), // Tab title.
			'sections' => array( // Tab Sections.
				'title_typography'   => array(
					'title'  => __( 'Title', 'uabb' ),
					'fields' => array(
						'title_tag_selection' => array(
							'type'    => 'select',
							'label'   => __( 'Tag', 'uabb' ),
							'default' => 'h4',
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
						'title_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-tabs li a, .uabb-tab-acc-title .uabb-title-tag, .uabb-tabs .uabb-tabs-nav .uabb-tab-title',
								'important' => true,
							),
						),
					),
				),
				'des_typography'     => array(
					'title'  => __( 'Tab Description', 'uabb' ),
					'fields' => array(
						'description_typography' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-tabs .uabb-tab-description',
								'important' => true,
							),
						),
					),
				),
				'content_typography' => array(
					'title'  => __( 'Content', 'uabb' ),
					'fields' => array(
						'content_font_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.uabb-content-wrap .uabb-content, .uabb-content-wrap .uabb-content-current, .uabb-content-wrap .uabb-content p, .uabb-content-wrap .uabb-content-current p',
								'important' => true,
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
	'uabb_tab_items_form',
	array(
		'title' => __( 'Add Item', 'uabb' ),
		'tabs'  => array(
			'general' => array(
				'title'    => __( 'General', 'uabb' ),
				'sections' => array(
					'general'      => array(
						'title'  => '',
						'fields' => array(
							'label'       => array(
								'type'        => 'text',
								'label'       => __( 'Tab Title', 'uabb' ),
								'connections' => array( 'string', 'html' ),
							),
							'description' => array(
								'type'        => 'textarea',
								'label'       => __( 'Description', 'uabb' ),
								'connections' => array( 'string', 'html', 'url' ),
								'rows'        => 3,
							),
							'tab_icon'    => array(
								'type'        => 'icon',
								'label'       => __( 'Icon', 'uabb' ),
								'show_remove' => true,
							),
						),
					),
					'content_type' => array(
						'title'  => __( 'Content', 'uabb' ),
						'fields' => array(
							'content_type'      => array(
								'type'    => 'select',
								'label'   => __( 'Type', 'uabb' ),
								'default' => 'content',
								'options' => array(
									'content'              => __( 'Content', 'uabb' ),
									'photo'                => __( 'Photo', 'uabb' ),
									'video'                => __( 'Video Embed Code', 'uabb' ),
									'saved_rows'           => array(
										'label'   => __( 'Saved Rows', 'uabb' ),
										'premium' => true,
									),
									'saved_modules'        => array(
										'label'   => __( 'Saved Modules', 'uabb' ),
										'premium' => true,
									),
									'saved_page_templates' => array(
										'label'   => __( 'Saved Page Templates', 'uabb' ),
										'premium' => true,
									),
								),
								'toggle'  => array(
									'content'              => array(
										'fields' => array( 'ct_content' ),
									),
									'photo'                => array(
										'fields' => array( 'ct_photo' ),
									),
									'video'                => array(
										'fields' => array( 'ct_video' ),
									),
									'saved_rows'           => array(
										'fields' => array( 'ct_saved_rows' ),
									),
									'saved_modules'        => array(
										'fields' => array( 'ct_saved_modules' ),
									),
									'saved_page_templates' => array(
										'fields' => array( 'ct_page_templates' ),
									),
								),
							),
							'ct_content'        => array(
								'type'        => 'editor',
								'label'       => '',
								'connections' => array( 'string', 'html' ),
							),
							'ct_raw'            => array(
								'type'    => 'raw',
								'content' => '<div class="uabb-module-raw" data-uabb-module-nonce=' . wp_create_nonce( 'uabb-module-nonce' ) . '></div>',
							),
							'ct_photo'          => array(
								'type'        => 'photo',
								'label'       => __( 'Select Photo', 'uabb' ),
								'show_remove' => true,
							),
							'ct_video'          => array(
								'type'  => 'textarea',
								'label' => __( 'Embed Code / URL', 'uabb' ),
								'rows'  => 6,
							),
							'ct_saved_rows'     => array(
								'type'    => 'select',
								'label'   => __( 'Select Row', 'uabb' ),
								'options' => array(),
							),
							'ct_saved_modules'  => array(
								'type'    => 'select',
								'label'   => __( 'Select Module', 'uabb' ),
								'options' => array(),
							),
							'ct_page_templates' => array(
								'type'    => 'select',
								'label'   => __( 'Select Page Template', 'uabb' ),
								'options' => array(),
							),
						),
					),
				),
			),
		),
	)
);
