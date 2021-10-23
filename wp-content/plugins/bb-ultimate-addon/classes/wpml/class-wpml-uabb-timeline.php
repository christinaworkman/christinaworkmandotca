<?php
/**
 *  UABB Advanced Timeline file for WPML
 *
 *  @package UABB Advanced Timeline WPML Compatibility
 */

/**
 * Here WPML_UABB_Timeline extends WPML_Beaver_Builder_Module_With_Items
 *
 * @class WPML_UABB_TIMELINE
 */
class WPML_UABB_TIMELINE extends WPML_Beaver_Builder_Module_With_Items {

	/**
	 * Function that renders UABB Advanced Timeline's values
	 *
	 * @since 1.33.0
	 * @param object $settings an object to get values of UABB Advanced Timeline.
	 */
	public function &get_items( $settings ) {
		return $settings->items;
	}

	/**
	 * Function that renders UABB Advanced Timeline'S fields value
	 *
	 * @since 1.33.0
	 */
	public function get_fields() {
		return array( 'heading', 'description', 'link' );
	}

	/**
	 * Function that renders title of the UABB Advanced Timeline'S module
	 *
	 * @since 1.33.0
	 * @param array $field gets the translated field values of the UABB Advanced Timeline.
	 */
	protected function get_title( $field ) {
		switch ( $field ) {
			case 'heading':
				return esc_html__( 'UABB Advanced Timeline : Heading', 'uabb' );

			case 'description':
				return esc_html__( 'UABB Advanced Timeline : Description', 'uabb' );

			case 'link':
				return esc_html__( 'UABB Advanced Timeline : Link', 'uabb' );

			default:
				return '';
		}
	}

	/**
	 * Function that renders editor type of the UABB Advanced Timeline'S fields values
	 *
	 * @since 1.33.0
	 * @param array $field gets an field type of the WPML editor.
	 */
	protected function get_editor_type( $field ) {
		switch ( $field ) {
			case 'heading':
				return 'LINE';

			case 'description':
				return 'VISUAL';

			case 'link':
				return 'LINK';

			default:
				return '';
		}
	}
}

