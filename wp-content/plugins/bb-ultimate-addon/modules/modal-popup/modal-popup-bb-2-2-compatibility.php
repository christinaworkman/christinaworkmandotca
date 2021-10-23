<?php
/**
 * Register the module and its form settings with new typography, border, align param settings provided in beaver builder version 2.2.
 * Applicable for BB version greater than 2.2 and UABB version 1.14.0 or later.
 *
 * Converted font, align, border settings to respective param setting.
 *
 * @package UABB Modal Popup Module
 */

FLBuilder::register_module(
	'ModalPopupModule',
	array(
		'general'    => array( // Tab.
			'title'    => __( 'Content', 'uabb' ), // Tab title.
			'sections' => array( // Tab Sections.
				'preview'        => array(
					'title'  => '',
					'fields' => array(
						'preview_modal' => array(
							'type'    => 'select',
							'label'   => __( 'Preview Modal Popup', 'uabb' ),
							'default' => '1',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
							'help'    => __( 'If enabled, you will see preview of modal popup at backend. This option is just for preview purpose.', 'uabb' ),
						),
					),
				),
				'title'          => array(
					'title'  => __( 'Title', 'uabb' ),
					'fields' => array(
						'enable_title'            => array(
							'type'    => 'select',
							'label'   => __( 'Enable Title', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'1' => array(
									'fields'   => array( 'title', 'title_spacing_dimension', 'title_alignment' ),
									'sections' => array( 'title_typo' ),
								),
							),
						),
						'title'                   => array(
							'type'        => 'text',
							'label'       => __( 'Enter Title', 'uabb' ),
							'placeholder' => __( 'This is modal title', 'uabb' ),
							'connections' => array( 'string', 'html' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-modal-title',
							),
						),
						'title_alignment'         => array(
							'type'    => 'align',
							'label'   => __( 'Title Alignment', 'uabb' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-title-wrap',
								'property' => 'text-align',
							),
						),
						'title_spacing_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Title Padding', 'uabb' ),
							'responsive' => array(
								'placeholder' => array(
									'default'    => array(
										'top'    => '5',
										'right'  => '25',
										'bottom' => '5',
										'left'   => '25',
									),
									'medium'     => '',
									'responsive' => '',
								),
							),
						),
					),
				),
				'content_type'   => array(
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
								'youtube'              => __( 'YouTube', 'uabb' ),
								'vimeo'                => __( 'Vimeo', 'uabb' ),
								'iframe'               => __( 'iFrame', 'uabb' ),
							),
							'toggle'  => array(
								'content'              => array(
									'sections' => array( 'ct_content_typo' ),
									'fields'   => array( 'ct_content' ),
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
								'youtube'              => array(
									'sections' => array( 'video_setting' ),
									'fields'   => array( 'youtube_related_videos', 'youtube_player_controls' ),
								),
								'vimeo'                => array(
									'sections' => array( 'video_setting' ),
								),
								'iframe'               => array(
									'sections' => array( 'iframe_setting' ),
								),
							),
						),
						'ct_content'        => array(
							'type'        => 'editor',
							'label'       => '',
							'default'     => __( 'Enter your content.', 'uabb' ),
							'connections' => array( 'string', 'html' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-modal-content-data',
							),
						),
						'ct_raw'            => array(
							'type'    => 'raw',
							'content' => '<div class="uabb-module-raw" data-uabb-module-nonce=' . wp_create_nonce( 'uabb-module-nonce' ) . '></div>',
						),
						'ct_photo'          => array(
							'type'        => 'photo',
							'label'       => __( 'Select Photo', 'uabb' ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
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
				'video_setting'  => array( // Section.
					'title'  => __( 'Video Setting', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'video_url'               => array(
							'type'        => 'text',
							'label'       => __( 'Video URL', 'uabb' ),
							'connections' => array( 'url' ),
						),
						'video_ratio'             => array(
							'type'    => 'select',
							'label'   => __( 'Aspect Ratio', 'uabb' ),
							'default' => 'center',
							'options' => array(
								'16_9' => __( '16:9', 'uabb' ),
								'4_3'  => __( '4:3', 'uabb' ),
							),
						),
						'video_autoplay'          => array(
							'type'    => 'select',
							'label'   => __( 'Autoplay', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
						'youtube_related_videos'  => array(
							'type'    => 'select',
							'label'   => __( 'Disable Related Videos', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
						'youtube_player_controls' => array(
							'type'    => 'select',
							'label'   => __( 'Disable Player Controls', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
					),
				),
				'iframe_setting' => array( // Section.
					'title'  => __( 'iFrame Setting', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'iframe_url'    => array(
							'type'        => 'text',
							'label'       => __( 'URL', 'uabb' ),
							'connections' => array( 'url' ),
						),
						'iframe_height' => array(
							'type'        => 'unit',
							'label'       => __( 'Height of iFrame', 'uabb' ),
							'default'     => '360',
							'placeholder' => 'auto',
							'maxlength'   => '6',
							'size'        => '8',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'help'        => __( 'Keep this empty for auto', 'uabb' ),
						),
						'async_iframe'  => array(
							'type'        => 'select',
							'label'       => __( 'Async iFrame Load', 'uabb' ),
							'default'     => 'no',
							'options'     => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'help'        => __( 'Enabling this option will reduce the page size and page loading time. ', 'uabb' ),
							'description' => $iframe_desc,
						),
					),
				),
				'type_general'   => array( // Section.
					'title'  => __( 'Modal Popup Setting', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'modal_width'             => array(
							'type'      => 'unit',
							'label'     => __( 'Maximum Width of Content', 'uabb' ),
							'default'   => '500',
							'maxlength' => '5',
							'size'      => '6',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'help'      => __( 'If you keep this empty title will not display', 'uabb' ),
						),
						'modal_spacing_dimension' => array(
							'type'       => 'dimension',
							'label'      => __( 'Content Padding', 'uabb' ),
							'units'      => array( 'px' ),
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'default'    => '25',
							'responsive' => array(
								'placeholder' => array(
									'default'    => '25',
									'medium'     => '',
									'responsive' => '',
								),
							),
						),
						'modal_effect'            => array(
							'type'    => 'select',
							'label'   => __( 'Modal Appear Effect', 'uabb' ),
							'default' => 'uabb-effect-1',
							'options' => array(
								'uabb-effect-1'  => __( 'Fade in &amp; Scale', 'uabb' ),
								'uabb-effect-2'  => __( 'Slide in (right)', 'uabb' ),
								'uabb-effect-3'  => __( 'Slide in (bottom)', 'uabb' ),
								'uabb-effect-4'  => __( 'Newspaper', 'uabb' ),
								'uabb-effect-5'  => __( 'Fall', 'uabb' ),
								'uabb-effect-6'  => __( 'Side Fall', 'uabb' ),
								'uabb-effect-8'  => __( '3D Flip (horizontal)', 'uabb' ),
								'uabb-effect-9'  => __( '3D Flip (vertical)', 'uabb' ),
								'uabb-effect-10' => __( '3D Sign', 'uabb' ),
								'uabb-effect-11' => __( 'Super Scaled', 'uabb' ),
								'uabb-effect-13' => __( '3D Slit', 'uabb' ),
								'uabb-effect-14' => __( '3D Rotate Bottom', 'uabb' ),
								'uabb-effect-15' => __( '3D Rotate In Left', 'uabb' ),
								'uabb-effect-17' => __( 'Let me in', 'uabb' ),
								'uabb-effect-18' => __( 'Make way!', 'uabb' ),
								'uabb-effect-19' => __( 'Slip from top', 'uabb' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
						'content_bg_color'        => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => 'ffffff',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-content',
								'property' => 'background',
							),
							'connections' => array( 'color' ),
						),
						'overlay_color'           => array(
							'type'        => 'color',
							'label'       => __( 'Overlay Color', 'uabb' ),
							'default'     => 'rgba(0,0,0,0.75)',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'modal_border'            => array(
							'type'    => 'border',
							'label'   => __( 'Modal Popup Border', 'uabb' ),
							'slider'  => true,
							'units'   => array( 'px' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-content',
								'property' => 'border',
								'unit'     => 'px',
							),
						),
					),
				),
			),
		),
		'modal'      => array(
			'title'    => __( 'Display Settings', 'uabb' ),
			'sections' => array(
				'modal_sec'          => array( // Section.
					'fields' => array( // Section Fields.
						'modal_on'  => array(
							'type'    => 'select',
							'label'   => __( 'Display Modal On', 'uabb' ),
							'default' => 'button',
							'options' => array(
								'icon'      => __( 'Icon', 'uabb' ),
								'photo'     => __( 'Image', 'uabb' ),
								'text'      => __( 'Text', 'uabb' ),
								'button'    => __( 'Button', 'uabb' ),
								'custom'    => __( 'Custom Class / ID', 'uabb' ),
								'automatic' => __( 'Automatic', 'uabb' ),
							),
							'toggle'  => array(
								'icon'      => array(
									'fields'   => array( 'all_align' ),
									'sections' => array( 'modal_icon' ),
								),
								'photo'     => array(
									'fields'   => array( 'all_align' ),
									'sections' => array( 'modal_photo' ),
								),
								'text'      => array(
									'fields'   => array( 'all_align' ),
									'sections' => array( 'modal_text', 'text_typography' ),
								),
								'button'    => array(
									'sections' => array( 'btn-general', 'btn-link', 'btn-style', 'btn-icon', 'btn-colors', 'btn-structure', 'btn_typography' ),
								),
								'custom'    => array(
									'sections' => array( 'modal_custom' ),
								),
								'automatic' => array(
									'sections' => array( 'trigger_sec', 'repeat_control_sec' ),
								),
							),
						),
						'all_align' => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'uabb' ),
							'default' => 'left',
							'help'    => __( 'To align Icon/Image/text use this settings', 'uabb' ),
						),
					),
				),
				'modal_icon'         => array(
					'title'  => __( 'Icon', 'uabb' ),
					'fields' => array(
						'icon'             => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'uabb' ),
							'show_remove' => true,
						),
						'icon_size'        => array(
							'type'      => 'unit',
							'label'     => __( 'Size', 'uabb' ),
							'default'   => '30',
							'maxlength' => '5',
							'size'      => '6',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'icon_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Icon Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'icon_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Icon Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
							'connections' => array( 'color' ),
						),
					),
				),
				'modal_photo'        => array(
					'title'  => __( 'Image', 'uabb' ),
					'fields' => array(
						'photo'    => array(
							'type'        => 'photo',
							'label'       => __( 'Image', 'uabb' ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
						),
						'img_size' => array(
							'type'      => 'unit',
							'label'     => __( 'Size', 'uabb' ),
							'default'   => '',
							'maxlength' => '5',
							'size'      => '6',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				'modal_text'         => array( // Section.
					'title'  => __( 'Text', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'modal_text'       => array(
							'type'        => 'text',
							'label'       => __( 'Text', 'uabb' ),
							'default'     => __( 'Click Here', 'uabb' ),
							'connections' => array( 'string', 'html' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-modal-action',
							),
						),
						'text_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-action',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
						'text_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Text Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
					),
				),

				/* Button Start */
				'btn-general'        => array( // Section.
					'title'  => __( 'General', 'uabb' ),
					'fields' => array(
						'btn_text' => array(
							'type'        => 'text',
							'label'       => __( 'Text', 'uabb' ),
							'default'     => __( 'Click Here', 'uabb' ),
							'connections' => array( 'string', 'html' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.uabb-creative-button-text',
							),
						),
					),
				),
				'btn-style'          => array(
					'title'  => __( 'Style', 'uabb' ),
					'fields' => array(
						'btn_style'                      => array(
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
								'gradient'    => array(
									'fields' => array( 'btn_width', 'btn_border_radius' ),
								),
								'transparent' => array(
									'fields' => array( 'btn_width', 'btn_border_radius' ),
								),
								'threed'      => array(
									'fields' => array( 'btn_width', 'btn_border_radius' ),
								),
								'flat'        => array(
									'fields' => array( 'btn_width', 'btn_border_radius' ),
								),
							),
						),
						'btn_border_size'                => array(
							'type'        => 'unit',
							'label'       => __( 'Border Size', 'uabb' ),
							'maxlength'   => '3',
							'size'        => '5',
							'placeholder' => '2',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'btn_transparent_button_options' => array(
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
						),
						'btn_threed_button_options'      => array(
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
						'btn_flat_button_options'        => array(
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
				'btn-icon'           => array( // Section.
					'title'  => __( 'Button Icons', 'uabb' ),
					'fields' => array(
						'btn_icon'          => array(
							'type'        => 'icon',
							'label'       => __( 'Icon', 'uabb' ),
							'show_remove' => true,
						),
						'btn_icon_position' => array(
							'type'    => 'select',
							'label'   => __( 'Icon Position', 'uabb' ),
							'default' => 'before',
							'options' => array(
								'before' => __( 'Before Text', 'uabb' ),
								'after'  => __( 'After Text', 'uabb' ),
							),
						),
					),
				),
				'btn-colors'         => array( // Section.
					'title'  => __( 'Colors', 'uabb' ),
					'fields' => array(
						'btn_text_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Text Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a *',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
						'btn_text_hover_color' => array(
							'type'        => 'color',
							'label'       => __( 'Text Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
							'connections' => array( 'color' ),
						),
						'btn_bg_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'  => 'css',
								'rules' => array(
									array(
										'selector' => '.uabb-creative-button-wrap a.uabb-creative-flat-btn',
										'property' => 'background',
									),
									array(
										'selector' => '.uabb-creative-button-wrap a.uabb-creative-transparent-btn',
										'property' => 'border-color',
									),
								),
							),
							'connections' => array( 'color' ),
						),

						'btn_bg_hover_color'   => array(
							'type'        => 'color',
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
							'connections' => array( 'color' ),
						),
						'hover_attribute'      => array(
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
				'btn-structure'      => array(
					'title'  => __( 'Structure', 'uabb' ),
					'fields' => array(
						'btn_width'                => array(
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
									'fields' => array( 'btn_align', 'btn_mob_align' ),
								),
								'full'   => array(
									'fields' => array(),
								),
								'custom' => array(
									'fields' => array( 'btn_align', 'btn_mob_align', 'btn_custom_width', 'btn_custom_height', 'btn_padding_top_bottom', 'btn_padding_left_right' ),
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
						'border_hover_color'       => array(
							'type'        => 'color',
							'label'       => __( 'Border Hover Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'connections' => array( 'color' ),
							'show_alpha'  => true,
							'preview'     => array(
								'type' => 'none',
							),
							'connections' => array( 'color' ),
						),
						'btn_custom_width'         => array(
							'type'      => 'unit',
							'label'     => __( 'Custom Width', 'uabb' ),
							'default'   => '200',
							'maxlength' => '3',
							'size'      => '4',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'width',
								'unit'     => 'px',
							),
						),
						'btn_custom_height'        => array(
							'type'      => 'unit',
							'label'     => __( 'Custom Height', 'uabb' ),
							'default'   => '45',
							'maxlength' => '3',
							'size'      => '4',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'min-height',
								'unit'     => 'px',
							),
						),
						'btn_padding_top_bottom'   => array(
							'type'        => 'unit',
							'label'       => __( 'Padding Top/Bottom', 'uabb' ),
							'placeholder' => '0',
							'maxlength'   => '3',
							'size'        => '4',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
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
						'btn_padding_left_right'   => array(
							'type'        => 'unit',
							'label'       => __( 'Padding Left/Right', 'uabb' ),
							'placeholder' => '0',
							'maxlength'   => '3',
							'size'        => '4',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
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
						'btn_border_radius'        => array(
							'type'      => 'unit',
							'label'     => __( 'Round Corners', 'uabb' ),
							'maxlength' => '3',
							'size'      => '4',
							'units'     => array( 'px' ),
							'slider'    => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
							'preview'   => array(
								'type'     => 'css',
								'selector' => '.uabb-creative-button-wrap a',
								'property' => 'border-radius',
								'unit'     => 'px',
							),
						),
						'btn_align'                => array(
							'type'    => 'align',
							'label'   => __( 'Alignment', 'uabb' ),
							'default' => 'left',
							'preview' => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-action-wrap, .uabb-button-wrap',
								'property' => 'text-align',
							),
						),
						'btn_mob_align'            => array(
							'type'    => 'align',
							'label'   => __( 'Mobile Alignment', 'uabb' ),
							'default' => 'center',
						),
					),
				),
				/* Button End */
				'modal_custom'       => array( // Section.
					'title'  => __( 'Custom', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'modal_custom' => array(
							'type'        => 'text',
							'label'       => __( 'Class and/or ID', 'uabb' ),
							'default'     => '',
							'placeholder' => '',
							'help'        => __( 'Add .Class and/or #ID to open your modal. Multiple ID or Classes separated by comma.', 'uabb' ),
						),
					),
				),

				/* Automatic Modal */
				'trigger_sec'        => array( // Section.
					'title'  => __( 'Smart Launch', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						/* Style Options */
						'exit_intent'        => array(
							'type'    => 'select',
							'label'   => __( 'Before User Leaves / Exit Intent', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
							'help'    => __( 'If enabled, modal popup will load right before user is about to leave your website.', 'uabb' ),
						),
						'after_second'       => array(
							'type'    => 'select',
							'label'   => __( 'After Few Seconds', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'1' => array(
									'fields' => array( 'after_second_value' ),
								),
							),
							'help'    => __( 'If enabled, modal popup will load automatically after few seconds.', 'uabb' ),
						),
						'after_second_value' => array(
							'type'        => 'text',
							'label'       => __( 'Load After Seconds', 'uabb' ),
							'default'     => '0',
							'maxlength'   => '6',
							'size'        => '8',
							'description' => 's',
							'help'        => __( 'How long the modal should take to be displayed after the page is loaded? If set to 5, the modal popup will appear after 5 seconds.', 'uabb' ),
						),
					),
				),
				'repeat_control_sec' => array( // Section.
					'title'  => __( 'Repeat Control', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'enable_cookies'    => array(
							'type'    => 'select',
							'label'   => __( 'Enable Cookies', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'1' => array(
									'fields' => array( 'close_cookie_days' ),
								),
							),
							'help'    => __( 'This will check user history and limit repeat occurrence of modal popup when cookies are enabled. No more annoying modals!', 'uabb' ),
						),
						'close_cookie_days' => array(
							'type'        => 'text',
							'label'       => __( 'Do Not Show After Closing', 'uabb' ),
							'default'     => '30',
							'maxlength'   => '6',
							'size'        => '8',
							'description' => 'days',
							'help'        => __( 'How many days this modal should not be displayed after user closes the modal?', 'uabb' ),
						),
					),
				),
			),
		),
		'close'      => array(
			'title'    => __( 'Close Button', 'uabb' ),
			'sections' => array(
				/* Icon Basic Setting */
				'close_button'   => array( // Section.
					'title'  => __( 'Close Button', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'close_source'     => array(
							'type'    => 'select',
							'label'   => __( 'Close as', 'uabb' ),
							'default' => 'icon',
							'options' => array(
								'icon'  => __( 'Icon', 'uabb' ),
								'image' => __( 'Image', 'uabb' ),
							),
							'toggle'  => array(
								'icon'  => array(
									'fields' => array( 'close_icon', 'close_icon_color' ),
								),
								'image' => array(
									'fields' => array( 'close_photo' ),
								),
							),
						),
						'close_icon'       => array(
							'type'        => 'icon',
							'label'       => __( 'Close Icon', 'uabb' ),
							'default'     => 'fas fa-times',
							'show_remove' => true,
						),
						'close_photo'      => array(
							'type'        => 'photo',
							'label'       => __( 'Image', 'uabb' ),
							'show_remove' => true,
							'connections' => array( 'photo' ),
						),
						'close_icon_size'  => array(
							'type'        => 'unit',
							'label'       => __( 'Size', 'uabb' ),
							'default'     => '',
							'placeholder' => '25',
							'maxlength'   => '5',
							'size'        => '6',
							'units'       => array( 'px' ),
							'slider'      => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
						'close_icon_color' => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-close-icon',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
						'icon_position'    => array(
							'type'    => 'select',
							'label'   => __( 'Image / Icon Position', 'uabb' ),
							'default' => 'top-right',
							'options' => array(
								'top-left'             => __( 'Window - Top Left', 'uabb' ),
								'top-right'            => __( 'Window - Top Right', 'uabb' ),
								'popup-top-left'       => __( 'Popup - Top Left', 'uabb' ),
								'popup-top-right'      => __( 'Popup - Top Right', 'uabb' ),
								'popup-edge-top-left'  => __( 'Popup Edge - Top Left', 'uabb' ),
								'popup-edge-top-right' => __( 'Popup Edge - Top Right', 'uabb' ),
							),
						),
					),
				),
				'close_modal_on' => array( // Section.
					'title'  => __( 'Close Modal On', 'uabb' ), // Section Title.
					'fields' => array( // Section Fields.
						'esc_keypress'  => array(
							'type'    => 'select',
							'label'   => __( 'ESC Keypress', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
						),
						'overlay_click' => array(
							'type'    => 'select',
							'label'   => __( 'Overlay Click', 'uabb' ),
							'default' => '0',
							'options' => array(
								'1' => __( 'Yes', 'uabb' ),
								'0' => __( 'No', 'uabb' ),
							),
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'uabb' ), // Tab title.
			'sections' => array(
				'title_typo'      => array(
					'title'  => __( 'Title', 'uabb' ),
					'fields' => array(
						'title_tag_selection' => array(
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
						'title_font_typo'     => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-title',
							),
						),
						'title_color'         => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-title',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
						'title_bg_color'      => array(
							'type'        => 'color',
							'label'       => __( 'Background Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-title-wrap',
								'property' => 'background',
							),
							'connections' => array( 'color' ),
						),
					),
				),
				'ct_content_typo' => array(
					'title'  => __( 'Content', 'uabb' ),
					'fields' => array(
						'ct_content_font_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-text',
							),
						),
						'ct_content_color'     => array(
							'type'        => 'color',
							'label'       => __( 'Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'preview'     => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-text',
								'property' => 'color',
							),
							'connections' => array( 'color' ),
						),
					),
				),
				'text_typography' => array(
					'title'  => __( 'Modal Appear On - Text Typography', 'uabb' ),
					'fields' => array(
						'text_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-modal-action',
							),
						),
					),
				),
				'btn_typography'  => array(
					'title'  => __( 'Modal Appear On - Button Typography', 'uabb' ),
					'fields' => array(
						'btn_typo' => array(
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
		'uabb_docs'  => array(
			'title'    => __( 'Docs', 'uabb' ),
			'sections' => array(
				'knowledge_base' => array(
					'title'  => __( 'Helpful Information', 'uabb' ),
					'fields' => array(
						'uabb_helpful_information' => array(
							'type'    => 'raw',
							'content' => '<ul class="uabb-docs-list" data-branding=' . BB_Ultimate_Addon_Helper::$is_branding_enabled . '>

								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> <a href="https://www.ultimatebeaver.com/docs/trigger-modal-popup-on-click-of-menu-element/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=modal-popup-module" target="_blank" rel="noopener"> How to trigger a Modal Popup on the click of a Menu Element? </a> </li>

								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> <a href="https://www.ultimatebeaver.com/docs/open-modal-popup-from-another-module/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=modal-popup-module" target="_blank" rel="noopener"> How to open a modal popup from another module? </a> </li>

								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> 
								<a href="https://www.ultimatebeaver.com/docs/close-modal-popup-on-click-of-button-text/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=modal-popup-module" target="_blank" rel="noopener"> Is it Possible to Close a Modal Popup on the Click of a Button or Text? </a> </li>

								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> 
								<a href="https://www.ultimatebeaver.com/docs/building-site-wide-modal-popups-beaver-builder-uabb/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=modal-popup-module" target="_blank" rel="noopener"> Building Site-wide Modal Popups in Beaver Builder & UABB </a> </li>

								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> 
								<a href="https://www.ultimatebeaver.com/docs/can-use-modal-popup-module-effectively/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=modal-popup-module" target="_blank" rel="noopener"> How can I use the Modal Popup module effectively?  </a> </li>
							 </ul>',
						),
					),
				),
			),
		),
	)
);
