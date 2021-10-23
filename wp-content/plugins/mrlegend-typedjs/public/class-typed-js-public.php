<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/Brennii96/
 * @since      1.2.0
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
	 * @since    1.2.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.2.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.2.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		//Add JS in head
//		add_action('wp_head', array( $this, 'typed_js_header' ));

		//Add shorcode
		add_shortcode( 'typedjs', array( $this, 'typedjs_shortcode' ) );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.2.0
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
	public function typedjs_shortcode( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			'typespeed'  		 => 70,
			'startdelay' 	 	 => 800,
			'backdelay'  		 => 1200,
			'backspeed'  		 => 20,
			'loop'  				 => true,
			'smartBackspace' => true,
			'cursor'			   => '',
		), $atts);

		//Loop
		$exp = explode("+", $content);
		$sentence = "";

		foreach($exp AS $sentence_raw) {
			$sentence .= "<p>$sentence_raw</p>";
		}

		if ($atts['cursor']) {
			$styles = "<style>.typed-cursor{".$atts['cursor']."}</style>";
		} else {
			$styles = '';
		}

		$output = "
		<div class=\"type-wrap\" style=\"display:none;\">
		  <div id=\"typed-strings\">$sentence</div>
		  <span id=\"typed\"></span>
		</div>
		<script>
	    jQuery(function($){
	    $('.type-wrap').show();
	        $('#typed').typed({
	            stringsElement: $('#typed-strings'),
	            typeSpeed: ".$atts['typespeed'].",
	            startDelay: ".$atts['startdelay'].",
	            backDelay: ".$atts['backdelay'].",
	            backSpeed: ".$atts['backspeed'].",
							smartBackspace: ".$atts['smartBackspace'].",
	            loop: ".$atts['loop'].",
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
	    </script>
			".$styles."
		";

		return $output;
	}
}
