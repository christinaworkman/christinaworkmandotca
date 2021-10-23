<?php
/**
 *  UABB Advanced Timeline Module front-end CSS php file
 *
 *   @package UABB Advanced Timeline Module
 */

$settings->arrow_color            = UABB_Helper::uabb_colorpicker( $settings, 'arrow_color', true );
$settings->arrow_background_color = UABB_Helper::uabb_colorpicker( $settings, 'arrow_background_color', true );

// CSS for Global settings start.
	// Layout CSS.
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-day-right .uabb-events-inner-new, .fl-node-$id .uabb-timeline-main .uabb-day-left .uabb-events-inner-new",
			'enabled'  => ! empty( $settings->content_align ),
			'props'    => array(
				'text-align' => $settings->content_align,
			),
		)
	);

	// Spacing CSS.
	if ( isset( $settings->horizontal_spacing ) && '' !== $settings->horizontal_spacing ) {
		if ( 'center' === $settings->orientation ) {
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".fl-node-$id .uabb-timeline--center .uabb-timeline-marker-wrapper",
					'unit'         => 'px',
					'prop'         => 'margin-left',
				)
			);
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".fl-node-$id .uabb-timeline--center .uabb-timeline-marker-wrapper",
					'unit'         => 'px',
					'prop'         => 'margin-right',
				)
			);
		}
		if ( 'left' === $settings->orientation ) {
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".fl-node-$id .uabb-timeline--left .uabb-timeline-marker-wrapper",
					'prop'         => 'margin-right',
					'unit'         => 'px',
				)
			);
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".rtl .fl-node-$id .uabb-timeline--left .uabb-timeline-marker-wrapper",
					'prop'         => 'margin-left',
					'unit'         => 'px',
				)
			); ?>
			.rtl .fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--left .uabb-timeline-marker-wrapper {
				margin-right: auto;
			}
			<?php
		}
		if ( 'right' === $settings->orientation ) {
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".fl-node-$id .uabb-timeline--right .uabb-timeline-marker-wrapper",
					'prop'         => 'margin-left',
					'unit'         => 'px',
				)
			);
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'horizontal_spacing',
					'selector'     => ".rtl .fl-node-$id .uabb-timeline--right .uabb-timeline-marker-wrapper",
					'prop'         => 'margin-right',
					'unit'         => 'px',
				)
			);
			?>
			.rtl .fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--right .uabb-timeline-marker-wrapper {
				margin-left: auto;
			}
			<?php
		}
	}

	if ( isset( $settings->vertical_spacing ) ) {
		FLBuilderCSS::responsive_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'vertical_spacing',
				'selector'     => ".fl-node-$id .uabb-timeline-field:not(:last-child)",
				'prop'         => 'margin-bottom',
				'unit'         => 'px',
			)
		);
		?>

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-field:last-child {
			margin-bottom: 0px;
		}
		<?php
	}

	if ( isset( $settings->heading_bottom_spacing ) ) {
		FLBuilderCSS::responsive_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'heading_bottom_spacing',
				'selector'     => ".fl-node-$id .uabb-timeline-heading",
				'prop'         => 'margin-bottom',
				'unit'         => 'px',
			)
		);
	}

	if ( 'left' === $settings->orientation || 'right' === $settings->orientation ) {
		if ( isset( $settings->date_bottom_spacing ) ) {
			FLBuilderCSS::responsive_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'date_bottom_spacing',
					'selector'     => ".fl-node-$id .uabb-date-inner .inner-date-new p, .fl-node-$id .uabb-timeline-horizontal .uabb-timeline-card-date",
					'prop'         => 'margin-bottom',
					'unit'         => 'px',
				)
			);
		}
	}

	if ( 'hide' === $settings->show_card_label ) {
		?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-date-inner .inner-date-new,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-main .inner-date-new,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-horizontal .uabb-timeline-card-date {
			display: none;
		}
		<?php
	}

	// Timeline Items CSS.

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-content .uabb-timeline-heading",
			'enabled'  => ! empty( $settings->heading_color ),
			'props'    => array(
				'color' => $settings->heading_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .in-view .uabb-content .uabb-timeline-heading, .fl-node-$id .uabb-timeline-main .slick-current .uabb-content .uabb-timeline-heading",
			'enabled'  => ! empty( $settings->heading_focused_color ),
			'props'    => array(
				'color' => $settings->heading_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .animate-border:hover .uabb-content .uabb-timeline-heading",
			'enabled'  => ! empty( $settings->heading_hover_color ),
			'props'    => array(
				'color' => $settings->heading_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-main .inner-date-new,.fl-node-$id .uabb-timeline-main a .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->desc_color ),
			'props'    => array(
				'color' => $settings->desc_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .in-view .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-main .in-view .inner-date-new, .fl-node-$id .uabb-timeline-main .slick-current .uabb-timeline-desc-content, .fl-node-$id .slick-current .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->desc_focused_color ),
			'props'    => array(
				'color' => $settings->desc_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .animate-border:hover .uabb-timeline-desc-content, .fl-node-$id .uabb-days .animate-border:hover .inner-date-new, .fl-node-$id .slick-slide:hover .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->desc_hover_color ),
			'props'    => array(
				'color' => $settings->desc_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-events-inner-new",
			'enabled'  => ! empty( $settings->bg_color ),
			'props'    => array(
				'background-color' => $settings->bg_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline--center .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--right .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--right .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--left .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--left .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_color ),
			'props'    => array(
				'border-left-color' => $settings->bg_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".rtl .fl-node-$id .uabb-timeline--center .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--right .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--right .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--left .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--left .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_color ),
			'props'    => array(
				'border-right-color' => $settings->bg_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-horizontal .slick-active .uabb-timeline-arrow",
			'enabled'  => ! empty( $settings->bg_color ),
			'props'    => array(
				'border-bottom-color' => $settings->bg_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .in-view .uabb-events-inner-new, .fl-node-$id .uabb-timeline-main .slick-current .uabb-events-inner-new",
			'enabled'  => ! empty( $settings->bg_focused_color ),
			'props'    => array(
				'background-color' => $settings->bg_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--right .in-view .uabb-timeline-module .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--left .in-view .uabb-timeline-module .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_focused_color ),
			'props'    => array(
				'border-left-color' => $settings->bg_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--left .in-view .uabb-timeline-module .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--right .in-view .uabb-timeline-module .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline-vertical.uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .in-view .uabb-timeline-module .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_focused_color ),
			'props'    => array(
				'border-right-color' => $settings->bg_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-horizontal .slick-current.slick-active .uabb-timeline-arrow",
			'enabled'  => ! empty( $settings->bg_focused_color ),
			'props'    => array(
				'border-bottom-color' => $settings->bg_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-horizontal .slick-active:hover .uabb-timeline-arrow",
			'enabled'  => ! empty( $settings->bg_hover_color ),
			'props'    => array(
				'border-bottom-color' => $settings->bg_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .animate-border:hover .uabb-events-inner-new",
			'enabled'  => ! empty( $settings->bg_hover_color ),
			'props'    => array(
				'background-color' => $settings->bg_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline--center div.uabb-timeline-main .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--right div.uabb-timeline-main .animate-border:hover .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--left div.uabb-timeline-main .animate-border:hover .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet.uabb-timeline-res-right .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet.uabb-timeline-res-right .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile.uabb-timeline-res-right .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile.uabb-timeline-res-right .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_hover_color ),
			'props'    => array(
				'border-left-color' => $settings->bg_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline--center div.uabb-timeline-main .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--left div.uabb-timeline-main .animate-border:hover .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--right div.uabb-timeline-main .animate-border:hover .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet.uabb-timeline-res-right .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-tablet.uabb-timeline-res-right .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile.uabb-timeline-res-right .animate-border:hover .uabb-day-right .uabb-timeline-arrow:after,
		.rtl .fl-node-$id .uabb-timeline--center div.uabb-timeline-main.uabb-timeline-responsive-mobile.uabb-timeline-res-right .animate-border:hover .uabb-day-left .uabb-timeline-arrow:after",
			'enabled'  => ! empty( $settings->bg_hover_color ),
			'props'    => array(
				'border-right-color' => $settings->bg_hover_color,
			),
		)
	);

	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'item_border',
			'selector'     => ".fl-node-$id .uabb-day-right .uabb-events-inner-new, .fl-node-$id .uabb-day-left .uabb-events-inner-new",
		)
	);

	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'content_padding',
			'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-day-right .uabb-events-inner-new, .fl-node-$id .uabb-timeline-main .uabb-day-left .uabb-events-inner-new",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'content_padding_top',
				'padding-right'  => 'content_padding_right',
				'padding-bottom' => 'content_padding_bottom',
				'padding-left'   => 'content_padding_left',
			),
		)
	);

	if ( 'horizontal' === $settings->layout ) {
		FLBuilderCSS::dimension_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'item_padding',
				'selector'     => ".fl-node-$id .uabb-timeline-horizontal .uabb-timeline-field",
				'unit'         => 'px',
				'props'        => array(
					'padding-top'    => 'item_padding_top',
					'padding-right'  => 'item_padding_right',
					'padding-bottom' => 'item_padding_bottom',
					'padding-left'   => 'item_padding_left',
				),
			)
		);
	}

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .inner-date-new, .fl-node-$id .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->date_color ),
			'props'    => array(
				'color' => $settings->date_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-days .uabb-timeline-field.in-view .inner-date-new, .fl-node-$id .slick-current .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->date_focused_color ),
			'props'    => array(
				'color' => $settings->date_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .animate-border:hover .inner-date-new, .fl-node-$id .slick-active:hover .uabb-timeline-card-date",
			'enabled'  => ! empty( $settings->date_hover_color ),
			'props'    => array(
				'color' => $settings->date_hover_color,
			),
		)
	);

	if ( isset( $settings->connector_width ) && '' !== $settings->connector_width ) {
		?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline__line {
			width: <?php echo esc_attr( $settings->connector_width ); ?>px;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-connector:before {
			height: <?php echo esc_attr( $settings->connector_width ); ?>px;
		}
		<?php
	}

	FLBuilderCSS::responsive_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'icon_size',
			'selector'     => ".fl-node-$id .uabb-timeline-main .timeline-icon-new, .fl-node-$id .uabb-timeline-connector .uabb-timeline-marker i",
			'prop'         => 'font-size',
			'unit'         => 'px',
		)
	);

	if ( isset( $settings->icon_bg_size ) && '' !== $settings->icon_bg_size ) {
		?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-connector:before {
			bottom: <?php echo esc_attr( $settings->icon_bg_size / 2 . $settings->icon_bg_size_unit ); ?>;
		}
		<?php if ( $settings->icon_bg_size > 20 ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-connector .slick-arrow {
			bottom: <?php echo esc_attr( ( $settings->icon_bg_size / 2 - 20 ) / 2 ); ?>px;
		}
		<?php } ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-marker,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-connector .uabb-timeline-marker i {
			min-height: <?php echo esc_attr( $settings->icon_bg_size . $settings->icon_bg_size_unit ); ?>;
			min-width: <?php echo esc_attr( $settings->icon_bg_size . $settings->icon_bg_size_unit ); ?>;
			line-height: <?php echo esc_attr( $settings->icon_bg_size . $settings->icon_bg_size_unit ); ?>;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-arrow {
			height: <?php echo esc_attr( $settings->icon_bg_size . $settings->icon_bg_size_unit ); ?>;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--left .uabb-timeline__line {
			left: <?php echo esc_attr( intval( $settings->icon_bg_size ) / 2 . $settings->icon_bg_size_unit ); ?>;
		}
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--right .uabb-timeline__line {
			right: <?php echo esc_attr( intval( $settings->icon_bg_size ) / 2 . $settings->icon_bg_size_unit ); ?>;
		}
		.rtl .fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--left .uabb-timeline__line {
			right: <?php echo esc_attr( intval( $settings->icon_bg_size ) / 2 . $settings->icon_bg_size_unit ); ?>;
		}
		.rtl .fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline--right .uabb-timeline__line {
			left: <?php echo esc_attr( intval( $settings->icon_bg_size ) / 2 . $settings->icon_bg_size_unit ); ?>;
		}
		<?php
	}

	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings,
			'setting_name' => 'icon_border',
			'selector'     => ".fl-node-$id .uabb-timeline-vertical .uabb-timeline-marker-wrapper, .fl-node-$id .uabb-timeline-connector .uabb-timeline-marker i",
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline--center .uabb-timeline__line, .fl-node-$id .uabb-timeline--left .uabb-timeline__line, .fl-node-$id .uabb-timeline--right .uabb-timeline__line, .fl-node-$id .uabb-timeline-connector:before",
			'enabled'  => ! empty( $settings->line_color ),
			'props'    => array(
				'background-color' => $settings->line_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline__line__inner",
			'enabled'  => ! empty( $settings->line_focused_color ),
			'props'    => array(
				'background-color' => $settings->line_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .animate-border .timeline-icon-new, .fl-node-$id .timeline-icon-new",
			'enabled'  => ! empty( $settings->icon_color ),
			'props'    => array(
				'color' => $settings->icon_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .in-view .in-view-timeline-icon .timeline-icon-new, .fl-node-$id .uabb-timeline-connector .slick-current .uabb-timeline-marker .timeline-icon-new",
			'enabled'  => ! empty( $settings->icon_focused_color ),
			'props'    => array(
				'color' => $settings->icon_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .animate-border:hover .timeline-icon-new, .fl-node-$id .slick-active:hover .timeline-icon-new",
			'enabled'  => ! empty( $settings->icon_hover_color ),
			'props'    => array(
				'color' => $settings->icon_hover_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-vertical .uabb-timeline-marker-wrapper, .fl-node-$id .uabb-timeline-main .uabb-days .in-view .in-view-timeline-icon, .fl-node-$id .uabb-timeline-connector .uabb-timeline-marker i",
			'enabled'  => ! empty( $settings->icon_bg_color ),
			'props'    => array(
				'background-color' => $settings->icon_bg_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .uabb-timeline-field.in-view .uabb-timeline-marker-wrapper.in-view-timeline-icon, .fl-node-$id .uabb-timeline-connector .slick-current .uabb-timeline-marker i",
			'enabled'  => ! empty( $settings->icon_bg_focused_color ),
			'props'    => array(
				'background-color' => $settings->icon_bg_focused_color,
			),
		)
	);

	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .uabb-timeline-main .uabb-days .uabb-timeline-field.animate-border:hover .uabb-timeline-marker-wrapper, .fl-node-$id .uabb-timeline-connector .uabb-timeline-marker i:hover",
			'enabled'  => ! empty( $settings->icon_bg_hover_color ),
			'props'    => array(
				'background-color' => $settings->icon_bg_hover_color,
			),
		)
	);

	if ( isset( $settings->heading_typo ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'heading_typo',
				'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-content .uabb-timeline-heading",
			)
		);
	}

	if ( isset( $settings->desc_typo ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'desc_typo',
				'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-main .inner-date-new",
			)
		);
	}

	if ( isset( $settings->date_typo ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'date_typo',
				'selector'     => ".fl-node-$id .uabb-timeline-main .inner-date-new, .fl-node-$id .uabb-timeline-horizontal .uabb-timeline-card-date",
			)
		);
	}

	// CSS for Global settings end.

	// CSS for Individual Timeline items start.

	if ( 'custom' === $settings->content_type ) {
		$count = count( $settings->items );
		for ( $i = 0; $i < $count; $i++ ) {
			if ( ! is_object( $settings->items[ $i ] ) ) {
				continue;
			}

			$item = $settings->items[ $i ];

			if ( 'yes' === $item->override_global ) {
				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline-item-$i .uabb-content .uabb-timeline-heading",
						'enabled'  => ! empty( $item->item_heading_color ),
						'props'    => array(
							'color' => $item->item_heading_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline-item-$i .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-item-$i .inner-date-new, .fl-node-$id .uabb-timeline-item-$i .uabb-timeline-card-date",
						'enabled'  => ! empty( $item->item_desc_color ),
						'props'    => array(
							'color' => $item->item_desc_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline-item-$i .uabb-events-inner-new",
						'enabled'  => ! empty( $item->item_bg_color ),
						'props'    => array(
							'background-color' => $item->item_bg_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline--center .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--left .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--left .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after",
						'enabled'  => ! empty( $item->item_bg_color ),
						'props'    => array(
							'border-left-color' => $item->item_bg_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--left .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--left .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-tablet.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-right .uabb-timeline-arrow:after,
				.rtl .fl-node-$id .uabb-timeline--center .uabb-timeline-responsive-mobile.uabb-timeline-res-right .uabb-timeline-item-$i .uabb-day-left .uabb-timeline-arrow:after",
						'enabled'  => ! empty( $item->item_bg_color ),
						'props'    => array(
							'border-right-color' => $item->item_bg_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-days .uabb-timeline-item-$i.animate-border .timeline-icon-new, .fl-node-$id .uabb-timeline-item-$i.slick-active .timeline-icon-new",
						'enabled'  => ! empty( $item->item_icon_color ),
						'props'    => array(
							'color' => $item->item_icon_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline-vertical .uabb-timeline-item-$i .uabb-timeline-marker-wrapper, .fl-node-$id .uabb-timeline-main .uabb-days .uabb-timeline-item-$i.in-view .in-view-timeline-icon, .fl-node-$id .uabb-timeline-item-$i.slick-active .uabb-timeline-marker i",
						'enabled'  => ! empty( $item->item_icon_bg_color ),
						'props'    => array(
							'background-color' => $item->item_icon_bg_color,
						),
					)
				);

				FLBuilderCSS::rule(
					array(
						'selector' => ".fl-node-$id .uabb-timeline-main .uabb-timeline-item-$i .inner-date-new, .fl-node-$id .uabb-timeline-item-$i .uabb-timeline-card-date",
						'enabled'  => ! empty( $item->item_date_color ),
						'props'    => array(
							'color' => $item->item_date_color,
						),
					)
				);

				if ( isset( $item->heading_typo_single ) ) {
					FLBuilderCSS::typography_field_rule(
						array(
							'settings'     => $item,
							'setting_name' => 'heading_typo_single',
							'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-timeline-item-$i .uabb-content .uabb-timeline-heading",
						)
					);
				}

				if ( isset( $item->desc_typo_single ) ) {
					FLBuilderCSS::typography_field_rule(
						array(
							'settings'     => $item,
							'setting_name' => 'desc_typo_single',
							'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-timeline-item-$i .uabb-timeline-desc-content, .fl-node-$id .uabb-timeline-main .uabb-timeline-item-$i .inner-date-new",
						)
					);
				}

				if ( isset( $item->date_typo_single ) ) {
					FLBuilderCSS::typography_field_rule(
						array(
							'settings'     => $item,
							'setting_name' => 'date_typo_single',
							'selector'     => ".fl-node-$id .uabb-timeline-main .uabb-timeline-item-$i .inner-date-new, .fl-node-$id .uabb-timeline-item-$i .uabb-timeline-card-date",
						)
					);
				}
			}
		}
	}
	// CSS for Individual Timeline items end.

	// Horizontal carousel CSS.

	if ( 'horizontal' === $settings->layout ) {
		if ( method_exists( 'FLBuilder', 'fa5_pro_enabled' ) ) {
			if ( FLBuilder::fa5_pro_enabled() ) {
				?>
			.fl-node-<?php echo esc_attr( $id ); ?> .uabb-days ul.slick-dots li button:before {
				font-family: 'Font Awesome 5 Pro';
			}
				<?php
			}
		}
		?>

.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i:hover,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-prev i:focus,
.fl-node-<?php echo esc_attr( $id ); ?> .slick-next i:focus {
	outline: none;
	color: <?php echo esc_attr( $settings->arrow_color ); ?>;
		<?php
		switch ( $settings->arrow_style ) {
			case 'square':
				?>
	background: <?php echo ( '' !== $settings->arrow_background_color ) ? esc_attr( $settings->arrow_background_color ) : '#efefef'; ?>;
				<?php
				break;
			case 'circle':
				?>
	border-radius: 50%;
	background: <?php echo ( '' !== $settings->arrow_background_color ) ? esc_attr( $settings->arrow_background_color ) : '#efefef'; ?>;
				<?php
				break;
			case 'square-border':
				?>
	border: <?php echo esc_attr( $settings->arrow_border_size ); ?>px solid <?php echo esc_attr( $settings->arrow_color_border ); ?>;
				<?php
				break;
			case 'circle-border':
				?>
	border: <?php echo esc_attr( $settings->arrow_border_size ); ?>px solid <?php echo esc_attr( $settings->arrow_color_border ); ?>;
	border-radius: 50%;
				<?php
				break;
		}
		?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-horizontal .uabb-timeline-field {
		<?php
		if ( 1 === $settings->post_per_grid_desktop ) {
			echo 'padding: 0;';
		} else {
			echo ( '' !== $settings->element_space ) ? 'padding-left: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-left: 7.5px;';
			echo ( '' !== $settings->element_space ) ? 'padding-right: ' . esc_attr( $settings->element_space / 2 ) . 'px;' : 'padding-right: 7.5px;';
		}
		?>
}

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-timeline-horizontal .slick-list {
		<?php
		if ( 1 === $settings->post_per_grid_desktop ) {
			?>
	margin: 0;
			<?php
		} else {
			?>
	margin: 0 -<?php echo ( '' !== $settings->element_space ) ? ( esc_attr( $settings->element_space / 2 ) ) : '7.5'; ?>px;
			<?php
		}
		?>
}
		<?php
	}
	?>
