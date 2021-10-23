<?php
/**
 *  UABB Advanced Timeline file
 *
 *  @package UABB Advanced Timeline Module
 */

/**
 * Function that initializes UABB Advanced Timeline Module
 *
 * @class UABBTimelineModule
 */
class UABBTimelineModule extends FLBuilderModule {

	/**
	 * Variable for UABB args
	 *
	 * @var array $uabb_args
	 */
	protected $uabb_args = array();

	/**
	 * Constructor function that constructs default values for the Advanced Timeline module
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Advanced Timeline', 'uabb' ),
				'description'     => __( 'Display a horizontal/vertical timeline of posts/content.', 'uabb' ),
				'category'        => BB_Ultimate_Addon_Helper::module_cat( BB_Ultimate_Addon_Helper::$content_modules ),
				'group'           => UABB_CAT,
				'dir'             => BB_ULTIMATE_ADDON_DIR . 'modules/uabb-timeline/',
				'url'             => BB_ULTIMATE_ADDON_URL . 'modules/uabb-timeline/',
				'enabled'         => true,
				'partial_refresh' => true,
				'icon'            => 'uabb-timeline.svg',
			)
		);
		$this->add_css( 'font-awesome-5' );
		$this->add_js( 'jquery-infinitescroll' );
		$this->add_js( 'carousel', BB_ULTIMATE_ADDON_URL . 'assets/js/global-scripts/jquery-carousel.js', array( 'jquery' ), '', true );
	}

	/**
	 * Function to get the icon for the Devices
	 *
	 * @since 1.33.0
	 * @method get_icons
	 * @param string $icon gets the icon for the module.
	 */
	public function get_icon( $icon = '' ) {

		if ( '' !== $icon && file_exists( BB_ULTIMATE_ADDON_DIR . 'modules/uabb-timeline/icon/' . $icon ) ) {
			return fl_builder_filesystem()->file_get_contents( BB_ULTIMATE_ADDON_DIR . 'modules/uabb-timeline/icon/' . $icon );
		}
		return '';
	}

	/**
	 * Render Timeline content on the frontend.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function render() {

		$settings = $this->settings;

		$res_support   = 'uabb-timeline-responsive-' . $settings->responsive_support;
		$res_class     = ( 'right' === $settings->responsive_orientation ) ? 'uabb-timeline-res-right' : '';
		$layout        = 'uabb-timeline-' . $settings->layout;
		$orient_class  = 'uabb-timeline--' . $settings->orientation;
		$arrow_pos     = 'uabb-timeline-arrow-' . $settings->arrow_pos;
		$infinite_load = ( 'posts' === $settings->content_type && 'yes' === $settings->infinite_load ? 'uabb-timeline-infinite-load' : '' );
		?>
		<div class="<?php echo esc_attr( $layout ); ?> <?php echo esc_attr( $orient_class ); ?> <?php echo esc_attr( $arrow_pos ); ?> uabb-timeline-wrapper uabb-timeline-node">
			<?php
				$count        = 0;
				$current_side = '';
			?>
			<?php
			if ( 'horizontal' === $settings->layout ) {
				$this->render_horizontal_timeline_connector();
			}
			?>
			<div class="uabb-timeline-main <?php echo esc_attr( $res_support ); ?> <?php echo esc_attr( $res_class ); ?>">
				<div class="uabb-days <?php echo esc_attr( $infinite_load ); ?>">

				<?php
				if ( 'custom' === $settings->content_type ) {
						$this->render_custom_content();
				} elseif ( 'posts' === $settings->content_type ) {
						$this->render_posts_content();
				}
				?>
				</div>
				<?php if ( 'vertical' === $settings->layout ) { ?>
				<div class="uabb-timeline__line">
					<div class="uabb-timeline__line__inner"></div>
				</div>
				<?php } ?>
				<?php
				if ( 'posts' === $settings->content_type && 'yes' === $settings->infinite_load ) {
					$this->render_pagination( $settings, $this->the_query, $this->the_query->posts );
				}
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Render Custom Timeline content on the frontend.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function render_custom_content() {
		$settings        = $this->settings;
		$count           = 0;
		$current_side    = '';
		$day_align_class = '';
		$item_count      = count( $settings->items );

		for ( $i = 0; $i < $item_count; $i++ ) {
			if ( empty( $settings->items[ $i ] ) ) {
				continue;
			}

			$data_alignment = 'uabb-timeline-module ';
			if ( 0 === $count % 2 ) {
				$current_side = 'Left';
			} else {
				$current_side = 'Right';
			}

			if ( 'Right' === $current_side ) {
				$data_alignment .= 'uabb-timeline-left';
				$day_align_class = 'uabb-day-left';
			} else {
				$day_align_class = 'uabb-day-right';
				$data_alignment .= 'uabb-timeline-right';
			}

			if ( '' !== $settings->items[ $i ]->heading || '' !== $settings->items[ $i ]->description ) {
				?>
				<div class="uabb-timeline-item-<?php echo esc_attr( $i ); ?> uabb-timeline-field animate-border out-view">
					<div class="<?php echo esc_attr( $data_alignment ); ?>">
						<?php
						if ( 'vertical' === $settings->layout ) {
							$this->render_connector_marker( $settings, $settings->items[ $i ], '' );
						}
						?>

						<div class="uabb-day-new <?php echo esc_attr( $day_align_class ); ?>">
							<div class="uabb-events-new">
								<?php if ( ! empty( $settings->items[ $i ]->link ) ) { ?>
									<a href="<?php echo ( $settings->items[ $i ]->link ); ?>" target="<?php echo esc_attr( $settings->items[ $i ]->link_target ); ?>" <?php BB_Ultimate_Addon_Helper::get_link_rel( $settings->items[ $i ]->link_target, $settings->items[ $i ]->link_nofollow, 1 ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> >
									<?php
								}
								if ( 'horizontal' === $settings->layout && 'yes' === $settings->show_card_arrow ) {
									?>
									<div class="uabb-timeline-arrow"></div>
								<?php } ?>
								<div class="uabb-events-inner-new">
									<?php
									if ( 'vertical' === $settings->layout ) {
										?>
										<div class="uabb-timeline-date-hide uabb-date-inner"><div class="inner-date-new"><p><?php echo wp_kses_post( ( 'date' === $settings->items[ $i ]->card_label_type ) ? $settings->items[ $i ]->date : $settings->items[ $i ]->label_text ); ?></p></div>
										</div>
									<?php } ?>
									<div class="uabb-content">
										<?php do_action( 'uabb_timeline_above_heading', $settings->items[ $i ] ); ?>	
										<?php
										if ( '' !== $settings->items[ $i ]->heading ) {
											?>
											<div class="uabb-timeline-heading-text">
											<?php
												$heading_tag = ( 'yes' === $settings->items[ $i ]->override_global ) ? $settings->items[ $i ]->heading_tag_single : $settings->heading_tag;
											?>
												<<?php echo esc_attr( $heading_tag ); ?> class="uabb-timeline-heading"><?php echo $settings->items[ $i ]->heading; ?></<?php echo esc_attr( $heading_tag ); ?>> <?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											</div>
											<?php } ?>
											<?php do_action( 'uabb_timeline_below_heading', $settings->items[ $i ] ); ?>
											<?php do_action( 'uabb_timeline_above_content', $settings->items[ $i ] ); ?>
											<?php
											if ( '' !== $settings->items[ $i ]->description ) {
												?>
												<div class="uabb-timeline-desc-content"><?php echo $settings->items[ $i ]->description; ?></div> <?php //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										<?php } ?>
										<?php do_action( 'uabb_timeline_below_content', $settings->items[ $i ] ); ?>
									</div>
									<?php if ( 'vertical' === $settings->layout && 'yes' === $settings->show_card_arrow ) { ?>
										<div class="uabb-timeline-arrow"></div>
									<?php } ?>
								</div>
								<?php if ( ! empty( $settings->items[ $i ]->link ) ) { ?>
									</a>
								<?php } ?>
							</div>
						</div>
						<?php if ( 'vertical' === $settings->layout && 'center' === $settings->orientation ) { ?>
							<div class="uabb-timeline-date-new">
								<div class="uabb-date-new"><div class="inner-date-new"><div><?php echo wp_kses_post( ( 'date' === $settings->items[ $i ]->card_label_type ) ? $settings->items[ $i ]->date : $settings->items[ $i ]->label_text ); ?></div></div></div>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php
			}
			++$count;
		}
	}

	/**
	 * Render Posts Timeline content on the frontend.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function render_posts_content() {

		$settings     = $this->settings;
		$dynamic_date = $settings->custom_meta_key;
		$custom_meta  = '';
		$the_query    = $this->get_posts_query();

		if ( empty( $the_query->posts ) ) {

			$this->render_search( $settings );
			return;
		}

		$count        = 0;
		$current_side = '';
		$per_posts    = $settings->posts_per_page;

		$condition = ( is_array( $the_query->posts ) || is_object( $the_query->posts ) ) ? count( $the_query->posts ) : '';

		for ( $i = 0; $i < $condition; $i++ ) {

			setup_postdata( $the_query->posts[ $i ] );
			$the_query->the_post();
			$post_id = $the_query->posts[ $i ]->ID;

			$page_no = get_query_var( 'paged' );
			if ( 'yes' === $settings->infinite_load && 0 !== $page_no ) {
				if ( 0 !== (int) $per_posts % 2 && 0 === (int) $page_no % 2 ) {
					$current_side = ( 0 === $count % 2 ) ? 'Right' : 'Left';
				} else {
					$current_side = ( 0 === $count % 2 ) ? 'Left' : 'Right';
				}
			} else {
				$current_side = ( 0 === $count % 2 ) ? 'Left' : 'Right';
			}

			$data_alignment = 'uabb-timeline-module ';

			if ( 'Right' === $current_side ) {
				$data_alignment .= 'uabb-timeline-left';
				$day_align_class = 'uabb-day-left';
			} else {
				$day_align_class = 'uabb-day-right';
				$data_alignment .= 'uabb-timeline-right';
			}

			?>
			<div class="uabb-timeline-item-<?php echo esc_attr( $i ); ?> uabb-timeline-field animate-border out-view">
				<div class="<?php echo esc_attr( $data_alignment ); ?>">
					<?php
					if ( 'vertical' === $settings->layout ) {
						$this->render_connector_marker( $settings, '', '' );
					}
					?>
					<div class="uabb-day-new <?php echo esc_attr( $day_align_class ); ?>">
						<div class="uabb-events-new">
							<?php if ( 'box' === $settings->link_type ) { ?>
								<a href="<?php the_permalink(); ?>">
								<?php
							}
							if ( 'horizontal' === $settings->layout && 'yes' === $settings->show_card_arrow ) {
								?>
								<div class="uabb-timeline-arrow"></div>
							<?php } ?>
								<div class="uabb-events-inner-new">
									<?php if ( 'yes' === $settings->show_image && '' !== get_the_post_thumbnail_url( $post_id ) ) { ?>
										<div class="uabb-timeline-featured-img">
											<a href="<?php get_permalink( $post_id ); ?>">
												<?php echo ( get_the_post_thumbnail( $post_id, $settings->image_size ) ); ?>
											</a>
										</div>
										<?php
									}

									if ( 'vertical' === $settings->layout && 'center' !== $settings->orientation ) {
										$this->get_date( $post_id, $settings );
									}
									?>
								<div class="uabb-content">
									<?php if ( 'yes' === $settings->show_title && '' !== get_the_title( $post_id ) ) { ?>
										<div class="uabb-timeline-heading-text">
											<<?php echo esc_attr( $settings->heading_tag ); ?> class="uabb-timeline-heading"><?php echo wp_kses_post( get_the_title( $post_id ) ); ?></<?php echo esc_attr( $settings->heading_tag ); ?>>
										</div>
									<?php } ?>
									<?php if ( 'yes' === $settings->show_excerpt ) { ?>
										<div class="uabb-timeline-desc-content"><?php echo wp_kses_post( $this->render_excerpt( $settings, $post_id ) ); ?></div>
									<?php } ?>

									<?php if ( 'text' === $settings->link_type ) { ?>
										<div class="uabb-timeline-link-style">
											<a href="<?php the_permalink(); ?>" class="uabb-timeline-link">
												<span><?php echo wp_kses_post( $settings->link_text ); ?></span>
											</a>
										</div>
									<?php } ?>
								</div>
								<?php if ( 'vertical' === $settings->layout && 'yes' === $settings->show_card_arrow ) { ?>
									<div class="uabb-timeline-arrow"></div>
								<?php } ?>
							</div>
							<?php if ( 'box' === $settings->link_type ) { ?>
								</a>
							<?php } ?>
						</div>
					</div>
					<?php
					if ( 'vertical' === $settings->layout && 'center' === $settings->orientation ) {
						$this->get_date( $post_id, $settings );
					}
					?>
				</div>
			</div>
			<?php
			++$count;
			?>
			<?php
		}
		wp_reset_postdata();
	}

	/**
	 * Renders connector marker icon layout.
	 *
	 * @since 1.33.0
	 * @access public
	 * @param object $settings module settings object.
	 * @param object $item gets settings object for individual timeline item.
	 * @param string $date gets the date of current timeline item.
	 */
	public function render_connector_marker( $settings, $item, $date ) {
		?>
		<div class="uabb-timeline-marker-wrapper">
		<?php if ( 'horizontal' === $settings->layout ) { ?>
		<div class="uabb-timeline-card-date-wrapper">
			<div class="uabb-timeline-card-date">
				<?php echo esc_attr( $date ); ?>
			</div>
		</div>
		<?php } ?>
		<div class="uabb-timeline-marker">
			<span class="timeline-icon-new out-view-timeline-icon">
				<?php
				if ( 'posts' === $settings->content_type ) {
					if ( ! empty( $settings->connector_icon_all ) ) {
						?>
						<i class="<?php echo esc_attr( $settings->connector_icon_all ); ?>" aria-hidden="true"></i>
						<?php
					}
				} elseif ( 'custom' === $settings->content_type ) {
					if ( 'yes' === $item->override_global && isset( $item->connector_icon_single ) ) {
						?>
						<i class="<?php echo esc_attr( $item->connector_icon_single ); ?>" aria-hidden="true"></i>
					<?php } elseif ( ! empty( $settings->connector_icon_all ) ) { ?>
						<i class="<?php echo esc_attr( $settings->connector_icon_all ); ?>" aria-hidden="true"></i>
						<?php
					}
				}
				?>
			</span>
		</div>
	</div>
		<?php
	}

	/**
	 * Render connector for horizontal timeline.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function render_horizontal_timeline_connector() {
		$settings = $this->settings;
		?>
			<div class="uabb-timeline-connector">
				<?php
					$i = 1;
				if ( 'custom' === $settings->content_type ) {
					$count = count( $settings->items );

					for ( $i = 0; $i < $count; $i++ ) {
						?>
						<div class="uabb-timeline-item-<?php echo esc_attr( $i ); ?>">
							<?php
							$date = ( 'date' === $settings->items[ $i ]->card_label_type ) ? $settings->items[ $i ]->date : $settings->items[ $i ]->label_text;
							$this->render_connector_marker( $settings, $settings->items[ $i ], $date );
							?>
						</div>
						<?php
					}
				} if ( 'posts' === $settings->content_type ) {
					$the_query = $this->get_posts_query();
					$condition = ( is_array( $the_query->posts ) || is_object( $the_query->posts ) ) ? count( $the_query->posts ) : '';

					for ( $i = 0; $i < $condition; $i++ ) {

						setup_postdata( $the_query->posts[ $i ] );
						$the_query->the_post();
						$post_id = $the_query->posts[ $i ]->ID;
						?>
							<div class="uabb-timeline-item-<?php echo esc_attr( $i ); ?>">
							<?php
							if ( 'published' === $settings->date_type ) {
								$date = apply_filters( 'uabb_timeline_the_date_format', get_the_date( '', $post_id ), get_option( 'date_format' ), '', '' );
							} elseif ( 'modified' === $settings->date_type ) {
								$date = get_the_modified_date( '', $post_id );
							} elseif ( 'custom' === $settings->date_type ) {
								if ( '' !== $settings->custom_meta_key ) {
									$date = get_post_meta( $post_id, $settings->custom_meta_key, 'true' );
								} else {
									$date = apply_filters( 'uabb_timeline_date_content', $post_id, $settings );
								}
							}
							$this->render_connector_marker( $settings, '', $date );
							?>
							</div>
							<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<?php
	}

	/**
	 * Renders date section on frontend.
	 *
	 * @since 1.33.0
	 * @access public
	 * @param int    $post_id ID of current post.
	 * @param object $settings gets module settings object.
	 */
	public function get_date( $post_id, $settings ) {
		if ( 'vertical' === $settings->layout && 'center' === $settings->orientation ) {
			?>
			<div class="uabb-timeline-date-new">
				<div class="uabb-date-new">
		<?php } ?>
			<div class="inner-date-new">
				<?php if ( 'published' === $settings->date_type ) { ?>
					<p><?php echo wp_kses_post( $this->render_date( $post_id ) ); ?></p>
				<?php } elseif ( 'modified' === $settings->date_type ) { ?>
					<p><?php echo wp_kses_post( get_the_modified_date( '', $post_id ) ); ?></p>
				<?php } elseif ( 'custom' === $settings->date_type ) { ?>
					<p>
					<?php
					if ( '' !== $settings->custom_meta_key ) {
						echo wp_kses_post( get_post_meta( $post_id, $settings->custom_meta_key, 'true' ) );
					} else {
						$custom_meta = apply_filters( 'uabb_timeline_date_content', $post_id, $settings );
						echo esc_attr( $custom_meta );
					}
					?>
					</p>
				<?php } ?>
			</div>
		<?php if ( 'vertical' === $settings->layout && 'center' === $settings->orientation ) { ?>
			</div>
		</div>
			<?php
		}
	}

	/**
	 * Returns query object for Posts content type.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function get_posts_query() {
		$settings  = $this->settings;
		$uabb_args = $this->get_uabb_args();
		$args      = $this->render_args();
		$the_query = '';
		$uabb_args = apply_filters( 'uabb_timeline_posts_query_args', $args, $settings );
		$this->set_uabb_args( $uabb_args );

		if ( isset( $settings->offset ) ) {
			$settings->offset = ( ! is_int( (int) $settings->offset ) ) ? 0 : ( ( '' !== $settings->offset ) ? $settings->offset : 0 );
		} else {
			$settings->offset = 0;
		}
		$settings->order_by       = $args['orderby'];
		$settings->posts_per_page = $args['posts_per_page'];

		if ( isset( $settings->data_source ) && 'main_query' === $settings->data_source && true === FL_BUILDER_LITE ) {
			global $wp_query;
			$the_query = clone $wp_query;
			$the_query->rewind_posts();
			$the_query->reset_postdata();
		} else {

			$the_query = FLBuilderLoop::query( $settings );
			$this->set_uabb_args( array() );
		}
		$this->the_query = $the_query;
		return $this->the_query;
	}

	/**
	 * Accessor function to get $uabb_args
	 *
	 * @since 1.33.0
	 * @method Accessor function to get $uabb_args
	 * @access public
	 */
	public function get_uabb_args() {
		return $this->uabb_args;
	}

	/**
	 * Function that renders args for pagination.
	 *
	 * @since 1.33.0
	 * @method render_args
	 */
	public function render_args() {

		$args['post_type'] = ( isset( $this->settings->post_type ) ) ? $this->settings->post_type : 'post';
		$args['orderby']   = ( isset( $this->settings->order_by ) ) ? $this->settings->order_by : '';

		// Order by meta value arg.
		if ( strstr( $args['orderby'], 'meta_value' ) ) {
			if ( isset( $this->settings->order_by_meta_key ) ) {
				$args['meta_key'] = $this->settings->order_by_meta_key;
			}
		}

		if ( 'yes' === $this->settings->infinite_load ) {
			$args['posts_per_page'] = ( isset( $this->settings->posts_per_page ) ) ? ( ( '' !== $this->settings->posts_per_page ) ? $this->settings->posts_per_page : '10' ) : '10';
		} else {
			$args['posts_per_page'] = ( 'all' === $this->settings->total_posts_switch ) ? '-1' : $this->settings->total_posts;
		}
		return $args;
	}

	/**
	 * Mutator function to update $uabb_args
	 *
	 * @since 1.33.0
	 * @method Mutator function to update $uabb_args
	 * @param array $args gets an array of arguments.
	 */
	public function set_uabb_args( $args ) {
		$this->uabb_args = $args;
	}

	/**
	 * Get Search Box HTML.
	 *
	 * Returns the Search Box HTML.
	 *
	 * @since 1.33.0
	 * @param array $settings object.
	 * @access public
	 */
	public function render_search( $settings ) {
		?>
		<div class="fl-post-grid-empty">
			<p><?php echo $settings->no_results_message; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php
			if ( $settings->show_search ) {
				get_search_form();
			}
			?>
		</div>
		<?php
	}

	/**
	 * Get post excerpt.
	 *
	 * Returns the post excerpt HTML wrap.
	 *
	 * @since 1.33.0
	 * @param array $settings object.
	 * @param int   $post_id ID of current post.
	 * @access public
	 */
	public function render_excerpt( $settings, $post_id ) {

		$excerpt_length = $settings->excerpt_length;

		if ( 0 === $excerpt_length ) {
			return;
		}

		add_filter( 'excerpt_length', array( $this, 'uabb_timeline_excerpt_length' ), 20 );
		add_filter( 'excerpt_more', array( $this, 'uabb_timeline_excerpt_more' ), 20 );

		$excerpt = get_the_excerpt( $post_id );

		remove_filter( 'excerpt_length', array( $this, 'uabb_excerpt_length_filter' ), 20 );
		remove_filter( 'excerpt_more', array( $this, 'uabb_excerpt_more_filter' ), 20 );

		return $excerpt;
	}

	/**
	 * Get post excerpt length.
	 *
	 * Returns the length of Timeline post excerpt.
	 *
	 * @since 1.33.0
	 * @access public
	 */
	public function uabb_timeline_excerpt_length() {
		$settings = $this->settings;
		return $settings->excerpt_length;
	}

	/**
	 * Get post excerpt end text.
	 *
	 * Returns the string to append to Timeline post excerpt.
	 *
	 * @param string $more returns string.
	 * @since 1.33.0
	 * @access public
	 */
	public function uabb_timeline_excerpt_more( $more ) {
		return ' ...';
	}

	/**
	 * Get featured image.
	 *
	 * Returns the featured image HTML wrap.
	 *
	 * @since 1.33.0
	 * @param array $settings object.
	 * @param int   $post_id ID of current post.
	 * @access public
	 */
	public function render_featured_image( $settings, $post_id ) {
		$html = '';
		ob_start();
		?>
		<a href="<?php get_permalink( $post_id ); ?>">
			<?php get_the_post_thumbnail( $post_id, $settings->image_size ); ?>
		</a>
		<?php
			$html = ob_get_contents();
			ob_end_clean();
		return $html;
	}

	/**
	 * Get post published date.
	 *
	 * Returns the post published date HTML wrap.
	 *
	 * @since 1.33.0
	 * @param int $post_id ID of current post.
	 * @access public
	 */
	public function render_date( $post_id ) {
		echo wp_kses_post( apply_filters( 'uabb_timeline_the_date_format', get_the_date( '', $post_id ), get_option( 'date_format' ), '', '' ) );
	}

	/**
	 * Get Pagination.
	 *
	 * Returns the Pagination HTML.
	 *
	 * @since 1.33.0
	 * @param array $settings object.
	 * @param array $query object.
	 * @param array $query_obj object.
	 * @access public
	 */
	public function render_pagination( $settings, $query, $query_obj ) {

		if ( 'no' === $settings->infinite_load ) {
			return;
		}

		// Get current page number.
		$permalink_structure = get_option( 'permalink_structure' );
		$base                = untrailingslashit( wp_specialchars_decode( get_pagenum_link() ) );
		$paged               = FLBuilderLoop::get_paged();

		$settings->total_posts_switch = ( isset( $settings->total_posts_switch ) ? $settings->total_posts_switch : 'all' );
		$settings->total_posts        = ( isset( $settings->total_posts ) ? $settings->total_posts : $query->found_posts );

		// Get total number of posts from query.
		$total_posts = ( 'all' === $settings->total_posts_switch ) ? $query->found_posts : ( ( '' !== $settings->total_posts ) ? $settings->total_posts : '3' );
		$base        = FLBuilderLoop::build_base_url( $permalink_structure, $base );
		$format      = FLBuilderLoop::paged_format( $permalink_structure, $base );

		// Offset value if any.
		$offset = ( ! isset( $settings->offset ) || ! is_int( (int) $settings->offset ) ) ? 0 : ( ( '' !== $settings->offset ) ? $settings->offset : 0 );
		$max    = $query->found_posts - $offset;
		$max    = ( $total_posts <= $max ) ? $total_posts : $max;

		if ( 'all' === $settings->total_posts_switch || ( isset( $settings->data_source ) && 'main_query' === $settings->data_source ) ) {
			$total_pages = $query->max_num_pages;
		} else {
			$posts_per_page = ( isset( $settings->posts_per_page ) ) ? ( ( '' !== $settings->posts_per_page ) ? $settings->posts_per_page : '3' ) : '3';
			$total_pages    = ceil( $max / $posts_per_page );
		}

		// Return pagination html.
		if ( $total_pages > 1 ) {
			$current_page = $paged;
			if ( ! $current_page ) {
				$current_page = 1;
			}
			$links = paginate_links(
				array(
					'base'    => $base . '%_%',
					'format'  => $format,
					'current' => $current_page,
					'total'   => $total_pages,
					'type'    => 'array',
				)
			);
			$class = (
				'yes' === $settings->infinite_load
			) ? 'style=display:none;' : '';

			?>
		<nav class="uabb-timeline-pagination" id="uabb-timeline-pagination" <?php echo esc_attr( $class ); ?> role="navigation" aria-label="<?php esc_attr_e( 'Pagination', 'uabb' ); ?>">
			<?php echo wp_kses_post( implode( PHP_EOL, $links ) ); ?>
		</nav>
			<?php
		}
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'UABBTimelineModule',
	array(
		'general'    => array(
			'title'    => __( 'General', 'uabb' ),
			'sections' => array(
				'preset_section'  => array(
					'title'  => __( 'Presets', 'uabb' ),
					'fields' => array(
						'preset_select' => array(
							'type'    => 'select',
							'label'   => __( 'Preset', 'uabb' ),
							'default' => 'none',
							'help'    => __( 'Before changing presets, save the content you added to the module. Otherwise, your content will be overwritten with the default one.', 'uabb' ),
							'class'   => 'uabb-preset-select',
							'options' => array(
								'none'     => __( 'Default', 'uabb' ),
								'preset-1' => __( 'Preset 1', 'uabb' ),
								'preset-2' => __( 'Preset 2', 'uabb' ),
								'preset-3' => __( 'Preset 3', 'uabb' ),
								'preset-4' => __( 'Preset 4', 'uabb' ),
								'preset-5' => __( 'Preset 5', 'uabb' ),
							),
							'preview' => array(
								'type' => 'none',
							),
						),
					),
				),
				'item_content'    => array(
					'title'  => __( 'Content', 'uabb' ),
					'fields' => array(
						'content_type' => array(
							'type'    => 'select',
							'label'   => __( 'Content Type', 'uabb' ),
							'default' => 'custom',
							'options' => array(
								'custom' => __( 'Custom', 'uabb' ),
								'posts'  => __( 'Posts', 'uabb' ),
							),
							'toggle'  => array(
								'custom' => array(
									'sections' => array( 'timeline_items' ),
								),
								'posts'  => array(
									'tabs'     => array( 'query' ),
									'sections' => array( 'posts', 'pagination' ),
								),
							),
						),
					),
				),
				'timeline_items'  => array(
					'title'  => __( 'Timeline Items', 'uabb' ),
					'fields' => array(
						'items' => array(
							'type'         => 'form',
							'label'        => __( 'Timeline Item', 'uabb' ),
							'form'         => 'uabb_timeline_form', // ID from registered form below.
							'preview_text' => 'heading', // Name of a field to use for the preview text.
							'multiple'     => true,
							'default'      => array(
								array(
									'date'        => '2019-01-01',
									'heading'     => 'Heading 1',
									'description' => 'I am timeline card content. You can change me anytime. Click here to edit this text.',
								),
								array(
									'date'        => '2020-01-01',
									'heading'     => 'Heading 2',
									'description' => 'I am timeline card content. You can change me anytime. Click here to edit this text.',
								),
								array(
									'date'        => '2021-01-01',
									'heading'     => 'Heading 3',
									'description' => 'I am timeline card content. You can change me anytime. Click here to edit this text.',
								),
							),
						),
					),
				),
				'carousel_filter' => array(
					'title'  => __( 'Carousel Filter', 'uabb' ),
					'fields' => array(
						'post_per_grid_desktop'  => array(
							'type'    => 'select',
							'label'   => __( 'No. of items on Desktop', 'uabb' ),
							'default' => '3',
							'help'    => __( 'This is how many items you want to show at one time on desktop.', 'uabb' ),
							'options' => array(
								'1' => __( '1 Column', 'uabb' ),
								'2' => __( '2 Columns', 'uabb' ),
								'3' => __( '3 Columns', 'uabb' ),
								'4' => __( '4 Columns', 'uabb' ),
								'5' => __( '5 Columns', 'uabb' ),
								'6' => __( '6 Columns', 'uabb' ),
								'7' => __( '7 Columns', 'uabb' ),
								'8' => __( '8 Columns', 'uabb' ),
							),
						),
						'post_per_grid_medium'   => array(
							'type'    => 'select',
							'label'   => __( 'No. of items on Medium Devices', 'uabb' ),
							'default' => '2',
							'help'    => __( 'This is how many posts you want to show at one time on tablet devices.', 'uabb' ),
							'options' => array(
								'1' => __( '1 Column', 'uabb' ),
								'2' => __( '2 Columns', 'uabb' ),
								'3' => __( '3 Columns', 'uabb' ),
								'4' => __( '4 Columns', 'uabb' ),
								'5' => __( '5 Columns', 'uabb' ),
								'6' => __( '6 Columns', 'uabb' ),
								'7' => __( '7 Columns', 'uabb' ),
								'8' => __( '8 Columns', 'uabb' ),
							),
						),
						'post_per_grid_small'    => array(
							'type'    => 'select',
							'label'   => __( 'No. of items on Small Devices', 'uabb' ),
							'default' => '1',
							'help'    => __( 'This is how many posts you want to show at a time on mobile devices.', 'uabb' ),
							'options' => array(
								'1' => __( '1 Column', 'uabb' ),
								'2' => __( '2 Columns', 'uabb' ),
								'3' => __( '3 Columns', 'uabb' ),
								'4' => __( '4 Columns', 'uabb' ),
							),
						),
						'slides_to_scroll'       => array(
							'type'        => 'unit',
							'label'       => __( 'Items to Scroll', 'uabb' ),
							'help'        => __( 'This is how many posts you want to scroll at a time.', 'uabb' ),
							'placeholder' => '1',
							'units'       => array( 'posts' ),
							'slider'      => array(
								'' => array(
									'min'  => 0,
									'max'  => 100,
									'step' => 10,
								),
							),
						),
						'autoplay'               => array(
							'type'    => 'select',
							'label'   => __( 'Autoplay Scroll', 'uabb' ),
							'help'    => __( 'Enables auto play of posts.', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'animation_speed' ),
								),
							),
						),
						'animation_speed'        => array(
							'type'        => 'unit',
							'label'       => __( 'Autoplay Speed', 'uabb' ),
							'help'        => __( 'Enter the time interval to scroll post automatically.', 'uabb' ),
							'placeholder' => '1000',
							'slider'      => true,
							'units'       => array( 'ms' ),
						),
						'infinite_loop'          => array(
							'type'    => 'select',
							'label'   => __( 'Infinite Loop', 'uabb' ),
							'help'    => __( 'Enable this to scroll posts in infinite loop.', 'uabb' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
						'lazyload'               => array(
							'type'    => 'select',
							'label'   => __( 'Enable Lazy Load', 'uabb' ),
							'help'    => __( 'Enable this to load the image as soon as user slide to it.', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
						'icon_left'              => array(
							'type'        => 'icon',
							'label'       => __( 'Left Arrow Icon', 'uabb' ),
							'show_remove' => true,
						),
						'icon_right'             => array(
							'type'        => 'icon',
							'label'       => __( 'Right Arrow Icon', 'uabb' ),
							'show_remove' => true,
						),
						'arrow_style'            => array(
							'type'    => 'select',
							'label'   => __( 'Arrow Style', 'uabb' ),
							'default' => 'circle',
							'options' => array(
								'square'        => __( 'Square Background', 'uabb' ),
								'circle'        => __( 'Circle Background', 'uabb' ),
								'square-border' => __( 'Square Border', 'uabb' ),
								'circle-border' => __( 'Circle Border', 'uabb' ),
							),
							'toggle'  => array(
								'square-border' => array(
									'fields' => array( 'arrow_color', 'arrow_color_border', 'arrow_border_size' ),
								),
								'circle-border' => array(
									'fields' => array( 'arrow_color', 'arrow_color_border', 'arrow_border_size' ),
								),
								'square'        => array(
									'fields' => array( 'arrow_color', 'arrow_background_color' ),
								),
								'circle'        => array(
									'fields' => array( 'arrow_color', 'arrow_background_color' ),
								),
							),
						),
						'arrow_color'            => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Color', 'uabb' ),
							'default'     => '#ffffff',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_background_color' => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Background Color', 'uabb' ),
							'default'     => '#cccccc',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_color_border'     => array(
							'type'        => 'color',
							'label'       => __( 'Arrow Border Color', 'uabb' ),
							'default'     => '',
							'show_reset'  => true,
							'show_alpha'  => true,
							'connections' => array( 'color' ),
						),
						'arrow_border_size'      => array(
							'type'       => 'unit',
							'label'      => __( 'Border Size', 'uabb' ),
							'default'    => '1',
							'units'      => array( 'px' ),
							'size'       => '8',
							'max_length' => '3',
							'slider'     => array(
								'px' => array(
									'min'  => 0,
									'max'  => 1000,
									'step' => 10,
								),
							),
						),
					),
				),
				'pagination'      => array(
					'title'  => __( 'Pagination', 'uabb' ),
					'fields' => array(
						'infinite_load'  => array(
							'type'    => 'select',
							'label'   => __( 'Infinite Load', 'uabb' ),
							'default' => 'no',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'posts_per_page' ),
								),
							),
						),
						'posts_per_page' => array(
							'type'    => 'unit',
							'label'   => __( 'Posts Per Page', 'uabb' ),
							'default' => '3',
						),
					),
				),
				'posts'           => array(
					'title'     => __( 'Posts', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'show_image'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Image', 'uabb' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'image_size' ),
								),
							),
						),
						'image_size'         => array(
							'type'    => 'photo-sizes',
							'label'   => __( 'Image Size', 'uabb' ),
							'default' => 'medium',
						),
						'show_title'         => array(
							'type'    => 'select',
							'label'   => __( 'Show Title', 'uabb' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
						),
						'show_excerpt'       => array(
							'type'    => 'select',
							'label'   => __( 'Show Excerpt', 'uabb' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'excerpt_length' ),
								),
							),
						),
						'excerpt_length'     => array(
							'type'    => 'unit',
							'label'   => __( 'Excerpt Length', 'uabb' ),
							'default' => '25',
						),
						'link_type'          => array(
							'type'    => 'select',
							'label'   => __( 'Link Type', 'uabb' ),
							'default' => 'box',
							'options' => array(
								'box'  => __( 'Complete Box', 'uabb' ),
								'text' => __( 'Text', 'uabb' ),
								'none' => __( 'None', 'uabb' ),
							),
							'toggle'  => array(
								'text' => array(
									'fields' => array( 'link_text' ),
								),
							),
						),
						'link_text'          => array(
							'type'        => 'text',
							'label'       => __( 'Link Text', 'uabb' ),
							'default'     => 'Read More',
							'connections' => array( 'string' ),
						),
						'date_type'          => array(
							'type'    => 'select',
							'label'   => __( 'Date', 'uabb' ),
							'default' => 'published',
							'options' => array(
								'published' => __( 'Published Date', 'uabb' ),
								'modified'  => __( 'Last Modified Date', 'uabb' ),
								'custom'    => __( 'Custom', 'uabb' ),
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array( 'custom_meta_key' ),
								),
							),
						),
						'custom_meta_key'    => array(
							'type'        => 'text',
							'label'       => __( 'Custom Meta Key', 'uabb' ),
							'connections' => array( 'string' ),
						),
						'no_results_message' => array(
							'type'    => 'text',
							'label'   => __( 'No Results Message', 'uabb' ),
							'default' => __( "Sorry, we couldn't find any posts. Please try a different search.", 'uabb' ),
						),
						'show_search'        => array(
							'type'    => 'select',
							'label'   => __( 'Show Search', 'uabb' ),
							'default' => '1',
							'options' => array(
								'1' => __( 'Show', 'uabb' ),
								'0' => __( 'Hide', 'uabb' ),
							),
							'help'    => __( 'Shows the search form if no posts are found.', 'uabb' ),
						),
					),
				),
			),
		),
		'query'      => array(
			'title' => __( 'Query', 'uabb' ),
			'file'  => plugin_dir_path( __FILE__ ) . 'includes/loop-settings.php',
		),
		'style'      => array(
			'title'    => __( 'Style', 'uabb' ),
			'sections' => array(
				'general_layout'    => array(
					'title'  => __( 'Layout', 'uabb' ),
					'fields' => array(
						'layout'          => array(
							'type'    => 'select',
							'label'   => __( 'Layout', 'uabb' ),
							'default' => 'vertical',
							'options' => array(
								'vertical'   => __( 'Vertical', 'uabb' ),
								'horizontal' => __( 'Horizontal', 'uabb' ),
							),
							'toggle'  => array(
								'vertical'   => array(
									'fields'   => array( 'orientation', 'horizontal_spacing', 'vertical_spacing', 'line_focused_color', 'arrow_pos' ),
									'sections' => array( 'responsive_layout' ),
								),
								'horizontal' => array(
									'sections' => array( 'carousel_filter' ),
									'fields'   => array( 'element_space', 'date_bottom_spacing', 'element_space' ),
								),
							),
						),
						'orientation'     => array(
							'type'    => 'select',
							'label'   => __( 'Orientation', 'uabb' ),
							'default' => 'center',
							'options' => array(
								'left'   => __( 'Left', 'uabb' ),
								'right'  => __( 'Right', 'uabb' ),
								'center' => __( 'Center', 'uabb' ),
							),
							'toggle'  => array(
								'left'   => array(
									'fields' => array( 'date_bottom_spacing' ),
								),
								'right'  => array(
									'fields' => array( 'date_bottom_spacing' ),
								),
								'center' => array(
									'sections' => array( 'responsive_layout' ),
								),
							),
						),
						'content_align'   => array(
							'type'  => 'align',
							'label' => __( 'Content Alignment', 'uabb' ),
						),
						'show_card_label' => array(
							'type'    => 'select',
							'label'   => __( 'Item Label', 'uabb' ),
							'default' => 'show',
							'options' => array(
								'show' => __( 'Show', 'uabb' ),
								'hide' => __( 'Hide', 'uabb' ),
							),
							'toggle'  => array(
								'show' => array(
									'sections' => array( 'dates_style' ),
								),
							),
						),
						'show_card_arrow' => array(
							'type'    => 'select',
							'label'   => __( 'Show Card Arrow', 'uabb' ),
							'default' => 'yes',
							'options' => array(
								'yes' => __( 'Yes', 'uabb' ),
								'no'  => __( 'No', 'uabb' ),
							),
							'toggle'  => array(
								'yes' => array(
									'fields' => array( 'arrow_pos' ),
								),
							),
						),
						'arrow_pos'       => array(
							'type'    => 'select',
							'label'   => __( 'Arrow Position', 'uabb' ),
							'default' => 'center',
							'options' => array(
								'top'    => __( 'Top', 'uabb' ),
								'center' => __( 'Middle', 'uabb' ),
								'bottom' => __( 'Bottom', 'uabb' ),
							),
						),
					),
				),
				'responsive_layout' => array(
					'title'  => __( 'Responsive Layout', 'uabb' ),
					'fields' => array(
						'responsive_support'     => array(
							'type'    => 'select',
							'label'   => __( 'Responsive Support', 'uabb' ),
							'default' => 'published',
							'options' => array(
								'none'   => __( 'Inherit', 'uabb' ),
								'tablet' => __( 'For Tablet & Mobile', 'uabb' ),
								'mobile' => __( 'For Mobile', 'uabb' ),
							),
							'toggle'  => array(
								'tablet' => array(
									'fields' => array( 'responsive_orientation' ),
								),
								'mobile' => array(
									'fields' => array( 'responsive_orientation' ),
								),
							),
						),
						'responsive_orientation' => array(
							'type'    => 'select',
							'label'   => __( 'Responsive Orientation', 'uabb' ),
							'default' => 'left',
							'options' => array(
								'left'  => __( 'Left', 'uabb' ),
								'right' => __( 'Right', 'uabb' ),
							),
						),
					),
				),
				'spacing'           => array(
					'title'     => __( 'Spacing', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'horizontal_spacing'     => array(
							'type'       => 'unit',
							'label'      => __( 'Horizontal Spacing', 'uabb' ),
							'default'    => '10',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
							'help'       => __( 'Adds horizontal spacing between cards.', 'uabb' ),
						),
						'vertical_spacing'       => array(
							'type'       => 'unit',
							'label'      => __( 'Vertical Spacing', 'uabb' ),
							'default'    => '20',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
							'help'       => __( 'Adds vertical spacing between cards.', 'uabb' ),
						),
						'heading_bottom_spacing' => array(
							'type'       => 'unit',
							'default'    => '10',
							'label'      => __( 'Heading Bottom Spacing', 'uabb' ),
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
						),
						'date_bottom_spacing'    => array(
							'type'       => 'unit',
							'label'      => __( 'Item Label Bottom Spacing', 'uabb' ),
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
						),
						'element_space'          => array(
							'type'       => 'unit',
							'label'      => 'Space between items',
							'default'    => '20',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
						),
					),
				),
				'timeline_style'    => array(
					'title'     => __( 'Timeline Items', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'heading_color'         => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Heading Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'heading_focused_color' => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Heading Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'heading_hover_color'   => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Heading Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'desc_color'            => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Description Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'desc_focused_color'    => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Description Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'desc_hover_color'      => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Description Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'bg_color'              => array(
							'type'        => 'color',
							'default'     => 'eeeeee',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'bg_focused_color'      => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'bg_hover_color'        => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Background Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'item_border'           => array(
							'type'       => 'border',
							'label'      => __( 'Border', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-day-right .uabb-events-inner-new, .uabb-day-left .uabb-events-inner-new',
								'property' => 'border',
							),
							'default'    => array(
								'radius' => array(
									'top_left'     => '4',
									'top_right'    => '4',
									'bottom_left'  => '4',
									'bottom_right' => '4',
								),
							),
						),
						'content_padding'       => array(
							'type'       => 'dimension',
							'label'      => 'Content Padding',
							'default'    => '30',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
						),
					),
				),
				'dates_style'       => array(
					'title'     => __( 'Item Label', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'date_color'         => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Item Label Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'date_focused_color' => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Item Label Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'date_hover_color'   => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Item Label Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
				'connector_style'   => array(
					'title'     => __( 'Connector', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'connector_icon_all'    => array(
							'type'        => 'icon',
							'label'       => __( 'Connector Icon', 'uabb' ),
							'default'     => 'fas fa-calendar-alt',
							'show_remove' => true,
						),
						'connector_width'       => array(
							'type'    => 'unit',
							'label'   => __( 'Connector Width', 'uabb' ),
							'default' => '2',
							'slider'  => true,
							'units'   => array( 'px' ),
						),
						'icon_size'             => array(
							'type'       => 'unit',
							'label'      => __( 'Icon Size', 'uabb' ),
							'default'    => '18',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px' ),
						),
						'icon_bg_size'          => array(
							'type'       => 'unit',
							'label'      => __( 'Icon Background Size', 'uabb' ),
							'default'    => '40',
							'responsive' => true,
							'slider'     => true,
							'units'      => array( 'px', 'em' ),
						),
						'icon_border'           => array(
							'type'       => 'border',
							'label'      => __( 'Icon Border', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type' => 'refresh',
							),
						),
						'line_color'            => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Line Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'line_focused_color'    => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'default'     => '1e88e5',
							'label'       => __( 'Line Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_color'            => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_focused_color'    => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'default'     => 'ffffff',
							'label'       => __( 'Icon Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_hover_color'      => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_bg_color'         => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Background Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_bg_focused_color' => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'default'     => '1e88e5',
							'label'       => __( 'Icon Background Focused Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
						'icon_bg_hover_color'   => array(
							'type'        => 'color',
							'connections' => array( 'color' ),
							'label'       => __( 'Icon Background Hover Color', 'uabb' ),
							'show_reset'  => true,
							'show_alpha'  => true,
						),
					),
				),
			),
		),
		'typography' => array(
			'title'    => __( 'Typography', 'uabb' ),
			'sections' => array(
				'heading_typography' => array(
					'title'  => __( 'Heading', 'uabb' ),
					'fields' => array(
						'heading_tag'  => array(
							'type'    => 'select',
							'label'   => __( 'HTML Tag', 'uabb' ),
							'default' => 'h3',
							'options' => array(
								'h1' => 'h1',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							),
						),
						'heading_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-timeline-main .uabb-content .uabb-timeline-heading',
							),
						),
					),
				),
				'desc_typography'    => array(
					'title'     => __( 'Description', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'desc_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-timeline-main .uabb-timeline-desc-content, .uabb-timeline-main .inner-date-new',
							),
						),
					),
				),
				'date_typography'    => array(
					'title'     => __( 'Item Label', 'uabb' ),
					'collapsed' => true,
					'fields'    => array(
						'date_typo' => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'uabb' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.uabb-timeline-main .inner-date-new',
							),
						),
					),
				),
			),
		),
		'uabb_docs'  => array(
			'title'    => __( 'Docs', 'uabb' ),
			'sections' => array(
				'knowledge_base' => array(
					'title'  => __( 'Helpful Information', 'uabb' ),
					'fields' => array(
						'uabb_helpful_information' => array(
							'type'    => 'raw',
							'content' => '<ul class="uabb-docs-list" data-branding=' . BB_Ultimate_Addon_Helper::uabb_get_branding_for_docs() . '>
								<li class="uabb-docs-list-item"> <i class="ua-icon ua-icon-chevron-right2"> </i> <a href="https://www.ultimatebeaver.com/docs/advanced-timeline-module/?utm_source=uabb-pro-backend&utm_medium=module-editor-screen&utm_campaign=advanced-timeline-module" target="_blank" rel="noopener"> Getting Started Article </a> </li>
							 </ul>',
						),
					),
				),
			),
		),
	)
);

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form(
	'uabb_timeline_form',
	array(
		'title' => __( 'Add Timeline Item', 'uabb' ),
		'tabs'  => array(
			'content'           => array(
				'title'    => __( 'Content', 'uabb' ),
				'sections' => array(
					'items_data' => array(
						'title'  => '',
						'fields' => array(
							'card_label_type' => array(
								'type'    => 'select',
								'label'   => __( 'Label Type', 'uabb' ),
								'default' => 'date',
								'options' => array(
									'date' => __( 'Date', 'uabb' ),
									'text' => __( 'Text', 'uabb' ),
								),
								'toggle'  => array(
									'date' => array(
										'fields' => array( 'date' ),
									),
									'text' => array(
										'fields' => array( 'label_text' ),
									),
								),
							),
							'date'            => array(
								'type'    => 'date',
								'label'   => 'Date',
								'default' => '2019-01-01',
							),
							'label_text'      => array(
								'type'        => 'text',
								'label'       => __( 'Label Text', 'uabb' ),
								'default'     => 'Label',
								'connections' => array( 'string' ),
							),
							'heading'         => array(
								'type'        => 'text',
								'label'       => __( 'Heading', 'uabb' ),
								'default'     => 'Heading',
								'connections' => array( 'string' ),
							),
							'description'     => array(
								'type'        => 'editor',
								'label'       => __( 'Description', 'uabb' ),
								'default'     => 'I am timeline card content. You can change me anytime. Click here to edit this text.',
								'connections' => array( 'string', 'html' ),
							),
							'link'            => array(
								'type'          => 'link',
								'label'         => __( 'Link', 'uabb' ),
								'placeholder'   => __( 'https://www.example.com', 'uabb' ),
								'show_target'   => true,
								'show_nofollow' => true,
								'show_download' => true,
								'connections'   => array( 'url' ),
							),
						),
					),
				),
			),
			'content_style'     => array(
				'title'    => __( 'Style', 'uabb' ),
				'sections' => array(
					'item_style' => array(
						'title'  => '',
						'fields' => array(
							'override_global'       => array(
								'type'    => 'select',
								'label'   => __( 'Override Global Settings', 'uabb' ),
								'default' => 'no',
								'options' => array(
									'yes' => __( 'Yes', 'uabb' ),
									'no'  => __( 'No', 'uabb' ),
								),
								'toggle'  => array(
									'yes' => array(
										'fields' => array( 'item_heading_color', 'item_desc_color', 'item_bg_color', 'connector_icon_single', 'item_icon_color', 'item_icon_bg_color', 'item_date_color' ),
										'tabs'   => array( 'typography_single' ),
									),
								),
							),
							'item_heading_color'    => array(
								'type'        => 'color',
								'connections' => array( 'color' ),
								'label'       => __( 'Heading Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
							'item_desc_color'       => array(
								'type'        => 'color',
								'connections' => array( 'color' ),
								'label'       => __( 'Description Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
							'item_bg_color'         => array(
								'type'        => 'color',
								'default'     => 'eeeeee',
								'connections' => array( 'color' ),
								'label'       => __( 'Background Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
							'connector_icon_single' => array(
								'type'        => 'icon',
								'label'       => __( 'Connector Icon', 'uabb' ),
								'default'     => 'fa fa-calendar',
								'show_remove' => true,
							),
							'item_icon_color'       => array(
								'type'        => 'color',
								'connections' => array( 'color' ),
								'label'       => __( 'Icon Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
							'item_icon_bg_color'    => array(
								'type'        => 'color',
								'connections' => array( 'color' ),
								'label'       => __( 'Icon Background Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
							'item_date_color'       => array(
								'type'        => 'color',
								'connections' => array( 'color' ),
								'label'       => __( 'Item Label Color', 'uabb' ),
								'show_reset'  => true,
								'show_alpha'  => true,
							),
						),
					),
				),
			),
			'typography_single' => array(
				'title'    => __( 'Typography', 'uabb' ),
				'sections' => array(
					'heading_typography_single' => array(
						'title'  => __( 'Heading', 'uabb' ),
						'fields' => array(
							'heading_tag_single'  => array(
								'type'    => 'select',
								'label'   => __( 'HTML Tag', 'uabb' ),
								'default' => 'h3',
								'options' => array(
									'h1' => 'h1',
									'h2' => 'h2',
									'h3' => 'h3',
									'h4' => 'h4',
									'h5' => 'h5',
									'h6' => 'h6',
								),
							),
							'heading_typo_single' => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'uabb' ),
								'responsive' => true,
							),
						),
					),
					'desc_typography_single'    => array(
						'title'     => __( 'Description', 'uabb' ),
						'collapsed' => true,
						'fields'    => array(
							'desc_typo_single' => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'uabb' ),
								'responsive' => true,
							),
						),
					),
					'date_typography_single'    => array(
						'title'     => __( 'Item Label', 'uabb' ),
						'collapsed' => true,
						'fields'    => array(
							'date_typo_single' => array(
								'type'       => 'typography',
								'label'      => __( 'Typography', 'uabb' ),
								'responsive' => true,
							),
						),
					),
				),
			),
		),
	)
);
