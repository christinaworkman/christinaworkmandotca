<?php
/**
 * Render the Loop Settings for Advanced Timeline module.
 *
 * @package UABB Advanced Timeline Module
 */

FLBuilderModel::default_settings(
	$settings,
	array(
		'post_type'          => 'post',
		'order_by'           => 'date',
		'order'              => 'DESC',
		'users'              => '',
		'total_posts_switch' => 'custom',
		'total_posts'        => '3',
	)
);

$settings = apply_filters( 'fl_builder_loop_settings', $settings );
// Allow extension of default Values.
do_action( 'uabb_loop_settings_before_form', $settings );
// e.g Add custom FLBuilder::render_settings_field().
?>
<div id="fl-builder-settings-section-source" class="fl-loop-data-source-select fl-builder-settings-section">
	<table class="fl-form-table">
	<?php

	// Data Source.
	FLBuilder::render_settings_field(
		'data_source',
		array(
			'type'    => 'select',
			'label'   => __( 'Source', 'uabb' ),
			'default' => 'custom_query',
			'options' => array(
				'custom_query' => __( 'Custom Query', 'uabb' ),
				'main_query'   => __( 'Main Query', 'uabb' ),
			),
		),
		$settings
	);

	?>
	</table>
</div>
<div class="fl-loop-data-source-acf fl-loop-data-source" data-source="acf_relationship">
	<table class="fl-form-table">
	<?php

	// ACF Compatibility.
	FLBuilder::render_settings_field(
		'data_source_acf_relational_type',
		array(
			'type'    => 'select',
			'label'   => __( 'Type', 'uabb' ),
			'default' => 'relationship',
			'options' => array(
				'relationship' => __( 'Relationship', 'uabb' ),
				'user'         => __( 'User', 'uabb' ),
			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'data_source_acf_relational_key',
		array(
			'type'  => 'text',
			'label' => __( 'Key', 'uabb' ),
		),
		$settings
	);

	?>
	</table>
</div>
<div class="fl-custom-query fl-loop-data-source" data-source="custom_query">
<div id="fl-builder-settings-section-general" class="fl-loop-builder uabb-settings-section">
<h3 class="fl-builder-settings-title"><span class="fl-builder-settings-title-text-wrap">
<?php
esc_attr_e( 'Custom Query', 'uabb' );
?>
</span></h3>
	<table class="fl-form-table">
	<?php

	// Post type.
	FLBuilder::render_settings_field(
		'post_type',
		array(
			'type'  => 'post-type',
			'label' => __( 'Post Type', 'uabb' ),
			'help'  => __( 'Choose the post type to display in module.', 'uabb' ),
		),
		$settings
	);


	FLBuilder::render_settings_field(
		'total_posts_switch',
		array(
			'type'    => 'select',
			'label'   => __( 'Number of Posts to Display', 'uabb' ),
			'help'    => __( 'Choose the number of posts you want to display in module.', 'uabb' ),
			'default' => 'custom',
			'options' => array(
				'all'    => __( 'All', 'uabb' ),
				'custom' => __( 'Custom', 'uabb' ),
			),
			'toggle'  => array(
				'custom' => array(
					'fields' => array( 'total_posts', 'offset' ),
				),
				'all'    => array(
					'fields' => array(),
				),
			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'total_posts',
		array(
			'type'        => 'text',
			'label'       => __( 'Posts Count', 'uabb' ),
			'help'        => __( 'Enter the total number of posts you want to display in module. Scroll pagination will show all posts.', 'uabb' ),
			'default'     => '3',
			'size'        => '8',
			'placeholder' => '3',
		),
		$settings
	);


	// Offset.
	FLBuilder::render_settings_field(
		'offset',
		array(
			'type'        => 'text',
			'label'       => __( 'Offset', 'uabb' ),
			'help'        => __( 'Enter the total number of posts you want skip.', 'uabb' ),
			'size'        => '8',
			'placeholder' => '0',
		),
		$settings
	);


	// Order by.
	FLBuilder::render_settings_field(
		'order_by',
		array(
			'type'    => 'select',
			'label'   => __( 'Sort By', 'uabb' ),
			'help'    => __( 'Choose the parameter to sort your posts.', 'uabb' ),
			'options' => array(
				'ID'             => __( 'ID', 'uabb' ),
				'date'           => __( 'Date', 'uabb' ),
				'modified'       => __( 'Date Last Modified', 'uabb' ),
				'title'          => __( 'Title', 'uabb' ),
				'author'         => __( 'Author', 'uabb' ),
				'comment_count'  => __( 'Comment Count', 'uabb' ),
				'menu_order'     => __( 'Menu Order', 'uabb' ),
				'meta_value'     => __( 'Meta Value (Alphabetical)', 'uabb' ),
				'meta_value_num' => __( 'Meta Value (Numeric)', 'uabb' ),
				'rand'           => __( 'Random', 'uabb' ),
				'post__in'       => __( 'Selection Order', 'uabb' ),
			),
			'toggle'  => array(
				'meta_value'     => array(
					'fields' => array( 'order_by_meta_key' ),
				),
				'meta_value_num' => array(
					'fields' => array( 'order_by_meta_key' ),
				),
			),
		),
		$settings
	);

	// Meta Key.
	FLBuilder::render_settings_field(
		'order_by_meta_key',
		array(
			'type'  => 'text',
			'label' => __( 'Meta Key', 'uabb' ),
		),
		$settings
	);

	// Order.
	FLBuilder::render_settings_field(
		'order',
		array(
			'type'    => 'select',
			'label'   => __( 'Order', 'uabb' ),
			'help'    => __( 'Choose the order to display your posts.', 'uabb' ),
			'default' => 'DESC',
			'options' => array(
				'DESC' => __( 'Descending', 'uabb' ),
				'ASC'  => __( 'Ascending', 'uabb' ),
			),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'exclude_self',
		array(
			'type'    => 'select',
			'label'   => __( 'Exclude Current Post', 'uabb' ),
			'default' => 'no',
			'help'    => __( 'Exclude the current post from the query.', 'uabb' ),
			'options' => array(
				'yes' => __( 'Yes', 'uabb' ),
				'no'  => __( 'No', 'uabb' ),
			),
		),
		$settings
	);

	?>
	</table>
</div>

<div id="fl-builder-settings-section-filter" class="uabb-settings-section">
<h3 class="fl-builder-settings-title"><span class="fl-builder-settings-title-text-wrap"><?php esc_attr_e( 'Filter', 'uabb' ); ?></span></h3>

	<?php foreach ( FLBuilderLoop::post_types() as $slug => $type ) : //phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
		<table class="fl-form-table fl-loop-builder-filter fl-loop-builder-<?php echo esc_attr( $slug ); ?>-filter"
			<?php
			if ( $slug === $settings->post_type ) {
				echo 'style="display:table;"';
			}
			?>
		>
		<?php

		FLBuilder::render_settings_field(
			'posts_' . $slug . '_matching',
			array(
				'type'    => 'select',
				'label'   => $type->label,
				'options' => array(
					'1' => sprintf( /* translators: %s: search term */ __( 'Match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $type->label ), //phpcs:ignore WordPress.WP.I18n.TooManyFunctionArgs
					'0' => sprintf( /* translators: %s: search term */ __( 'Do not match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $type->label ), //phpcs:ignore WordPress.WP.I18n.TooManyFunctionArgs
				),
				'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only these %2$s will be shown.', 'uabb' ), $type->label, $type->label ),
			),
			$settings
		);
		// Posts.
		FLBuilder::render_settings_field(
			'posts_' . $slug,
			array(
				'type'   => 'suggest',
				'action' => 'fl_as_posts',
				'data'   => $slug,
				'label'  => '&nbsp',
			),
			$settings
		);


		// Taxonomies.
		$taxonomies       = FLBuilderLoop::taxonomies( $slug );
		$taxonomies_array = array();

		foreach ( $taxonomies as $tax_slug => $tax ) { //phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

			FLBuilder::render_settings_field(
				'tax_' . $slug . '_' . $tax_slug . '_matching',
				array(
					'type'    => 'select',
					'label'   => $tax->label,
					'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only posts with these %2$s will be shown.', 'uabb' ), $tax->label, $tax->label ),
					'options' => array(
						'1'       => sprintf( /* translators: %s: search term */ __( 'Match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $tax->label ), //phpcs:ignore WordPress.WP.I18n.TooManyFunctionArgs
						'0'       => sprintf( /* translators: %s: search term */ __( 'Do not match these %s', '%s is an object like posts or taxonomies.', 'uabb' ), $tax->label ), //phpcs:ignore WordPress.WP.I18n.TooManyFunctionArgs
						'related' => sprintf( /* translators: %s: search term */ __( 'Match all related %s except...', '%s is an object like posts or taxonomies.', 'uabb' ), $tax->label ), //phpcs:ignore WordPress.WP.I18n.TooManyFunctionArgs
					),
					'help'    => sprintf( /* translators: %1$s: search term, translators: %2$s: search term */ __( 'Enter a comma separated list of %1$s. Only posts with these %2$s will be shown.', 'uabb' ), $tax->label, $tax->label ),
				),
				$settings
			);
			FLBuilder::render_settings_field(
				'tax_' . $slug . '_' . $tax_slug,
				array(
					'type'   => 'suggest',
					'action' => 'fl_as_terms',
					'data'   => $tax_slug,
					'label'  => '&nbsp',
				),
				$settings
			);
			$taxonomies_array[ $tax_slug ] = $tax->label;
		}

		?>
		</table>
	<?php endforeach; ?>
	<table class="fl-form-table">
	<?php

	// Author.
	FLBuilder::render_settings_field(
		'users_matching',
		array(
			'type'    => 'select',
			'label'   => __( 'Authors', 'uabb' ),
			'help'    => __( 'Enter a comma separated list of authors usernames. Only posts with these authors will be shown.', 'uabb' ),
			'options' => array(
				'1' => __( 'Match these Authors', 'uabb' ),
				'0' => __( 'Do not match these Authors', 'uabb' ),
			),
			'help'    => __( 'Enter a comma separated list of authors usernames. Only posts with these authors will be shown.', 'uabb' ),
		),
		$settings
	);

	FLBuilder::render_settings_field(
		'users',
		array(
			'type'   => 'suggest',
			'action' => 'fl_as_users',
			'label'  => __( '&nbsp', 'uabb' ),
		),
		$settings
	);

	?>
	</table>
</div>

</div>
<?php
do_action( 'uabb_loop_settings_after_form', $settings );
// e.g Add custom FLBuilder::render_settings_field().
