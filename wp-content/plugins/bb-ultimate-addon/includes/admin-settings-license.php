<?php
/**
 * License Settings
 *
 * @package Render UABB License Settings page
 */

?>
<div id="fl-uabb-license-form" class="fl-settings-form uabb-fl-settings-form">
	<h3 class="fl-settings-form-header"><?php esc_attr_e( 'License', 'uabb' ); ?></h3>

	<?php
		$bsf_product_id = bsf_extract_product_id( BB_ULTIMATE_ADDON_DIR );
		$args           = array(
			'product_id'                       => $bsf_product_id,
			'button_text_activate'             => 'Activate License',
			'button_text_deactivate'           => 'Deactivate License',
			'submit_button_class'              => 'button-primary uabb-button-space',
			'form_class'                       => 'uabb-form-wrap',
			'bsf_license_form_heading_class'   => 'uabb-heading-message',
			'bsf_license_active_class'         => 'uabb-success-message',
			'bsf_license_not_activate_message' => 'uabb-license-error',
			'size'                             => 'regular',
			'bsf_license_allow_email'          => false,
		);

		echo bsf_license_activation_form( $args ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>

	<?php if ( is_multisite() ) : ?>
	<p><strong style="color:#ff0000;"><?php esc_attr_e( 'NOTE:', 'uabb' ); ?></strong> <?php esc_attr_e( 'This applies to all sites on the network.', 'uabb' ); ?></p>
	<?php endif; ?>

</div>
