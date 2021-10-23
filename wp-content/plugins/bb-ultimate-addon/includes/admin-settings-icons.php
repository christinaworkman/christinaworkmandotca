<?php
/**
 * Icons settings
 *
 * @package UABB Icons
 */

?>
<div id="fl-uabb-icons-form" class="fl-settings-form uabb-fl-settings-form">

	<h3 class="fl-settings-form-header"><?php esc_attr_e( 'Reload Icons', 'uabb' ); ?></h3>	
	<form id="uabb-icons-form" action="<?php UABBBuilderAdminSettings::render_form_action( 'uabb-icons' ); ?>" method="post" data-nonce=<?php echo wp_kses_post( wp_create_nonce( 'uabb-icons-nonce' ) ); ?>>		
		<div class="fl-settings-form-content">
			<p>
			<?php
			echo sprintf( /* translators: %1$s: search term %2%s: search term */
				esc_attr__( 'Clicking the button below will reinstall %1$s icons on your website. If you are facing issues to load %2$s icons then you are at right place to troubleshoot it.', 'uabb' ),
				esc_attr( UABB_PREFIX ),
				esc_attr( UABB_PREFIX )
			);
			?>
				</p>
			<span class="button uabb-reload-icons">
				<i class="dashicons dashicons-update" style="padding: 3px;"></i>
				<?php esc_attr_e( 'Reload Icons', 'uabb' ); ?>
			</span>

		</div>
	</form>
</div>
