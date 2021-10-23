<?php
/**
 *  UABB Interactive Banner 2 Module front-end file
 *
 *  @package UABB Interactive Banner 2 Module
 */

$target            = '';
$link_url_nofollow = '';
if ( UABB_Compatibility::$version_bb_check ) {
	if ( isset( $settings->link_url_target ) ) {
		$target = $settings->link_url_target;
	}
	if ( isset( $settings->link_url_nofollow ) ) {
		$link_url_nofollow = $settings->link_url_nofollow;
	}
} else {
	if ( isset( $settings->link_target ) ) {
		$target = $settings->link_target;
	}
	$link_url_nofollow = 0;
}

?>
<div class="uabb-module-content uabb-ib2-outter uabb-new-ib uabb-ib-effect-<?php echo esc_attr( $settings->banner_style ); ?>  <?php echo ( '' !== $settings->banner_height ) ? 'uabb-ib2-min-height' : ''; ?> " >
	<?php
	if ( '' !== $settings->banner_image ) {
		?>
		<?php
		$alt = $module->get_alt();
		?>
	<img class="uabb-new-ib-img" src="<?php echo esc_url( $settings->banner_image_src ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
		<?php
	}
	?>
	<div class="uabb-new-ib-desc">
	<?php
	if ( '' !== $settings->banner_title ) {
		?>
		<<?php echo esc_attr( $settings->title_typography_tag_selection ); ?> class="uabb-new-ib-title uabb-simplify"><?php echo $settings->banner_title; ?></<?php echo esc_attr( $settings->title_typography_tag_selection ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php
	}
	?>
		<div class="uabb-new-ib-content uabb-text-editor uabb-simplify"><?php echo $settings->banner_desc; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
	</div>
	<?php
	if ( '' !== $settings->link_url ) {
		?>
	<a class="uabb-new-ib-link" href="<?php echo $settings->link_url; ?>" target="<?php echo esc_attr( $target ); ?>" <?php BB_Ultimate_Addon_Helper::get_link_rel( $target, $link_url_nofollow, 1 ); ?> aria-label="<?php echo ( esc_attr__( 'Go to ', 'uabb' ) . $settings->link_url ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"></a>
		<?php
	}
	?>
</div>
