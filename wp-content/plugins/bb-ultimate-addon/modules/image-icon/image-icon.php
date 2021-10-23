<?php
/**
 *  UABB Image Icon Module file
 *
 *  @package UABB Image Icon Module
 */

/**
 * Function that initializes Image Icon Module
 *
 * @class ImageIconModule
 */
class ImageIconModule extends FLBuilderModule {

	/**
	 * Variable for Image Icon module
	 *
	 * @property $data
	 * @var $data
	 */
	public $data = null;

	/**
	 * Variable for Image Icon module
	 *
	 * @property $_editor
	 * @protected
	 * @var $_editor
	 */
	protected $_editor = null; // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore

	/**
	 * Constructor function that constructs default values for the Image icon Module
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Image / Icon', 'uabb' ),
				'description'     => __( 'Image / Icon with effect', 'uabb' ),
				'category'        => BB_Ultimate_Addon_Helper::module_cat( BB_Ultimate_Addon_Helper::$content_modules ),
				'group'           => UABB_CAT,
				'dir'             => BB_ULTIMATE_ADDON_DIR . 'modules/image-icon/',
				'url'             => BB_ULTIMATE_ADDON_URL . 'modules/image-icon/',
				'partial_refresh' => true,
				'icon'            => 'format-image.svg',
			)
		);

		$this->add_css( 'font-awesome-5' );
	}

	/**
	 * Ensure backwards compatibility with old settings.
	 *
	 * @since 1.14.0
	 * @param object $settings A module settings object.
	 * @param object $helper A settings compatibility helper.
	 * @return object
	 */
	public function filter_settings( $settings, $helper ) {

		$version_bb_check        = UABB_Compatibility::$version_bb_check;
		$page_migrated           = UABB_Compatibility::$uabb_migration;
		$stable_version_new_page = UABB_Compatibility::$stable_version_new_page;

		if ( $version_bb_check && ( 'yes' === $page_migrated || 'yes' === $stable_version_new_page ) ) {

			// Handle opacity fields.
			$helper->handle_opacity_inputs( $settings, 'icon_bg_color_opc', 'icon_bg_color' );
			$helper->handle_opacity_inputs( $settings, 'icon_bg_hover_color_opc', 'icon_bg_hover_color' );
			$helper->handle_opacity_inputs( $settings, 'img_bg_color_opc', 'img_bg_color' );
			$helper->handle_opacity_inputs( $settings, 'img_bg_hover_color_opc', 'img_bg_hover_color' );

		} elseif ( $version_bb_check && 'yes' !== $page_migrated ) {

			// Handle opacity fields.
			$helper->handle_opacity_inputs( $settings, 'icon_bg_color_opc', 'icon_bg_color' );
			$helper->handle_opacity_inputs( $settings, 'icon_bg_hover_color_opc', 'icon_bg_hover_color' );
			$helper->handle_opacity_inputs( $settings, 'img_bg_color_opc', 'img_bg_color' );
			$helper->handle_opacity_inputs( $settings, 'img_bg_hover_color_opc', 'img_bg_hover_color' );
		}

		return $settings;
	}


	/**
	 * Function to update the Image src
	 *
	 * @method update
	 * @param object $settings {object}.
	 */
	public function update( $settings ) {
		// Make sure we have a photo_src property.
		if ( ! isset( $settings->photo_src ) ) {
			$settings->photo_src = '';
		}

		// Cache the attachment data.
		$data = FLBuilderPhoto::get_attachment_data( $settings->photo );

		if ( $data ) {
			$settings->data = $data;
		}

		// Save a crop if necessary.
		$this->crop();

		return $settings;
	}

	/**
	 * Function to delete the path if not required
	 *
	 * @method delete
	 */
	public function delete() {
		$cropped_path = $this->_get_cropped_path();

		if ( file_exists( $cropped_path['path'] ) ) {
			unlink( $cropped_path['path'] );
		}
	}

	/**
	 * Function for cropping the image
	 *
	 * @method crop
	 */
	public function crop() {
		// Delete an existing crop if it exists.
		$this->delete();

		// Do a crop.
		if ( ! empty( $this->settings->image_style ) && 'simple' !== $this->settings->image_style && 'custom' !== $this->settings->image_style ) {

			$editor = $this->_get_editor();

			if ( ! $editor || is_wp_error( $editor ) ) {
				return false;
			}

			$cropped_path = $this->_get_cropped_path();
			$size         = $editor->get_size();
			$new_width    = $size['width'];
			$new_height   = $size['height'];

			// Get the crop ratios.
			if ( 'circle' === $this->settings->image_style ) {
				$ratio_1 = 1;
				$ratio_2 = 1;
			} elseif ( 'square' === $this->settings->image_style ) {
				$ratio_1 = 1;
				$ratio_2 = 1;
			}

			// Get the new width or height.
			if ( $size['width'] / $size['height'] < $ratio_1 ) {
				$new_height = $size['width'] * $ratio_2;
			} else {
				$new_width = $size['height'] * $ratio_1;
			}

			// Make sure we have enough memory to crop, removed @ini_set( 'memory_limit', '300M' );.
			wp_raise_memory_limit( 'memory_limit', '300M' );

			// Crop the photo.
			$editor->resize( $new_width, $new_height, true );

			// Save the photo.
			$editor->save( $cropped_path['path'] );

			// Return the new url.
			return $cropped_path['url'];
		}

		return false;
	}

	/**
	 * Function that gets the data for the Image Icon module.
	 *
	 * @method get_data
	 */
	public function get_data() {
		if ( ! $this->data ) {

			// Photo source is set to "url".
			if ( 'url' === $this->settings->photo_source ) {
				$this->data                = new stdClass();
				$this->data->url           = $this->settings->photo_url;
				$this->settings->photo_src = $this->settings->photo_url;
			} elseif ( is_object( $this->settings->photo ) ) {
				// Photo source is set to "library".
				$this->data = $this->settings->photo;
			} else {
				$this->data = FLBuilderPhoto::get_attachment_data( $this->settings->photo );
			}

			// Data object is empty, use the settings cache.
			if ( ! $this->data && isset( $this->settings->data ) ) {
				$this->data = $this->settings->data;
			}
		}

		return $this->data;
	}

	/**
	 * Function that gets classes for the Photo image
	 *
	 * @method get_classes
	 */
	public function get_classes() {
		$classes = array( 'uabb-photo-img' );

		if ( 'library' === $this->settings->photo_source ) {

			if ( ! empty( $this->settings->photo ) ) {

				$data = self::get_data();

				if ( is_object( $data ) ) {
					$classes[] = 'wp-image-' . $data->id;

					if ( isset( $data->sizes ) ) {

						foreach ( $data->sizes as $key => $size ) {

							if ( $size->url === $this->settings->photo_src ) {
								$classes[] = 'size-' . $key;
								break;
							}
						}
					}
				}
			}
		}

		return implode( ' ', $classes );
	}

	/**
	 * Function that gets the src for the Uncropped Image URL
	 *
	 * @method get_src
	 */
	public function get_src() {
		$src = $this->_get_uncropped_url();

		// Return a cropped photo.
		if ( $this->_has_source() && ! empty( $this->settings->image_style ) ) {

			$cropped_path = $this->_get_cropped_path();

			// See if the cropped photo already exists.
			if ( file_exists( $cropped_path['path'] ) ) {
				$src = $cropped_path['url'];
			} elseif ( stristr( $src, FL_BUILDER_DEMO_URL ) && ! stristr( FL_BUILDER_DEMO_URL, $_SERVER['HTTP_HOST'] ) ) {
				// It doesn't, check if this is a demo image.
				$src = $this->_get_cropped_demo_url();
			} elseif ( stristr( $src, FL_BUILDER_OLD_DEMO_URL ) ) {
				// It doesn't, check if this is a OLD demo image.
				$src = $this->_get_cropped_demo_url();
			} else {
				// A cropped photo doesn't exist, try to create one.
				$url = $this->crop();

				if ( $url ) {
					$src = $url;
				}
			}
		}
		return $src;
	}


	/**
	 * Function that gets the alternate value of the Image
	 *
	 * @method get_alt
	 */
	public function get_alt() {
		$photo = $this->get_data();
		if ( ! empty( $photo->alt ) ) {
			return esc_html( $photo->alt );
		} elseif ( ! empty( $photo->description ) ) {
			return esc_html( $photo->description );
		} elseif ( ! empty( $photo->caption ) ) {
			return esc_html( $photo->caption );
		} elseif ( ! empty( $photo->title ) ) {
			return esc_html( $photo->title );
		}
	}
	/**
	 * Function that gets the title value of the Image
	 *
	 * @since 1.23.0
	 *
	 * @method get_title
	 */
	public function get_title() {
		$photo = $this->get_data();
		if ( isset( $photo->title ) && ! empty( $photo->title ) ) {
			return esc_html( $photo->title );
		}
	}
	/**
	 * Function that checks for the source
	 *
	 * @method _has_source
	 * @protected
	 */
	protected function _has_source() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		if ( 'url' === $this->settings->photo_source && ! empty( $this->settings->photo_url ) ) {
			return true;
		} elseif ( 'library' === $this->settings->photo_source && ! empty( $this->settings->photo_src ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Function that gets the editor
	 *
	 * @method _get_editor
	 * @protected
	 */
	protected function _get_editor() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		if ( $this->_has_source() && null === $this->_editor ) {

			$url_path  = $this->_get_uncropped_url();
			$file_path = str_ireplace( home_url(), ABSPATH, $url_path );

			if ( file_exists( $file_path ) ) {
				$this->_editor = wp_get_image_editor( $file_path );
			} else {
				$this->_editor = wp_get_image_editor( $url_path );
			}
		}

		return $this->_editor;
	}

	/**
	 * Function that gets the cropped path
	 *
	 * @method _get_cropped_path
	 * @protected
	 */
	protected function _get_cropped_path() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		$crop      = empty( $this->settings->image_style ) ? 'simple' : $this->settings->image_style;
		$url       = $this->_get_uncropped_url();
		$cache_dir = FLBuilderModel::get_cache_dir();

		if ( empty( $url ) ) {
			$filename = uniqid(); // Return a file that doesn't exist.
		} else {

			if ( stristr( $url, '?' ) ) {
				$parts = explode( '?', $url );
				$url   = $parts[0];
			}

			$pathinfo = pathinfo( $url );
			$dir      = $pathinfo['dirname'];
			$ext      = $pathinfo['extension'];
			$name     = wp_basename( $url, ".$ext" );
			$new_ext  = strtolower( $ext );
			$filename = "{$name}-{$crop}.{$new_ext}";
		}

		return array(
			'filename' => $filename,
			'path'     => $cache_dir['path'] . $filename,
			'url'      => $cache_dir['url'] . $filename,
		);
	}

	/**
	 * Functions that gets the uncropped URL of the Image
	 *
	 * @method _get_uncropped_url
	 * @protected
	 */
	protected function _get_uncropped_url() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		if ( 'url' === $this->settings->photo_source ) {
			$url = $this->settings->photo_url;
		} elseif ( ! empty( $this->settings->photo_src ) ) {
			$url = $this->settings->photo_src;
		} else {
			$url = '';
		}

		return $url;
	}

	/**
	 * Functions that gets the cropped demo URL
	 *
	 * @method _get_cropped_demo_url
	 * @protected
	 */
	protected function _get_cropped_demo_url() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		$info = $this->_get_cropped_path();

		return FL_BUILDER_DEMO_CACHE_URL . $info['filename'];
	}
}

/*
 * Condition to verify Beaver Builder version.
 * And accordingly render the required form settings file.
 *
 */

if ( UABB_Compatibility::$version_bb_check ) {
	require_once BB_ULTIMATE_ADDON_DIR . 'modules/image-icon/image-icon-bb-2-2-compatibility.php';
} else {
	require_once BB_ULTIMATE_ADDON_DIR . 'modules/image-icon/image-icon-bb-less-than-2-2-compatibility.php';
}
