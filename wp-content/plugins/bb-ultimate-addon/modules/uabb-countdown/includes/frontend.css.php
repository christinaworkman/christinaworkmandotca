<?php
/**
 *  UABB Countdown Module file
 *
 *  @package UABB Countdown Module
 */

$converted                 = UABB_Compatibility::$uabb_migration;
$version_bb_check          = UABB_Compatibility::$version_bb_check;
$settings->separator_color = UABB_Helper::uabb_colorpicker( $settings, 'separator_color' );

$outter_spacing = ( isset( $settings->timer_out_spacing ) && ! empty( $settings->timer_out_spacing ) ) ? $settings->timer_out_spacing : '50';
?>
	<?php if ( 'yes' === $settings->show_separator ) { ?>
		<?php if ( 'colon' === $settings->separator_type ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown.uabb-countdown-separator-colon .uabb-countdown-digit-wrapper:after {
			<?php
			if ( isset( $settings->separator_size ) ) {
				echo 'font-size:' . esc_attr( $settings->separator_size ) . 'px;';
			}
			?>
			<?php if ( isset( $settings->separator_color ) ) { ?>
				color: <?php echo esc_attr( $settings->separator_color ); ?>;
			<?php } ?>
			right: -<?php echo ( intval( $outter_spacing / 2 ) + 5 ); ?>px;
			<?php if ( 'normal' === $settings->timer_style && $outter_spacing ) { ?>
				right: -<?php echo ( intval( $outter_spacing / 2 ) ); ?>px;
		<?php } ?>
		}
	<?php } ?>

		<?php if ( 'line' === $settings->separator_type ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown.uabb-countdown-separator-line .uabb-countdown-holding:after {
			right: 0;
			<?php if ( isset( $settings->separator_color ) ) { ?>
				border-color: <?php echo esc_attr( $settings->separator_color ); ?>;
			<?php } ?>
		}
			<?php if ( $outter_spacing ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown.uabb-countdown-separator-line .uabb-countdown-holding {
			padding-left: <?php echo esc_attr( ( $outter_spacing / 2 ) ); ?>px;
			padding-right: <?php echo esc_attr( ( $outter_spacing / 2 ) ); ?>px;
		}
		<?php } ?>

			<?php if ( 'normal' === $settings->timer_style && $outter_spacing ) { ?>
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown.uabb-countdown-separator-line .uabb-countdown-holding {
			padding-left: <?php echo esc_attr( $outter_spacing ); ?>px;
			padding-right: <?php echo esc_attr( $outter_spacing ); ?>px;
		}
		<?php } ?>
		<?php } ?>
	<?php } ?>
<?php
if ( isset( $settings->count_animation ) && 'flash' === $settings->count_animation ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit {
	-webkit-animation-name: flash; 
	animation-name: flash;
	-webkit-animation-duration: 4s;
	animation-duration: 4s;
}
	<?php
}
?>
<?php
if ( isset( $settings->count_animation ) && 'pulse' === $settings->count_animation ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit {
	-webkit-animation-name: pulse !important; 
	animation-name: pulse !important; 

	-webkit-animation-name: bounceIn;
	-webkit-animation-duration: 4s;
	-webkit-animation-iteration-count: 10;
	-webkit-animation-timing-function: ease-out;
	-webkit-animation-fill-mode: forwards;

	animation-name: bounceIn;
	animation-duration: 4s;
	animation-iteration-count: 10;
	animation-timing-function: ease-out;
	animation-fill-mode: forwards;
}
	<?php
}
if ( isset( $settings->count_animation ) && 'bounce' === $settings->count_animation ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit {
	-webkit-animation-name: bounce !important;
	animation-name: bounce !important;

	-webkit-animation-name: bounceIn;
	-webkit-animation-duration: 4s;

	animation-name: bounceIn;
	animation-duration: 4s;
}
	<?php
}
if ( isset( $settings->count_animation ) && 'shake' === $settings->count_animation ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit {
	-webkit-animation-name: shake !important; 
	animation-name: shake !important;

	-webkit-animation-name: bounceIn;
	-webkit-animation-duration: 4s;
	-webkit-animation-iteration-count: 10;
	-webkit-animation-timing-function: ease-out;
	-webkit-animation-fill-mode: forwards;

	animation-name: bounceIn;
	animation-duration: 4s;
	animation-iteration-count: 10;
	animation-timing-function: ease-out;
	animation-fill-mode: forwards;
}
	<?php
}
?>

<?php
/* Over All Alignment */
if ( isset( $settings->counter_alignment ) && 'right' === $settings->counter_alignment ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer,
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer {
		text-align: right;
	}
	<?php
}
if ( isset( $settings->counter_alignment ) && 'center' === $settings->counter_alignment ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer,
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer {
		text-align: center;
	}
<?php } ?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-holding {
	<?php
	if ( isset( $settings->counter_alignment ) && 'right' === $settings->counter_alignment ) {
		if ( isset( $settings->timer_out_spacing ) && '' !== $settings->timer_out_spacing ) {
			echo 'margin-left: ' . esc_attr( $settings->timer_out_spacing ) . 'px;';
		} else {
			echo 'margin-left: 15px;';
		}
	}

	if ( isset( $settings->counter_alignment ) && 'left' === $settings->counter_alignment ) {
		if ( isset( $settings->timer_out_spacing ) && '' !== $settings->timer_out_spacing ) {
			echo 'margin-right: ' . esc_attr( $settings->timer_out_spacing ) . 'px;';
		} else {
			echo 'margin-right: 15px;';
		}
	}

	if ( isset( $settings->counter_alignment ) && 'center' === $settings->counter_alignment ) {
		if ( isset( $settings->timer_out_spacing ) && '' !== $settings->timer_out_spacing ) {
			$margin_val = $settings->timer_out_spacing / 2;
			echo 'margin-left: ' . esc_attr( $margin_val ) . 'px;';
			echo 'margin-right: ' . esc_attr( $margin_val ) . 'px;';
		} else {
			$margin_val = 10 / 2;
			echo 'margin-left: ' . esc_attr( $margin_val ) . 'px;';
			echo 'margin-right: ' . esc_attr( $margin_val ) . 'px;';
		}
	}
	?>
	<?php if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_right' === $settings->outside_options ) { ?>
		/*float:right;*/
	<?php } if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_left' === $settings->outside_options ) { ?>
		/*float:left;*/
	<?php } ?>
}
<?php if ( isset( $settings->timer_style ) && 'normal' !== $settings->timer_style && ( ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_right' === $settings->outside_options ) || ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_left' === $settings->outside_options ) ) ) { ?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-holding.circle,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-holding.square,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-holding.normal,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-holding.custom {
	display: inline-flex;
	align-items: center;
	<?php if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_right' === $settings->outside_options ) { ?>
		direction: rtl;
	<?php } if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_left' === $settings->outside_options ) { ?>
		direction: ltr;
	<?php } ?>
}
<?php } ?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-unit-names {

	<?php if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_right' === $settings->outside_options ) { ?>
		/*float:right;*/
	<?php } if ( isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && 'out_left' === $settings->outside_options ) { ?>
		/*float:left;*/
	<?php } ?>
}
<?php

$settings->digit_border_color     = UABB_Helper::uabb_colorpicker( $settings, 'digit_border_color' );
$settings->timer_background_color = UABB_Helper::uabb_colorpicker( $settings, 'timer_background_color', true );
$settings->digit_color            = UABB_Helper::uabb_colorpicker( $settings, 'digit_color' );
$settings->unit_color             = UABB_Helper::uabb_colorpicker( $settings, 'unit_color' );
$settings->message_color          = UABB_Helper::uabb_colorpicker( $settings, 'message_color' );

/* CountDown Styling */
if ( isset( $settings->timer_style ) && 'circle' === $settings->timer_style ) {
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-wrapper.circle {
	<?php
	if ( isset( $settings->digit_area_width ) ) {
		echo ( '' !== $settings->digit_area_width ) ? 'width:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'width:100px;';
		echo ( '' !== $settings->digit_area_width ) ? 'height:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'height:100px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_width ) ) {
		echo ( '' !== $settings->digit_border_width ) ? 'border:' . esc_attr( $settings->digit_border_width ) . 'px;' : 'border:5px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_style ) ) {
		echo ( '' !== $settings->digit_border_style ) ? 'border-style:' . esc_attr( $settings->digit_border_style ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_color ) ) {
		echo ( '' !== $settings->digit_border_color ) ? 'border-color:' . esc_attr( $settings->digit_border_color ) . ';' : '';
	}
	?>
	border-radius: 50%;
	<?php
	if ( isset( $settings->timer_background_color ) ) {
		echo ( '' !== $settings->timer_background_color ) ? 'background:' . esc_attr( $settings->timer_background_color ) . ';' : ''; }
	?>
	<?php
	if ( isset( $settings->digit_area_width ) ) {
		echo ( '' !== $settings->digit_area_width ) ? 'padding:' . esc_attr( $settings->digit_area_width / 4 ) . ';' : 'padding:' . 100 / 4 . 'px;'; }
	?>
	<?php if ( isset( $settings->unit_position ) && 'default' === $settings->unit_position || 'outside' === $settings->unit_position ) { ?>
	display: flex;
	justify-content: center;
	align-items: center;
	<?php } if ( isset( $settings->unit_position ) && 'inside' === $settings->unit_position ) { ?>
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	<?php } ?>
}
	<?php
}

if ( isset( $settings->timer_style ) && 'square' === $settings->timer_style ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-wrapper.square {
	<?php
	if ( isset( $settings->digit_area_width ) ) {
		echo ( '' !== $settings->digit_area_width ) ? 'width:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'width:100px;';
		echo ( '' !== $settings->digit_area_width ) ? 'height:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'height:100px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_width ) ) {
		echo ( '' !== $settings->digit_border_width ) ? 'border:' . esc_attr( $settings->digit_border_width ) . 'px;' : 'border:5px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_style ) ) {
		echo ( '' !== $settings->digit_border_style ) ? 'border-style:' . esc_attr( $settings->digit_border_style ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_color ) ) {
		echo ( '' !== $settings->digit_border_color ) ? 'border-color:' . esc_attr( $settings->digit_border_color ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->timer_background_color ) ) {
		echo ( '' !== $settings->timer_background_color ) ? 'background:' . esc_attr( $settings->timer_background_color ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->digit_area_width ) ) {
		echo ( '' !== $settings->digit_area_width ) ? 'padding:' . esc_attr( $settings->digit_area_width / 4 ) . ';' : 'padding: ' . 100 / 4 . 'px;'; }
	?>
		<?php if ( isset( $settings->unit_position ) && 'default' === $settings->unit_position || 'outside' === $settings->unit_position ) { ?>
	display: flex;
	justify-content: center;
	align-items: center;
	<?php } if ( isset( $settings->unit_position ) && 'inside' === $settings->unit_position ) { ?>
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	<?php } ?>
}
	<?php
}
if ( isset( $settings->timer_style ) && 'custom' === $settings->timer_style ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-wrapper.custom {
	<?php
	if ( isset( $settings->digit_area_width ) ) {
		echo ( '' !== $settings->digit_area_width ) ? 'width:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'width:100px;';
		echo ( '' !== $settings->digit_area_width ) ? 'height:' . esc_attr( $settings->digit_area_width ) . 'px;' : 'height:100px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_width ) ) {
		echo ( '' !== $settings->digit_border_width ) ? 'border:' . esc_attr( $settings->digit_border_width ) . 'px;' : 'border:5px;';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_style ) ) {
		echo ( '' !== $settings->digit_border_style ) ? 'border-style:' . esc_attr( $settings->digit_border_style ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_color ) ) {
		echo ( '' !== $settings->digit_border_color ) ? 'border-color:' . esc_attr( $settings->digit_border_color ) . ';' : '';
	}
	?>
	<?php
	if ( isset( $settings->digit_border_radius ) ) {
		echo ( '' !== $settings->digit_border_radius ) ? 'border-radius:' . esc_attr( $settings->digit_border_radius ) . 'px;' : 'border-radius:5px;';
	}
	?>
	<?php
	if ( isset( $settings->timer_background_color ) ) {
		echo ( '' !== $settings->timer_background_color ) ? 'background:' . esc_attr( $settings->timer_background_color ) . ';' : '';
	}
	?>
	display:flex;
	justify-content:center;
	align-items:center;	
	flex-direction: column;
}
	<?php
}
if ( isset( $settings->timer_style ) && 'normal' !== $settings->timer_style && isset( $settings->unit_position ) && 'inside' === $settings->unit_position && isset( $settings->inside_options ) && ( 'in_below' === $settings->inside_options || 'in_above' === $settings->inside_options ) ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-content {
	<?php if ( isset( $settings->inside_options ) && 'in_below' === $settings->inside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-bottom:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-bottom:10px;';
		}
		?>
	<?php } ?>
}
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit{
	<?php if ( isset( $settings->inside_options ) && 'in_above' === $settings->inside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-top:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-top:10px;';
		}
		?>
	<?php } ?>
}
	<?php
}
if ( isset( $settings->timer_style ) && 'normal' !== $settings->timer_style && isset( $settings->unit_position ) && 'outside' === $settings->unit_position && isset( $settings->outside_options ) && ( 'out_below' === $settings->outside_options || 'out_above' === $settings->outside_options || 'out_right' === $settings->outside_options || 'out_left' === $settings->outside_options ) ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-wrapper {
	<?php if ( isset( $settings->outside_options ) && 'out_below' === $settings->outside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-bottom:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-bottom:10px;';
		}
		?>
	<?php } ?>
	<?php if ( isset( $settings->outside_options ) && 'out_above' === $settings->outside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-top:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-top:10px;';
		}
		?>
	<?php } ?>
	<?php if ( isset( $settings->outside_options ) && 'out_right' === $settings->outside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-right:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-right:10px;';
		}
		?>
	<?php } ?>
	<?php if ( isset( $settings->outside_options ) && 'out_left' === $settings->outside_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-left:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-left:10px;';
		}
		?>
	<?php } ?>
}
	<?php
}
if ( isset( $settings->timer_style ) && 'normal' === $settings->timer_style && isset( $settings->normal_options ) && ( 'normal_below' === $settings->normal_options || 'normal_above' === $settings->normal_options ) ) {
	?>
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-count-down-digit {
	<?php if ( isset( $settings->normal_options ) && 'normal_below' === $settings->normal_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-bottom:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-bottom:10px;';
		}
		?>
	<?php } ?>
	<?php if ( isset( $settings->normal_options ) && 'normal_above' === $settings->normal_options ) { ?>
		<?php
		if ( isset( $settings->space_between_unit ) ) {
			echo ( '' !== $settings->space_between_unit ) ? 'margin-top:' . esc_attr( $settings->space_between_unit ) . 'px;' : 'margin-top:10px;';
		}
		?>
	<?php } ?>
}
	<?php
}
?>
<?php
// Counter Box Shadow CSS.

if ( 'yes' === $settings->counter_drop_shadow ) {
	?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-digit-wrapper {
		-webkit-box-shadow: <?php echo esc_attr( $settings->counter_shadow_color_hor ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_ver ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_blur ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_spr ); ?>px <?php echo esc_attr( $settings->counter_shadow_color ); ?>;
		-moz-box-shadow: <?php echo esc_attr( $settings->counter_shadow_color_hor ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_ver ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_blur ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_spr ); ?>px <?php echo esc_attr( $settings->counter_shadow_color ); ?>;
		-o-box-shadow: <?php echo esc_attr( $settings->counter_shadow_color_hor ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_ver ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_blur ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_spr ); ?>px <?php echo esc_attr( $settings->counter_shadow_color ); ?>;
		box-shadow: <?php echo esc_attr( $settings->counter_shadow_color_hor ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_ver ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_blur ); ?>px <?php echo esc_attr( $settings->counter_shadow_color_spr ); ?>px <?php echo esc_attr( $settings->counter_shadow_color ); ?>;
		<?php if ( isset( $settings->counter_shadow_hover_transition ) && 'yes' === $settings->counter_hover_shadow ) { ?>
			-webkit-transition: -webkit-box-shadow <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out, -webkit-transform <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out;
			-moz-transition: -moz-box-shadow <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out, -moz-transform <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out;
			transition: box-shadow <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out, transform <?php echo esc_attr( $settings->counter_shadow_hover_transition ); ?>ms ease-in-out;
			will-change: box-shadow;
		<?php } ?>
		<?php
		if ( isset( $settings->timer_style ) && 'circle' === $settings->timer_style ) {
			?>
		border-radius: 50%;
			<?php
		} elseif ( isset( $settings->timer_style ) && 'custom' === $settings->timer_style ) {
			?>
			<?php
			echo ( '' !== $settings->digit_border_radius ) ? 'border-radius:' . esc_attr( $settings->digit_border_radius ) . 'px;' : 'border-radius:5px;';
			?>
		<?php } ?>
		}
<?php } ?>

<?php
/* Typography style Assign CSS for message after expires*/
if ( isset( $settings->fixed_timer_action ) && 'msg' === $settings->fixed_timer_action ) {
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {
	<?php if ( isset( $settings->message_color ) && '' !== $settings->message_color ) : ?>
		color: <?php echo esc_attr( $settings->message_color ); ?>;
	<?php endif; ?>
}

	<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {
		<?php if ( isset( $settings->message_font_family['family'] ) && 'Default' !== $settings->message_font_family['family'] ) : ?>
			<?php UABB_Helper::uabb_font_css( $settings->message_font_family ); ?>
		<?php endif; ?>

		<?php
		if ( 'yes' === $converted || isset( $settings->message_font_size_unit ) && '' !== $settings->message_font_size_unit ) {
			?>
			font-size: <?php echo esc_attr( $settings->message_font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->message_font_size_unit ) && '' === $settings->message_font_size_unit && isset( $settings->message_font_size['desktop'] ) && '' !== $settings->message_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->message_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->message_font_size['desktop'] ) && '' === $settings->message_font_size['desktop'] && isset( $settings->message_line_height['desktop'] ) && '' !== $settings->message_line_height['desktop'] && '' === $settings->message_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->message_line_height_unit ) && '' !== $settings->message_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->message_line_height_unit ) && '' === $settings->message_line_height_unit && isset( $settings->message_line_height['desktop'] ) && '' !== $settings->message_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->message_transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->message_transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->message_letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->message_letter_spacing ); ?>px;
		<?php endif; ?>
	}
		<?php
	} else {
		if ( class_exists( 'FLBuilderCSS' ) ) {
			FLBuilderCSS::typography_field_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'message_typo',
					'selector'     => ".fl-node-$id .uabb-countdown-expire-message",
				)
			);
		}
	}
	?>
	<?php
}

if ( isset( $settings->evergreen_timer_action ) && 'msg' === $settings->evergreen_timer_action ) {
	?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {
	<?php if ( isset( $settings->message_color ) && '' !== $settings->message_color ) : ?>
		color: <?php echo esc_attr( $settings->message_color ); ?>;
	<?php endif; ?>
}

	<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {
		<?php if ( isset( $settings->message_font_family['family'] ) && 'Default' !== $settings->message_font_family['family'] ) : ?>
			<?php UABB_Helper::uabb_font_css( $settings->message_font_family ); ?>
		<?php endif; ?>

		<?php
		if ( 'yes' === $converted || isset( $settings->message_font_size_unit ) && '' !== $settings->message_font_size_unit ) {
			?>
			font-size: <?php echo esc_attr( $settings->message_font_size_unit ); ?>px;
		<?php } elseif ( isset( $settings->message_font_size_unit ) && '' === $settings->message_font_size_unit && isset( $settings->message_font_size['desktop'] ) && '' !== $settings->message_font_size['desktop'] ) { ?>
			font-size: <?php echo esc_attr( $settings->message_font_size['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( isset( $settings->message_font_size['desktop'] ) && '' === $settings->message_font_size['desktop'] && isset( $settings->message_line_height['desktop'] ) && '' !== $settings->message_line_height['desktop'] && '' === $settings->message_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'yes' === $converted || isset( $settings->message_line_height_unit ) && '' !== $settings->message_line_height_unit ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height_unit ); ?>em;
		<?php } elseif ( isset( $settings->message_line_height_unit ) && '' === $settings->message_line_height_unit && isset( $settings->message_line_height['desktop'] ) && '' !== $settings->message_line_height['desktop'] ) { ?>
			line-height: <?php echo esc_attr( $settings->message_line_height['desktop'] ); ?>px;
		<?php } ?>

		<?php if ( 'none' !== $settings->message_transform ) : ?>
			text-transform: <?php echo esc_attr( $settings->message_transform ); ?>;
		<?php endif; ?>

		<?php if ( '' !== $settings->message_letter_spacing ) : ?>
			letter-spacing: <?php echo esc_attr( $settings->message_letter_spacing ); ?>px;
		<?php endif; ?>
	}
		<?php
	} else {
		if ( class_exists( 'FLBuilderCSS' ) ) {
			FLBuilderCSS::typography_field_rule(
				array(
					'settings'     => $settings,
					'setting_name' => 'message_typo',
					'selector'     => ".fl-node-$id .uabb-countdown-expire-message",
				)
			);
		}
	}
	?>
	<?php
}
?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-digit,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-digit {
	<?php if ( isset( $settings->digit_color ) && '' !== $settings->digit_color ) : ?>
		color: <?php echo esc_attr( $settings->digit_color ); ?>;
	<?php endif; ?>
}

/* Typography style starts here  */

<?php
if ( ! $version_bb_check ) {
	if ( ( isset( $settings->digit_font_family['family'] ) && 'Default' !== $settings->digit_font_family['family'] ) || isset( $settings->digit_font_size['desktop'] ) || isset( $settings->digit_line_height['desktop'] ) || isset( $settings->digit_font_size_unit ) || isset( $settings->digit_line_height_unit ) || isset( $settings->digit_color ) ) {
		?>

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-digit,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-digit {

			<?php if ( isset( $settings->digit_font_family['family'] ) && 'Default' !== $settings->digit_font_family['family'] ) : ?>
				<?php UABB_Helper::uabb_font_css( $settings->digit_font_family ); ?>
			<?php endif; ?>

			<?php
			if ( 'yes' === $converted || isset( $settings->digit_font_size_unit ) && '' !== $settings->digit_font_size_unit ) {
				?>
				font-size: <?php echo esc_attr( $settings->digit_font_size_unit ); ?>px;
			<?php } elseif ( isset( $settings->digit_font_size_unit ) && '' === $settings->digit_font_size_unit && isset( $settings->digit_font_size['desktop'] ) && '' !== $settings->digit_font_size['desktop'] ) { ?>
				font-size: <?php echo esc_attr( $settings->digit_font_size['desktop'] ); ?>px;
			<?php } ?>

			<?php if ( isset( $settings->digit_font_size['desktop'] ) && '' === $settings->digit_font_size['desktop'] && isset( $settings->digit_line_height['desktop'] ) && '' !== $settings->digit_line_height['desktop'] && '' === $settings->digit_line_height_unit ) { ?>
				line-height: <?php echo esc_attr( $settings->digit_line_height['desktop'] ); ?>px;
			<?php } ?>

			<?php if ( 'yes' === $converted || isset( $settings->digit_line_height_unit ) && '' !== $settings->digit_line_height_unit ) { ?>
				line-height: <?php echo esc_attr( $settings->digit_line_height_unit ); ?>em;
			<?php } elseif ( isset( $settings->digit_line_height_unit ) && '' === $settings->digit_line_height_unit && isset( $settings->digit_line_height['desktop'] ) && '' !== $settings->digit_line_height['desktop'] ) { ?>
				line-height: <?php echo esc_attr( $settings->digit_line_height['desktop'] ); ?>px;
			<?php } ?>
		}
		<?php
	}
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'digit_typo',
				'selector'     => ".fl-node-$id .uabb-countdown-fixed-timer .uabb-count-down-digit, .fl-node-$id .uabb-countdown-evergreen-timer .uabb-count-down-digit",
			)
		);
	}
}
?>

<?php if ( ! $version_bb_check ) { ?>
	.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-digit,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-digit {
		<?php if ( '' !== $settings->digit_letter_spacing ) { ?>
			letter-spacing: <?php echo esc_attr( $settings->digit_letter_spacing ); ?>px;
		<?php } ?>
	}
<?php } ?>

.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-unit,
.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-unit {
	<?php if ( isset( $settings->unit_color ) && '' !== $settings->unit_color ) : ?>
		color: <?php echo esc_attr( $settings->unit_color ); ?>;
	<?php endif; ?>
}

<?php if ( ! $version_bb_check ) { ?>
	<?php if ( ( isset( $settings->unit_font_family['family'] ) && 'Default' !== $settings->unit_font_family['family'] ) || isset( $settings->unit_font_size['desktop'] ) || isset( $settings->unit_line_height['desktop'] ) || isset( $settings->unit_font_size_new ) || isset( $settings->unit_line_height_new ) || isset( $settings->unit_color ) || isset( $settings->unit_transform ) || isset( $settings->unit_letter_spacing ) ) { ?>

		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-unit,
		.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-unit {	
			<?php if ( isset( $settings->unit_font_family['family'] ) && 'Default' !== $settings->unit_font_family['family'] ) : ?>
				<?php UABB_Helper::uabb_font_css( $settings->unit_font_family ); ?>
			<?php endif; ?>

			<?php
			if ( 'yes' === $converted || isset( $settings->unit_font_size_new ) && '' !== $settings->unit_font_size_new ) {
				?>
				font-size: <?php echo esc_attr( $settings->unit_font_size_new ); ?>px;
			<?php } elseif ( isset( $settings->unit_font_size_new ) && '' === $settings->unit_font_size_new && isset( $settings->unit_font_size['desktop'] ) && '' !== $settings->unit_font_size['desktop'] ) { ?>
				font-size: <?php echo esc_attr( $settings->unit_font_size['desktop'] ); ?>px;
			<?php } ?>

			<?php if ( isset( $settings->unit_font_size['desktop'] ) && '' === $settings->unit_font_size['desktop'] && isset( $settings->unit_line_height['desktop'] ) && '' !== $settings->unit_line_height['desktop'] && '' === $settings->unit_line_height_new ) { ?>
				line-height: <?php echo esc_attr( $settings->unit_line_height['desktop'] ); ?>px;
			<?php } ?>

			<?php if ( 'yes' === $converted || isset( $settings->unit_line_height_new ) && '' !== $settings->unit_line_height_new ) { ?>
				line-height: <?php echo esc_attr( $settings->unit_line_height_new ); ?>em;
			<?php } elseif ( isset( $settings->unit_line_height_new ) && '' === $settings->unit_line_height_new && isset( $settings->unit_line_height['desktop'] ) && '' !== $settings->unit_line_height['desktop'] ) { ?>
				line-height: <?php echo esc_attr( $settings->unit_line_height['desktop'] ); ?>px;
			<?php } ?>

			<?php if ( 'none' !== $settings->unit_transform ) : ?>
				text-transform: <?php echo esc_attr( $settings->unit_transform ); ?>;
			<?php endif; ?>

			<?php if ( '' !== $settings->unit_letter_spacing ) : ?>
				letter-spacing: <?php echo esc_attr( $settings->unit_letter_spacing ); ?>px;
			<?php endif; ?>
		}
		<?php
	}
} else {
	if ( class_exists( 'FLBuilderCSS' ) ) {
		FLBuilderCSS::typography_field_rule(
			array(
				'settings'     => $settings,
				'setting_name' => 'unit_typo',
				'selector'     => ".fl-node-$id .uabb-countdown-fixed-timer .uabb-count-down-unit, .fl-node-$id .uabb-countdown-evergreen-timer .uabb-count-down-unit",
			)
		);
	}
}
?>

/* Typography responsive layout starts here */ 
<?php
if ( $global_settings->responsive_enabled ) { // Global Setting If started.

	if ( ! $version_bb_check ) {

		if ( isset( $settings->message_font_size['medium'] ) || isset( $settings->message_line_height['medium'] ) || isset( $settings->digit_font_size['medium'] ) || isset( $settings->digit_line_height['medium'] ) || isset( $settings->unit_font_size['medium'] ) || isset( $settings->unit_line_height['medium'] ) || isset( $settings->digit_font_size_unit_medium ) || isset( $settings->digit_line_height_unit_medium ) || isset( $settings->digit_line_height_unit ) || isset( $settings->unit_font_size_new_medium ) || isset( $settings->unit_line_height_new_medium ) || isset( $settings->unit_line_height_new ) || isset( $settings->message_font_size_unit_medium ) || isset( $settings->message_line_height_unit_medium ) || isset( $settings->message_line_height_message ) || isset( $settings->evergreen_timer_action ) || isset( $settings->fixed_timer_action ) ) {
			?>
			@media ( max-width: <?php echo esc_attr( $global_settings->medium_breakpoint ) . 'px'; ?> ) {

			<?php if ( ! $version_bb_check ) { ?>
					<?php if ( isset( $settings->digit_font_size['medium'] ) && '' !== $settings->digit_font_size['medium'] || isset( $settings->digit_line_height['medium'] ) || isset( $settings->digit_font_size_unit_medium ) || isset( $settings->digit_line_height_unit_medium ) ) { ?>

					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-digit,
					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-digit {

						<?php if ( 'yes' === $converted || isset( $settings->digit_font_size_unit_medium ) && '' !== $settings->digit_font_size_unit_medium ) { ?>
							font-size: <?php echo esc_attr( $settings->digit_font_size_unit_medium ); ?>px;
						<?php } elseif ( isset( $settings->digit_font_size_unit_medium ) && '' === $settings->digit_font_size_unit_medium && isset( $settings->digit_font_size['medium'] ) && '' !== $settings->digit_font_size['medium'] ) { ?>
							font-size: <?php echo esc_attr( $settings->digit_font_size['medium'] ); ?>px;
						<?php } ?>

						<?php if ( isset( $settings->digit_font_size['medium'] ) && '' === $settings->digit_font_size['medium'] && isset( $settings->digit_line_height['medium'] ) && '' !== $settings->digit_line_height['medium'] && '' === $settings->digit_line_height_unit_medium && '' === $settings->digit_line_height_unit ) { ?>
							line-height: <?php echo esc_attr( $settings->digit_line_height['medium'] ); ?>px;
						<?php } ?>

						<?php if ( 'yes' === $converted || isset( $settings->digit_line_height_unit_medium ) && '' !== $settings->digit_line_height_unit_medium ) { ?>
							line-height: <?php echo esc_attr( $settings->digit_line_height_unit_medium ); ?>em;	
						<?php } elseif ( isset( $settings->digit_line_height_unit_medium ) && '' === $settings->digit_line_height_unit_medium && isset( $settings->digit_line_height['medium'] ) && '' !== $settings->digit_line_height['medium'] ) { ?>
							line-height: <?php echo esc_attr( $settings->digit_line_height['medium'] ); ?>px;
						<?php } ?>

					}
				<?php } ?>

					<?php if ( isset( $settings->unit_font_size['medium'] ) || isset( $settings->unit_line_height['medium'] ) || isset( $settings->digit_font_size_unit_medium ) || isset( $settings->unit_font_size_new_medium ) ) { ?>
					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-unit,
					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-unit {

						<?php if ( 'yes' === $converted || isset( $settings->unit_font_size_new_medium ) && '' !== $settings->unit_font_size_new_medium ) { ?>
							font-size: <?php echo esc_attr( $settings->unit_font_size_new_medium ); ?>px;
						<?php } elseif ( isset( $settings->unit_font_size_new_medium ) && '' === $settings->unit_font_size_new_medium && isset( $settings->unit_font_size['medium'] ) && '' !== $settings->unit_font_size['medium'] ) { ?>
							font-size: <?php echo esc_attr( $settings->unit_font_size['medium'] ); ?>px;
						<?php } ?> 

						<?php if ( isset( $settings->unit_font_size['medium'] ) && '' === $settings->unit_font_size['medium'] && isset( $settings->unit_line_height['medium'] ) && '' !== $settings->unit_line_height['medium'] && '' === $settings->unit_line_height_new_medium && '' === $settings->unit_line_height_new ) { ?>
							line-height: <?php echo esc_attr( $settings->unit_line_height['medium'] ); ?>px;
						<?php } ?>

						<?php if ( 'yes' === $converted || isset( $settings->unit_line_height_new_medium ) && '' !== $settings->unit_line_height_new_medium ) { ?>
							line-height: <?php echo esc_attr( $settings->unit_line_height_new_medium ); ?>em;	
						<?php } elseif ( isset( $settings->unit_line_height_new_medium ) && '' === $settings->unit_line_height_new_medium && isset( $settings->unit_line_height['medium'] ) && '' !== $settings->unit_line_height['medium'] ) { ?>
							line-height: <?php echo esc_attr( $settings->unit_line_height['medium'] ); ?>px;
						<?php } ?>
					}

				<?php } ?>

				<?php
				if ( isset( $settings->message_font_size['medium'] ) || isset( $settings->message_line_height['medium'] ) || isset( $settings->message_font_size_unit_medium ) || isset( $settings->message_line_height_unit_medium ) ) {

					if ( isset( $settings->evergreen_timer_action ) && 'msg' === $settings->evergreen_timer_action ) {
						?>

						.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {

							<?php if ( 'yes' === $converted || isset( $settings->message_font_size_unit_medium ) && '' !== $settings->message_font_size_unit_medium ) { ?>
								font-size: <?php echo esc_attr( $settings->message_font_size_unit_medium ); ?>px;
							<?php } elseif ( isset( $settings->message_font_size_unit_medium ) && '' === $settings->message_font_size_unit_medium && isset( $settings->message_font_size['medium'] ) && '' !== $settings->message_font_size['medium'] ) { ?>
								font-size: <?php echo esc_attr( $settings->message_font_size['medium'] ); ?>px;
							<?php } ?>

							<?php if ( isset( $settings->message_font_size['medium'] ) && '' === $settings->message_font_size['medium'] && isset( $settings->message_line_height['medium'] ) && '' !== $settings->message_line_height['medium'] && '' === $settings->message_line_height_unit_medium && '' === $settings->message_line_height_unit ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height['medium'] ); ?>px;
							<?php } ?>

							<?php if ( 'yes' === $converted || isset( $settings->message_line_height_unit_medium ) && '' !== $settings->message_line_height_unit_medium ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height_unit_medium ); ?>em;   
							<?php } elseif ( isset( $settings->message_line_height_unit_medium ) && '' === $settings->message_line_height_unit_medium && isset( $settings->message_line_height['medium'] ) && '' !== $settings->message_line_height['medium'] ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height['medium'] ); ?>px;
							<?php } ?>
						}

						<?php
					}

					if ( isset( $settings->fixed_timer_action ) && 'msg' === $settings->fixed_timer_action ) {
						?>

						.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {

							<?php if ( 'yes' === $converted || isset( $settings->message_font_size_unit_medium ) && '' !== $settings->message_font_size_unit_medium ) { ?>
								font-size: <?php echo esc_attr( $settings->message_font_size_unit_medium ); ?>px;
							<?php } elseif ( isset( $settings->message_font_size_unit_medium ) && '' === $settings->message_font_size_unit_medium && isset( $settings->message_font_size['medium'] ) && '' !== $settings->message_font_size['medium'] ) { ?>
								font-size: <?php echo esc_attr( $settings->message_font_size['medium'] ); ?>px;
							<?php } ?>

							<?php if ( isset( $settings->message_font_size['medium'] ) && '' === $settings->message_font_size['medium'] && isset( $settings->message_line_height['medium'] ) && '' !== $settings->message_line_height['medium'] && '' === $settings->message_line_height_unit_medium && '' === $settings->message_line_height_unit ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height['medium'] ); ?>px;
							<?php } ?>

							<?php if ( 'yes' === $converted || isset( $settings->message_line_height_unit_medium ) && '' !== $settings->message_line_height_unit_medium ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height_unit_medium ); ?>em;   
							<?php } elseif ( isset( $settings->message_line_height_unit_medium ) && '' === $settings->message_line_height_unit_medium && isset( $settings->message_line_height['medium'] ) && '' !== $settings->message_line_height['medium'] ) { ?>
								line-height: <?php echo esc_attr( $settings->message_line_height['medium'] ); ?>px;
							<?php } ?>
						}
						<?php
					}
				}
			}
			?>
		}
			<?php
		}

		if ( isset( $settings->message_font_size['small'] ) || isset( $settings->message_line_height['small'] ) || isset( $settings->digit_font_size['small'] ) || isset( $settings->digit_line_height['small'] ) || isset( $settings->unit_font_size['small'] ) || isset( $settings->unit_line_height['small'] ) || isset( $settings->digit_font_size_unit_responsive ) || isset( $settings->digit_line_height_unit_responsive ) || isset( $settings->digit_line_height_unit_medium ) || isset( $settings->digit_line_height_unit ) || isset( $settings->unit_font_size_new_responsive ) || isset( $settings->unit_line_height_new_responsive ) || isset( $settings->unit_line_height_new_medium ) || isset( $settings->unit_line_height_new ) || isset( $settings->message_font_size_unit_responsive ) || isset( $settings->message_line_height_unit_responsive ) || isset( $settings->message_line_height_unit_medium ) || isset( $settings->message_line_height_unit ) || isset( $settings->evergreen_timer_action ) || isset( $settings->fixed_timer_action ) ) {
			?>

		@media ( max-width: <?php echo esc_attr( $global_settings->responsive_breakpoint ) . 'px'; ?> ) {
			<?php if ( isset( $settings->digit_font_size['small'] ) || isset( $settings->digit_line_height['small'] ) || isset( $settings->digit_font_size_unit_responsive ) || isset( $settings->digit_line_height_unit_responsive ) ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-digit,
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-digit {

					<?php if ( 'yes' === $converted || isset( $settings->digit_font_size_unit_responsive ) && '' !== $settings->digit_font_size_unit_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->digit_font_size_unit_responsive ); ?>px;   
					<?php } elseif ( isset( $settings->digit_font_size_unit_responsive ) && '' === $settings->digit_font_size_unit_responsive && isset( $settings->digit_font_size['small'] ) && '' !== $settings->digit_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->digit_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->digit_font_size['small'] ) && '' === $settings->digit_font_size['small'] && isset( $settings->digit_line_height['small'] ) && '' !== $settings->digit_line_height['small'] && '' === $settings->digit_line_height_unit_responsive && '' === $settings->digit_line_height_unit && '' === $settings->digit_line_height_unit_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->digit_line_height['small'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->digit_line_height_unit_responsive ) && '' !== $settings->digit_line_height_unit_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->digit_line_height_unit_responsive ); ?>em;
					<?php } elseif ( isset( $settings->digit_line_height_unit_responsive ) && '' === $settings->digit_line_height_unit_responsive && isset( $settings->digit_line_height['small'] ) && '' !== $settings->digit_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->digit_line_height['small'] ); ?>px;
					<?php } ?> 

				}
			<?php } ?>

			<?php if ( isset( $settings->unit_font_size['small'] ) || isset( $settings->unit_line_height['small'] ) || isset( $settings->unit_font_size_new_responsive ) || isset( $settings->unit_line_height_new_responsive ) ) { ?>
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-fixed-timer .uabb-count-down-unit,
				.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-evergreen-timer .uabb-count-down-unit {

					<?php if ( 'yes' === $converted || isset( $settings->unit_font_size_new_responsive ) && '' !== $settings->unit_font_size_new_responsive ) { ?>
						font-size: <?php echo esc_attr( $settings->unit_font_size_new_responsive ); ?>px;   
					<?php } elseif ( isset( $settings->unit_font_size_new_responsive ) && '' === $settings->unit_font_size_new_responsive && isset( $settings->unit_font_size['small'] ) && '' !== $settings->unit_font_size['small'] ) { ?>
						font-size: <?php echo esc_attr( $settings->unit_font_size['small'] ); ?>px;
					<?php } ?>

					<?php if ( isset( $settings->unit_font_size['small'] ) && '' === $settings->unit_font_size['small'] && isset( $settings->unit_line_height['small'] ) && '' !== $settings->unit_line_height['small'] && '' === $settings->unit_line_height_new_responsive && '' === $settings->unit_line_height_new && '' === $settings->unit_line_height_new_medium ) { ?>
						line-height: <?php echo esc_attr( $settings->unit_line_height['small'] ); ?>px;
					<?php } ?>

					<?php if ( 'yes' === $converted || isset( $settings->unit_line_height_new_responsive ) && '' !== $settings->unit_line_height_new_responsive ) { ?>
						line-height: <?php echo esc_attr( $settings->unit_line_height_new_responsive ); ?>em;
					<?php } elseif ( isset( $settings->unit_line_height_new_responsive ) && '' === $settings->unit_line_height_new_responsive && isset( $settings->unit_line_height['small'] ) && '' !== $settings->unit_line_height['small'] ) { ?>
						line-height: <?php echo esc_attr( $settings->unit_line_height['small'] ); ?>px;
					<?php } ?> 
				}
			<?php } ?>

			<?php
			if ( isset( $settings->message_font_size['small'] ) || isset( $settings->message_line_height['small'] ) || isset( $settings->message_font_size_unit_responsive ) || isset( $settings->message_line_height_unit_responsive ) ) {
				if ( isset( $settings->evergreen_timer_action ) && 'msg' === $settings->evergreen_timer_action ) {
					?>
					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {

						<?php if ( 'yes' === $converted || isset( $settings->num_font_size_unit_responsive ) && '' !== $settings->num_font_size_unit_responsive ) { ?>
							font-size: <?php echo esc_attr( $settings->num_font_size_unit_responsive ); ?>px;   
						<?php } elseif ( isset( $settings->num_font_size_unit_responsive ) && '' === $settings->num_font_size_unit_responsive && isset( $settings->num_font_size['small'] ) && '' !== $settings->num_font_size['small'] ) { ?>
							font-size: <?php echo esc_attr( $settings->num_font_size['small'] ); ?>px;
						<?php } ?>

						<?php if ( isset( $settings->message_font_size['small'] ) && '' === $settings->message_font_size['small'] && isset( $settings->message_line_height['small'] ) && '' !== $settings->message_line_height['small'] && '' === $settings->message_line_height_unit_responsive && '' === $settings->message_line_height_unit && '' === $settings->message_line_height_unit_medium ) { ?>
							line-height: <?php echo esc_attr( $settings->message_line_height['small'] ); ?>px;
						<?php } ?>

						<?php if ( 'yes' === $converted || isset( $settings->num_line_height_unit_responsive ) && '' !== $settings->num_line_height_unit_responsive ) { ?>
							line-height: <?php echo esc_attr( $settings->num_line_height_unit_responsive ); ?>em;
						<?php } elseif ( isset( $settings->num_line_height_unit_responsive ) && '' === $settings->num_line_height_unit_responsive && isset( $settings->num_line_height['small'] ) && '' !== $settings->num_line_height['small'] ) { ?>
							line-height: <?php echo esc_attr( $settings->num_line_height['small'] ); ?>px;
						<?php } ?>		
					}
					<?php
				}
				if ( isset( $settings->fixed_timer_action ) && 'msg' === $settings->fixed_timer_action ) {
					?>
					.fl-node-<?php echo esc_attr( $id ); ?> .uabb-countdown-expire-message {

						<?php if ( 'yes' === $converted || isset( $settings->message_font_size_unit_responsive ) && '' !== $settings->message_font_size_unit_responsive ) { ?>
							font-size: <?php echo esc_attr( $settings->message_font_size_unit_responsive ); ?>px;   
						<?php } elseif ( $settings->message_font_size_unit_responsive && '' === $settings->message_font_size_unit_responsive && isset( $settings->message_font_size['small'] ) && '' !== $settings->message_font_size['small'] ) { ?>
							font-size: <?php echo esc_attr( $settings->message_font_size['small'] ); ?>px;
						<?php } ?> 

						<?php if ( isset( $settings->message_font_size['small'] ) && '' === $settings->message_font_size['small'] && isset( $settings->message_line_height['small'] ) && '' !== $settings->message_line_height['small'] && '' === $settings->message_line_height_unit_responsive && '' === $settings->message_line_height_unit && '' === $settings->message_line_height_unit_medium ) { ?>
							line-height: <?php echo esc_attr( $settings->message_line_height['small'] ); ?>px;
						<?php } ?>

						<?php if ( 'yes' === $converted || isset( $settings->message_line_height_unit_responsive ) && '' !== $settings->message_line_height_unit_responsive ) { ?>
							line-height: <?php echo esc_attr( $settings->message_line_height_unit_responsive ); ?>em;
						<?php } elseif ( isset( $settings->message_line_height_unit_responsive ) && '' === $settings->message_line_height_unit_responsive && isset( $settings->message_line_height['small'] ) && '' !== $settings->message_line_height['small'] ) { ?>
							line-height: <?php echo esc_attr( $settings->message_line_height['small'] ); ?>px;
						<?php } ?> 
					}
					<?php
				}
			}
			?>
		}
			<?php
		}
	}
}
?>
/* Typography responsive layout Ends here */
