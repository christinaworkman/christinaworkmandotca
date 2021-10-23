<?php
/**
 *  UABB Heading Module front-end CSS php file
 *
 *  @package UABB Heading Module
 */

	$version_bb_check = UABB_Compatibility::$version_bb_check;
	$converted        = UABB_Compatibility::$uabb_migration;

	$settings->color         = UABB_Helper::uabb_colorpicker( $settings, 'color' );
	$settings->desc_color    = UABB_Helper::uabb_colorpicker( $settings, 'desc_color' );
	$settings->bg_color      = UABB_Helper::uabb_colorpicker( $settings, 'bg_color' );
	$settings->bg_text_color = UABB_Helper::uabb_colorpicker( $settings, 'bg_text_color' );


	$settings->heading_margin_top    = ( '' !== trim( $settings->heading_margin_top ) ) ? $settings->heading_margin_top : '0';
	$settings->heading_margin_bottom = ( '' !== trim( $settings->heading_margin_bottom ) ) ? $settings->heading_margin_bottom : '15';
	$settings->desc_margin_top       = ( '' !== trim( $settings->desc_margin_top ) ) ? $settings->desc_margin_top : '15';
	$settings->desc_margin_bottom    = ( '' !== trim( $settings->desc_margin_bottom ) ) ? $settings->desc_margin_bottom : '0';
	$settings->img_size              = ( '' !== trim( $settings->img_size ) ) ? $settings->img_size : '50';

if ( class_exists( 'FLBuilderCSS' ) ) {
	if ( isset( $settings->head_vertical_position ) ) {
		FLBuilderCSS::responsive_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'head_vertical_position',
				'selector'     => ".fl-node-$id .uabb-module-content.uabb-heading-wrapper .uabb-background-heading-wrap::before",
				'prop'         => 'top',
				'unit'         => 'px',
			)
		);
	}
	if ( isset( $settings->head_horizental_position ) ) {
		FLBuilderCSS::responsive_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'head_horizental_position',
				'selector'     => ".fl-node-$id .uabb-module-content.uabb-heading-wrapper .uabb-background-heading-wrap::before",
				'prop'         => 'left',
				'unit'         => 'px',
			)
		);
	}
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'seprator_padding',
			'selector'     => ".fl-node-$id .uabb-divider-content",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'seprator_padding_top',
				'padding-right'  => 'seprator_padding_right',
				'padding-bottom' => 'seprator_padding_bottom',
				'padding-left'   => 'seprator_padding_left',
			),
		)
	);
}
if ( 'none' !== $settings->separator_style ) {

	$position = '0';

	if ( 'center' === $settings->alignment ) {
		$position = '50';
	} elseif ( 'right' === $settings->alignment ) {
		$position = '100';
	}

	$line_color = uabb_theme_base_color( $settings->separator_line_color );

	if ( $version_bb_check ) {
		$separator_array = array(
			/* General Section */
			'separator'                 => $settings->separator_style,
			'style'                     => $settings->separator_line_style,
			'color'                     => $line_color,
			'height'                    => $settings->separator_line_height,
			'width'                     => ( '' !== $settings->separator_line_width ) ? $settings->separator_line_width : '30',
			'alignment'                 => $settings->alignment,
			'icon_photo_position'       => $position,
			'icon_spacing'              => '5',

			/* Icon Basics */
			'icon'                      => $settings->icon,
			'icon_size'                 => $settings->icon_size,
			'icon_align'                => $settings->alignment,
			'icon_color'                => $settings->separator_icon_color,


			/* Image Style */
			'responsive_img_size'       => $settings->responsive_img_size,

			/* Image Basics */
			'img_size'                  => $settings->img_size,
			'text_color'                => $settings->separator_text_color,
			/* Text */
			'text_inline'               => $settings->text_inline,
			'text_tag_selection'        => $settings->separator_text_tag_selection,
			'text_font_size'            => isset( $settings->separator_text_font_size ) ? $settings->separator_text_font_size : '',
			'text_line_height'          => isset( $settings->separator_text_line_height ) ? $settings->separator_text_line_height : '',
			'text_font_typo'            => ( isset( $settings->separator_font_typo ) ) ? $settings->separator_font_typo : '',
			'text_font_typo_mediun'     => ( isset( $settings->separator_font_typo_medium ) ) ? $settings->separator_font_typo_medium : '',
			'text_font_typo_responsive' => ( isset( $settings->separator_font_typo_responsive ) ) ? $settings->separator_font_typo_responsive : '',


		);
	} else {
		$separator_array = array(
			/* General Section */
			'separator'                        => $settings->separator_style,
			'style'                            => $settings->separator_line_style,
			'color'                            => $line_color,
			'height'                           => $settings->separator_line_height,
			'width'                            => ( '' !== $settings->separator_line_width ) ? $settings->separator_line_width : '30',
			'alignment'                        => $settings->alignment,
			'icon_photo_position'              => $position,
			'icon_spacing'                     => '5',

			/* Icon Basics */
			'icon'                             => $settings->icon,
			'icon_size'                        => $settings->icon_size,
			'icon_align'                       => $settings->alignment,
			'icon_color'                       => $settings->separator_icon_color,


			/* Image Style */
			'responsive_img_size'              => $settings->responsive_img_size,

			/* Image Basics */
			'img_size'                         => $settings->img_size,

			/* Text */
			'text_inline'                      => $settings->text_inline,
			'text_tag_selection'               => $settings->separator_text_tag_selection,
			'text_font_family'                 => $settings->separator_text_font_family,
			'text_font_size'                   => ( isset( $settings->separator_text_font_size ) ) ? $settings->separator_text_font_size : '',
			'text_line_height'                 => ( isset( $settings->separator_text_line_height ) ) ? $settings->separator_text_line_height : '',
			'text_font_size_unit'              => $settings->separator_text_font_size_unit,
			'text_line_height_unit'            => $settings->separator_text_line_height_unit,
			'text_font_size_unit_medium'       => $settings->separator_text_font_size_unit_medium,
			'text_line_height_unit_medium'     => $settings->separator_text_line_height_unit_medium,
			'text_font_size_unit_responsive'   => $settings->separator_text_font_size_unit_responsive,
			'text_line_height_unit_responsive' => $settings->separator_text_line_height_unit_responsive,
			'text_color'                       => $settings->separator_text_color,
			'text_transform'                   => $settings->separator_transform,
			'text_letter_spacing'              => $settings->separator_letter_spacing,

		);
	}

		/* CSS Render Function */
		FLBuilder::render_module_css( 'advanced-separator', $id, $separator_array );
}
?>
<?php
if ( apply_filters( 'uabb_heading_remove_description_default_space', true ) ) {
	?>
	.uabb-heading-wrapper .uabb-subheading * {
		margin: 0;
	}
	<?php
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading .uabb-heading-text {
	<?php
	if ( isset( $settings->heading_padding_top ) ) {
		echo ( '' !== $settings->heading_padding_top ) ? 'padding-top:' . esc_attr( $settings->heading_padding_top ) . 'px;' : '';
	}
	if ( isset( $settings->heading_padding_right ) ) {
		echo ( '' !== $settings->heading_padding_right ) ? 'padding-right:' . esc_attr( $settings->heading_padding_right ) . 'px;' : '';
	}
	if ( isset( $settings->heading_padding_bottom ) ) {
		echo ( '' !== $settings->heading_padding_bottom ) ? 'padding-bottom:' . esc_attr( $settings->heading_padding_bottom ) . 'px;' : '';
	}
	if ( isset( $settings->heading_padding_left ) ) {
		echo ( '' !== $settings->heading_padding_left ) ? 'padding-left:' . esc_attr( $settings->heading_padding_left ) . 'px;' : '';
	}
	?>
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading .uabb-heading-text {

<?php if ( 'color' === $settings->heading_bg_type ) { ?>
	<?php echo ( '' !== $settings->bg_color ) ? 'background:' . esc_attr( $settings->bg_color ) : ''; ?>
<?php } elseif ( 'image' === $settings->heading_bg_type && isset( FLBuilderPhoto::get_attachment_data( $settings->heading_bg_img )->url ) ) { ?>
	background-image: url(<?php echo esc_attr( FLBuilderPhoto::get_attachment_data( $settings->heading_bg_img )->url ); ?>);
	background-position: <?php echo esc_attr( $settings->heading_bg_img_pos ); ?>;
	background-size: <?php echo esc_attr( $settings->heading_bg_img_size ); ?>;
	background-repeat: <?php echo esc_attr( $settings->heading_bg_img_repeat ); ?>;
	background-attachment: <?php echo esc_attr( $settings->bg_attachment ); ?>;
	-webkit-background-clip: text;
	background-clip: text;
	-webkit-text-fill-color: transparent;
	<?php
} elseif ( $version_bb_check ) {
	if ( 'gradient' === $settings->heading_bg_type ) {
		?>
	background:<?php echo esc_attr( FLBuilderColor::gradient( $settings->heading_gradient ) ); ?>;
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
		<?php
	}
}

?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-heading {
	margin-top: <?php echo esc_attr( $settings->heading_margin_top ); ?>px;
	margin-bottom: <?php echo esc_attr( $settings->heading_margin_bottom ); ?>px;
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-subheading {
	margin-top: <?php echo esc_attr( $settings->desc_margin_top ); ?>px;
	margin-bottom: <?php echo esc_attr( $settings->desc_margin_bottom ); ?>px;
}

/* Heading Color */
.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content.fl-node-content .uabb-heading,
.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content.fl-node-content .uabb-heading .uabb-heading-text,
.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content.fl-node-content .uabb-heading * {

	<?php if ( ! empty( $settings->color ) ) : ?>
		color: <?php echo esc_attr( $settings->color ); ?>;
	<?php endif; ?>
}
<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading,
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-heading {

		<?php if ( ! empty( $settings->font ) && 'Default' !== $settings->font['family'] ) : ?>
			<?php UABB_Helper::uabb_font_css( $settings->font ); ?>
		<?php endif; ?>

		<?php
		if ( 'yes' === $converted || isset( $settings->font_size_unit ) && '' !== $settings->font_size_unit ) {
			?>
			font-size: <?php echo esc_attr( $settings->font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->font_size_unit ) && '' === $settings->font_size_unit && isset( $settings->new_font_size['desktop'] ) && '' !== $settings->new_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->new_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->new_font_size['desktop'] ) && '' === $settings->new_font_size['desktop'] && isset( $settings->line_height['desktop'] ) && '' !== $settings->line_height['desktop'] && '' === $settings->line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->line_height_unit ) && '' !== $settings->line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->line_height_unit ) && '' === $settings->line_height_unit && isset( $settings->line_height['desktop'] ) && '' !== $settings->line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->letter_spacing ); ?>px;
		<?php endif; ?>
	}
	<?php
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'font_typo',
				'selector'     => ".fl-node-$id .uabb-heading,.fl-node-$id .uabb-heading-wrapper .uabb-heading .uabb-heading-text",
			)
		);
	}
}
?>

/* Heading's Description Color */
<?php if ( isset( $settings->desc_color ) && '' !== $settings->desc_color ) : ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content.fl-node-content .uabb-module-content .uabb-text-editor {
		color: <?php echo esc_attr( uabb_theme_text_color( $settings->desc_color ) ); ?>;
	}
<?php endif; ?>

/* Heading's Description Typography */
<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-text-editor {

		<?php if ( ! empty( $settings->desc_font_family ) && 'Default' !== $settings->desc_font_family['family'] ) : ?>
			<?php UABB_Helper::uabb_font_css( $settings->desc_font_family ); ?>
		<?php endif; ?>

		<?php if ( 'yes' === $converted || isset( $settings->desc_font_size_unit ) && '' !== $settings->desc_font_size_unit ) { ?>
			font-size: <?php echo esc_attr( $settings->desc_font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->desc_font_size_unit ) && '' === $settings->desc_font_size_unit && isset( $settings->desc_font_size['desktop'] ) && '' !== $settings->desc_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->desc_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->desc_font_size['desktop'] ) && '' === $settings->desc_font_size['desktop'] && isset( $settings->desc_line_height['desktop'] ) && '' !== $settings->desc_line_height['desktop'] && '' === $settings->desc_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->desc_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->desc_line_height_unit ) && '' !== $settings->desc_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->desc_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->desc_line_height_unit ) && '' === $settings->desc_line_height_unit && isset( $settings->desc_line_height['desktop'] ) && '' !== $settings->desc_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->desc_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->desc_transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->desc_transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->desc_letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->desc_letter_spacing ); ?>px;
		<?php endif; ?>
	}
	<?php
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'desc_font_typo',
				'selector'     => ".fl-node-$id .uabb-text-editor, .fl-node-$id .uabb-text-editor p",
			)
		);
	}
}
?>
/* Background text styling */
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-module-content.uabb-heading-wrapper .uabb-background-heading-wrap::before {
	color: <?php echo esc_attr( $settings->bg_text_color ); ?>;
	<?php
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'bg_text_typo',
				'selector'     => ".fl-node-$id .uabb-module-content.uabb-heading-wrapper .uabb-background-heading-wrap::before",
			)
		);
	}
	?>

}
<?php /* Global Setting If started */ ?>
<?php if ( $global_settings->responsive_enabled ) { ?>

		<?php /* Medium Breakpoint media query */ ?>
		@media ( max-width: <?php echo esc_attr( $global_settings->medium_breakpoint ) . 'px'; ?> ) {

			/* For Medium Device */
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-medsmall .uabb-side-left,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-medsmall .uabb-side-right {
				width: 20%;
			}

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-medsmall .uabb-divider-content <?php echo esc_attr( $settings->separator_text_tag_selection ); ?> {
				white-space: normal;
			}

			<?php if ( ! $version_bb_check ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading,
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading * {
					<?php if ( 'yes' === $converted || isset( $settings->font_size_unit_medium ) && '' !== $settings->font_size_unit_medium ) { ?>
						font-size: <?php echo esc_attr( $settings->font_size_unit_medium ); ?>px;
					<?php } elseif ( isset( $settings->font_size_unit_medium ) && '' === $settings->font_size_unit_medium && isset( $settings->new_font_size['medium'] ) && '' !== $settings->new_font_size['medium'] ) { ?>
						font-size: <?php echo esc_attr( $settings->new_font_size['medium'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->new_font_size['medium'] ) && '' === $settings->new_font_size['medium'] && isset( $settings->line_height['medium'] ) && '' !== $settings->line_height['medium'] && '' === $settings->line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height['medium'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->line_height_unit_medium ) && '' !== $settings->line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height_unit_medium ); ?>em;
					<?php } elseif ( isset( $settings->line_height_unit_medium ) && '' === $settings->line_height_unit_medium && isset( $settings->line_height['medium'] ) && '' !== $settings->line_height['medium'] ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height['medium'] ); ?>px;
					<?php } ?>

				}
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-text-editor {

					<?php if ( 'yes' === $converted || isset( $settings->desc_font_size_unit_medium ) && '' !== $settings->desc_font_size_unit_medium ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size_unit_medium ); ?>px;
					<?php } elseif ( isset( $settings->desc_font_size_unit_medium ) && '' === $settings->desc_font_size_unit_medium && isset( $settings->desc_font_size['medium'] ) && '' !== $settings->desc_font_size['medium'] ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size['medium'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->desc_font_size['medium'] ) && '' === $settings->desc_font_size['medium'] && isset( $settings->desc_line_height['medium'] ) && '' !== $settings->desc_line_height['medium'] && '' === $settings->desc_line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['medium'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->desc_line_height_unit_medium ) && '' !== $settings->desc_line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height_unit_medium ); ?>em;
					<?php } elseif ( isset( $settings->desc_line_height_unit_medium ) && '' === $settings->desc_line_height_unit_medium && isset( $settings->desc_line_height['medium'] ) && '' !== $settings->desc_line_height['medium'] ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['medium'] ); ?>px;
					<?php } ?>
				}
			<?php } ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading .uabb-heading-text {
				<?php
				if ( isset( $settings->heading_padding_top_medium ) ) {
					echo ( '' !== $settings->heading_padding_top_medium ) ? 'padding-top:' . esc_attr( $settings->heading_padding_top_medium ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_right_medium ) ) {
					echo ( '' !== $settings->heading_padding_right_medium ) ? 'padding-right:' . esc_attr( $settings->heading_padding_right_medium ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_bottom_medium ) ) {
					echo ( '' !== $settings->heading_padding_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->heading_padding_bottom_medium ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_left_medium ) ) {
					echo ( '' !== $settings->heading_padding_left_medium ) ? 'padding-left:' . esc_attr( $settings->heading_padding_left_medium ) . 'px;' : '';
				}
				?>
			}
			.uabb-background-heading-wrap::before {
				-webkit-transform: translateY(-50%);
				-ms-transform: translateY(-50%);
				transform: translateY(-50%);
			}
		}

		<?php /* Small Breakpoint media query */ ?>
		@media ( max-width: <?php echo esc_attr( $global_settings->responsive_breakpoint ) . 'px'; ?> ) {

			/* For Small Device */
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-mobile .uabb-side-left,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-mobile .uabb-side-right,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-medsmall .uabb-side-left,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-medsmall .uabb-side-right {
				width: 10%;
			}

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-responsive-mobile .uabb-divider-content <?php echo esc_attr( $settings->separator_text_tag_selection ); ?> {
				white-space: normal;
			}
			<?php if ( ! $version_bb_check ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading,
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading * {

					<?php if ( 'yes' === $converted || isset( $settings->font_size_unit_responsive ) && '' !== $settings->font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->font_size_unit_responsive ) && '' === $settings->font_size_unit_responsive && isset( $settings->new_font_size['small'] ) && '' !== $settings->new_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->new_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->new_font_size['small'] ) && '' === $settings->new_font_size['small'] && isset( $settings->line_height['small'] ) && '' !== $settings->line_height['small'] && '' === $settings->line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height['small'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->line_height_unit_responsive ) && '' !== $settings->line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->line_height_unit_responsive ) && '' === $settings->line_height_unit_responsive && isset( $settings->line_height['small'] ) && '' !== $settings->line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->line_height['small'] ); ?>px;
					<?php } ?>
				}

				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-text-editor {

					<?php if ( 'yes' === $converted || isset( $settings->desc_font_size_unit_responsive ) && '' !== $settings->desc_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size_unit_responsive ); ?>px;
					<?php } elseif ( isset( $settings->desc_font_size_unit_responsive ) && '' === $settings->desc_font_size_unit_responsive && isset( $settings->desc_font_size['small'] ) && '' !== $settings->desc_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->desc_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->desc_font_size['small'] ) && '' === $settings->desc_font_size['small'] && isset( $settings->desc_line_height['small'] ) && '' !== $settings->desc_line_height['small'] && '' === $settings->desc_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['small'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->desc_line_height_unit_responsive ) && '' !== $settings->desc_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->desc_line_height_unit_responsive ) && '' === $settings->desc_line_height_unit_responsive && isset( $settings->desc_line_height['small'] ) && '' !== $settings->desc_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->desc_line_height['small'] ); ?>px;
					<?php } ?>
				}
			<?php } ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading .uabb-heading-text {
				<?php
				if ( isset( $settings->heading_padding_top_responsive ) ) {
					echo ( '' !== $settings->heading_padding_top_responsive ) ? 'padding-top:' . esc_attr( $settings->heading_padding_top_responsive ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_right_responsive ) ) {
					echo ( '' !== $settings->heading_padding_right_responsive ) ? 'padding-right:' . esc_attr( $settings->heading_padding_right_responsive ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_bottom_responsive ) ) {
					echo ( '' !== $settings->heading_padding_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->heading_padding_bottom_responsive ) . 'px;' : '';
				}
				if ( isset( $settings->heading_padding_left_responsive ) ) {
					echo ( '' !== $settings->heading_padding_left_responsive ) ? 'padding-left:' . esc_attr( $settings->heading_padding_left_responsive ) . 'px;' : '';
				}
				?>
			}

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-heading,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-subheading,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-subheading * {
				text-align: <?php echo esc_attr( $settings->r_custom_alignment ); ?>;
			}
			.uabb-background-heading-wrap::before {
				-webkit-transform: translateY(-50%);
				-ms-transform: translateY(-50%);
				transform: translateY(-50%);
			}

			<?php
			if ( ( $settings->r_custom_alignment !== $settings->alignment ) && 'none' !== $settings->separator_style ) :
				$r_position = '0';
				if ( 'center' === $settings->r_custom_alignment ) {
					$r_position = '50';
					?>

					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-separator-wrap.uabb-separator-<?php echo esc_attr( $settings->alignment ); ?> {
						margin-left: auto;
						margin-right: auto;
					}

					<?php
				} elseif ( 'right' === $settings->r_custom_alignment ) {
					$r_position = '100';
					?>

					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-separator-wrap.uabb-separator-<?php echo esc_attr( $settings->alignment ); ?> {
						margin-left: auto;
						margin-right: 0;
					}

				<?php } else { ?>

					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-separator-wrap.uabb-separator-<?php echo esc_attr( $settings->alignment ); ?> {
						margin-left: 0;
						margin-right: auto;
					}
				<?php } ?>

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-heading-wrapper .uabb-separator-parent {
				text-align: <?php echo esc_attr( $settings->r_custom_alignment ); ?>;
			}
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-side-left {
				width: <?php echo esc_attr( $r_position ); ?>%;
			}
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-side-right {
				width: <?php echo esc_attr( 100 - $r_position ); ?>%;
			}
			<?php endif; ?>
		}
	<?php
}
