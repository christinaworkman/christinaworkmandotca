<?php
/**
 *  UABB Photo Module file
 *
 *  @package UABB Photo Module
 */

/**
 * Function that initializes UABB Photo Module
 *
 * @class UABBPhotoModule
 */
class UABBPhotoModule extends FLBuilderModule {

	/**
	 * Variable for Photo module
	 *
	 * @property $data
	 * @var $data
	 */
	public $data = null;

	/**
	 * Variable for Photo module
	 *
	 * @property $_editor
	 * @protected
	 * @var $_editor
	 */
	protected $_editor = null; // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore

	/**
	 * Constructor function that constructs default values for the Photo module
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Photo', 'uabb' ),
				'description'     => __( 'Upload a photo or display one from the media library.', 'uabb' ),
				'category'        => BB_Ultimate_Addon_Helper::module_cat( BB_Ultimate_Addon_Helper::$content_modules ),
				'group'           => UABB_CAT,
				'dir'             => BB_ULTIMATE_ADDON_DIR . 'modules/uabb-photo/',
				'url'             => BB_ULTIMATE_ADDON_URL . 'modules/uabb-photo/',
				'partial_refresh' => true,
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'icon'            => 'format-image.svg',
			)
		);
	}

	/**
	 * Function that enqueue scripts
	 *
	 * @method enqueue_scripts
	 */
	public function enqueue_scripts() {
		if ( $this->settings && 'lightbox' === $this->settings->link_type ) {
			$this->add_js( 'jquery-magnificpopup' );
			$this->add_css( 'jquery-magnificpopup' );
		}
	}

	/**
	 * Function that upadte the photo source
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
	 * Function that deletes the cropped path
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
	 * Function that delete an existing crop if it exists
	 *
	 * @method crop
	 */
	public function crop() {
		// Delete an existing crop if it exists.
		$this->delete();

		// Do a crop.
		if ( ! empty( $this->settings->style ) && 'simple' !== $this->settings->style && 'custom' !== $this->settings->style ) {

			$editor = $this->_get_editor();

			if ( ! $editor || is_wp_error( $editor ) ) {
				return false;
			}

			$cropped_path = $this->_get_cropped_path();
			$size         = $editor->get_size();
			$new_width    = $size['width'];
			$new_height   = $size['height'];

			// Get the crop ratios.
			if ( 'landscape' === $this->settings->style ) {
				$ratio_1 = 1.43;
				$ratio_2 = .7;
			} elseif ( 'panorama' === $this->settings->style ) {
				$ratio_1 = 2;
				$ratio_2 = .5;
			} elseif ( 'portrait' === $this->settings->style ) {
				$ratio_1 = .7;
				$ratio_2 = 1.43;
			} elseif ( 'square' === $this->settings->style ) {
				$ratio_1 = 1;
				$ratio_2 = 1;
			} elseif ( 'circle' === $this->settings->style ) {
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
	 * Function that gets the data
	 *
	 * @method get_data
	 */
	public function get_data() {
		if ( empty( $this->data ) ) {

			// Photo source is set to "url".
			if ( 'url' === $this->settings->photo_source ) {
				$this->data                = new stdClass();
				$this->data->alt           = $this->settings->caption;
				$this->data->caption       = $this->settings->caption;
				$this->data->link          = $this->settings->photo_url;
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
	 * Function that gets classes for the Photo
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
	 * Function that gets source
	 *
	 * @method get_src
	 */
	public function get_src() {
		$src = $this->_get_uncropped_url();

		// Return a cropped photo.
		if ( $this->_has_source() && ! empty( $this->settings->style ) ) {

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
	 * Function that gets link
	 *
	 * @method get_link
	 */
	public function get_link() {
		$photo = $this->get_data();

		if ( 'url' === $this->settings->link_type ) {
			$link = $this->settings->link_url;
		} elseif ( 'lightbox' === $this->settings->link_type ) {
			$link = $photo->url;
		} elseif ( 'file' === $this->settings->link_type ) {
			$link = $photo->url;
		} elseif ( 'page' === $this->settings->link_type ) {
			$link = $photo->link;
		} else {
			$link = '';
		}

		return $link;
	}

	/**
	 * Function that gets the alt
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
	 * Function to get the attributes
	 *
	 * @method get_attributes
	 */
	public function get_attributes() {
		$attrs = '';

		if ( isset( $this->settings->attributes ) ) {
			foreach ( $this->settings->attributes as $key => $val ) {
				$attrs .= $key . '="' . $val . '" ';
			}
		}

		return $attrs;
	}

	/**
	 * Function to get the source
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
		$crop      = empty( $this->settings->style ) ? 'none' : $this->settings->style;
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
			$ext      = isset( $pathinfo['extension'] ) ? $pathinfo['extension'] : '';
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
	 * Function that gets the uncropped URL
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
			$url = FL_BUILDER_URL . 'img/pixel.png';
		}

		return $url;
	}

	/**
	 * Function that gets the cropped demo URL
	 *
	 * @method _get_cropped_demo_url
	 * @protected
	 */
	protected function _get_cropped_demo_url() { // phpcs:ignore  PSR2.Methods.MethodDeclaration.Underscore
		$info = $this->_get_cropped_path();

		return FL_BUILDER_DEMO_CACHE_URL . $info['filename'];
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
			// Link handling.
			if ( isset( $settings->link_target ) ) {
				$settings->link_url_target = $settings->link_target;
				unset( $settings->link_target );
			}
			if ( isset( $settings->link_nofollow ) ) {
				$settings->link_url_nofollow = ( '1' === $settings->link_nofollow ) ? 'yes' : '';
				unset( $settings->link_nofollow );
			}

			// Opacity.
			$helper->handle_opacity_inputs( $settings, 'style_bg_color_opc', 'style_bg_color' );

			// For overall alignment and responsive alignment settings.
			if ( isset( $settings->align ) ) {
				$settings->align = $settings->align;
			}
			if ( isset( $settings->responsive_align ) ) {
				$settings->responsive_align = $settings->responsive_align;
			}
		} elseif ( $version_bb_check && 'yes' !== $page_migrated ) {

			if ( isset( $settings->link_target ) ) {
				$settings->link_url_target = $settings->link_target;
				unset( $settings->link_target );
			}
			if ( isset( $settings->link_nofollow ) ) {
				$settings->link_url_nofollow = ( '1' === $settings->link_nofollow ) ? 'yes' : '';
				unset( $settings->link_nofollow );
			}
			// Opacity.
			$helper->handle_opacity_inputs( $settings, 'style_bg_color_opc', 'style_bg_color' );

			// For overall alignment and responsive alignment settings.
			if ( isset( $settings->align ) ) {
				$settings->align = $settings->align;
			}
			if ( isset( $settings->responsive_align ) ) {
				$settings->responsive_align = $settings->responsive_align;
			}
		}

		return $settings;
	}
}

/*
 * Condition to verify Beaver Builder version.
 * And accordingly render the required form settings file.
 */

if ( UABB_Compatibility::$version_bb_check ) {
	require_once BB_ULTIMATE_ADDON_DIR . 'modules/uabb-photo/uabb-photo-bb-2-2-compatibility.php';
} else {
	require_once BB_ULTIMATE_ADDON_DIR . 'modules/uabb-photo/uabb-photo-bb-less-than-2-2-compatibility.php';
}
