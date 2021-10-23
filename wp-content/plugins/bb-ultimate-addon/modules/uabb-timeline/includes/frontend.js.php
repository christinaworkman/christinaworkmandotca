<?php
/**
 *  UABB Advanced Timeline Module front-end JS php file
 *
 *  @package UABBTimeline
 */

?>

(function($) {
	$( document ).ready(function() {
		new UABBTimeline({
			id: '<?php echo esc_attr( $id ); ?>',
			loaderUrl: '<?php echo esc_url( BB_ULTIMATE_ADDON_URL ) . 'modules/' . esc_attr( $settings->type ) . '/img/post-loader.gif'; ?>',
			content_type: '<?php echo esc_attr( $settings->content_type ); ?>',
			infinite_load: '<?php echo esc_attr( $settings->infinite_load ); ?>',
			is_carousel: '<?php echo ( 'horizontal' === $settings->layout ) ? 'yes' : 'no'; ?>',
		infinite: <?php echo ( 'yes' === $settings->infinite_loop ) ? 'true' : 'false'; ?>,
		desktop: <?php echo ( '' !== $settings->post_per_grid_desktop ) ? esc_attr( $settings->post_per_grid_desktop ) : 1; ?>,
		moduleUrl: '<?php echo esc_url( BB_ULTIMATE_ADDON_URL ) . 'modules/' . esc_attr( $settings->type ); ?>',
		medium: <?php echo ( '' !== $settings->post_per_grid_medium ) ? esc_attr( $settings->post_per_grid_medium ) : 1; ?>,
		small: <?php echo ( '' !== $settings->post_per_grid_small ) ? esc_attr( $settings->post_per_grid_small ) : 1; ?>,
		slidesToScroll: <?php echo ( '' !== $settings->slides_to_scroll ) ? esc_attr( $settings->slides_to_scroll ) : 1; ?>,
		prevArrow: '<?php echo ( isset( $settings->icon_left ) && '' !== $settings->icon_left ) ? esc_attr( $settings->icon_left ) : 'fas fa-angle-left'; ?>',
		nextArrow: '<?php echo ( isset( $settings->icon_right ) && '' !== $settings->icon_right ) ? esc_attr( $settings->icon_right ) : 'fas fa-angle-right'; ?>',
		autoplay: <?php echo ( 'yes' === $settings->autoplay ) ? 'true' : 'false'; ?>,
		autoplaySpeed: <?php echo ( '' !== $settings->animation_speed ) ? esc_attr( $settings->animation_speed ) : '1000'; ?>,
		small_breakpoint: <?php echo esc_attr( $global_settings->responsive_breakpoint ); ?>,
		medium_breakpoint: <?php echo esc_attr( $global_settings->medium_breakpoint ); ?>,
		});
	});
})(jQuery);
