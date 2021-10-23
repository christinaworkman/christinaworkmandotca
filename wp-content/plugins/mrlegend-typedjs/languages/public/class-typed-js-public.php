<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Brennii96/
 * @since      1.0.0
 *
 * @package    Typed_Js
 * @subpackage Typed_Js/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Typed_Js
 * @subpackage Typed_Js/public
 * @author     Brendan O'Neill <mrlegend1235@hotmail.co.uk>
 */
class Typed_Js_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		//Add JS in head
		add_action('wp_head', array( $this, 'typed_js_header' ));

		//Add shorcode
		add_shortcode( 'typedjs', array( $this, 'typedjs_shortcode' ) );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Typed_Js_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Typed_Js_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/typed.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 *
	 * ADD shortcode
	 * Usage: [typedjs]CONTENT[/typedjs]
	 * Multiple lines: add + between
	 */
	// Add Shortcode
	public function typedjs_shortcode( $atts , $content = null ) {

		//Loop
		$exp = explode("+", $content);
		$sentence = "";

		foreach($exp AS $sentence_raw) {
			$sentence .= "<p>$sentence_raw</p>";
		}

		$output = "
		<div class=\"type-wrap\" style=\"display:none;\">
		  <div id=\"typed-strings\">$sentence</div>
		  <span id=\"typed\"></span>
		</div>";

		return $output;
	}

	/**
	 *
	 * Add code to header
	 *
	 */
	public function typed_js_header() {
		$output = "<script>
	    jQuery(function($){
	    $('.type-wrap').show();
	        $('#typed').typed({
	            stringsElement: $('#typed-strings'),
	            typeSpeed: 70,
	            startDelay: 800,
	            backDelay: 1200,
	            backSpeed: 20,
	            loop: true,
	            cursorChar: \"|\",
	            contentType: 'html', // or text
	            // call when done callback function
	            callback: function() {},
	            // starting callback function before each string
	            preStringTyped: function() {},
	            //callback for every typed string
		        onStringTyped: function() {},
	            loopCount: false,
	            // callback for reset
	            resetCallback: function() { newTyped(); }
	        });
	        $('.reset').click(function(){
	            $('#typed').typed('reset');
	        });
	    });
	    </script>";

		echo $output;
	}
}