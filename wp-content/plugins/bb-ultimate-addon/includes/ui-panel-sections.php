<?php
/**
 *  Row and Module Categorized & UnCategorized Templates
 *
 *  Showing Row and Module Templates from sections-*.dat, presets-*.dat
 *
 *  @package Templates from sections and presets
 */

?>

<div class="fl-builder-panel fl-builder-panel-ultimate-rows">
	<div class="fl-builder-panel-actions">
		<i class="fl-builder-panel-close fa fa-times"></i>
	</div>
	<div class="fl-builder-panel-content-wrap fl-nanoscroller">
		<div class="fl-builder-panel-content fl-nanoscroller-content">
			<div class="fl-builder-blocks">

				<!-- Search Section -->
				<div id="fl-builder-blocks-rows" class="fl-builder-blocks-section">
					<input type="text" id="section_search" placeholder="<?php esc_attr_e( 'Search Section...', 'uabb' ); ?>" style="width: 100%;">
					<div class="filter-count"></div>
				</div><!-- Search Section -->

				<?php do_action( 'uabb_fl_builder_ui_panel_before_rows' ); ?>

				<?php

				/**
				 * Renders UABB categorized row templates in the UI panel.
				 *
				 * @see render_ui_panel_row_templates()
				 */
				if ( ! $is_row_template && ! $is_module_template && $has_editing_cap ) {

					$uabb_row_templates = UABB_UI_Panels::uabb_templates_data( $row_templates, 'includes' );

					if ( count( $uabb_row_templates ) > 0 ) :
						foreach ( $uabb_row_templates['categorized'] as $sections_cat ) :

							// avoid 'Uncategorized'.
							if ( trim( $sections_cat['name'] ) !== 'Uncategorized' ) :
								?>
								<div class="fl-builder-blocks-section">
									<span class="fl-builder-blocks-section-title">
										<?php echo esc_attr__( $sections_cat['name'], 'uabb' ); //phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralText ?>
										<i class="fa fa-chevron-down"></i>
									</span>
									<div class="fl-builder-blocks-section-content fl-builder-row-templates">
										<?php
										foreach ( $sections_cat['templates'] as $template ) :

											// Get tags.
											$tags = '';
											if ( is_array( $template['tags'] ) && count( $template['tags'] ) > 0 ) {
												$tags = implode( ', ', $template['tags'] );
											}
											?>

											<span class="fl-builder-block fl-builder-block-template fl-builder-block-row-template" data-id="<?php echo esc_attr( $template['id'] ); ?>" data-type="<?php echo esc_attr( $template['type'] ); ?>">
												<?php if ( ! stristr( $template['image'], 'blank.jpg' ) ) : ?>
												<img class="fl-builder-block-template-image" src="<?php echo esc_attr( $template['image'] ); ?>" />
												<?php endif; ?>
												<span class="fl-builder-block-title" data-tags="<?php echo esc_attr( $tags ); ?>" data-cat-name="<?php echo esc_attr( $sections_cat['name'] ); ?>"><?php echo esc_attr( $template['name'] ); ?></span>
											</span>

										<?php endforeach; ?>
									</div>
								</div>
								<?php
							endif;
						endforeach;
					endif;
				}
				?>

				<?php do_action( 'uabb_fl_builder_ui_panel_after_rows' ); ?>

				<?php if ( BB_Ultimate_Addon_Helper::get_builder_uabb_branding( 'uabb-enable-template-cloud' ) ) { ?>
				<div class="fl-builder-modules-cta">
					<a href="#" onclick="window.open('<?php echo esc_url( admin_url() ); ?>options-general.php?page=uabb-builder-settings#uabb-cloud-templates');" target="_blank" rel="noopener"><i class="fa fa-external-link-square"></i>
						<?php
						/* translators: %s: search term */
						echo sprintf( esc_attr__( 'Note - You can enable, disable and manage %s sections here.', 'uabb' ), esc_attr( UABB_PREFIX ) );
						?>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
