<?php
/**
 *  UABB Retina Image Module file
 *
 *  @package UABB Retina Image Module
 */

$default_img_src = '';
$retina_img_src  = '';

if ( 'url' === $settings->default_img_source ) {
	$default_img_src = $settings->default_img_url;
} elseif ( 'library' === $settings->default_img_source ) {
	$default_img_src = $settings->default_img_src;
}

if ( 'url' === $settings->retina_img_source ) {
	$retina_img_src = $settings->retina_img_url;
} elseif ( 'library' === $settings->retina_img_source ) {
	$retina_img_src = $settings->retina_img_src;
}

if ( '' !== $default_img_src && '' !== $retina_img_src ) {

	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false ) {

		$date            = new DateTime();
		$timestam        = $date->getTimestamp();
		$default_img_src = $default_img_src . '?' . $timestam;
		$retina_img_src  = $retina_img_src . '?' . $timestam;
	}
}
$img_link = $module->get_link();

$grayscale_class = '';
if ( 'simple' === $settings->hover_effect ) {
	if ( 'yes' !== $settings->img_grayscale_simple ) {
		$grayscale_class = 'uabb-img-color-gray';
	} else {
		$grayscale_class = '';
	}
} elseif ( 'grayscale' === $settings->hover_effect ) {
	if ( 'yes' !== $settings->img_grayscale_grayscale ) {
		$grayscale_class = 'uabb-img-grayscale uabb-img-gray-color';
	} else {
		$grayscale_class = 'uabb-img-grayscale';
	}
}
$link_url_nofollow = '';
$link_url_target   = '';
if ( UABB_Compatibility::$version_bb_check ) {
	if ( isset( $settings->link_url_target ) ) {
		$link_url_target = $settings->link_url_target;
	}
	if ( isset( $settings->link_url_nofollow ) ) {
		$link_url_nofollow = ( 'yes' === $settings->link_url_nofollow ) ? '1' : '';
	}
} else {
	if ( isset( $settings->link_target ) ) {
		$link_url_target = $settings->link_target;
	}
	if ( isset( $settings->link_nofollow ) ) {
		$link_url_nofollow = $settings->link_nofollow;
	}
}

?>
<div class="uabb-module-content uabb-retina-img-wrap" itemscope itemtype="https://schema.org/ImageObject">
	<div class="uabb-retina-img-content <?php echo esc_attr( $grayscale_class ); ?>">
		<?php if ( ! empty( $img_link ) ) : ?>
		<a href="<?php echo $img_link; ?>" target="<?php echo esc_attr( $link_url_target ); ?>" <?php BB_Ultimate_Addon_Helper::get_link_rel( $link_url_target, $link_url_nofollow, 1 ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> itemprop="url">
		<?php endif; ?>
		<img class="uabb-retina-img" src="<?php echo $default_img_src; ?>" <?php echo ( '' !== $settings->custom_alt_text ? 'alt="' . $settings->custom_alt_text . '"' : '' ); ?> itemprop="image" srcset="<?php echo $default_img_src . ' 1x,' . $retina_img_src . ' 2x'; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"/>
		<?php if ( ! empty( $img_link ) ) : ?>
		</a>
		<?php endif; ?>
	</div>
	<?php if ( ! empty( $settings->custom_caption ) && 'custom_caption' === $settings->show_caption ) : ?>
	<<?php echo esc_attr( $settings->tag ); ?> class="uabb-retina-img-caption" itemprop="caption">
	<span class="uabb-retina-img-caption-text"><?php echo $settings->custom_caption; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	</<?php echo esc_attr( $settings->tag ); ?>>
	<?php endif; ?>
</div>
