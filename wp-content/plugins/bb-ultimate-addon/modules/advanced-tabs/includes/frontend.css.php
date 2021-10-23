<?php
/**
 *  UABB Advanced Tabs Module front-end CSS php file
 *
 *  @package UABB Advanced Tabs Module
 */

$version_bb_check = UABB_Compatibility::$version_bb_check;
$converted        = UABB_Compatibility::$uabb_migration;

$settings->title_color        = UABB_Helper::uabb_colorpicker( $settings, 'title_color' );
$settings->title_hover_color  = UABB_Helper::uabb_colorpicker( $settings, 'title_hover_color' );
$settings->title_active_color = UABB_Helper::uabb_colorpicker( $settings, 'title_active_color' );

$settings->description_color        = UABB_Helper::uabb_colorpicker( $settings, 'description_color' );
$settings->description_active_color = UABB_Helper::uabb_colorpicker( $settings, 'description_active_color' );

$settings->title_background_color        = UABB_Helper::uabb_colorpicker( $settings, 'title_background_color', true );
$settings->title_background_hover_color  = UABB_Helper::uabb_colorpicker( $settings, 'title_background_hover_color', true );
$settings->title_active_background_color = UABB_Helper::uabb_colorpicker( $settings, 'title_active_background_color', true );

$settings->underline_border_color = UABB_Helper::uabb_colorpicker( $settings, 'underline_border_color' );

$settings->icon_color        = UABB_Helper::uabb_colorpicker( $settings, 'icon_color' );
$settings->icon_hover_color  = UABB_Helper::uabb_colorpicker( $settings, 'icon_hover_color' );
$settings->icon_active_color = UABB_Helper::uabb_colorpicker( $settings, 'icon_active_color' );

$settings->content_color            = UABB_Helper::uabb_colorpicker( $settings, 'content_color' );
$settings->content_background_color = UABB_Helper::uabb_colorpicker( $settings, 'content_background_color', true );
$settings->tab_focus_color          = UABB_Helper::uabb_colorpicker( $settings, 'tab_focus_color', true );
$settings->hori_tab_spacing         = ( '' !== esc_attr( $settings->hori_tab_spacing ) ) ? esc_attr( $settings->hori_tab_spacing ) : '0';

if ( ! $version_bb_check ) {
	$settings->content_border_color  = UABB_Helper::uabb_colorpicker( $settings, 'content_border_color' );
	$settings->content_border_radius = ( '' !== $settings->content_border_radius ) ? $settings->content_border_radius : '0';
}
/* Fallback depricated underline Style */
if ( 'underline' === $settings->style ) {
	$settings->style         = 'topline';
	$settings->line_position = 'bottom';
}
?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-module-content.uabb-tabs.uabb-tabs-layout-horizontal li:not(:first-child) {
	margin-left: <?php echo esc_attr( $settings->hori_tab_spacing ); ?>px;
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-module-content.uabb-tabs.uabb-tabs-layout-horizontal li {
	margin-bottom: <?php echo esc_attr( $settings->verti_tab_spacing ); ?>px;
}
<?php
$settings->tab_spacing_size = ( '' !== $settings->tab_spacing_size ) ? $settings->tab_spacing_size : '10';
?>
	<?php
	if ( 'iconfall' !== $settings->style && 'linebox' !== $settings->style ) {
		if ( 'inline' === $settings->tab_style ) {
			?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul {
			<?php if ( ! $version_bb_check ) { ?>
				<?php echo ( 'left' !== $settings->tab_style_alignment ) ? ( ( 'center' !== $settings->tab_style_alignment ) ? 'justify-content: flex-end;' : 'justify-content: center;' ) : 'justify-content: flex-start;'; ?>
		<?php } else { ?>
				<?php echo ( 'left' !== $settings->tab_style_align ) ? ( ( 'center' !== $settings->tab_style_align ) ? 'justify-content: flex-end;' : 'justify-content: center;' ) : 'justify-content: flex-start;'; ?>
		<?php } ?>
	}
			<?php
		} else {
			?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li {
		text-align: center;
		-webkit-flex: 1;
		-moz-flex: 1;
		-ms-flex: 1;
		flex: 1;
		-ms-flex-preferred-size: auto;
		flex-basis: auto;
	}
			<?php
		}
		?>

		<?php if ( 'simple' === $settings->style ) : ?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-title {
	background: #f7f7f7;
}
<?php endif; ?>

		<?php
	} else {
		?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li {
		text-align: center;
		-webkit-flex: 1;
		-moz-flex: 1;
		-ms-flex: 1;
		flex: 1;
		-ms-flex-preferred-size: auto;
		flex-basis: auto;
	}
		<?php
	}
	?>


<?php
$equal_width = false;

if ( 'equal' === $settings->tab_style_width ) {

	if ( 'simple' === $settings->style || 'bar' === $settings->style || 'topline' === $settings->style || 'linebox' === $settings->style ) {
		if ( 'linebox' !== $settings->style && 'full' === $settings->tab_style ) {
			$equal_width = true;
		} elseif ( 'linebox' === $settings->style ) {
			$equal_width = true;
		}
	} elseif ( 'iconfall' === $settings->style ) {
		$equal_width = true;
	}
}

if ( true === $equal_width ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li {
		flex-basis: 1px;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li .uabb-tab-link {
		white-space: normal;
		height: 100%;
	}

	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li .uabb-tag-selected {
		height: 100%;
	}

	<?php if ( 'yes' === $settings->show_icon && ( 'left' === $settings->icon_position || 'right' === $settings->icon_position ) ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li .uabb-tab-title {
			display: initial;
		}
	<?php } ?>


	<?php
}
?>

<?php if ( 'right' === $settings->icon_position ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title .uabb-tabs-icon {
		margin-left: 0.4em ;
		display: inline-block;
	}

	<?php
} elseif ( 'top' === $settings->icon_position ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title .uabb-tabs-icon {
		margin-right: 0.4em;
		display: inline-block;
	}

	<?php
} elseif ( 'left' === $settings->icon_position ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title .uabb-tabs-icon {
		margin-right: 0.4em;
		display: inline-block;
	}
<?php } ?>
<?php
if ( 'iconfall' !== $settings->style ) {
	if ( 'right' === $settings->icon_position ) {
		?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a {
		direction: rtl;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a .uabb-tab-title{
		direction: ltr;
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li .uabb-tabs-icon {
		margin-left: 0.4em ;
		display: inline-block;
	}

		<?php
	} elseif ( 'top' === $settings->icon_position ) {
		?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li .uabb-tabs-icon {
		display: block;
		margin-bottom: 0.4em;
	}

		<?php
	} elseif ( 'left' === $settings->icon_position ) {
		?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li .uabb-tabs-icon {
		margin-right: 0.4em;
		display: inline-block;
	}
		<?php
	}
}
?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-link:focus {
	border-color:<?php echo esc_attr( $settings->tab_focus_color ); ?>;
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-title,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-acc-icon {
	color: <?php echo esc_attr( uabb_theme_text_color( $settings->title_color ) ); ?>;
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-title-tag {
	color: <?php echo esc_attr( uabb_theme_text_color( $settings->title_color ) ); ?>;
}
<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a,
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-title-tag {

		<?php
		if ( 'Default' !== $settings->title_font_family['family'] ) {
			UABB_Helper::uabb_font_css( $settings->title_font_family );
		}
		?>

		<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit ) && '' !== $settings->title_font_size_unit ) { ?>
			font-size: <?php echo esc_attr( $settings->title_font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->title_font_size_unit ) && '' === $settings->title_font_size_unit && isset( $settings->title_font_size['desktop'] ) && '' !== $settings->title_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->title_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->title_font_size['desktop'] ) && '' === $settings->title_font_size['desktop'] && isset( $settings->title_line_height['desktop'] ) && '' !== $settings->title_line_height['desktop'] && '' === $settings->title_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit ) && '' !== $settings->title_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->title_line_height_unit ) && '' === $settings->title_line_height_unit && isset( $settings->title_line_height['desktop'] ) && '' !== $settings->title_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->title_transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->title_transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->title_letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->title_letter_spacing ); ?>px;
		<?php endif; ?>
	}
	<?php
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'title_font_typo',
				'selector'     => ".fl-node-$id .uabb-tabs .uabb-tabs-nav$id li a,.fl-node-$id .uabb-tab-acc-title .uabb-title-tag,.fl-node-$id .uabb-tabs .uabb-tabs-nav$id .uabb-tab-title",
			)
		);
	}
}
?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> .uabb-tab-description {
	<?php if ( isset( $settings->description_color ) && ! empty( $settings->description_color ) ) { ?>
	color: <?php echo esc_attr( $settings->description_color ); ?>;
	<?php } ?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> .uabb-tab-current .uabb-tab-description,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> .uabb-tab-current:hover .uabb-tab-description {
	<?php if ( isset( $settings->description_active_color ) && ! empty( $settings->description_active_color ) ) { ?>
	color: <?php echo esc_attr( $settings->description_active_color ); ?>;
	<?php } ?>
}
<?php
if ( class_exists( 'FLBuilderCSS' ) ) {
	FLBuilderCSS::typography_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'description_typography',
			'selector'     => ".fl-node-$id .uabb-tabs .uabb-tab-description",
		)
	);
}
?>
<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {

		<?php if ( isset( $settings->title_font_size['desktop'] ) && '' === $settings->title_font_size['desktop'] && isset( $settings->title_line_height['desktop'] ) && '' !== $settings->title_line_height['desktop'] && '' === $settings->title_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit ) && '' !== $settings->title_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->title_line_height_unit ) && '' === $settings->title_line_height_unit && isset( $settings->title_line_height['desktop'] ) && '' !== $settings->title_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->title_line_height['desktop'] ); ?>px;
		<?php } ?>

	}
<?php } else { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {
		<?php if ( isset( $settings->content_font_typo['line_height']['length'] ) ) { ?>

			line-height:<?php echo ( '' !== $settings->content_font_typo['line_height']['length'] ) ? esc_attr( $settings->content_font_typo['line_height']['length'] ) : ''; ?>em;

		<?php } ?>
	}
<?php } ?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a .uabb-tabs-icon i,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title .uabb-tabs-icon i {
	color: <?php echo esc_attr( uabb_theme_text_color( $settings->icon_color ) ); ?>;
	<?php echo ( '' !== $settings->icon_size ) ? 'font-size: ' . esc_attr( $settings->icon_size ) . 'px;' : ''; ?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-title {
	<?php
	if ( 'yes' === $converted || isset( $settings->tab_padding_dimension_top ) && isset( $settings->tab_padding_dimension_bottom ) && isset( $settings->tab_padding_dimension_left ) && isset( $settings->tab_padding_dimension_right ) ) {
		if ( isset( $settings->tab_padding_dimension_top ) ) {
			echo ( '' !== $settings->tab_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top ) . 'px;' : 'padding-top: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_bottom ) ) {
			echo ( '' !== $settings->tab_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_left ) ) {
			echo ( '' !== $settings->tab_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left ) . 'px;' : 'padding-left: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_right ) ) {
			echo ( '' !== $settings->tab_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right ) . 'px;' : 'padding-right: 15px;';
		}
	} elseif ( isset( $settings->tab_padding ) && '' !== $settings->tab_padding && isset( $settings->tab_padding_dimension_top ) && '' === $settings->tab_padding_dimension_top && isset( $settings->tab_padding_dimension_bottom ) && '' === $settings->tab_padding_dimension_bottom && isset( $settings->tab_padding_dimension_left ) && '' === $settings->tab_padding_dimension_left && isset( $settings->tab_padding_dimension_right ) && '' === $settings->tab_padding_dimension_right ) {
		echo esc_attr( $settings->tab_padding );
		?>
		;
	<?php } ?>
}

<?php
if ( 'iconfall' !== $settings->style ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a {

	<?php
	if ( 'yes' === $converted || isset( $settings->tab_padding_dimension_top ) && isset( $settings->tab_padding_dimension_bottom ) && isset( $settings->tab_padding_dimension_left ) && isset( $settings->tab_padding_dimension_right ) ) {
		if ( isset( $settings->tab_padding_dimension_top ) ) {
			echo ( '' !== $settings->tab_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top ) . 'px;' : 'padding-top: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_bottom ) ) {
			echo ( '' !== $settings->tab_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_left ) ) {
			echo ( '' !== $settings->tab_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left ) . 'px;' : 'padding-left: 15px;';
		}
		if ( isset( $settings->tab_padding_dimension_right ) ) {
			echo ( '' !== $settings->tab_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right ) . 'px;' : 'padding-right: 15px;';
		}
	} elseif ( isset( $settings->tab_padding ) && '' !== $settings->tab_padding && isset( $settings->tab_padding_dimension_top ) && ( '' === $settings->tab_padding_dimension_top || '0' === $settings->tab_padding_dimension_top ) && isset( $settings->tab_padding_dimension_bottom ) && ( '' === $settings->tab_padding_dimension_bottom || '0' === $settings->tab_padding_dimension_bottom ) && isset( $settings->tab_padding_dimension_left ) && ( '' === $settings->tab_padding_dimension_left || '0' === $settings->tab_padding_dimension_left ) && isset( $settings->tab_padding_dimension_right ) && ( '' === $settings->tab_padding_dimension_right || '0' === $settings->tab_padding_dimension_right ) ) {
		echo esc_attr( $settings->tab_padding );
		?>
		;
	<?php } ?>
}
	<?php
}

if ( '' !== $settings->title_background_color && 'iconfall' !== $settings->style && 'simple' !== $settings->style ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title {
	background-color: <?php echo esc_attr( $settings->title_background_color ); ?>;
}
	<?php
}

if ( '' !== $settings->title_hover_color ) {
	if ( 'linebox' !== $settings->style ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a:hover .uabb-tab-title,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tab-acc-title:hover .uabb-tab-title {
	color: <?php echo esc_attr( $settings->title_hover_color ); ?>;
	transition: all 150ms linear;
}
		<?php
	}
}

if ( '' !== $settings->title_background_hover_color ) {
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-bar nav ul li a:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-bar .uabb-tab-acc-title:hover {
	<?php
	echo ( '' !== $settings->title_background_hover_color ) ? 'background-color:' . esc_attr( $settings->title_background_hover_color ) . ';' : '';
	?>
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-simple nav ul li a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-iconfall nav ul li a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-iconfall .uabb-tab-acc-title,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-simple .uabb-tab-acc-title {
	background: none!important;
}
	<?php
}
if ( '' !== $settings->icon_hover_color ) {
	if ( 'iconfall' !== $settings->style && 'linebox' !== $settings->style ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a:hover .uabb-tabs-icon i,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title:hover .uabb-tabs-icon i {
		<?php echo ( '' !== $settings->icon_hover_color ) ? 'color:' . esc_attr( $settings->icon_hover_color ) . ';' : ''; ?>
}
		<?php
	}
}

if ( '' !== $settings->title_active_color ) {
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> .uabb-tab-current a .uabb-tab-title,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> .uabb-tab-current a:hover .uabb-tab-title {
	color: <?php echo esc_attr( $settings->title_active_color ); ?>;
}

	<?php
}

if ( '' !== $settings->icon_active_color ) {
	if ( 'iconfall' !== $settings->style ) {
		?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a .uabb-tabs-icon i,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a .uabb-tabs-icon i:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a:hover .uabb-tabs-icon i:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title .uabb-tabs-icon i,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title .uabb-tabs-icon i:hover,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title:hover .uabb-tabs-icon i:hover {
			color : <?php echo esc_attr( $settings->icon_active_color ); ?>;
		}
		<?php
	}
}
?>
<?php
if ( $version_bb_check ) {
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'content_border_param',
			'selector'     => ".fl-node-$id .uabb-content-wrap$id > .section > .uabb-content,.fl-node-$id .uabb-content-wrap$id > .section > .uabb-tab-acc-content",
		)
	);
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-content,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {
	<?php echo 'text-align: ' . esc_attr( $settings->content_alignment ) . ';'; ?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-content,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {

	<?php
	if ( 'yes' === $converted || isset( $settings->content_padding_dimension_top ) && isset( $settings->content_padding_dimension_bottom ) && isset( $settings->content_padding_dimension_left ) && isset( $settings->content_padding_dimension_right ) ) {
		if ( isset( $settings->content_padding_dimension_top ) ) {
			echo ( '' !== $settings->content_padding_dimension_top ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top ) . 'px;' : 'padding-top: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_bottom ) ) {
			echo ( '' !== $settings->content_padding_dimension_bottom ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom ) . 'px;' : 'padding-bottom: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_left ) ) {
			echo ( '' !== $settings->content_padding_dimension_left ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left ) . 'px;' : 'padding-left: 25px;';
		}
		if ( isset( $settings->content_padding_dimension_right ) ) {
			echo ( '' !== $settings->content_padding_dimension_right ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right ) . 'px;' : 'padding-right: 25px;';
		}
	} elseif ( isset( $settings->content_padding ) && '' !== $settings->content_padding && isset( $settings->content_padding_dimension_top ) && '' === $settings->content_padding_dimension_top && isset( $settings->content_padding_dimension_bottom ) && '' === $settings->content_padding_dimension_bottom && isset( $settings->content_padding_dimension_left ) && '' === $settings->content_padding_dimension_left && isset( $settings->content_padding_dimension_right ) && '' === $settings->content_padding_dimension_right ) {
		echo esc_attr( $settings->content_padding );
		?>
		;
	<?php } ?>

<?php
if ( ! $version_bb_check ) {
	$content_border_size = ( '' !== $settings->content_border_size ) ? $settings->content_border_size : 1;
	echo ( 'none' !== $settings->content_border_style ) ? 'border: ' . esc_attr( $content_border_size ) . 'px ' . esc_attr( $settings->content_border_style ) . ' ' . esc_attr( $settings->content_border_color ) . ';' : '';
	if ( 'none' === $settings->content_border_style && '' !== $settings->content_border_radius ) {
		echo 'border-radius: ' . esc_attr( $settings->content_border_radius ) . 'px;';
	}
}
?>
}

<?php
if ( 'bar' === $settings->style ) {
	if ( 'yes' === $settings->tab_spacing && '' !== $settings->tab_spacing_size ) {
		if ( 'horizontal' === $settings->tab_layout ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li {
			margin: 0 <?php echo esc_attr( $settings->tab_spacing_size / 2 ); ?>px;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul {
			margin: 0 -<?php echo esc_attr( $settings->tab_spacing_size / 2 ); ?>px;
		}
			<?php
		}
	}
}
if ( 'yes' === $settings->tab_spacing && '' !== $settings->tab_spacing_size ) {
	if ( 'vertical' === $settings->tab_layout ) {
		?>
			.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content .uabb-tabs.uabb-tabs-layout-vertical .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul li {
				margin: 0px 0px <?php echo esc_attr( $settings->tab_spacing_size / 2 ); ?>px 0px;
			}
			.fl-node-<?php echo esc_attr( $id ); ?> .fl-module-content .uabb-tabs.uabb-tabs-layout-vertical .uabb-tabs-nav<?php echo esc_attr( $id ); ?> ul {
				margin: 0px 0px -<?php echo esc_attr( $settings->tab_spacing_size / 2 ); ?>px 0px;
			}
			<?php
	}
}
?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-text-editor{
	color: <?php echo esc_attr( uabb_theme_text_color( $settings->content_color ) ); ?>;
}
<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-text-editor {
		<?php
		if ( 'Default' !== $settings->content_font_family['family'] ) {
			UABB_Helper::uabb_font_css( $settings->content_font_family );
		}
		?>

		<?php if ( 'yes' === $converted || isset( $settings->content_font_size_unit ) && '' !== $settings->content_font_size_unit ) { ?>
			font-size: <?php echo esc_attr( $settings->content_font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->content_font_size_unit ) && '' === $settings->content_font_size_unit && isset( $settings->content_font_size['desktop'] ) && '' !== $settings->content_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->content_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->content_font_size['desktop'] ) && '' === $settings->content_font_size['desktop'] && isset( $settings->content_line_height['desktop'] ) && '' !== $settings->content_line_height['desktop'] && '' === $settings->content_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->content_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->content_line_height_unit ) && '' !== $settings->content_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->content_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->content_line_height_unit ) && '' === $settings->content_line_height_unit && isset( $settings->content_line_height['desktop'] ) && '' !== $settings->content_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->content_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->content_transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->content_transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->content_letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->content_letter_spacing ); ?>px;
		<?php endif; ?>

	}
	<?php
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'content_font_typo',
				'selector'     => ".fl-node-$id .uabb-content-wrap$id > .section > .uabb-text-editor",
			)
		);
	}
}
?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> {
	background-color: <?php echo esc_attr( $settings->content_background_color ); ?>;
}
<?php if ( ! $version_bb_check ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> {
			<?php echo ( '' !== $settings->content_border_radius && 'none' === $settings->content_border_style ) ? 'border-radius: ' . esc_attr( $settings->content_border_radius ) . 'px;' : ''; ?>
		}
<?php } else { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> {

			<?php
			if ( isset( $settings->content_border_param['style'] ) && isset( $settings->content_border_param['radius'] ) && isset( $settings->content_border_param['radius']['top_left'] ) && isset( $settings->content_border_param['radius']['top_right'] ) && isset( $settings->content_border_param['radius']['bottom_left'] ) && isset( $settings->content_border_param['radius']['bottom_right'] ) ) {


				if ( 'none' === $settings->content_border_param['style'] && '' !== $settings->content_border_param['radius']['top_left'] && '' !== $settings->content_border_param['radius']['top_right'] && '' !== $settings->content_border_param['radius']['bottom_left'] && '' !== $settings->content_border_param['radius']['bottom_right'] ) {

					echo 'border-top-left-radius:' . esc_attr( $settings->content_border_param['radius']['top_left'] ) . 'px;';
					echo 'border-top-right-radius:' . esc_attr( $settings->content_border_param['radius']['top_right'] ) . 'px;';
					echo 'border-bottom-right-radius:' . esc_attr( $settings->content_border_param['radius']['bottom_right'] ) . 'px;';
					echo 'border-bottom-left-radius:' . esc_attr( $settings->content_border_param['radius']['bottom_left'] ) . 'px;';
				}
			}
			?>
		}

<?php } ?>

/* Style Dependent CSS Start */
/* _____________________________________________________________________ */

/* Top Line Style */
/* _____________________________________________________________________ */

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a {
	background: none;
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title {
	<?php
	$border_size = ( '' !== $settings->underline_border_size ) ? $settings->underline_border_size : 6;
	$border_size = ( 'bottom' === $settings->line_position ) ? ( $border_size * -1 ) : $border_size;
	?>
	<?php
	$color_default = ( '' !== uabb_theme_base_color( $settings->underline_border_color ) ) ? uabb_theme_base_color( $settings->underline_border_color ) : '#a7a7a7';
	?>
	box-shadow: inset 0 <?php echo esc_attr( $border_size ); ?>px 0 <?php echo esc_attr( $color_default ); ?>;
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current {
	border-top-color: <?php echo esc_attr( uabb_theme_base_color( $color_default ) ); ?>;
}
<?php
if ( '' !== $settings->title_hover_color ) {
	if ( 'linebox' !== $settings->style ) {
		?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-tabs-nav<?php echo esc_attr( $id ); ?> a:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-topline .uabb-tabs-nav<?php echo esc_attr( $id ); ?> a:hover * {
	color: <?php echo esc_attr( $settings->title_hover_color ); ?>;
}
		<?php
	}
}
?>

/* _____________________________________________________________________ */

/* Top Style Bar */
/* _____________________________________________________________________ */

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-bar ul li.uabb-tab-current a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title .uabb-tab-title,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title .uabb-acc-icon {
	color: <?php echo esc_attr( $settings->title_active_color ); ?>;
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-bar > nav > ul li.uabb-tab-current a,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-module-content.uabb-tabs.uabb-tabs-layout-horizontal.uabb-tabs-style-topline li.uabb-tab-current,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-bar .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title {
	<?php
	$color_default = ( '' !== uabb_theme_base_color( $settings->title_active_background_color ) ) ? uabb_theme_base_color( $settings->title_active_background_color ) : '#a7a7a7';
	?>
	background-color: <?php echo esc_attr( uabb_theme_base_color( $color_default ) ); ?>;
}

/* _____________________________________________________________________ */

/* Icon Fall */
/* _____________________________________________________________________ */

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-iconfall .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li::before {
	<?php
	$color_default = ( '' !== uabb_theme_base_color( $settings->underline_border_color ) ) ? uabb_theme_base_color( $settings->underline_border_color ) : '#a7a7a7';
	?>
	background: <?php echo esc_attr( $color_default ); ?>;
	height: <?php echo ( '' !== $settings->underline_border_size ) ? esc_attr( $settings->underline_border_size ) : 6; ?>px;
}


/* _____________________________________________________________________ */

/* Line Box */
/* _____________________________________________________________________ */

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-linebox .uabb-tabs-nav<?php echo esc_attr( $id ); ?> a::after,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-linebox .uabb-tabs-nav<?php echo esc_attr( $id ); ?> a:hover::after,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-linebox .uabb-tabs-nav<?php echo esc_attr( $id ); ?> a:focus::after,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-linebox .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li.uabb-tab-current a::after,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-style-linebox .uabb-content-wrap<?php echo esc_attr( $id ); ?> .uabb-content-current > .uabb-tab-acc-title {
	<?php
	$color_default = ( '' !== uabb_theme_base_color( $settings->title_active_background_color ) ) ? uabb_theme_base_color( $settings->title_active_background_color ) : '#a7a7a7';
	?>
	background: <?php echo esc_attr( $color_default ); ?>;
}


/* _____________________________________________________________________ */

/* Style Dependent CSS End */
/* _____________________________________________________________________ */

<?php
if ( $global_settings->responsive_enabled ) { // Global Setting If started.
	?>
	@media ( max-width: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>px ) {

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-content,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {

			<?php
			if ( isset( $settings->content_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->content_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-title {
			<?php
			if ( isset( $settings->tab_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}
		<?php
		if ( 'iconfall' !== $settings->style ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a {
			<?php
			if ( isset( $settings->tab_padding_dimension_top_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_top_medium ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_bottom_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_bottom_medium ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_left_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_left_medium ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left_medium ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_right_medium ) ) {
				echo ( '' !== $settings->tab_padding_dimension_right_medium ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right_medium ) . 'px;' : '';
			}
			?>
		}
			<?php
		}
		?>
		<?php if ( ! $version_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-text-editor {

				<?php if ( 'yes' === $converted || isset( $settings->content_font_size_unit_medium ) && '' !== $settings->content_font_size_unit_medium ) { ?>
					font-size: <?php echo esc_attr( $settings->content_font_size_unit_medium ); ?>px;
				<?php } elseif ( isset( $settings->content_font_size_unit_medium ) && '' === $settings->content_font_size_unit_medium && isset( $settings->content_font_size['medium'] ) && '' !== $settings->content_font_size['medium'] ) { ?>
					font-size: <?php echo esc_attr( $settings->content_font_size['medium'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->content_font_size['medium'] ) && '' === $settings->content_font_size['medium'] && isset( $settings->content_line_height['medium'] ) && '' !== $settings->content_line_height['medium'] && '' === $settings->content_line_height_unit_medium && '' === $settings->content_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->content_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->content_line_height_unit_medium ) && '' !== $settings->content_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->content_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->content_line_height_unit_medium ) && '' === $settings->content_line_height_unit_medium && isset( $settings->content_line_height['medium'] ) && '' !== $settings->content_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->content_line_height['medium'] ); ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( ! $version_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-title-tag {

				<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_medium ) && '' !== $settings->title_font_size_unit_medium ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size_unit_medium ); ?>px;
				<?php } elseif ( isset( $settings->title_font_size_unit_medium ) && '' === $settings->title_font_size_unit_medium && isset( $settings->title_font_size['medium'] ) && '' !== $settings->title_font_size['medium'] ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size['medium'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->title_font_size['medium'] ) && '' === $settings->title_font_size['medium'] && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_medium ) && '' !== $settings->title_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_medium ) && '' === $settings->title_line_height_unit_medium && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>

			}
		<?php } ?>
		<?php if ( ! $version_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {

				<?php if ( isset( $settings->title_font_size['medium'] ) && '' === $settings->title_font_size['medium'] && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_medium ) && '' !== $settings->title_line_height_unit_medium ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_medium ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_medium ) && '' === $settings->title_line_height_unit_medium && isset( $settings->title_line_height['medium'] ) && '' !== $settings->title_line_height['medium'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['medium'] ); ?>px;
				<?php } ?>

			}
		<?php } else { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {
				<?php if ( isset( $settings->content_font_typo_medium['line_height']['length'] ) ) { ?>
					line-height:<?php echo esc_attr( $settings->content_font_typo_medium['line_height']['length'] ); ?>em;
			<?php } ?>
			}
		<?php } ?>
	}

	@media ( max-width: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>px ) {

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-content,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {

			min-height: fit-content !important;
			<?php
			if ( isset( $settings->content_padding_dimension_top_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->content_padding_dimension_top_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_bottom_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->content_padding_dimension_bottom_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_left_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->content_padding_dimension_left_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->content_padding_dimension_right_responsive ) ) {
				echo ( '' !== $settings->content_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->content_padding_dimension_right_responsive ) . 'px;' : '';
			}
			?>
		}

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-title {
			<?php
			if ( isset( $settings->tab_padding_dimension_top_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_bottom_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_left_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_right_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right_responsive ) . 'px;' : '';
			}
			?>
		}

		<?php
		if ( 'iconfall' !== $settings->style ) {
			?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a {
			<?php
			if ( isset( $settings->tab_padding_dimension_top_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_top_responsive ) ? 'padding-top:' . esc_attr( $settings->tab_padding_dimension_top_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_bottom_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_bottom_responsive ) ? 'padding-bottom:' . esc_attr( $settings->tab_padding_dimension_bottom_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_left_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_left_responsive ) ? 'padding-left:' . esc_attr( $settings->tab_padding_dimension_left_responsive ) . 'px;' : '';
			}
			if ( isset( $settings->tab_padding_dimension_right_responsive ) ) {
				echo ( '' !== $settings->tab_padding_dimension_right_responsive ) ? 'padding-right:' . esc_attr( $settings->tab_padding_dimension_right_responsive ) . 'px;' : '';
			}
			?>
		}
		<?php } ?>
		<?php if ( ! $version_bb_check ) { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-text-editor {

					<?php if ( 'yes' === $converted || isset( $settings->content_font_size_unit_responsive ) && '' !== $settings->content_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->content_font_size_unit_responsive ); ?>px;
					<?php } elseif ( $settings->content_font_size_unit_responsive && '' === $settings->content_font_size_unit_responsive && isset( $settings->content_font_size['small'] ) && '' !== $settings->content_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->content_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->content_font_size['small'] ) && '' === $settings->content_font_size['small'] && isset( $settings->content_line_height['small'] ) && '' !== $settings->content_line_height['small'] && '' === $settings->content_line_height_unit_responsive && '' === $settings->content_line_height_unit_medium && '' === $settings->content_line_height_unit ) { ?>
						line-height: <?php echo esc_attr( $settings->content_line_height['small'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->content_line_height_unit_responsive ) && '' !== $settings->content_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->content_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->content_line_height_unit_responsive ) && '' === $settings->content_line_height_unit_responsive && isset( $settings->content_line_height['small'] ) && '' !== $settings->content_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->content_line_height['small'] ); ?>px;
					<?php } ?>

			}

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs .uabb-tabs-nav<?php echo esc_attr( $id ); ?> li a,
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-title-tag {

				<?php if ( 'yes' === $converted || isset( $settings->title_font_size_unit_responsive ) && '' !== $settings->title_font_size_unit_responsive ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size_unit_responsive ); ?>px;
				<?php } elseif ( isset( $settings->title_font_size_unit_responsive ) && '' === $settings->title_font_size_unit_responsive && isset( $settings->title_font_size['small'] ) && '' !== $settings->title_font_size['small'] ) { ?>
					font-size: <?php echo esc_attr( $settings->title_font_size['small'] ); ?>px;
				<?php } ?>

				<?php if ( isset( $settings->title_font_size['small'] ) && '' === $settings->title_font_size['small'] && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] && '' === $settings->title_line_height_unit_responsive && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_responsive ) && '' !== $settings->title_line_height_unit_responsive ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_responsive ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_responsive ) && '' === $settings->title_line_height_unit_responsive && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php } ?>
			}

			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {

				<?php if ( isset( $settings->title_font_size['small'] ) && '' === $settings->title_font_size['small'] && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] && '' === $settings->title_line_height_unit_responsive && '' === $settings->title_line_height_unit_medium && '' === $settings->title_line_height_unit ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php } ?>

				<?php if ( 'yes' === $converted || isset( $settings->title_line_height_unit_responsive ) && '' !== $settings->title_line_height_unit_responsive ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height_unit_responsive ); ?>em;
				<?php } elseif ( isset( $settings->title_line_height_unit_responsive ) && '' === $settings->title_line_height_unit_responsive && isset( $settings->title_line_height['small'] ) && '' !== $settings->title_line_height['small'] ) { ?>
					line-height: <?php echo esc_attr( $settings->title_line_height['small'] ); ?>px;
				<?php } ?>
			}
		<?php } else { ?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tab-acc-title .uabb-acc-icon {
				<?php if ( isset( $settings->content_font_typo_responsive['line_height']['length'] ) ) { ?>
					line-height:<?php echo esc_attr( $settings->content_font_typo_responsive['line_height']['length'] ); ?>em;
				<?php } ?>
			}
		<?php } ?>

	}
	<?php
}
?>
<?php if ( 'accordion' === $settings->responsive ) : ?>
	<?php $responsive_breakpoint = ( '' !== $settings->responsive_breakpoint ) ? $settings->responsive_breakpoint : $global_settings->responsive_breakpoint; ?>
	@media ( max-width: <?php echo esc_attr( $responsive_breakpoint ); ?>px ) {
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-layout-vertical .uabb-content-wrap {
			width: 100%;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs-nav<?php echo esc_attr( $id ); ?> {
			display: none;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-title {
			display: block;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> {
			background: none;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {
			background-color: <?php echo esc_attr( $settings->content_background_color ); ?>;
		}
	}

	@media ( min-width: <?php echo esc_attr( $responsive_breakpoint + 1 ); ?>px ) {
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-content-wrap<?php echo esc_attr( $id ); ?> > .section > .uabb-tab-acc-content {
			display: block !important;
		}
	}
<?php endif; ?>

<?php
if ( isset( $settings->tab_layout ) && 'vertical' === $settings->tab_layout ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs > nav a span,.uabb-tabs > nav a .uabb-tab-title {
		display: inline; 
	}
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-tabs > nav a {
		white-space: normal;
	}
	<?php
	if ( 'simple' === $settings->style ) {
		if ( class_exists( 'FLBuilderCSS' ) && isset( $settings->tab_border ) ) {
			// Border - Settings.
			FLBuilderCSS::border_field_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'tab_border',
					'selector'     => ".fl-node-$id .uabb-tabs.uabb-tabs-layout-vertical .uabb-tabs-nav$id ul li.uabb-tab-current",
				)
			);
		}
	}
} ?>
