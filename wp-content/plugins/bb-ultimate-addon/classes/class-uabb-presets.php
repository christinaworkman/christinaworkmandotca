<?php
/**
 * UABB Presets
 *
 * @package UABB
 * @since x.x.x
 */

if ( ! class_exists( 'UABB_PRESETS' ) ) :

	/**
	 * UABB_PRESETS
	 *
	 * @since x.x.x
	 */
	class UABB_PRESETS {

		/**
		 * Instance
		 *
		 * @since x.x.x
		 * @var object Class object.
		 * @access private
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since x.x.x
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * @since x.x.x
		 */
		public function __construct() {
			add_action( 'wp_ajax_uabb_module_presets', array( $this, 'apply_preset' ) );
		}

		/**
		 * Apply the presets.
		 *
		 * @since x.x.x
		 */
		public static function apply_preset() {

			check_ajax_referer( 'uabb-presets-nonce', 'security' );

			$presets = self::get_presets( $_GET['current_module'] );

			wp_send_json_success( $presets, 200 );
		}

		/**
		 * Fetch the presets.
		 *
		 * @param string $preset_name module preset.
		 * @since x.x.x
		 */
		public static function get_presets( $preset_name ) {

			$design = BB_ULTIMATE_ADDON_DIR . 'assets/presets/' . $preset_name . '.json';
			if ( ! is_readable( $design ) ) {
				return false;
			}
			return fl_builder_filesystem()->file_get_contents( $design );
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method.
	 */
	UABB_PRESETS::get_instance();

endif;
